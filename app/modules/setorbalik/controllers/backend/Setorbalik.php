<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Setorbalik Controller
*| --------------------------------------------------------------------------
*| Setorbalik site
*|
*/
class Setorbalik extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_setorbalik');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Setorbaliks
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('setorbalik_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');
		
		if($this->aauth->is_member('bpp bagian')){
		    $this->session->set_userdata('id_bagian',$this->model_setorbalik->get_bagian());
		}

		$this->data['setorbaliks'] = $this->model_setorbalik->get($filter, $field, $this->limit_page, $offset);
		$this->data['setorbalik_counts'] = $this->model_setorbalik->count_all($filter, $field);
		$this->data['nama_bagian'] = $this->model_setorbalik->get_nama_bagian();

		$config = [
			'base_url'     => 'administrator/setorbalik/index/',
			'total_rows'   => $this->data['setorbalik_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Surat Tanda Setoran (STS) List');
		$this->render('backend/standart/administrator/setorbalik/setorbalik_list', $this->data);
	}
	
	/**
	* Add new setorbaliks
	*
	*/
	public function add()
	{
		$this->is_allowed('setorpb_add');

		$this->template->title('Surat Tanda Setoran (STS) New');
		$this->render('backend/standart/administrator/setorbalik/setorbalik_add', $this->data);
	}

	/**
	* Add New Setorbaliks
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('setorpb_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('tanggal_setor', 'Tanggal Setor', 'trim|required');
		

		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
		

		$this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal_setor' => $this->input->post('tanggal_setor'),
				'nominal' => $this->input->post('nominal'),
				'sub_kegiatan' => $this->input->post('sub_kegiatan'),
			];
			
				if (!is_dir(FCPATH . '/uploads/setorbalik/')) {
				mkdir(FCPATH . '/uploads/setorbalik/');
			}

			if (count((array) $this->input->post('tes_upload_lampiran_name'))) {
				foreach ((array) $_POST['tes_upload_lampiran_name'] as $idx => $file_name) {
					$tes_upload_lampiran_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['tes_upload_lampiran_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/setorbalik/' . $tes_upload_lampiran_name_copy);

					$listed_image[] = $tes_upload_lampiran_name_copy;

					if (!is_file(FCPATH . '/uploads/setorbalik/' . $tes_upload_lampiran_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['lampiran'] = implode($listed_image, ',');
			}


			
			
			$save_setorbalik = $this->model_setorbalik->store($save_data);
            

			if ($save_setorbalik) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_setorbalik;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/setorbalik/edit/' . $save_setorbalik, 'Edit Setorbalik'),
						anchor('administrator/setorbalik', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/setorbalik/edit/' . $save_setorbalik, 'Edit Setorbalik')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/setorbalik');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = true;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/setorbalik');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Setorbaliks
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('setorbalik_update');

		$this->data['setorbalik'] = $this->model_setorbalik->find($id);

		$this->template->title('Surat Tanda Setoran (STS) Update');
		$this->render('backend/standart/administrator/setorbalik/setorbalik_update', $this->data);
	}

	/**
	* Update Setorbaliks
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('setorbalik_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('maap tidak punya akses')
				]);
			exit;
		}
				$this->form_validation->set_rules('tanggal_setor', 'Tanggal Setor', 'trim|required');
		

		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
		

		$this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal_setor' => $this->input->post('tanggal_setor'),
				'nominal' => $this->input->post('nominal'),
				'sub_kegiatan' => $this->input->post('sub_kegiatan'),
			];
			
			
			$listed_image = [];
			if (count((array) $this->input->post('tes_upload_lampiran_name'))) {
				foreach ((array) $_POST['tes_upload_lampiran_name'] as $idx => $file_name) {
					if (isset($_POST['tes_upload_lampiran_uuid'][$idx]) AND !empty($_POST['tes_upload_lampiran_uuid'][$idx])) {
						$tes_upload_lampiran_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['tes_upload_lampiran_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/setorbalik/' . $tes_upload_lampiran_name_copy);

						$listed_image[] = $tes_upload_lampiran_name_copy;

						if (!is_file(FCPATH . '/uploads/setorbalik/' . $tes_upload_lampiran_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			if (count($listed_image) > 0) {
            	$save_data['lampiran'] = implode($listed_image, ',');
            }


			
			
			$save_setorbalik = $this->model_setorbalik->change($id, $save_data);

			if ($save_setorbalik) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/setorbalik', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/setorbalik');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = true;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/setorbalik');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Setorbaliks
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('setorbalik_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'setorbalik'), 'success');
        } else {
            set_message(cclang('error_delete', 'setorbalik'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Setorbaliks
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('setorbalik_view');

		$this->data['setorbalik'] = $this->model_setorbalik->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Surat Tanda Setoran (STS) Detail');
		$this->render('backend/standart/administrator/setorbalik/setorbalik_view', $this->data);
	}
	
	/**
	* delete Setorbaliks
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$setorbalik = $this->model_setorbalik->find($id);

		
		
		return $this->model_setorbalik->remove($id);
	}
	
	
		/**
	* Upload Image Tes Upload	* 
	* @return JSON
	*/
	public function upload_lampiran_file()
	{
		if (!$this->is_allowed('setorpb_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'setorbalik',
		]);
	}

	/**
	* Delete Image Tes Upload	* 
	* @return JSON
	*/
	public function delete_lampiran_file($uuid)
	{
		if (!$this->is_allowed('setorpb_update', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'lampiran', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'setorbalik',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/setorbalik/'
        ]);
	}

	/**
	* Get Image Tes Upload	* 
	* @return JSON
	*/
	public function get_lampiran_file($id)
	{
		if (!$this->is_allowed('setorpb_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tes_upload = $this->model_setorbalik->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'lampiran', 
            'table_name'        => 'setorbalik',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/setorbalik/',
            'delete_endpoint'   => 'administrator/setorbalik/delete_lampiran_file'
        ]);
	}
	
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('setorbalik_export');

		$this->model_setorbalik->export(
			'setorbalik', 
			'setorbalik',
			$this->model_setorbalik->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('setorbalik_export');

		$this->model_setorbalik->pdf('setorbalik', 'setorbalik');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('setorbalik_export');

		$table = $title = 'setorbalik';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_setorbalik->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}
	
	
	public function bagian($id){
	     $this->is_allowed('setorbalik_bagian');
	     $this->session->set_userdata('id_bagian',$id);
	     redirect('administrator/setorbalik', 'refresh');
	}

	
}


/* End of file setorbalik.php */
/* Location: ./application/controllers/administrator/Setorbalik.php */
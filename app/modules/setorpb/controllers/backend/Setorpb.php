<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Setorpb Controller
*| --------------------------------------------------------------------------
*| Setorpb site
*|
*/
class Setorpb extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_setorpb');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Setorpbs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('setorpb_list');
		
		if($this->aauth->is_member('bpp bagian')){
		    $this->session->set_userdata('id_bagian',$this->model_setorpb->get_bagian());
		}

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['setorpbs'] = $this->model_setorpb->get($filter, $field, $this->limit_page, $offset);
		$this->data['setorpb_counts'] = $this->model_setorpb->count_all($filter, $field);
		$this->data['nama_bagian'] = $this->model_setorpb->get_nama_bagian();

		$config = [
			'base_url'     => 'administrator/setorpb/index/',
			'total_rows'   => $this->data['setorpb_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Pemindahbukuan (PB) List');
		$this->render('backend/standart/administrator/setorpb/setorpb_list', $this->data);
	}
	
	/**
	* Add new setorpbs
	*
	*/
	public function add()
	{
		$this->is_allowed('setorpb_add');

		$this->template->title('Pemindahbukuan (PB) New');
		$this->render('backend/standart/administrator/setorpb/setorpb_add', $this->data);
	}

	/**
	* Add New Setorpbs
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
		
		

		$this->form_validation->set_rules('tanggal_pb', 'Tanggal Pb', 'trim|required');
		

		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
		

		$this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal_pb' => $this->input->post('tanggal_pb'),
				'nominal' => $this->input->post('nominal'),
				'sub_kegiatan' => $this->input->post('sub_kegiatan'),
			];
			
			if (!is_dir(FCPATH . '/uploads/setorpb/')) {
				mkdir(FCPATH . '/uploads/setorpb/');
			}

			if (count((array) $this->input->post('tes_upload_lampiran_name'))) {
				foreach ((array) $_POST['tes_upload_lampiran_name'] as $idx => $file_name) {
					$tes_upload_lampiran_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['tes_upload_lampiran_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/setorpb/' . $tes_upload_lampiran_name_copy);

					$listed_image[] = $tes_upload_lampiran_name_copy;

					if (!is_file(FCPATH . '/uploads/setorpb/' . $tes_upload_lampiran_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file 2'
							]);
						exit;
					}
				}

				$save_data['lampiran'] = implode($listed_image, ',');
			}

			
			
			$save_setorpb = $this->model_setorpb->store($save_data);
            

			if ($save_setorpb) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_setorpb;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/setorpb/edit/' . $save_setorpb, 'Edit Setorpb'),
						anchor('administrator/setorpb', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/setorpb/edit/' . $save_setorpb, 'Edit Setorpb')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/setorpb');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/setorpb');
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
	* Update view Setorpbs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('setorpb_update');

		$this->data['setorpb'] = $this->model_setorpb->find($id);

		$this->template->title('Pemindahbukuan (PB) Update');
		$this->render('backend/standart/administrator/setorpb/setorpb_update', $this->data);
	}

	/**
	* Update Setorpbs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('setorpb_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('tanggal_pb', 'Tanggal Pb', 'trim|required');
		

		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
		

		$this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal_pb' => $this->input->post('tanggal_pb'),
				'nominal' => $this->input->post('nominal'),
				'sub_kegiatan' => $this->input->post('sub_kegiatan'),
			];
			
			
			$listed_image = [];
			if (count((array) $this->input->post('tes_upload_lampiran_name'))) {
				foreach ((array) $_POST['tes_upload_lampiran_name'] as $idx => $file_name) {
					if (isset($_POST['tes_upload_lampiran_uuid'][$idx]) AND !empty($_POST['tes_upload_lampiran_uuid'][$idx])) {
						$tes_upload_lampiran_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['tes_upload_lampiran_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/setorpb/' . $tes_upload_lampiran_name_copy);

						$listed_image[] = $tes_upload_lampiran_name_copy;

						if (!is_file(FCPATH . '/uploads/setorpb/' . $tes_upload_lampiran_name_copy)) {
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
			
		


			
			
			$save_setorpb = $this->model_setorpb->change($id, $save_data);

			if ($save_setorpb) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/setorpb', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/setorpb');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = true;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/setorpb');
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
	* delete Setorpbs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('setorpb_delete');

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
            set_message(cclang('has_been_deleted', 'setorpb'), 'success');
        } else {
            set_message(cclang('error_delete', 'setorpb'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Setorpbs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('setorpb_view');

		$this->data['setorpb'] = $this->model_setorpb->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Pemindahbukuan (PB) Detail');
		$this->render('backend/standart/administrator/setorpb/setorpb_view', $this->data);
	}
	
	/**
	* delete Setorpbs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$setorpb = $this->model_setorpb->find($id);

		
		
		return $this->model_setorpb->remove($id);
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
			'table_name' 	=> 'setorpb',
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
            'table_name'        => 'setorpb',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/setorpb/'
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

		$tes_upload = $this->model_setorpb->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'lampiran', 
            'table_name'        => 'setorpb',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/setorpb/',
            'delete_endpoint'   => 'administrator/setorpb/delete_lampiran_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('setorpb_export');

		$this->model_setorpb->export(
			'setorpb', 
			'setorpb',
			$this->model_setorpb->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('setorpb_export');

		$this->model_setorpb->pdf('setorpb', 'setorpb');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('setorpb_export');

		$table = $title = 'setorpb';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_setorpb->find($id);
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
	     $this->is_allowed('setorpb_bagian');
	     $this->session->set_userdata('id_bagian',$id);
	     redirect('administrator/setorpb', 'refresh');
	}

	
}


/* End of file setorpb.php */
/* Location: ./application/controllers/administrator/Setorpb.php */
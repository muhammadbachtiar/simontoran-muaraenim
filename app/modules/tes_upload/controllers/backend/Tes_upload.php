<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tes Upload Controller
*| --------------------------------------------------------------------------
*| Tes Upload site
*|
*/
class Tes_upload extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tes_upload');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tes Uploads
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tes_upload_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tes_uploads'] = $this->model_tes_upload->get($filter, $field, $this->limit_page, $offset);
		$this->data['tes_upload_counts'] = $this->model_tes_upload->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tes_upload/index/',
			'total_rows'   => $this->data['tes_upload_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Tes Upload List');
		$this->render('backend/standart/administrator/tes_upload/tes_upload_list', $this->data);
	}
	
	/**
	* Add new tes_uploads
	*
	*/
	public function add()
	{
		$this->is_allowed('tes_upload_add');

		$this->template->title('Tes Upload New');
		$this->render('backend/standart/administrator/tes_upload/tes_upload_add', $this->data);
	}

	/**
	* Add New Tes Uploads
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tes_upload_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
			];

			
			if (!is_dir(FCPATH . '/uploads/tes_upload/')) {
				mkdir(FCPATH . '/uploads/tes_upload/');
			}

			if (count((array) $this->input->post('tes_upload_lampiran_name'))) {
				foreach ((array) $_POST['tes_upload_lampiran_name'] as $idx => $file_name) {
					$tes_upload_lampiran_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['tes_upload_lampiran_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/tes_upload/' . $tes_upload_lampiran_name_copy);

					$listed_image[] = $tes_upload_lampiran_name_copy;

					if (!is_file(FCPATH . '/uploads/tes_upload/' . $tes_upload_lampiran_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['lampiran'] = implode($listed_image, ',');
			}
		
			
			$save_tes_upload = $this->model_tes_upload->store($save_data);
            

			if ($save_tes_upload) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tes_upload;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tes_upload/edit/' . $save_tes_upload, 'Edit Tes Upload'),
						anchor('administrator/tes_upload', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tes_upload/edit/' . $save_tes_upload, 'Edit Tes Upload')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tes_upload');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tes_upload');
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
	* Update view Tes Uploads
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tes_upload_update');

		$this->data['tes_upload'] = $this->model_tes_upload->find($id);

		$this->template->title('Tes Upload Update');
		$this->render('backend/standart/administrator/tes_upload/tes_upload_update', $this->data);
	}

	/**
	* Update Tes Uploads
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tes_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
			];


			
			$listed_image = [];
			if (count((array) $this->input->post('tes_upload_lampiran_name'))) {
				foreach ((array) $_POST['tes_upload_lampiran_name'] as $idx => $file_name) {
					if (isset($_POST['tes_upload_lampiran_uuid'][$idx]) AND !empty($_POST['tes_upload_lampiran_uuid'][$idx])) {
						$tes_upload_lampiran_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['tes_upload_lampiran_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/tes_upload/' . $tes_upload_lampiran_name_copy);

						$listed_image[] = $tes_upload_lampiran_name_copy;

						if (!is_file(FCPATH . '/uploads/tes_upload/' . $tes_upload_lampiran_name_copy)) {
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
			
			$save_data['lampiran'] = implode($listed_image, ',');
		
			
			$save_tes_upload = $this->model_tes_upload->change($id, $save_data);

			if ($save_tes_upload) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tes_upload', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tes_upload');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tes_upload');
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
	* delete Tes Uploads
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tes_upload_delete');

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
            set_message(cclang('has_been_deleted', 'tes_upload'), 'success');
        } else {
            set_message(cclang('error_delete', 'tes_upload'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tes Uploads
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tes_upload_view');

		$this->data['tes_upload'] = $this->model_tes_upload->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tes Upload Detail');
		$this->render('backend/standart/administrator/tes_upload/tes_upload_view', $this->data);
	}
	
	/**
	* delete Tes Uploads
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tes_upload = $this->model_tes_upload->find($id);

		
		if (!empty($tes_upload->lampiran)) {
			foreach ((array) explode(',', $tes_upload->lampiran) as $filename) {
				$path = FCPATH . '/uploads/tes_upload/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_tes_upload->remove($id);
	}
	
	
	/**
	* Upload Image Tes Upload	* 
	* @return JSON
	*/
	public function upload_lampiran_file()
	{
		if (!$this->is_allowed('tes_upload_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tes_upload',
		]);
	}

	/**
	* Delete Image Tes Upload	* 
	* @return JSON
	*/
	public function delete_lampiran_file($uuid)
	{
		if (!$this->is_allowed('tes_upload_delete', false)) {
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
            'table_name'        => 'tes_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/tes_upload/'
        ]);
	}

	/**
	* Get Image Tes Upload	* 
	* @return JSON
	*/
	public function get_lampiran_file($id)
	{
		if (!$this->is_allowed('tes_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tes_upload = $this->model_tes_upload->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'lampiran', 
            'table_name'        => 'tes_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/tes_upload/',
            'delete_endpoint'   => 'administrator/tes_upload/delete_lampiran_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tes_upload_export');

		$this->model_tes_upload->export(
			'tes_upload', 
			'tes_upload',
			$this->model_tes_upload->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tes_upload_export');

		$this->model_tes_upload->pdf('tes_upload', 'tes_upload');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tes_upload_export');

		$table = $title = 'tes_upload';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tes_upload->find($id);
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

	
}


/* End of file tes_upload.php */
/* Location: ./application/controllers/administrator/Tes Upload.php */
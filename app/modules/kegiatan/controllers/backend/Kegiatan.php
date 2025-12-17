<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kegiatan Controller
*| --------------------------------------------------------------------------
*| Kegiatan site
*|
*/
class Kegiatan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kegiatan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Kegiatans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kegiatan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kegiatans'] = $this->model_kegiatan->get($filter, $field, $this->limit_page, $offset);
		$this->data['kegiatan_counts'] = $this->model_kegiatan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kegiatan/index/',
			'total_rows'   => $this->data['kegiatan_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kegiatan List');
		$this->render('backend/standart/administrator/kegiatan/kegiatan_list', $this->data);
	}
	
	/**
	* Add new kegiatans
	*
	*/
	public function add()
	{
		$this->is_allowed('kegiatan_add');

		$this->template->title('Kegiatan New');
		$this->render('backend/standart/administrator/kegiatan/kegiatan_add', $this->data);
	}

	/**
	* Add New Kegiatans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kegiatan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('program', 'Program', 'trim|required');
		

		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'program' => $this->input->post('program'),
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			];

			
			
			$save_kegiatan = $this->model_kegiatan->store($save_data);
            

			if ($save_kegiatan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kegiatan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kegiatan/edit/' . $save_kegiatan, 'Edit Kegiatan'),
						anchor('administrator/kegiatan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kegiatan/edit/' . $save_kegiatan, 'Edit Kegiatan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kegiatan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kegiatan');
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
	* Update view Kegiatans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kegiatan_update');

		$this->data['kegiatan'] = $this->model_kegiatan->find($id);

		$this->template->title('Kegiatan Update');
		$this->render('backend/standart/administrator/kegiatan/kegiatan_update', $this->data);
	}

	/**
	* Update Kegiatans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kegiatan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('program', 'Program', 'trim|required');
		

		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'program' => $this->input->post('program'),
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			];


			
			
			$save_kegiatan = $this->model_kegiatan->change($id, $save_data);

			if ($save_kegiatan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kegiatan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kegiatan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kegiatan');
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
	* delete Kegiatans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kegiatan_delete');

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
            set_message(cclang('has_been_deleted', 'kegiatan'), 'success');
        } else {
            set_message(cclang('error_delete', 'kegiatan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kegiatans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kegiatan_view');

		$this->data['kegiatan'] = $this->model_kegiatan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kegiatan Detail');
		$this->render('backend/standart/administrator/kegiatan/kegiatan_view', $this->data);
	}
	
	/**
	* delete Kegiatans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kegiatan = $this->model_kegiatan->find($id);

		
		
		return $this->model_kegiatan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kegiatan_export');

		$this->model_kegiatan->export(
			'kegiatan', 
			'kegiatan',
			$this->model_kegiatan->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kegiatan_export');

		$this->model_kegiatan->pdf('kegiatan', 'kegiatan');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('kegiatan_export');

		$table = $title = 'kegiatan';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_kegiatan->find($id);
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


/* End of file kegiatan.php */
/* Location: ./application/controllers/administrator/Kegiatan.php */
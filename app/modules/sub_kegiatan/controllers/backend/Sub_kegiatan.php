<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Sub Kegiatan Controller
*| --------------------------------------------------------------------------
*| Sub Kegiatan site
*|
*/
class Sub_kegiatan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_sub_kegiatan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Sub Kegiatans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('sub_kegiatan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['sub_kegiatans'] = $this->model_sub_kegiatan->get($filter, $field, $this->limit_page, $offset);
		$this->data['sub_kegiatan_counts'] = $this->model_sub_kegiatan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/sub_kegiatan/index/',
			'total_rows'   => $this->data['sub_kegiatan_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Sub Kegiatan List');
		$this->render('backend/standart/administrator/sub_kegiatan/sub_kegiatan_list', $this->data);
	}
	
	/**
	* Add new sub_kegiatans
	*
	*/
	public function add()
	{
		$this->is_allowed('sub_kegiatan_add');

		$this->template->title('Sub Kegiatan New');
		$this->render('backend/standart/administrator/sub_kegiatan/sub_kegiatan_add', $this->data);
	}

	/**
	* Add New Sub Kegiatans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('sub_kegiatan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');
		

		$this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'kegiatan' => $this->input->post('kegiatan'),
				'sub_kegiatan' => $this->input->post('sub_kegiatan'),
				'bagian' => $this->input->post('bagian'),
				'pagu_anggaran' => $this->input->post('pagu_anggaran'),
			];

			
			
			$save_sub_kegiatan = $this->model_sub_kegiatan->store($save_data);
            

			if ($save_sub_kegiatan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_sub_kegiatan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/sub_kegiatan/edit/' . $save_sub_kegiatan, 'Edit Sub Kegiatan'),
						anchor('administrator/sub_kegiatan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/sub_kegiatan/edit/' . $save_sub_kegiatan, 'Edit Sub Kegiatan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/sub_kegiatan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/sub_kegiatan');
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
	* Update view Sub Kegiatans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('sub_kegiatan_update');

		$this->data['sub_kegiatan'] = $this->model_sub_kegiatan->find($id);

		$this->template->title('Sub Kegiatan Update');
		$this->render('backend/standart/administrator/sub_kegiatan/sub_kegiatan_update', $this->data);
	}

	/**
	* Update Sub Kegiatans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('sub_kegiatan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');
		

		$this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'kegiatan' => $this->input->post('kegiatan'),
				'sub_kegiatan' => $this->input->post('sub_kegiatan'),
				'bagian' => $this->input->post('bagian'),
				'pagu_anggaran' => $this->input->post('pagu_anggaran'),
			];


			
			
			$save_sub_kegiatan = $this->model_sub_kegiatan->change($id, $save_data);

			if ($save_sub_kegiatan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/sub_kegiatan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/sub_kegiatan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/sub_kegiatan');
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
	* delete Sub Kegiatans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('sub_kegiatan_delete');

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
            set_message(cclang('has_been_deleted', 'sub_kegiatan'), 'success');
        } else {
            set_message(cclang('error_delete', 'sub_kegiatan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Sub Kegiatans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('sub_kegiatan_view');

		$this->data['sub_kegiatan'] = $this->model_sub_kegiatan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Sub Kegiatan Detail');
		$this->render('backend/standart/administrator/sub_kegiatan/sub_kegiatan_view', $this->data);
	}
	
	/**
	* delete Sub Kegiatans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$sub_kegiatan = $this->model_sub_kegiatan->find($id);

		
		
		return $this->model_sub_kegiatan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('sub_kegiatan_export');

		$this->model_sub_kegiatan->export(
			'sub_kegiatan', 
			'sub_kegiatan',
			$this->model_sub_kegiatan->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('sub_kegiatan_export');

		$this->model_sub_kegiatan->pdf('sub_kegiatan', 'sub_kegiatan');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('sub_kegiatan_export');

		$table = $title = 'sub_kegiatan';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_sub_kegiatan->find($id);
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


/* End of file sub_kegiatan.php */
/* Location: ./application/controllers/administrator/Sub Kegiatan.php */
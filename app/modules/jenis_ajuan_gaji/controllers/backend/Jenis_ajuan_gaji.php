<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Jenis Ajuan Gaji Controller
*| --------------------------------------------------------------------------
*| Jenis Ajuan Gaji site
*|
*/
class Jenis_ajuan_gaji extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_jenis_ajuan_gaji');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Jenis Ajuan Gajis
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('jenis_ajuan_gaji_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['jenis_ajuan_gajis'] = $this->model_jenis_ajuan_gaji->get($filter, $field, $this->limit_page, $offset);
		$this->data['jenis_ajuan_gaji_counts'] = $this->model_jenis_ajuan_gaji->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/jenis_ajuan_gaji/index/',
			'total_rows'   => $this->data['jenis_ajuan_gaji_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Jenis Ajuan Gaji List');
		$this->render('backend/standart/administrator/jenis_ajuan_gaji/jenis_ajuan_gaji_list', $this->data);
	}
	
	/**
	* Add new jenis_ajuan_gajis
	*
	*/
	public function add()
	{
		$this->is_allowed('jenis_ajuan_gaji_add');

		$this->template->title('Jenis Ajuan Gaji New');
		$this->render('backend/standart/administrator/jenis_ajuan_gaji/jenis_ajuan_gaji_add', $this->data);
	}

	/**
	* Add New Jenis Ajuan Gajis
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('jenis_ajuan_gaji_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('jenis_ajuan_gaji', 'Jenis Ajuan Gaji', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'jenis_ajuan_gaji' => $this->input->post('jenis_ajuan_gaji'),
				'uraian' => $this->input->post('uraian'),
				'jenis_gaji' => $this->input->post('jenis_gaji'),
			];

			
			
			$save_jenis_ajuan_gaji = $this->model_jenis_ajuan_gaji->store($save_data);
            

			if ($save_jenis_ajuan_gaji) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_jenis_ajuan_gaji;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/jenis_ajuan_gaji/edit/' . $save_jenis_ajuan_gaji, 'Edit Jenis Ajuan Gaji'),
						anchor('administrator/jenis_ajuan_gaji', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/jenis_ajuan_gaji/edit/' . $save_jenis_ajuan_gaji, 'Edit Jenis Ajuan Gaji')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/jenis_ajuan_gaji');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/jenis_ajuan_gaji');
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
	* Update view Jenis Ajuan Gajis
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('jenis_ajuan_gaji_update');

		$this->data['jenis_ajuan_gaji'] = $this->model_jenis_ajuan_gaji->find($id);

		$this->template->title('Jenis Ajuan Gaji Update');
		$this->render('backend/standart/administrator/jenis_ajuan_gaji/jenis_ajuan_gaji_update', $this->data);
	}

	/**
	* Update Jenis Ajuan Gajis
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('jenis_ajuan_gaji_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('jenis_ajuan_gaji', 'Jenis Ajuan Gaji', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'jenis_ajuan_gaji' => $this->input->post('jenis_ajuan_gaji'),
				'uraian' => $this->input->post('uraian'),
				'jenis_gaji' => $this->input->post('jenis_gaji'),
			];


			
			
			$save_jenis_ajuan_gaji = $this->model_jenis_ajuan_gaji->change($id, $save_data);

			if ($save_jenis_ajuan_gaji) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/jenis_ajuan_gaji', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/jenis_ajuan_gaji');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/jenis_ajuan_gaji');
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
	* delete Jenis Ajuan Gajis
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('jenis_ajuan_gaji_delete');

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
            set_message(cclang('has_been_deleted', 'jenis_ajuan_gaji'), 'success');
        } else {
            set_message(cclang('error_delete', 'jenis_ajuan_gaji'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Jenis Ajuan Gajis
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('jenis_ajuan_gaji_view');

		$this->data['jenis_ajuan_gaji'] = $this->model_jenis_ajuan_gaji->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Jenis Ajuan Gaji Detail');
		$this->render('backend/standart/administrator/jenis_ajuan_gaji/jenis_ajuan_gaji_view', $this->data);
	}
	
	/**
	* delete Jenis Ajuan Gajis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$jenis_ajuan_gaji = $this->model_jenis_ajuan_gaji->find($id);

		
		
		return $this->model_jenis_ajuan_gaji->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('jenis_ajuan_gaji_export');

		$this->model_jenis_ajuan_gaji->export(
			'jenis_ajuan_gaji', 
			'jenis_ajuan_gaji',
			$this->model_jenis_ajuan_gaji->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('jenis_ajuan_gaji_export');

		$this->model_jenis_ajuan_gaji->pdf('jenis_ajuan_gaji', 'jenis_ajuan_gaji');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('jenis_ajuan_gaji_export');

		$table = $title = 'jenis_ajuan_gaji';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_jenis_ajuan_gaji->find($id);
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


/* End of file jenis_ajuan_gaji.php */
/* Location: ./application/controllers/administrator/Jenis Ajuan Gaji.php */
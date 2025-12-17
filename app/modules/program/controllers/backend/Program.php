<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Program Controller
*| --------------------------------------------------------------------------
*| Program site
*|
*/
class Program extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_program');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Programs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('program_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['programs'] = $this->model_program->get($filter, $field, $this->limit_page, $offset);
		$this->data['program_counts'] = $this->model_program->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/program/index/',
			'total_rows'   => $this->data['program_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Program List');
		$this->render('backend/standart/administrator/program/program_list', $this->data);
	}
	
	/**
	* Add new programs
	*
	*/
	public function add()
	{
		$this->is_allowed('program_add');

		$this->template->title('Program New');
		$this->render('backend/standart/administrator/program/program_add', $this->data);
	}

	/**
	* Add New Programs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('program_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_program', 'Nama Program', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_program' => $this->input->post('nama_program'),
			];

			
			
			$save_program = $this->model_program->store($save_data);
            

			if ($save_program) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_program;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/program/edit/' . $save_program, 'Edit Program'),
						anchor('administrator/program', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/program/edit/' . $save_program, 'Edit Program')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/program');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/program');
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
	* Update view Programs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('program_update');

		$this->data['program'] = $this->model_program->find($id);

		$this->template->title('Program Update');
		$this->render('backend/standart/administrator/program/program_update', $this->data);
	}

	/**
	* Update Programs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('program_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_program', 'Nama Program', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_program' => $this->input->post('nama_program'),
			];


			
			
			$save_program = $this->model_program->change($id, $save_data);

			if ($save_program) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/program', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/program');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/program');
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
	* delete Programs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('program_delete');

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
            set_message(cclang('has_been_deleted', 'program'), 'success');
        } else {
            set_message(cclang('error_delete', 'program'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Programs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('program_view');

		$this->data['program'] = $this->model_program->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Program Detail');
		$this->render('backend/standart/administrator/program/program_view', $this->data);
	}
	
	/**
	* delete Programs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$program = $this->model_program->find($id);

		
		
		return $this->model_program->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('program_export');

		$this->model_program->export(
			'program', 
			'program',
			$this->model_program->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('program_export');

		$this->model_program->pdf('program', 'program');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('program_export');

		$table = $title = 'program';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_program->find($id);
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


/* End of file program.php */
/* Location: ./application/controllers/administrator/Program.php */
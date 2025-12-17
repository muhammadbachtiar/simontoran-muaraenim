<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Berkas Ceklist Controller
*| --------------------------------------------------------------------------
*| Berkas Ceklist site
*|
*/
class Berkas_ceklist extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_berkas_ceklist');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Berkas Ceklists
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('berkas_ceklist_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['berkas_ceklists'] = $this->model_berkas_ceklist->get($filter, $field, $this->limit_page, $offset);
		$this->data['berkas_ceklist_counts'] = $this->model_berkas_ceklist->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/berkas_ceklist/index/',
			'total_rows'   => $this->data['berkas_ceklist_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Berkas Ceklist List');
		$this->render('backend/standart/administrator/berkas_ceklist/berkas_ceklist_list', $this->data);
	}
	
	/**
	* Add new berkas_ceklists
	*
	*/
	public function add()
	{
		$this->is_allowed('berkas_ceklist_add');

		$this->template->title('Berkas Ceklist New');
		$this->render('backend/standart/administrator/berkas_ceklist/berkas_ceklist_add', $this->data);
	}

	/**
	* Add New Berkas Ceklists
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('berkas_ceklist_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_berkas', 'Nama Berkas', 'trim|required');
		

		$this->form_validation->set_rules('jenis_ceklist', 'Jenis Ceklist', 'trim|required');
		

		$this->form_validation->set_rules('bendel', 'Bendel', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_berkas' => $this->input->post('nama_berkas'),
				'jenis_ceklist' => $this->input->post('jenis_ceklist'),
				'bendel' => $this->input->post('bendel'),
			];

			
			
			$save_berkas_ceklist = $this->model_berkas_ceklist->store($save_data);
            

			if ($save_berkas_ceklist) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_berkas_ceklist;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/berkas_ceklist/edit/' . $save_berkas_ceklist, 'Edit Berkas Ceklist'),
						anchor('administrator/berkas_ceklist', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/berkas_ceklist/edit/' . $save_berkas_ceklist, 'Edit Berkas Ceklist')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/berkas_ceklist');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/berkas_ceklist');
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
	* Update view Berkas Ceklists
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('berkas_ceklist_update');

		$this->data['berkas_ceklist'] = $this->model_berkas_ceklist->find($id);

		$this->template->title('Berkas Ceklist Update');
		$this->render('backend/standart/administrator/berkas_ceklist/berkas_ceklist_update', $this->data);
	}

	/**
	* Update Berkas Ceklists
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('berkas_ceklist_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_berkas', 'Nama Berkas', 'trim|required');
		

		$this->form_validation->set_rules('jenis_ceklist', 'Jenis Ceklist', 'trim|required');
		

		$this->form_validation->set_rules('bendel', 'Bendel', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_berkas' => $this->input->post('nama_berkas'),
				'jenis_ceklist' => $this->input->post('jenis_ceklist'),
				'bendel' => $this->input->post('bendel'),
			];


			
			
			$save_berkas_ceklist = $this->model_berkas_ceklist->change($id, $save_data);

			if ($save_berkas_ceklist) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/berkas_ceklist', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/berkas_ceklist');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/berkas_ceklist');
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
	* delete Berkas Ceklists
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('berkas_ceklist_delete');

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
            set_message(cclang('has_been_deleted', 'berkas_ceklist'), 'success');
        } else {
            set_message(cclang('error_delete', 'berkas_ceklist'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Berkas Ceklists
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('berkas_ceklist_view');

		$this->data['berkas_ceklist'] = $this->model_berkas_ceklist->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Berkas Ceklist Detail');
		$this->render('backend/standart/administrator/berkas_ceklist/berkas_ceklist_view', $this->data);
	}
	
	/**
	* delete Berkas Ceklists
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$berkas_ceklist = $this->model_berkas_ceklist->find($id);

		
		
		return $this->model_berkas_ceklist->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('berkas_ceklist_export');

		$this->model_berkas_ceklist->export(
			'berkas_ceklist', 
			'berkas_ceklist',
			$this->model_berkas_ceklist->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('berkas_ceklist_export');

		$this->model_berkas_ceklist->pdf('berkas_ceklist', 'berkas_ceklist');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('berkas_ceklist_export');

		$table = $title = 'berkas_ceklist';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_berkas_ceklist->find($id);
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


/* End of file berkas_ceklist.php */
/* Location: ./application/controllers/administrator/Berkas Ceklist.php */
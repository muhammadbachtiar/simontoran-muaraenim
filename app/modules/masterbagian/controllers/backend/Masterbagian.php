<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Masterbagian Controller
*| --------------------------------------------------------------------------
*| Masterbagian site
*|
*/
class Masterbagian extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_masterbagian');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Masterbagians
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('masterbagian_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['masterbagians'] = $this->model_masterbagian->get($filter, $field, $this->limit_page, $offset);
		$this->data['masterbagian_counts'] = $this->model_masterbagian->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/masterbagian/index/',
			'total_rows'   => $this->data['masterbagian_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Bagian List');
		$this->render('backend/standart/administrator/masterbagian/masterbagian_list', $this->data);
	}
	
	/**
	* Add new masterbagians
	*
	*/
	public function add()
	{
		$this->is_allowed('masterbagian_add');

		$this->template->title('Bagian New');
		$this->render('backend/standart/administrator/masterbagian/masterbagian_add', $this->data);
	}

	/**
	* Add New Masterbagians
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('masterbagian_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_bagian' => $this->input->post('nama_bagian'),
				'bpp' => $this->input->post('bpp'),
				'pptk' => implode(',', (array) $this->input->post('pptk')),
				'verifikator' => $this->input->post('verifikator'),
				'verifikator2' => $this->input->post('verifikator2'),
			];

			
			
			$save_masterbagian = $this->model_masterbagian->store($save_data);
            

			if ($save_masterbagian) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_masterbagian;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/masterbagian/edit/' . $save_masterbagian, 'Edit Masterbagian'),
						anchor('administrator/masterbagian', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/masterbagian/edit/' . $save_masterbagian, 'Edit Masterbagian')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/masterbagian');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/masterbagian');
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
	* Update view Masterbagians
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('masterbagian_update');

		$this->data['masterbagian'] = $this->model_masterbagian->find($id);

		$this->template->title('Bagian Update');
		$this->render('backend/standart/administrator/masterbagian/masterbagian_update', $this->data);
	}

	/**
	* Update Masterbagians
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('masterbagian_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_bagian' => $this->input->post('nama_bagian'),
				'bpp' => $this->input->post('bpp'),
				'pptk' => implode(',', (array) $this->input->post('pptk')),
				'verifikator' => $this->input->post('verifikator'),
				'verifikator2' => $this->input->post('verifikator2'),
			];


			
			
			$save_masterbagian = $this->model_masterbagian->change($id, $save_data);

			if ($save_masterbagian) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/masterbagian', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/masterbagian');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/masterbagian');
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
	* delete Masterbagians
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('masterbagian_delete');

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
            set_message(cclang('has_been_deleted', 'masterbagian'), 'success');
        } else {
            set_message(cclang('error_delete', 'masterbagian'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Masterbagians
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('masterbagian_view');

		$this->data['masterbagian'] = $this->model_masterbagian->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Bagian Detail');
		$this->render('backend/standart/administrator/masterbagian/masterbagian_view', $this->data);
	}
	
	/**
	* delete Masterbagians
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$masterbagian = $this->model_masterbagian->find($id);

		
		
		return $this->model_masterbagian->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('masterbagian_export');

		$this->model_masterbagian->export(
			'masterbagian', 
			'masterbagian',
			$this->model_masterbagian->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('masterbagian_export');

		$this->model_masterbagian->pdf('masterbagian', 'masterbagian');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('masterbagian_export');

		$table = $title = 'masterbagian';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_masterbagian->find($id);
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


/* End of file masterbagian.php */
/* Location: ./application/controllers/administrator/Masterbagian.php */
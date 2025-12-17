<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tbl Verifikator Controller
*| --------------------------------------------------------------------------
*| Tbl Verifikator site
*|
*/
class Tbl_verifikator extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tbl_verifikator');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tbl Verifikators
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tbl_verifikator_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tbl_verifikators'] = $this->model_tbl_verifikator->get($filter, $field, $this->limit_page, $offset);
		$this->data['tbl_verifikator_counts'] = $this->model_tbl_verifikator->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tbl_verifikator/index/',
			'total_rows'   => $this->data['tbl_verifikator_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Verifikator List');
		$this->render('backend/standart/administrator/tbl_verifikator/tbl_verifikator_list', $this->data);
	}
	
	/**
	* Add new tbl_verifikators
	*
	*/
	public function add()
	{
		$this->is_allowed('tbl_verifikator_add');

		$this->template->title('Verifikator New');
		$this->render('backend/standart/administrator/tbl_verifikator/tbl_verifikator_add', $this->data);
	}

	/**
	* Add New Tbl Verifikators
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tbl_verifikator_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('jenis_verifikator', 'Jenis Verifikator', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'jenis_verifikator' => $this->input->post('jenis_verifikator'),
			];

			
			
			$save_tbl_verifikator = $this->model_tbl_verifikator->store($save_data);
            

			if ($save_tbl_verifikator) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tbl_verifikator;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tbl_verifikator/edit/' . $save_tbl_verifikator, 'Edit Tbl Verifikator'),
						anchor('administrator/tbl_verifikator', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tbl_verifikator/edit/' . $save_tbl_verifikator, 'Edit Tbl Verifikator')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tbl_verifikator');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tbl_verifikator');
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
	* Update view Tbl Verifikators
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tbl_verifikator_update');

		$this->data['tbl_verifikator'] = $this->model_tbl_verifikator->find($id);

		$this->template->title('Verifikator Update');
		$this->render('backend/standart/administrator/tbl_verifikator/tbl_verifikator_update', $this->data);
	}

	/**
	* Update Tbl Verifikators
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tbl_verifikator_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('jenis_verifikator', 'Jenis Verifikator', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'jenis_verifikator' => $this->input->post('jenis_verifikator'),
			];


			
			
			$save_tbl_verifikator = $this->model_tbl_verifikator->change($id, $save_data);

			if ($save_tbl_verifikator) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tbl_verifikator', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tbl_verifikator');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tbl_verifikator');
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
	* delete Tbl Verifikators
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tbl_verifikator_delete');

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
            set_message(cclang('has_been_deleted', 'tbl_verifikator'), 'success');
        } else {
            set_message(cclang('error_delete', 'tbl_verifikator'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tbl Verifikators
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tbl_verifikator_view');

		$this->data['tbl_verifikator'] = $this->model_tbl_verifikator->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Verifikator Detail');
		$this->render('backend/standart/administrator/tbl_verifikator/tbl_verifikator_view', $this->data);
	}
	
	/**
	* delete Tbl Verifikators
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tbl_verifikator = $this->model_tbl_verifikator->find($id);

		
		
		return $this->model_tbl_verifikator->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tbl_verifikator_export');

		$this->model_tbl_verifikator->export(
			'tbl_verifikator', 
			'tbl_verifikator',
			$this->model_tbl_verifikator->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tbl_verifikator_export');

		$this->model_tbl_verifikator->pdf('tbl_verifikator', 'tbl_verifikator');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tbl_verifikator_export');

		$table = $title = 'tbl_verifikator';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tbl_verifikator->find($id);
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


/* End of file tbl_verifikator.php */
/* Location: ./application/controllers/administrator/Tbl Verifikator.php */
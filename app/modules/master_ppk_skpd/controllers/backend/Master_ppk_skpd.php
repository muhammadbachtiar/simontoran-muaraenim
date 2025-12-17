<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Master Ppk Skpd Controller
*| --------------------------------------------------------------------------
*| Master Ppk Skpd site
*|
*/
class Master_ppk_skpd extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_master_ppk_skpd');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Master Ppk Skpds
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('master_ppk_skpd_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['master_ppk_skpds'] = $this->model_master_ppk_skpd->get($filter, $field, $this->limit_page, $offset);
		$this->data['master_ppk_skpd_counts'] = $this->model_master_ppk_skpd->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/master_ppk_skpd/index/',
			'total_rows'   => $this->data['master_ppk_skpd_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Master PPK SKPD List');
		$this->render('backend/standart/administrator/master_ppk_skpd/master_ppk_skpd_list', $this->data);
	}
	
	/**
	* Add new master_ppk_skpds
	*
	*/
	public function add()
	{
		$this->is_allowed('master_ppk_skpd_add');

		$this->template->title('Master PPK SKPD New');
		$this->render('backend/standart/administrator/master_ppk_skpd/master_ppk_skpd_add', $this->data);
	}

	/**
	* Add New Master Ppk Skpds
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('master_ppk_skpd_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'ppk_skpd' => $this->input->post('ppk_skpd'),
			];

			
			
			$save_master_ppk_skpd = $this->model_master_ppk_skpd->store($save_data);
            

			if ($save_master_ppk_skpd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_master_ppk_skpd;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/master_ppk_skpd/edit/' . $save_master_ppk_skpd, 'Edit Master Ppk Skpd'),
						anchor('administrator/master_ppk_skpd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/master_ppk_skpd/edit/' . $save_master_ppk_skpd, 'Edit Master Ppk Skpd')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/master_ppk_skpd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/master_ppk_skpd');
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
	* Update view Master Ppk Skpds
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('master_ppk_skpd_update');

		$this->data['master_ppk_skpd'] = $this->model_master_ppk_skpd->find($id);

		$this->template->title('Master PPK SKPD Update');
		$this->render('backend/standart/administrator/master_ppk_skpd/master_ppk_skpd_update', $this->data);
	}

	/**
	* Update Master Ppk Skpds
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('master_ppk_skpd_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				
		if ($this->form_validation->run()) {
		
			$save_data = [
				'ppk_skpd' => $this->input->post('ppk_skpd'),
			];


			
			
			$save_master_ppk_skpd = $this->model_master_ppk_skpd->change($id, $save_data);

			if ($save_master_ppk_skpd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/master_ppk_skpd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/master_ppk_skpd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/master_ppk_skpd');
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
	* delete Master Ppk Skpds
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('master_ppk_skpd_delete');

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
            set_message(cclang('has_been_deleted', 'master_ppk_skpd'), 'success');
        } else {
            set_message(cclang('error_delete', 'master_ppk_skpd'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Master Ppk Skpds
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('master_ppk_skpd_view');

		$this->data['master_ppk_skpd'] = $this->model_master_ppk_skpd->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Master PPK SKPD Detail');
		$this->render('backend/standart/administrator/master_ppk_skpd/master_ppk_skpd_view', $this->data);
	}
	
	/**
	* delete Master Ppk Skpds
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$master_ppk_skpd = $this->model_master_ppk_skpd->find($id);

		
		
		return $this->model_master_ppk_skpd->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('master_ppk_skpd_export');

		$this->model_master_ppk_skpd->export(
			'master_ppk_skpd', 
			'master_ppk_skpd',
			$this->model_master_ppk_skpd->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('master_ppk_skpd_export');

		$this->model_master_ppk_skpd->pdf('master_ppk_skpd', 'master_ppk_skpd');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('master_ppk_skpd_export');

		$table = $title = 'master_ppk_skpd';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_master_ppk_skpd->find($id);
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


/* End of file master_ppk_skpd.php */
/* Location: ./application/controllers/administrator/Master Ppk Skpd.php */
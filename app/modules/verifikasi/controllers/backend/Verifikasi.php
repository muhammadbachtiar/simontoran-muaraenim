<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Verifikasi Controller
*| --------------------------------------------------------------------------
*| Verifikasi site
*|
*/
class Verifikasi extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_verifikasi');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Verifikasis
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('verifikasi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['verifikasis'] = $this->model_verifikasi->get($filter, $field, $this->limit_page, $offset);
		$this->data['verifikasi_counts'] = $this->model_verifikasi->count_all($filter, $field);
		$this->data['id_spj']= $this->input->get('q');
		$this->data['register'] = $this->model_verifikasi->get_register($this->input->get('q'));
		$this->data['back_url']     = $this->session->userdata('back_url');

		$config = [
			'base_url'     => 'administrator/verifikasi/index/',
			'total_rows'   => $this->data['verifikasi_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Verifikasi SPJ List');
		$this->render('backend/standart/administrator/verifikasi/verifikasi_list', $this->data);
	}
	
	/**
	* Add new verifikasis
	*
	*/
	public function add($id)
	{
		$this->is_allowed('verifikasi_add');
		$this->data['id'] = $id;

		$this->template->title('Verifikasi SPJ New');
		$this->render('backend/standart/administrator/verifikasi/verifikasi_add', $this->data);
	}

	/**
	* Add New Verifikasis
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('verifikasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('spj', 'Spj', 'trim|required');
		

		$this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'spj' => $this->input->post('spj'),
				'uraian' => $this->input->post('uraian'),
				'verifikator' => $this->aauth->get_user_id(),
				'tanggal'   => $this->input->post('tanggal'),
				'dicukupi' => $this->input->post('dicukupi'),
				
			];

			
			
			$save_verifikasi = $this->model_verifikasi->store($save_data);
            

			if ($save_verifikasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_verifikasi;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/verifikasi/edit/' . $save_verifikasi, 'Edit Verifikasi'),
						anchor('administrator/verifikasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/verifikasi/edit/' . $save_verifikasi, 'Edit Verifikasi')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url().'administrator/verifikasi/index?bulk=&q='.$this->input->post('spj').'&f=spj&sbtn=Apply';
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url().'administrator/verifikasi/index?bulk=&q='.$this->input->post('spj').'&f=spj&sbtn=Apply';
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
	* Update view Verifikasis
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('verifikasi_update');

		$this->data['verifikasi'] = $this->model_verifikasi->find($id);

		$this->template->title('Verifikasi SPJ Update');
		$this->render('backend/standart/administrator/verifikasi/verifikasi_update', $this->data);
	}
	
	
	public function tindaklanjut($id)
	{
		$this->is_allowed('verifikasi_tindaklanjut');

		$this->data['verifikasi'] = $this->model_verifikasi->find($id);

		$this->template->title('Tindak Lanjut BPP');
		$this->render('backend/standart/administrator/verifikasi/verifikasi_tindaklanjut', $this->data);
	}

	/**
	* Update Verifikasis
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('verifikasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('spj', 'Spj', 'trim|required');
		

		$this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'spj' => $this->input->post('spj'),
				'uraian' => $this->input->post('uraian'),
				'dicukupi' => $this->input->post('dicukupi'),
				'tanggal'   => $this->input->post('tanggal'),
			
			];


			
			
			$save_verifikasi = $this->model_verifikasi->change($id, $save_data);

			if ($save_verifikasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/verifikasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url().'administrator/verifikasi/index?bulk=&q='.$this->input->post('spj').'&f=spj&sbtn=Apply';
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url().'administrator/verifikasi/index?bulk=&q='.$this->input->post('spj').'&f=spj&sbtn=Apply';
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		public function edit_tindaklanjut($id)
	{
		if (!$this->is_allowed('verifikasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('spj', 'Spj', 'trim|required');
		

		$this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				
			
				'tindak_lanjut' => $this->input->post('tindak_lanjut'),
				'tanggal_tindaklanjut'   => NOW(),
				'keterangan' =>$this->input->post('keterangan')
			
			];
			
			$dicukupi = "";
			
			if($this->input->post('tindak_lanjut')=="Diperhatikan"){
			    $dicukupi="Ya";
			}
            $update_verifikasi = [
			        'dicukupi' => $dicukupi,
			        ];

			
			
			$save_verifikasi = $this->model_verifikasi->change($id, $save_data);

			if ($save_verifikasi) {
			    	$save= $this->model_verifikasi->change($id, $update_verifikasi);
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/verifikasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url().'administrator/verifikasi/index?bulk=&q='.$this->input->post('spj').'&f=spj&sbtn=Apply';
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url().'administrator/verifikasi/index?bulk=&q='.$this->input->post('spj').'&f=spj&sbtn=Apply';
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
	* delete Verifikasis
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('verifikasi_delete');

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
            set_message(cclang('has_been_deleted', 'verifikasi'), 'success');
        } else {
            set_message(cclang('error_delete', 'verifikasi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Verifikasis
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('verifikasi_view');

		$this->data['verifikasi'] = $this->model_verifikasi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Verifikasi SPJ Detail');
		$this->render('backend/standart/administrator/verifikasi/verifikasi_view', $this->data);
	}
	
	/**
	* delete Verifikasis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$verifikasi = $this->model_verifikasi->find($id);

		
		
		return $this->model_verifikasi->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('verifikasi_export');

		$this->model_verifikasi->export(
			'verifikasi', 
			'verifikasi',
			$this->model_verifikasi->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('verifikasi_export');

		$this->model_verifikasi->pdf('verifikasi', 'verifikasi');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('verifikasi_export');

		$table = $title = 'verifikasi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_verifikasi->find($id);
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


/* End of file verifikasi.php */
/* Location: ./application/controllers/administrator/Verifikasi.php */
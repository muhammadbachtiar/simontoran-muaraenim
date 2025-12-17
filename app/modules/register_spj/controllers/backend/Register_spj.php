<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Register Spj Controller
*| --------------------------------------------------------------------------
*| Register Spj site
*|
*/
class Register_spj extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_register_spj');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Register Spjs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('register_spj_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');
		$this->session->set_userdata('modul','register_spj');
		
		$bagian = "";
		
		if($this->aauth->is_member('bpp bagian')){
		    $this->session->set_userdata('id_bagian',$this->model_register_spj->get_bagian());
		    $bagian = $this->model_register_spj->get_bagian();
		}
		
		if($this->aauth->is_member('pptk')){
		    $this->session->set_userdata('id_bagian',$this->model_register_spj->get_nama_bagian_pptk());
		    $bagian = $this->model_register_spj->get_nama_bagian_pptk();
		}
		
		
		
		
		$full_url = current_url() . '?' . $_SERVER['QUERY_STRING'];
		$this->session->set_userdata('back_url',$full_url);
	
		
        $this->data['bagian'] = $bagian;
		$this->data['register_spjs'] = $this->model_register_spj->get($filter, $field, $this->limit_page, $offset);
		$this->data['register_spj_counts'] = $this->model_register_spj->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/register_spj/index/',
			'total_rows'   => $this->data['register_spj_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
	

		$this->template->title('Register SPJ List');
		$this->render('backend/standart/administrator/register_spj/register_spj_list', $this->data);
	}
	
	/**
	* Add new register_spjs
	*
	*/
	public function add()
	{
		$this->is_allowed('register_spj_add');
		
		if($this->aauth->is_member('bpp bagian')){
		    $this->session->set_userdata('id_bagian',$this->model_register_spj->get_bagian());
		}

		$this->template->title('Register SPJ New');
		$this->render('backend/standart/administrator/register_spj/register_spj_add', $this->data);
	}

	/**
	* Add New Register Spjs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('register_spj_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('bagian', 'Bagian', 'trim|required');
		

		$this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'trim|required');
		

		$this->form_validation->set_rules('no_spj', 'No Spj', 'trim|required');
		

		$this->form_validation->set_rules('tanggal_pengajuan', 'Tanggal Pengajuan', 'trim|required');
		

		$this->form_validation->set_rules('jenis_pengajuan', 'Jenis Pengajuan', 'trim|required');
		

		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'bagian' => $this->input->post('bagian'),
				'sub_kegiatan' => $this->input->post('sub_kegiatan'),
				'no_spj' => $this->input->post('no_spj'),
				'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
				'jenis_pengajuan' => $this->input->post('jenis_pengajuan'),
				'nominal' => $this->input->post('nominal'),
				'no_pengantar' => $this->input->post('no_pengantar'),
				'tanggal_bku' => $this->input->post('tanggal_bku'),
				'no_spp' => $this->input->post('no_spp'),
				'tanggal_spp' => $this->input->post('tanggal_spp'),
				'no_spm' => $this->input->post('no_spm'),
				'tanggal_spm' => $this->input->post('tanggal_spm'),
				'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian'),
			];

			
			
			$save_register_spj = $this->model_register_spj->store($save_data);
            

			if ($save_register_spj) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_register_spj;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/register_spj/edit/' . $save_register_spj, 'Edit Register Spj'),
						anchor('administrator/register_spj', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/register_spj/edit/' . $save_register_spj, 'Edit Register Spj')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/register_spj');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/register_spj');
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
	* Update view Register Spjs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('register_spj_update');

		$this->data['register_spj'] = $this->model_register_spj->find($id);

		$this->template->title('Register SPJ Update');
		$this->render('backend/standart/administrator/register_spj/register_spj_update', $this->data);
	}

	/**
	* Update Register Spjs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('register_spj_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('bagian', 'Bagian', 'trim|required');
		

		$this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'trim|required');
		

		$this->form_validation->set_rules('no_spj', 'No Spj', 'trim|required');
		

		$this->form_validation->set_rules('tanggal_pengajuan', 'Tanggal Pengajuan', 'trim|required');
		

		$this->form_validation->set_rules('jenis_pengajuan', 'Jenis Pengajuan', 'trim|required');
		

		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'bagian' => $this->input->post('bagian'),
				'sub_kegiatan' => $this->input->post('sub_kegiatan'),
				'no_spj' => $this->input->post('no_spj'),
				'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
				'jenis_pengajuan' => $this->input->post('jenis_pengajuan'),
				'nominal' => $this->input->post('nominal'),
				'no_pengantar' => $this->input->post('no_pengantar'),
				'tanggal_bku' => $this->input->post('tanggal_bku'),
				'no_spp' => $this->input->post('no_spp'),
				'tanggal_spp' => $this->input->post('tanggal_spp'),
				'no_spm' => $this->input->post('no_spm'),
				'no_bku' => $this->input->post('no_bku'),
				'tanggal_spm' => $this->input->post('tanggal_spm'),
				'no_sp2d' => $this->input->post('no_sp2d'),
				'tanggal_sp2d' => $this->input->post('tanggal_sp2d'),
				'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian'),
			];


			
			
			$save_register_spj = $this->model_register_spj->change($id, $save_data);

			if ($save_register_spj) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/register_spj', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/register_spj');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/register_spj');
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
	* delete Register Spjs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('register_spj_delete');

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
            set_message(cclang('has_been_deleted', 'register_spj'), 'success');
        } else {
            set_message(cclang('error_delete', 'register_spj'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Register Spjs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('register_spj_view');

		$this->data['register_spj'] = $this->model_register_spj->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Register SPJ Detail');
		$this->render('backend/standart/administrator/register_spj/register_spj_view', $this->data);
	}
	
	/**
	* delete Register Spjs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$register_spj = $this->model_register_spj->find($id);

		
		$delete_ver = $this->model_register_spj->delete_verifikasi_by_spj($id);
		return $this->model_register_spj->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('register_spj_export');

		$this->model_register_spj->export(
			'register_spj', 
			'register_spj',
			$this->model_register_spj->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('register_spj_export');

		$this->model_register_spj->pdf('register_spj', 'register_spj');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('register_spj_export');

		$table = $title = 'register_spj';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_register_spj->find($id);
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
	
	
		public function cetak($id)
	{
		$this->is_allowed('register_spj_cetak');

		$this->data['register_spj']    = $this->model_register_spj->join_avaiable()->filter_avaiable()->find($id);
		$id_bpp                         = $this->session->id;
		$id_verifikator1 				= $this->model_register_spj->get_id_verifikator($id)->verifikator;
		$id_verifikator2				= $this->model_register_spj->get_id_verifikator($id)->verifikator2;
		$this->data['bpp']             = $this->model_register_spj->bpp($id,$id_bpp);
		$this->data['bpp_name']        = $this->model_register_spj->getNama($id_bpp);
		$this->data['verifikator1']    = $this->model_register_spj->bpp($id,$id_verifikator1);
		$this->data['verifikator1_name']        = $this->model_register_spj->getNama('2');
		$this->data['verifikator2']    = $this->model_register_spj->bpp($id,$id_verifikator2);
		$this->data['verifikator2_name']        = $this->model_register_spj->getNama('3');
		$this->data['ppk_skpd']        = $this->model_register_spj->bpp($id,'4');
		$this->data['ppk_skpd_name']        = $this->model_register_spj->getNama('4');



		$this->data['nama_verifikator'] = $this->model_register_spj->get_nama_verifikator($id);
		$this->data['nama_verifikator2'] = $this->model_register_spj->get_nama_verifikator2($id);
		$this->data['nama_ppk_skpd'] =  $this->model_register_spj->get_nama_ppk_skpd();





		$this->template->title('Cetak SPJ');
		 // Mengatur konten halaman yang akan dicetak
        $this->data['pages'] = [
            'Page 1 content goes here...',
            // 'Page 2 content goes here...',
            // 'Page 3 content goes here...'
        ];

        // Memuat view dengan data
		$this->render('backend/standart/administrator/register_spj/register_spj_cetak', $this->data);
        // $this->load->view('backend/standart/administrator/register_spj/cetak', $this->data);
	}
	
	
	public function cetakceklist($id){
	    $register_spj = $this->model_register_spj->join_avaiable()->filter_avaiable()->find($id);
	    $this->data['register_spj']    = $register_spj;
	    
	    $this->data['bendel_pertama'] = $this->model_register_spj->bendel($register_spj->ceklist,'BENDEL PERTAMA');
		$this->data['bendel_kedua'] = $this->model_register_spj->bendel($register_spj->ceklist,'BENDEL KEDUA');
		
// 		$this->data['verifikasi']   = $this->model_register_spj->verifikasi($id);

        $this->render('backend/standart/administrator/register_spj/register_spj_ceklist', $this->data);
	}
	
	
	public function editceklist($id){
	    $this->data['register_spj']    = $this->model_register_spj->join_avaiable()->filter_avaiable()->find($id);
	    $this->render('backend/standart/administrator/register_spj/register_spj_editceklist', $this->data);
	}
	
	public function edit_save_ceklist($id)
	{
		if (!$this->is_allowed('register_spj_ceklist', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		
	
		
			$save_data = [
				
				'ceklist' => $this->input->post('ceklist'),
			];


			
			
			$save_register_spj = $this->model_register_spj->change($id, $save_data);

			if ($save_register_spj) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor($this->session->back_url, ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = $this->session->back_url;
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = $this->session->back_url;
				}
			}
		

		$this->response($this->data);
	}

	
}


/* End of file register_spj.php */
/* Location: ./application/controllers/administrator/Register Spj.php */
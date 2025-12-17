<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Bantuan Controller
*| --------------------------------------------------------------------------
*| Bantuan site
*|
*/
class Bantuan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_bantuan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Bantuans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
{
    $this->is_allowed('bantuan_list');

    $filter = $this->input->get('q');
    $field  = $this->input->get('f');

    $limit = 10;
    $this->data['bantuans']       = $this->model_bantuan->get($filter, $field, $limit, $offset);
    $this->data['bantuan_counts'] = $this->model_bantuan->count_all($filter, $field);

    $base = site_url('administrator/bantuan/index');
    $config = [
        'base_url'           => 'administrator/bantuan/index',
        'total_rows'         => $this->data['bantuan_counts'],
        'per_page'           => $limit,
        'uri_segment'        => 4,
        
    ];

    $this->data['pagination'] = $this->pagination($config);

    $this->template->title('Bantuan List');
    $this->render('backend/standart/administrator/bantuan/bantuan_list', $this->data);
    
    

}

	
	/**
	* Add new bantuans
	*
	*/
	public function add()
	{
		$this->is_allowed('bantuan_add');

		$this->template->title('Bantuan New');
		$this->render('backend/standart/administrator/bantuan/bantuan_add', $this->data);
	}

	/**
	* Add New Bantuans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('bantuan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		

		$this->form_validation->set_rules('konten', 'Konten', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'user' => get_user_data('id'),				'judul' => $this->input->post('judul'),
				'konten' => $this->input->post('konten'),
				'waktu' => date('Y-m-d H:i:s'),
			];

			
			
			$save_bantuan = $this->model_bantuan->store($save_data);
            

			if ($save_bantuan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_bantuan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/bantuan/edit/' . $save_bantuan, 'Edit Bantuan'),
						anchor('administrator/bantuan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/bantuan/edit/' . $save_bantuan, 'Edit Bantuan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/bantuan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/bantuan');
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
	* Update view Bantuans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('bantuan_update');

		$this->data['bantuan'] = $this->model_bantuan->find($id);

		$this->template->title('Bantuan Update');
		$this->render('backend/standart/administrator/bantuan/bantuan_update', $this->data);
	}

	/**
	* Update Bantuans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('bantuan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		

		$this->form_validation->set_rules('konten', 'Konten', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'judul' => $this->input->post('judul'),
				'konten' => $this->input->post('konten'),
				
			];


			
			
			$save_bantuan = $this->model_bantuan->change($id, $save_data);

			if ($save_bantuan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/bantuan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/bantuan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/bantuan');
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
	* delete Bantuans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('bantuan_delete');

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
            set_message(cclang('has_been_deleted', 'bantuan'), 'success');
        } else {
            set_message(cclang('error_delete', 'bantuan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Bantuans
	*
	* @var $id String
	*/
// 	public function view($id)
// 	{
// 		$this->is_allowed('bantuan_view');

// 		$this->data['bantuan'] = $this->model_bantuan->join_avaiable()->filter_avaiable()->find($id);

// 		$this->template->title('Bantuan Detail');
// 		$this->render('backend/standart/administrator/bantuan/bantuan_view', $this->data);
// 	}
	
	/**
	* delete Bantuans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$bantuan = $this->model_bantuan->find($id);
		
		$this->model_bantuan->hapus_komentar_massal($id);

		
		
		return $this->model_bantuan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('bantuan_export');

		$this->model_bantuan->export(
			'bantuan', 
			'bantuan',
			$this->model_bantuan->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('bantuan_export');

		$this->model_bantuan->pdf('bantuan', 'bantuan');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('bantuan_export');

		$table = $title = 'bantuan';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_bantuan->find($id);
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
	
	// tambahan koment
	public function view($id = null)
{
    $this->is_allowed('bantuan_view');

    $detail = $this->model_bantuan->find_with_user($id);
    if (!$detail) show_404();

    $comments = $this->model_bantuan->komentar_list($id);

    $this->data['detail']   = $detail;
    $this->data['comments'] = $comments;

    $this->template->title('Detail Pertanyaan');
    $this->render('backend/standart/administrator/bantuan/bantuan_view', $this->data);
}

public function comment_save($bantuan_id)
{
    $this->is_allowed('bantuan_view'); // minimal bisa lihat

    $komentar = trim($this->input->post('komentar'));
    if ($komentar === '') {
        set_message('Komentar tidak boleh kosong', 'warning');
        return redirect_back();
    }

    $user_id = get_user_data('id'); // dari Aauth
    $this->model_bantuan->komentar_tambah($bantuan_id, $user_id, $komentar);

    set_message('Komentar berhasil ditambahkan', 'success');
    redirect(site_url('administrator/bantuan/view/'.$bantuan_id));
}

public function comment_delete($bantuan_id, $komentar_id)
{
    $this->is_allowed('bantuan_view');

    // ambil sekalian cocokkan bantuan_id
    $row = $this->model_bantuan->komentar_by_id($komentar_id, $bantuan_id);
    if (!$row) {
        show_error('Komentar tidak ditemukan');
    }

    if ($row->id_user != get_user_data('id') && !$this->aauth->is_admin()) {
        show_error('Anda tidak berhak menghapus komentar ini');
    }

    $this->model_bantuan->komentar_hapus($komentar_id);
    set_message('Komentar dihapus', 'success');
    redirect(site_url('administrator/bantuan/view/'.$bantuan_id));
}



//akhir tambahan

	
}


/* End of file bantuan.php */
/* Location: ./application/controllers/administrator/Bantuan.php */
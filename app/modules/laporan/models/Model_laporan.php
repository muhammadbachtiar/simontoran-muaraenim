<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_laporan extends MY_Model {

	private $primary_key 	= 'perm_id';
	private $table_name 	= 'aauth_perm_to_group';
	private $field_search 	= array('perm_id', 'group_id');

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	public function count_all($q = '', $field = '')
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "(" . $field . " LIKE '%" . $q . "%' ";
	            } else if ($iterasi == $num) {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%') ";
	            } else {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }
        } else {
        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
        }

        $this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = '', $field = '', $limit = 0, $offset = 0)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "(" . $field . " LIKE '%" . $q . "%' ";
	            } else if ($iterasi == $num) {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%') ";
	            } else {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }
        } else {
        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
        }

        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by($this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}
	
	 public function filter_bagian($id) {

        if (!$this->aauth->is_admin()) {
            if($this->aauth->is_member('bpp bagian') OR $this->aauth->is_member('pptk')){
                $this->db->where('nama_bagian',$id);
            }
            
        }

        return $this;
    }
	
	
	public function laporanharian_bagian(){
	    $nama = $this->get_nama_bagian();
	    $this->filter_bagian($nama);
	    
	    $data = $this->db->get('laporanharian_bagian')->result();
	    return $data;
	}
	public function laporanharian_bagian_sub(){
	    $nama = $this->get_nama_bagian();
	    $this->filter_bagian($nama);
	    $data = $this->db->get('laporanharian_bagian_sub')->result();
	    return $data;
	}
	
	public function laporanbulanan_bagian(){
	     $nama = $this->get_nama_bagian();
	    $this->filter_bagian($nama);
	    $data = $this->db->get('laporanbulanan_bagian')->result();
	    return $data;
	}
	public function laporanbulanan_bagian_sub(){
	     $nama = $this->get_nama_bagian();
	    $this->filter_bagian($nama);
	    $data = $this->db->get('laporanbulanan_bagian_sub')->result();
	    return $data;
	}
	
	public function getdata($tabel,$bagian=null){
	   
	    if($bagian!=null){
	        $this->db->where("nama_bagian like '$bagian%'");
	    }
	    $data = $this->db->get($tabel)->result();
	    
	    return $data;
	}
	
	public function laporanbagian($tabel){
	    $nama = $this->get_nama_bagian();
	    $this->filter_bagian($nama);
	    $data = $this->db->get($tabel)->result();
	    return $data;
	}
	  public function get_nama_bagian(){
    $this->db->where('bpp', $this->session->id);
    $data = $this->db->get('masterbagian')->row();
    return $data ? $data->nama_bagian : null;
}

public function get_nama_bagian_pptk() {
    // Ambil id pptk dari session
    $pptk_id = $this->session->id;

    // Gunakan FIND_IN_SET untuk mencari pptk yang berisi id pptk pada kolom pptk atau bpp
    $this->db->where("(FIND_IN_SET('$pptk_id', pptk) > 0 OR FIND_IN_SET('$pptk_id', bpp) > 0)", null, false);
    
    
    // Ambil satu baris pertama dari tabel masterbagian
    $data = $this->db->get('masterbagian')->row();

    // Jika ada data, kembalikan nama_bagian dari baris pertama
    return $data ? $data->nama_bagian : null;
}



}

/* End of file Model_access.php */
/* Location: ./application/models/Model_access.php */
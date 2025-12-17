<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gaji extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'register_spj';
    public $field_search   = ['bagian', 'sub_kegiatan', 'no_spj', 'tanggal_pengajuan', 'jenis_pengajuan', 'nominal'];

    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
         );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "register_spj.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "register_spj.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            if($field == 'bagian'){
                $where .= "(" . "register_spj.".$field . " = '" . $q . "' )";
            }else{
                $where .= "(" . "register_spj.".$field . " LIKE '%" . $q . "%' )";
            }
            
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }
    
    public function count_all_asn($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "register_spj.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "register_spj.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            if($field == 'bagian'){
                $where .= "(" . "register_spj.".$field . " = '" . $q . "' )";
            }else{
                $where .= "(" . "register_spj.".$field . " LIKE '%" . $q . "%' )";
            }
            
        }

        $this->join_avaiable()->filter_avaiable()->filter_asn();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }
    
     public function count_all_kdh($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "register_spj.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "register_spj.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            if($field == 'bagian'){
                $where .= "(" . "register_spj.".$field . " = '" . $q . "' )";
            }else{
                $where .= "(" . "register_spj.".$field . " LIKE '%" . $q . "%' )";
            }
            
        }

        $this->join_avaiable()->filter_avaiable()->filter_kdh();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "register_spj.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "register_spj.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            if($field == 'bagian'){
                $where .= "(" . "register_spj.".$field . " = '" . $q . "' )";
            }else{
                $where .= "(" . "register_spj.".$field . " LIKE '%" . $q . "%' )";
            }
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        
        $this->sortable();
        
        $query = $this->db->get($this->table_name);

        return $query->result();
    }
    
    public function get_asn($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "register_spj.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "register_spj.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            if($field == 'bagian'){
                $where .= "(" . "register_spj.".$field . " = '" . $q . "' )";
            }else{
                $where .= "(" . "register_spj.".$field . " LIKE '%" . $q . "%' )";
            }
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable()->filter_asn();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        
        $this->sortable();
        
        $query = $this->db->get($this->table_name);

        return $query->result();
    }
    
    public function get_kdh($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "register_spj.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "register_spj.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            if($field == 'bagian'){
                $where .= "(" . "register_spj.".$field . " = '" . $q . "' )";
            }else{
                $where .= "(" . "register_spj.".$field . " LIKE '%" . $q . "%' )";
            }
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable()->filter_kdh();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        
        $this->sortable();
        
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('masterbagian', 'masterbagian.id = register_spj.bagian', 'LEFT');
        $this->db->join('aauth_users','masterbagian.bpp=aauth_users.id','LEFT');
        $this->db->join('jumlah_verifikasi', 'jumlah_verifikasi.spj = register_spj.id', 'LEFT');
        $this->db->join('sub_kegiatan', 'sub_kegiatan.id = register_spj.sub_kegiatan', 'LEFT');
        $this->db->join('jenis_ajuan_gaji', 'jenis_ajuan_gaji.jenis_ajuan_gaji = register_spj.jenis_pengajuan', 'LEFT');
        $this->db->order_by('register_spj.no_spj','DESC');
        
        $this->db->select('register_spj.*,aauth_users.full_name,masterbagian.nama_bagian as masterbagian_nama_bagian,sub_kegiatan.sub_kegiatan as sub_kegiatan_sub_kegiatan,register_spj.jenis_pengajuan as jenis_pengajuan_jenis_pengajuan,jumlah_verifikasi.jumlah_catatan,jenis_ajuan_gaji.uraian');


        return $this;
    }

    public function filter_avaiable() {

        $this->db->where("register_spj.jenis_pengajuan like 'LS - GAJI%'");
        
        if (!$this->aauth->is_admin()) {
           
            }

        return $this;
    }
    
    public function filter_asn(){
        $this->db->where("register_spj.sub_kegiatan","3");
        return $this;
    }
    public function filter_kdh(){
        $this->db->where("register_spj.sub_kegiatan","5");
        return $this;
    }
    
    
    public function filter_bagian($id) {

        if (!$this->aauth->is_admin()) {
            if($this->aauth->is_member('bpp bagian')){
                $this->db->where('register_spj.bagian',$id);
            }
            }

        return $this;
    }
    
    public function bpp($id,$verifikator){
        $this->db->where('spj',$id);
        $this->db->where('verifikator',$verifikator);
        $this->db->join('aauth_users','aauth_users.id=verifikasi.verifikator','LEFT');
        $this->db->select('verifikasi.*,aauth_users.full_name');
        $this->db->order_by('tanggal','ASC');
        $data = $this->db->get('verifikasi')->result();
        return $data;
    }
    
    public  function getNama($id){
        $this->db->where('id',$id);
        $data = $this->db->get('aauth_users')->row();
        return $data->full_name;
    } 
    
    public function get_bagian(){
        $this->db->where('bpp',$this->session->id);
        $data = $this->db->get('masterbagian')->row();
        return $data->id;
    }
    
    public function bendel($jenis_pengajuan,$bendel){
        $this->db->where('jenis_pengajuan',$jenis_pengajuan);
        $this->db->where('bendel',$bendel);
        return $this->db->get('berkas_pengajuan')->result();
    }
    
    public function verifikasi($id){
        $this->db->where('spj',$id);
        $data =$this->db->get('verifikasi')->result();
        return $data;
    }
    
    public function sub_asn(){
        $this->db->where('id','3');
        $data = $this->db->get('sub_kegiatan')->result();
        return $data;
    }
    public function sub_kdh(){
        $this->db->where('id','5');
        $data = $this->db->get('sub_kegiatan')->result();
        return $data;
    }
    public function sub(){
       
        $data = $this->db->get('sub_kegiatan')->result();
        return $data;
    }
    
    
    public function jenis_ajuan_gaji($jenis=null){
        $this->db->where('jenis_gaji',$jenis);
        $data = $this->db->get('jenis_ajuan_gaji')->result();
        return $data;
    }

}

/* End of file Model_register_spj.php */
/* Location: ./application/models/Model_register_spj.php */
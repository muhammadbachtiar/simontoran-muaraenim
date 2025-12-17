<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_register_spj extends MY_Model {

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

    public function join_avaiable() {
        $this->db->join('masterbagian', 'masterbagian.id = register_spj.bagian', 'LEFT');
        $this->db->join('aauth_users','masterbagian.bpp=aauth_users.id','LEFT');
        $this->db->join('jumlah_verifikasi', 'jumlah_verifikasi.spj = register_spj.id', 'LEFT');
        $this->db->join('sub_kegiatan', 'sub_kegiatan.id = register_spj.sub_kegiatan', 'LEFT');
        $this->db->join('jenis_pengajuan', 'jenis_pengajuan.jenis_pengajuan = register_spj.jenis_pengajuan', 'LEFT');
        $this->db->join('rekap_verifikasi','rekap_verifikasi.spj=register_spj.id','LEFT');
        $this->db->order_by('register_spj.no_spj','DESC');
        
        $this->db->select('register_spj.*,
        rekap_verifikasi.warna_status,rekap_verifikasi.status_verifikasi,
        
        aauth_users.full_name,masterbagian.nama_bagian as masterbagian_nama_bagian,sub_kegiatan.sub_kegiatan as sub_kegiatan_sub_kegiatan,jenis_pengajuan.jenis_pengajuan as jenis_pengajuan_jenis_pengajuan,jumlah_verifikasi.jumlah_catatan');


        return $this;
    }

public function filter_avaiable()
{
    $this->db->where("register_spj.jenis_pengajuan NOT LIKE '%gaji%'");

    if (!$this->aauth->is_admin()) {

        if ($this->aauth->is_member('bpp bagian') || $this->aauth->is_member('pptk')) {
            $this->db->where('register_spj.bagian', $this->session->id_bagian);
        }

        // ambil user dari AAUTH
        $user_id = $this->aauth->get_user_id();

        if ($this->aauth->is_member('verifikator 1')) {

             $user_id = (int) $this->aauth->get_user_id();

            // ✅ Subquery murni — tidak sentuh query builder CI3
            $this->db->where(
                "register_spj.bagian IN (
                    SELECT id 
                    FROM masterbagian 
                    WHERE verifikator = {$user_id}
                )",
                null,
                false
            );
        }
    }

    return $this;
}

    
    
    public function filter_bagian($id) {

        if (!$this->aauth->is_admin()) {
            if($this->aauth->is_member('bpp bagian') OR $this->aauth->is_member('pptk')){
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
    public function get_nama_bagian(){
        $this->db->where('bpp',$this->session->id);
        $data = $this->db->get('masterbagian')->row();
        return $data->nama_bagian;
    }
    
    public function bendel($jenis_pengajuan,$bendel){
        $this->db->where('jenis_ceklist',$jenis_pengajuan);
        $this->db->where('bendel',$bendel);
        $this->db->join('list_ceklist','list_ceklist.id=berkas_ceklist.jenis_ceklist','LEFT');
        return $this->db->get('berkas_ceklist')->result();
    }
    
    public function verifikasi($id){
        $this->db->where('spj',$id);
        $data =$this->db->get('verifikasi')->result();
        return $data;
    }
    
    public function get_nama_bagian_pptk() {
    // Ambil id pptk dari session
    $pptk_id = $this->session->id;

    // Gunakan FIND_IN_SET untuk mencari pptk yang berisi id pptk pada kolom pptk atau bpp
    $this->db->where("(FIND_IN_SET('$pptk_id', pptk) > 0 OR FIND_IN_SET('$pptk_id', bpp) > 0)", null, false);
    
    
    // Ambil satu baris pertama dari tabel masterbagian
    $data = $this->db->get('masterbagian')->row();

    // Jika ada data, kembalikan nama_bagian dari baris pertama
    return $data ? $data->id : null;
}

public function get_nama_verifikator($id_spj)
{
    $this->db->select('aauth_users.full_name');
    $this->db->from('register_spj');
    $this->db->join('masterbagian', 'masterbagian.id = register_spj.bagian', 'left');
    $this->db->join('aauth_users', 'aauth_users.id = masterbagian.verifikator', 'left');
    $this->db->where('register_spj.id', $id_spj);

    $query = $this->db->get();

    return ($query->num_rows() > 0) ? $query->row()->full_name : null;
}

public function get_nama_verifikator2($id_spj)
{
    $this->db->select('aauth_users.full_name');
    $this->db->from('register_spj');
    $this->db->join('masterbagian', 'masterbagian.id = register_spj.bagian', 'left');
    $this->db->join('aauth_users', 'aauth_users.id = masterbagian.verifikator2', 'left');
    $this->db->where('register_spj.id', $id_spj);

    $query = $this->db->get();

    return ($query->num_rows() > 0) ? $query->row()->full_name : null;
}

public function get_nama_ppk_skpd(){
    
    $this->db->select('aauth_users.full_name');
    $this->db->join('aauth_users','aauth_users.id = master_ppk_skpd.ppk_skpd','LEFT');
    $query= $this->db->get('master_ppk_skpd');
    return ($query->num_rows() > 0) ? $query->row()->full_name : null;

}


public function get_id_verifikator($id){
    $this->db->select('masterbagian.*');
    $this->db->join('register_spj','register_spj.bagian=masterbagian.id');
    $this->db->where('register_spj.id',$id);
    $data = $this->db->get('masterbagian')->row();
    return $data;
}

public function delete_verifikasi_by_spj($id)
{
    $this->db->where('spj', $id);
    return $this->db->delete('verifikasi');
}


}

/* End of file Model_register_spj.php */
/* Location: ./application/models/Model_register_spj.php */
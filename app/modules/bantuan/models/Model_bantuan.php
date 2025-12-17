<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bantuan extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'bantuan';
    public $field_search   = ['user', 'judul', 'konten', 'waktu'];

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
    $q     = $this->scurity($q);
    $field = $this->scurity($field);

    $this->join_avaiable()->filter_avaiable();
    $this->db->from($this->table_name);

    if ($q !== null && $q !== '') {
        if ($field) {
            $this->db->like("{$this->table_name}.{$field}", $q);
        } else {
            $this->db->group_start();
            foreach ($this->field_search as $col) {
                $this->db->or_like("{$this->table_name}.{$col}", $q);
            }
            $this->db->group_end();
        }
    }

    return $this->db->count_all_results(); // lebih ringan daripada get()->num_rows()
}

public function get($q = null, $field = null, $limit = 10, $offset = 0, $select_field = [])
{
    $q     = $this->scurity($q);
    $field = $this->scurity($field);

    if (is_array($select_field) && count($select_field)) {
        $this->db->select($select_field);
    } else {
        $this->db->select("{$this->table_name}.*, aauth_users.full_name");
    }

    $this->db->from($this->table_name);
    $this->join_avaiable()->filter_avaiable();

    if ($q !== null && $q !== '') {
        if ($field) {
            $this->db->like("{$this->table_name}.{$field}", $q);
        } else {
            $this->db->group_start();
            foreach ($this->field_search as $col) {
                $this->db->or_like("{$this->table_name}.{$col}", $q);
            }
            $this->db->group_end();
        }
    }

    // pastikan urutan konsisten (mis. terbaru dulu)
    $this->db->order_by("{$this->table_name}.waktu", 'DESC');

    // wajib untuk pagination
    $this->db->limit((int)$limit, (int)$offset);

    return $this->db->get()->result();
}


    public function join_avaiable() {
        $this->db->join('aauth_users','aauth_users.id=bantuan.user','LEFT');
        $this->db->select('bantuan.*,aauth_users.full_name');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            // $this->db->where($this->table_name.'.user', get_user_data('id'));
        }

        return $this;
    }
    
    
    
    // koment
    public function hapus_komentar_massal($id_bantuan)
{
    return $this->db
        ->where('id_bantuan', (int)$id_bantuan)
        ->delete('komen_bantuan');
}
    
    // === BAGIAN KOMENTAR (pakai tabel: komen_bantuan) ===
public function find_with_user($id)
{
    return $this->db->select('bantuan.*, aauth_users.full_name')
        ->from('bantuan')
        ->join('aauth_users','aauth_users.id=bantuan.user','left')
        ->where('bantuan.id', (int)$id)
        ->get()->row();
}

public function komentar_list($bantuan_id)
{
    return $this->db->select('k.*, u.full_name')
        ->from('komen_bantuan k')
        ->join('aauth_users u','u.id = k.id_user','left')
        ->where('k.id_bantuan', (int)$bantuan_id)
        ->order_by('k.waktu','ASC') // kronologis
        ->get()->result();
}

public function komentar_tambah($bantuan_id, $user_id, $komentar)
{
    return $this->db->insert('komen_bantuan', [
        'id_bantuan' => (int)$bantuan_id,
        'id_user'    => (int)$user_id,
        'komentar'   => $komentar,
        'waktu'      => date('Y-m-d H:i:s'),
    ]);
}

public function komentar_hapus($id_komentar)
{
    return $this->db->delete('komen_bantuan', ['id' => (int)$id_komentar]);
}

public function komentar_by_id($komentar_id, $bantuan_id = null)
{
    $this->db->select('k.*, u.full_name')
             ->from('komen_bantuan k')
             ->join('aauth_users u','u.id=k.id_user','left')
             ->where('k.id', (int)$komentar_id);

    if ($bantuan_id !== null) {
        $this->db->where('k.id_bantuan', (int)$bantuan_id);
    }
    return $this->db->get()->row();
}

public function komentar_count($bantuan_id)
{
    return (int)$this->db->where('id_bantuan', (int)$bantuan_id)
        ->from('komen_bantuan')
        ->count_all_results();
}
//akhir komen

}

/* End of file Model_bantuan.php */
/* Location: ./application/models/Model_bantuan.php */
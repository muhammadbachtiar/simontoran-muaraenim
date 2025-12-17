<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_setorpb extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'setorpb';
    public $field_search   = ['tanggal_pb', 'nominal', 'sub_kegiatan'];

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
                    $where .= "setorpb.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "setorpb.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "setorpb.".$field . " LIKE '%" . $q . "%' )";
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
                    $where .= "setorpb.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "setorpb.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "setorpb.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->join('sub_kegiatan', 'sub_kegiatan.id = setorpb.sub_kegiatan', 'LEFT');
        
        $this->db->select('setorpb.*,sub_kegiatan.sub_kegiatan as sub_kegiatan_sub_kegiatan');


        return $this;
    }

     public function filter_avaiable() {
        $this->db->where('sub_kegiatan.bagian',$this->session->id_bagian);

        if (!$this->aauth->is_admin()) {
            // if($this->aauth->is_member('bpp bagian')){
                
            // }
            }

        return $this;
    }
    
    public function get_bagian(){
        $this->db->where('bpp',$this->session->id);
        $data = $this->db->get('masterbagian')->row();
        return $data->id;
    }
    
    public function get_nama_bagian(){
        $this->db->where('id',$this->session->id_bagian);
        $data = $this->db->get('masterbagian')->row();
        return $data->nama_bagian;
    }

}

/* End of file Model_setorpb.php */
/* Location: ./application/models/Model_setorpb.php */
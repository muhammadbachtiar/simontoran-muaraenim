<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_masterbagian extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'masterbagian';
    public $field_search   = ['nama_bagian', 'bpp', 'pptk', 'verifikator', 'verifikator2'];

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
                    $where .= "masterbagian.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "masterbagian.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "masterbagian.".$field . " LIKE '%" . $q . "%' )";
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
                    $where .= "masterbagian.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "masterbagian.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "masterbagian.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->join('user_bpp', 'user_bpp.id = masterbagian.bpp', 'LEFT');
        $this->db->join('user_pptk', 'user_pptk.id = masterbagian.pptk', 'LEFT');
        $this->db->join('v_verifikator', 'v_verifikator.id = masterbagian.verifikator', 'LEFT');
        $this->db->join('v_verifikator2', 'v_verifikator2.id = masterbagian.verifikator2', 'LEFT');
        
        $this->db->select('masterbagian.*,user_bpp.full_name as user_bpp_full_name,user_pptk.full_name as user_pptk_full_name,v_verifikator.full_name as v_verifikator_full_name,v_verifikator2.full_name as v_verifikator2_full_name');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_masterbagian.php */
/* Location: ./application/models/Model_masterbagian.php */
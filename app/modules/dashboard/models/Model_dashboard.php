<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_dashboard extends MY_Model {
    public function getData(){
        $data = $this->db->get('dashboard')->result();
        return $data;
    }
     public function get_all()
    {
        return $this->db->get('dashboard')->result_array();
    }
    
    public function get_total_nominal_per_jenis()
{
    $this->db->select('jenis_pengajuan, SUM(nominal) AS total_nominal');
    $this->db->from('register_spj');
    $this->db->like('jenis_pengajuan', 'LS - Gaji');
    $this->db->like('sub_kegiatan', '3');
    $this->db->group_by('jenis_pengajuan');
    return $this->db->get()->result();
}

public function get_kdh_nominal_per_jenis()
{
    $this->db->select('jenis_pengajuan, SUM(nominal) AS total_nominal');
    $this->db->from('register_spj');
    $this->db->like('jenis_pengajuan', 'LS - Gaji');
    $this->db->like('sub_kegiatan', '5');
    $this->db->group_by('jenis_pengajuan');
    return $this->db->get()->result();
}

    
}
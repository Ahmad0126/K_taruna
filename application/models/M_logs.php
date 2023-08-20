<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_logs extends CI_Model{
    function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
    }
    protected $_table1 = 'log_anggota';
    protected $_table2 = 'anggota';

    public function get_logs(){
        return $this->db->get($this->_table1)->row_array();
    }
    public function get_logs_and_userdata(){
        $this->db->select('log_id, tanggal_jam, aktivitas, nama');
        $this->db->from($this->_table1);
        $this->db->join($this->_table2, $this->_table2.'.id_anggota = '.$this->_table1.'.id_anggota');
        $this->db->order_by('tanggal_jam', 'DESC');
        return $this->db->get()->result();
    }
    public function insert_log($aktivitas){
        $data = array(
            'id_anggota' => $this->session->userdata('id'),
            'tanggal_jam' => date("Y-m-d H:i:s"),
            'aktivitas' => $aktivitas
        );
        $this->db->insert($this->_table1, $data);
    }
}
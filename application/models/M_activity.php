<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_activity extends CI_Model{
    protected $table1 = 'kas';
    protected $table2 = 'event';
    protected $table3 = 'anggota';
    protected $table4 = 'catatan';
    protected $rules1 = [
        [
            'field' => 'masuk',
            'label' => 'Masuk',
            'rules' => 'integer|is_natural'
        ], 
        [
            'field' => 'keluar',
            'label' => 'Keluar',
            'rules' => 'integer|is_natural'
        ],
        [
            'field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required'
        ]
    ];
    private function validation($input2 = false, $default_id = null){
        $this->form_validation->set_rules($this->rules1);
        if ($this->form_validation->run() == TRUE){
            $this->db->order_by('tanggal', 'ASC');
            $last = $this->db->get($this->table1)->last_row('array');
            if($this->input->post('keluar')){
                $saldo = ($last['saldo'] - $this->input->post('keluar'));
            }else if($this->input->post('masuk')){
                $masuk = $this->input->post('masuk');
                $saldo = ($last['saldo'] + $this->input->post('masuk'));
            }else if($input2 != false){
                $masuk = $input2;
                $saldo = ($last['saldo'] + $input2);
            }else{ return FALSE; }
            $user = [
                'id_anggota' => $default_id,
                'tanggal' => date('Y-m-d H-i-s'),
                'masuk' => $masuk,
                'keluar' => $this->input->post('keluar'),
                'sebab' => $this->input->post('keterangan'),
                'saldo' => $saldo
            ];
            return $user;
        }
        return FALSE;
   }
    private function get_bukan_kas(){
        $this->db->select('tanggal, masuk, keluar, sebab, saldo');
        return $this->db->get_where($this->table1, array('sebab !=' => 'kas'))->result_array();
    }
    private function get_kas(){
        return $this->db->get_where($this->table1, array('sebab' => 'kas'))->result_array();
    }
    function get_total_pp_by_tanggal($field, $tanggal){
        $this->db->select($field);
        $this->db->from($this->table1);
        $this->db->like('tanggal', $tanggal);
        $list = $this->db->get()->result_array();
        $total = 0;
        foreach($list as $fer){
            $total += $fer[$field];
        }
        return $total;
    }
    function get_total_pp($field){
        $this->db->select($field);
        $this->db->from($this->table1);
        $list = $this->db->get()->result_array();
        $total = 0;
        foreach($list as $fer){
            $total += $fer[$field];
        }
        return $total;
    }
    function get_saldo(){
        $this->db->select('saldo');
        $this->db->from($this->table1);
        return $this->db->get()->last_row();
    }
    function get_tahun_awal(){
        $this->db->select('tanggal');
        $this->db->from($this->table1);
        $this->db->where('sebab', 'kas');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->row_array();
    }
    function merge_kas(){
        $kas = $this->get_kas();
        $bukan_kas = $this->get_bukan_kas();
        $no = 0;
        $last_no = 0;
        $ringkasan_kas = array();
        $hasil_kas = array();
        $last_tanggal = '';
        foreach ($kas as $fer) {
            $tanggal = substr($fer['tanggal'],0,10);
            $pemasukan = intval($fer['masuk']);
            $saldo = intval($fer['saldo']);
            if ($last_tanggal == $tanggal) {
                $ringkasan_kas[$last_no]['masuk'] += $pemasukan;
                $ringkasan_kas[$last_no]['saldo'] = $saldo;
            } else {
                $ringkasan_kas[$no] = ['tanggal' => $fer['tanggal'], 'masuk' => $pemasukan, 'keluar' => $fer['keluar'], 'sebab' => $fer['sebab'], 'saldo' => $saldo];
                $last_tanggal = $tanggal;
                $last_no = $no;
                $no++;
            }
        }
        function cmp_tgg($a, $b) {
            return strcmp($a['tanggal'], $b['tanggal']);
        }
        $hasil_kas = array_merge($ringkasan_kas, $bukan_kas);
        usort($hasil_kas, 'cmp_tgg');
        return $hasil_kas;
    }
    
    function extend_kas($tanggal){
        $this->db->select('id_anggota, nama');
        $query = $this->db->get($this->table3)->result_array();
        $no = 0;
        $bulan = [];
        foreach($query as $fer){
            for($i=1; $i<=12; $i++){
                if($i < 10){ $j = '0'.$i; }else{ $j = $i; }
                $look = $this->get_io($tanggal.'-'.$j, $fer['id_anggota']);
                if($look){
                    $bulan += [
                        $no++ => array('nama' => $fer['nama'],'value' => $look['masuk'], 'bulan' => $i)
                    ];
                }else{
                    $bulan += [
                        $no++ => array('nama' => $fer['nama'],'value' => '-', 'bulan' => $i)
                    ];
                }
            }
        }
        return $bulan;
    }
    private function get_io($tanggal, $id){
        $this->db->select('masuk');
        $this->db->like('tanggal', $tanggal);
        return $this->db->get_where($this->table1, array('id_anggota' => $id))->row_array();
    }
    public function masuk(){
        $validation_ = $this->validation();
        if($validation_){
            return $this->insert($validation_);
        }else{
            return FALSE;
        }
    }
    public function masuk_kas(){
        $this->db->select('id_anggota');
        $id = $this->db->get($this->table3)->result_array();
        foreach($id as $fer){
            $masuk = $this->input->post('user_'.$fer['id_anggota']);
            if(isset($masuk)){
                $validation_ = $this->validation($masuk, $fer['id_anggota']);
                if($validation_){
                    $this->insert($validation_);
                }
            }
        }
        return true;
    }
    private function insert($data){
        $this->db->insert($this->table1, $data);
        return TRUE;
    }
}
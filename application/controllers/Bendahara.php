<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bendahara extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role') != 'bendahara'){
            redirect(base_url());
        }
        $this->load->model('M_activity');
        $this->load->model('M_anggota');
        $this->load->model('M_logs');
   }
   private function buat_notif($message, $warna){
        $this->session->set_flashdata('alert','
        <div class="alert alert-'.$warna.' alert-dismissable fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> '.$message.'
            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
        </div>');
    }

   public function index(){
        $data['title'] = 'Bendahara Dashboard';
        $data['kas'] = $this->M_activity->merge_kas();
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_bend');
        $this->load->view('component/navbar');
        $this->load->view('kas', $data);
        $this->load->view('component/footer');
    }
    public function kas($tahun){
        $data['t_awal'] = $this->M_activity->get_tahun_awal();
        $data['title'] = 'Kas Tahun '.$tahun;
        $data['kas'] = $this->M_activity->extend_kas($tahun);
        $data['user'] = $this->M_anggota->get_anggota();
        $data['bulan'] = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_bend');
        $this->load->view('component/navbar');
        $this->load->view('kas_biasa', $data);
        $this->load->view('component/footer');
    }
    public function select_tahun(){
        $tahun = $this->input->post('tahun');
        redirect(base_url('Bendahara/kas/'.$tahun));
    }
    public function tambah(){
        $data['title'] = 'Tambah data keuangan';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_bend');
        $this->load->view('component/navbar');
        $this->load->view('form_bend');
        $this->load->view('component/footer');
    }
    public function tambah_kas(){
        $data['user'] = $this->M_anggota->get_anggota();
        $data['kas'] = $this->M_activity->extend_kas(date('Y'));
        $data['bulan'] = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $data['title'] = 'Bendahara';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_bend');
        $this->load->view('component/navbar');
        $this->load->view('form_kas', $data);
        $this->load->view('component/footer');
    }
    public function tambah_data(){
        $status = $this->M_activity->masuk();
        if ($status){
            $this->buat_notif('Data berhasil ditambahkan', 'success');
            redirect(base_url('Bendahara'));
        }else{
            $this->buat_notif('Data gagal ditambahkan', 'danger');
            redirect(base_url('Bendahara'));
        }
    }
    public function tambah_data_kas(){
        $status = $this->M_activity->masuk_kas();
        if ($status){
            $this->buat_notif('Data berhasil ditambahkan', 'success');
            redirect(base_url('Bendahara/kas/'.date('Y')));
        }else{
            $this->buat_notif('Data gagal ditambahkan', 'danger');
            redirect(base_url('Bendahara/kas/'.date('Y')));
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('M_logs');
        $this->load->model('M_activity');
        $this->load->model('M_laporan');
    }
    private function buat_notif($message, $warna){
		$this->session->set_flashdata('alert','
		<div class="alert alert-'.$warna.' alert-dismissable fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i> '.$message.'
			<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
		</div>');
	}
    public function index(){
        $data['pem_bulanan'] = $this->M_activity->get_total_pp_by_tanggal('masuk',date('Y-m'));
        $data['pem_harian'] = $this->M_activity->get_total_pp_by_tanggal('masuk',date('Y-m-d'));
        $data['pem_total'] = $this->M_activity->get_total_pp('masuk');
        $data['pen_bulanan'] = $this->M_activity->get_total_pp_by_tanggal('keluar',date('Y-m'));
        $data['pen_harian'] = $this->M_activity->get_total_pp_by_tanggal('keluar',date('Y-m-d'));
        $data['pen_total'] = $this->M_activity->get_total_pp('keluar');
        $data['saldo'] = $this->M_activity->get_saldo();
        $data['notulensi'] = $this->M_laporan->get_last();
        $this->load->view('login', $data);
    }
    public function log_in(){
        $this->load->model('M_anggota');
        if($this->input->post('jabatan') != null){
            $cek = $this->M_anggota->get_anggota_by_id($this->input->post('jabatan'));
            $this->session->set_userdata('role', $cek->jabatan);
            $this->session->set_userdata('id', $cek->id_anggota);
            $this->session->set_userdata('nama', $cek->nama);
            $this->M_logs->insert_log('Log in');
            $this->roler($cek->jabatan);
        }
        $user = $this->input->post('email');
        $pass = $this->input->post('password');
        $cek = $this->M_anggota->getwu_anggota($user);
        if($cek){
            $fer = password_verify($pass, $cek->password);
            if($fer){
                $this->session->set_userdata('role', $cek->jabatan);
                $this->session->set_userdata('id', $cek->id_anggota);
                $this->session->set_userdata('nama', $cek->nama);
                $this->M_logs->insert_log('Log in');
                $this->roler($cek->jabatan);
            }else{
                $this->session->set_flashdata('email_val', $user);
                $this->session->set_flashdata('password', 'Password Salah!');
                $this->buat_notif('Password salah!', 'danger');
                redirect(base_url());
            }
        }else{
            $this->session->set_flashdata('email_val', $user);
            $this->session->set_flashdata('email', 'Email Tidak Terdaftar!');
            $this->buat_notif('Email tidak terdaftar!', 'danger');
            redirect(base_url());
        }
    }
    public function log_out(){
        $this->M_logs->insert_log('Log out');
        $user = array('role', 'id');
        $this->session->unset_userdata($user);
        $this->session->sess_destroy();
        redirect(base_url());
    }
    private function roler($role){
        if($role == 'ketua'){
            redirect(base_url('Ketua'));
        }
        else if($role == 'sekertaris'){
            redirect(base_url('Sekertaris'));
        }
        else if($role == 'bendahara'){
            redirect(base_url('Bendahara'));
        }
        else{redirect(base_url());}
    }
}
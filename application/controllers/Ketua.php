<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role') != 'ketua'){
            redirect(base_url());
        }
        $this->load->model('M_anggota');
        $this->load->model('M_logs');
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
        $data['user'] = $this->M_anggota->get_anggota();
        $data['usr'] = 'Ketua';
        $data['title'] = 'Ketua Dashboard';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_ketua');
        $this->load->view('component/navbar');
        $this->load->view('admin', $data);
        $this->load->view('component/footer');
    }
    public function tambah(){
        $data['title'] = 'Tambah anggota';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_ketua');
        $this->load->view('component/navbar');
        $this->load->view('form_user');
        $this->load->view('component/footer');
    }
    public function edit($id){
        $data['user'] = $this->M_anggota->get_anggota_by_id($id);
        $data['title'] = 'Ubah anggota';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_ketua');
        $this->load->view('component/navbar');
        $this->load->view('form_user', $data);
        $this->load->view('component/footer');
    }
    public function delete($id){
        $query = $this->M_anggota->delete($id);
        if($query){
            $this->M_logs->insert_log('menghapus 1 anggota');
            $this->buat_notif('Berhasil menghapus 1 anggota', 'success');
            redirect(site_url('Ketua'));
        }else{
            $this->buat_notif('Gagal menghapus 1 anggota', 'danger');
            redirect(site_url('Ketua'));
        }
    }
    public function logs(){
        $data['logs'] = $this->M_logs->get_logs_and_userdata();
        $data['title'] = 'Log aktivitas anggota';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_ketua');
        $this->load->view('component/navbar');
        $this->load->view('logs', $data);
        $this->load->view('component/footer');
    }
    public function tambah_user(){
        if($this->M_anggota->insert_data_anggota()){
            $this->M_logs->insert_log('menambahkan 1 anggota');
            $this->buat_notif('Berhasil menambahkan 1 anggota', 'success');
            redirect(site_url('Ketua'));
        } else {
            $this->buat_notif('Gagal menambahkan 1 anggota', 'warning');
            redirect(site_url('Ketua'));
        }
    }
    public function update_user(){
        if($this->M_anggota->update_data_anggota()){
            $this->M_logs->insert_log('mengupdate 1 anggota');
            $this->buat_notif('Berhasil mengupdate 1 anggota', 'success');
            redirect(site_url('Ketua'));
        } else {
            $this->buat_notif('Gagal mengupdate 1 anggota', 'warning');
            redirect(site_url('Ketua'));
        }
    }
    public function laporan(){
        $data['laporan'] = $this->M_laporan->get();
        $data['title'] = 'Daftar Notulensi';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_ketua');
        $this->load->view('component/navbar');
        $this->load->view('laporan', $data);
        $this->load->view('component/footer');
    }
    public function lap($id){
        $data['laporan'] = $this->M_laporan->get_by_id($id);
        $data['title'] = 'Notulensi: '.$data['laporan']->judul;
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_ketua');
        $this->load->view('component/navbar');
        $this->load->view('note', $data);
        $this->load->view('component/footer');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekertaris extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role') != 'sekertaris'){
            redirect(base_url());
        }
        $this->load->model('M_laporan');
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

    //Dashboard
    public function index(){
        $data['note'] = $this->M_laporan->get();
        $data['title'] = 'Sekertaris Dashboard';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_sect');
        $this->load->view('component/navbar');
        $this->load->view('sekertaris', $data);
        $this->load->view('component/footer');
    }
    
    //Laporan
    public function tambah(){
        $data['title'] = 'Tambah Notulensi';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_sect');
        $this->load->view('component/navbar');
        $this->load->view('form_sect', $data);
        $this->load->view('component/footer');
    }
    public function edit($id){
        $data['note'] = $this->M_laporan->get_by_id($id);
        $data['title'] = 'Notulensi: '.$data['note']->judul;
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_sect');
        $this->load->view('component/navbar');
        $this->load->view('form_sect', $data);
        $this->load->view('component/footer');
    }

    //Anggota
    public function daftar_anggota(){
        $data['user'] = $this->M_anggota->get_anggota();
        $data['usr'] = 'Sekertaris';
        $data['title'] = 'Daftar Anggota';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_sect');
        $this->load->view('component/navbar');
        $this->load->view('admin', $data);
        $this->load->view('component/footer');
    }
    public function tambah_anggota(){
        $data['title'] = 'Tambah Anggota';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_sect');
        $this->load->view('component/navbar');
        $this->load->view('form_user', $data);
        $this->load->view('component/footer');
    }
    public function edit_anggota($id){
        $data['user'] = $this->M_anggota->get_anggota_by_id($id);
        $data['title'] = 'Ubah Anggota';
        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar_sect');
        $this->load->view('component/navbar');
        $this->load->view('form_user', $data);
        $this->load->view('component/footer');
    }

    //Backend laporan
    public function delete($id){
        $query = $this->M_laporan->delete($id);
        if($query){
            $this->M_logs->insert_log('menghapus 1 notulensi');
            $this->buat_notif('Berhasil menghapus 1 notulensi', 'success');
            redirect(site_url('Sekertaris'));
        }else{
            $this->buat_notif('Gagal menghapus 1 notulensi', 'danger');
            redirect(site_url('Sekertaris'));
        }
    }
    public function tambah_lap(){
        if($this->M_laporan->insert_data_lap()){
            $this->M_logs->insert_log('menambahkan 1 notulensi');
            $this->buat_notif('Berhasil menambahkan 1 notulensi', 'success');
            redirect(site_url('Sekertaris'));
        } else {
            $this->buat_notif('Gagal menambahkan 1 notulensi', 'warning');
            redirect(site_url('Sekertaris'));
        }
    }
    public function update_lap(){
        
        if($this->M_laporan->update_data_lap()){
            $this->M_logs->insert_log('mengupdate 1 notulensi');
            $this->buat_notif('Berhasil mengupdate 1 notulensi', 'success');
            redirect(site_url('Sekertaris'));
        } else {
            $this->buat_notif('Gagal mengupdate 1 notulensi', 'warning');
            redirect(site_url('Sekertaris'));
        }
    }

    //Backend user
    public function tambah_user(){
        if($this->M_anggota->insert_data_anggota()){
            $this->M_logs->insert_log('menambahkan 1 anggota');
            $this->buat_notif('Berhasil menambahkan 1 anggota', 'success');
            redirect(site_url('Sekertaris/daftar_anggota'));
        } else {
            $this->buat_notif('Gagal menambahkan 1 anggota', 'warning');
            redirect(site_url('Sekertaris/daftar_anggota'));
        }
    }
    public function update_user(){
        if($this->M_anggota->update_data_anggota()){
            $this->M_logs->insert_log('mengupdate 1 anggota');
            $this->buat_notif('Berhasil mengupdate 1 anggota', 'success');
            redirect(site_url('Sekertaris/daftar_anggota'));
        } else {
            $this->buat_notif('Gagal mengupdate 1 anggota', 'warning');
            redirect(site_url('Sekertaris/daftar_anggota'));
        }
    }
    public function delete_user($id){
        $query = $this->M_anggota->delete($id);
        if($query){
            $this->M_logs->insert_log('menghapus 1 anggota');
            $this->buat_notif('Berhasil menghapus 1 anggota', 'success');
            redirect(site_url('Sekertaris/daftar_anggota'));
        }else{
            $this->buat_notif('Gagal menghapus 1 anggota', 'danger');
            redirect(site_url('Sekertaris/daftar_anggota'));
        }
    }
}
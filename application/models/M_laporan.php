<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class M_laporan extends CI_Model{

    protected $_table = 'laporan';

    protected $rules1 = [

        [

            'field' => 'judul',

            'label' => 'Judul',

            'rules' => 'required|is_unique[laporan.judul]'

        ]

    ];

    protected $rules2 = [

        [

            'field' => 'judul',

            'label' => 'Judul',

            'rules' => 'required'

        ]

    ];

    protected $default_rules;



    private function validation(){

        $this->form_validation->set_rules($this->default_rules);

        if ($this->form_validation->run() == TRUE){

            $menu = [

                'judul' => $this->input->post('judul'),

                'laporan' => $this->input->post('catatan'),

                'tanggal' => date('Y-m-d')

            ];

            return $menu;

        }

        return FALSE;

    }

    

    public function get(){

        return $this->db->get($this->_table)->result();

    }

    public function get_last(){

        return $this->db->get($this->_table)->last_row();

    }

    public function get_by_id($id){

        return $this->db->get_where($this->_table, array('id_laporan' => $id))->row();

    }

    private function insert_lap($data){

        $this->db->insert($this->_table, $data);

        return TRUE;

    }

    public function delete($id){

        $this->db->delete($this->_table, array('id_laporan' => $id));

        return TRUE;

    }

    public function insert_data_lap(){

        $this->default_rules = $this->rules1;

        $validation_ = $this->validation();

        if ($validation_)

        {

            return $this->insert_lap($validation_);

        } else 

        {

            return FALSE;

        }

    }

    private function update_lap($data){

        $this->db->where('id_laporan',$this->input->post('id'));

        $this->db->update($this->_table, $data);

        return TRUE;

    }

    public function update_data_lap(){

        $this->default_rules = $this->rules2;

        $validation_ = $this->validation();

        if ($validation_)

        {

            return $this->update_lap($validation_);

        } else 

        {

            return FALSE;

        }

    }

}
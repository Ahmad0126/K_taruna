<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class M_anggota extends CI_Model{

    protected $_table = 'anggota';

    protected $rules1 = [

        [

            'field' => 'email',

            'label' => 'Username',

            'rules' => 'min_length[4]|is_unique[anggota.email]|valid_email'

        ], 

        [

            'field' => 'passwordb',

            'label' => 'Password konfirmasi',

            'rules' => 'min_length[4]'

        ], 

        [

            'field' => 'password',

            'label' => 'Password',

            'rules' => 'min_length[4]|matches[passwordb]'

        ], 

        [

            'field' => 'nama',

            'label' => 'Nama',

            'rules' => 'required|min_length[3]'

        ],

        [

            'field' => 'no_hp',

            'label' => 'No HP',

            'rules' => 'is_unique[anggota.no_hp]'

        ],

        [

            'field' => 'jabatan',

            'label' => 'Jabatan',

            'rules' => 'required|in_list[ketua,bendahara,sekertaris,anggota biasa]'

        ]

    ];

    protected $rules2 = [

        [

            'field' => 'email',

            'label' => 'Username',

            'rules' => 'min_length[4]|valid_email'

        ], 

        [

            'field' => 'passwordb',

            'label' => 'Password konfirmasi',

            'rules' => 'min_length[4]'

        ], 

        [

            'field' => 'password',

            'label' => 'Password',

            'rules' => 'min_length[4]|matches[passwordb]'

        ], 

        [

            'field' => 'nama',

            'label' => 'Nama',

            'rules' => 'required|min_length[3]'

        ],

        [

            'field' => 'jabatan',

            'label' => 'Jabatan',

            'rules' => 'required|in_list[ketua,bendahara,sekertaris,anggota biasa]'

        ]

    ];

    protected $default_rules;



    private function validation(){

        $this->form_validation->set_rules($this->default_rules);

        if ($this->form_validation->run() == TRUE){
            $password = null;
            if($this->input->post('password')){ password_hash($this->input->post('password'), PASSWORD_DEFAULT); }
            $user = [

                'email' => $this->input->post('email'),

                'password' => $password,

                'nama' => $this->input->post('nama'),

                'no_hp' => $this->input->post('no_hp'),

                'jabatan' => $this->input->post('jabatan')

            ];

            return $user;

        }

        return FALSE;

    }

    

    public function get_anggota(){

        return $this->db->get($this->_table)->result();

    }

    public function get_anggota_by_id($id){

        return $this->db->get_where($this->_table, array('id_anggota' => $id))->row();

    }

    public function getwu_anggota($user){

        return $this->db->get_where($this->_table, array('email' => $user))->row();

    }

    private function insert_anggota($data){

        $this->db->insert($this->_table, $data);

        return TRUE;

    }

    public function delete($id){

        $this->db->delete($this->_table, array('id_anggota' => $id));

        return TRUE;

    }

    public function insert_data_anggota(){

        $this->default_rules = $this->rules1;

        $validation_user = $this->validation();
        if ($validation_user)

        {

            return $this->insert_anggota($validation_user);

        } else 

        {

            return FALSE;

        }

    }

    private function update_anggota($data){

        $this->db->where('id_anggota',$this->input->post('id'));

        $this->db->update($this->_table, $data);

        return TRUE;

    }

    public function update_data_anggota(){

        $this->default_rules = $this->rules2;

        $validation_user = $this->validation();

        if ($validation_user)

        {

            return $this->update_anggota($validation_user);

        } else 

        {

            return FALSE;

        }

    }

}
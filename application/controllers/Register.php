<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('register');
    }

    public function simpan()
    {
        $this->load->model('User_model');
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

        );

        //insert data via model
        $register = $this->User_model->simpan_register($data);

        //cek apakah data berhasil tersimpan
        if ($register) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

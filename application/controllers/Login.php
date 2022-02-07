<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('login');
    }
    public function cek_login()
    {
        $this->load->model('User_model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //cek login via model
        $cek = $this->User_model->cek_login($username, $password);
        if (!empty($cek)) {

            foreach ($cek as $user) {

                //looping data user
                $session_data = array(
                    'id_user'   => $user->id_user,
                    'username'  => $user->username,
                    'nama_lengkap' => $user->nama_lengkap,
                    'email' => $user->email,
                );
                //buat session berdasarkan user yang login
                $this->session->set_userdata($session_data);
            }

            echo "success";
        } else {

            echo "error";
        }
    }
}

/* End of file Login.php and path \application\controllers\Login.php */

<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Login extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Dbs');
  }

  public function index()
  {
    if ($this->session->userdata('status') == 'admin') {
      redirect(base_url('admin'));
    }
    $this->load->view('login');
  }

  public function register()
  {
    $this->load->view('regis');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url() . "login");
  }
  public function login_act()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
      'username' => $username,
      'password' => $password
    );

    if ($this->Dbs->cek_login("user", $where)->num_rows() > 0) { // cek ke tabel user
      $id_user = $this->Dbs->getUserId($username);

      $data_session = array(
        'username' => $username,
        'status' => 'login'
      );
      $this->session->set_userdata($data_session);
      // var_dump($data_session);die;
      redirect(base_url("admin"));
      echo "berhasil login";
    } else {
      echo "<script type='text/javascript'>alert('Username atau password Salah!!!'); document.location='" . base_url() . "login" . "' </script>";
    }
  }

  function lupa_password()
  {
    $this->load->view('forgotPassword');
  }
}

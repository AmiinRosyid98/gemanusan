<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel'); // Pastikan model di-load
        $this->load->library('session');

        if ($this->session->userdata('logged_in')) {
            redirect('admin'); // Jika tidak ada session, redirect ke login
        }
    }
	public function index()
	{
		$this->load->view('admin/login');
	}

	public function ceklogin(){
		$username = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$user = $this->LoginModel->cek_login($username,$password);
		if($user != false){
			 $session_data = [
                'id_user' => $user->id_user,
                'username' => $user->username,
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($session_data); // Simpan session

			echo json_encode(array(
				"status" => "sukses",
				"msg" => "Login Berhasil!",
			));die;
		} else {
			echo json_encode(array(
				"status" => "gagal",
				"msg" => "Username atau password salah!",
			));die;
		}
	}
}

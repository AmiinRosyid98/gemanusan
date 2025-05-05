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

        // $this->load->library('session');

        // Cek bahasa di session
        $language = $this->session->userdata('site_lang');
        if (!$language) {
            $language = 'indonesian';
        }
        $this->current_lang = $language;

        // Include file multi bahasa
        include(APPPATH.'language/multilang_lang.php');

        // Simpan data bahasa sesuai pilihan
        if (isset($lang[$language])) {
        	$this->lang_data = $lang[$language];
        }
            
    }
	public function index()
	{
		$lang= $this->lang_data;
		$data['lang'] = $lang;
        $data['current_lang'] = $this->current_lang;
		$this->load->view('admin/login',$data);
	}

	public function ceklogin(){
		$lang= $this->lang_data;
		$data['lang'] = $lang;
        $data['current_lang'] = $this->current_lang;

		$username = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$user = $this->LoginModel->cek_login($username,$password);

		if($user != false){

			if($user->status != "1"){
				echo json_encode(array(
					"status" => "gagal",
					"msg" => "$lang[nonactive_account]!",
				));die;
			}
			$session_data = [
                'id_user' => $user->id_user,
                'username' => $user->username,
                'nama' => $user->nama,
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($session_data); // Simpan session

			echo json_encode(array(
				"status" => "sukses",
				"msg" => "$lang[success_login]!",
			));die;
		} else {
			echo json_encode(array(
				"status" => "gagal",
				"msg" => "$lang[error_login_incorrect]!",
			));die;
		}
	}
}

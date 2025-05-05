<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

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
        $this->load->model('UserModel'); // Pastikan model di-load
        $this->load->model('AdminModel'); // Pastikan model di-load
        // $this->load->library('session');

        $this->load->library('session');

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
		$data['title'] = $lang['videos'];
		$keywords = (isset($_GET['keywords'])) ? $_GET['keywords'] : "";
		$data['galeri'] = $this->AdminModel->getGaleri();
		$data['sertifikat'] = $this->AdminModel->getSertifikat();
		$data['slider'] = $this->AdminModel->getSlider();
		$data['produk'] = $this->AdminModel->getProduk("",$keywords);
		$data['profil'] = $this->AdminModel->getProfil();
		$data['video'] = $this->AdminModel->getVideo();


		$this->load->view('include/header',$data);
		$this->load->view('video',$data);
		$this->load->view('include/footer',$data);
	}

	

	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public $current_lang = 'indonesian';
    public $lang_data = array();

	public function __construct() {
        parent::__construct();
        $this->load->model('UserModel'); // Pastikan model di-load
        $this->load->model('AdminModel'); // Pastikan model di-load
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

		$ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");

        $country= $this->getnegara($ip);
	    // var_dump($country);die;
          
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
        $ss = isset($s)?($s):0;
          
         
        // Kalau belum ada, simpan data user tersebut ke database
        if($ss == 0){
        $this->db->query("INSERT INTO visitor(ip, date, hits, online, time, country) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."' ,'".$country."')");
        }
         
        // Jika sudah ada, update
        else{
        	$this->db->query("UPDATE visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
        }

		$lang= $this->lang_data;
	    // die;
		$data['lang'] = $lang;
        $data['current_lang'] = $this->current_lang;
		$data['title'] = $lang['home'];
		$data['galeri'] = $this->AdminModel->getGaleri(9);
		$data['sertifikat'] = $this->AdminModel->getSertifikat();
		$data['slider'] = $this->AdminModel->getSlider();
		$data['produk'] = $this->AdminModel->getProduk(6);
		$data['profil'] = $this->AdminModel->getProfil();
		$data['video'] = $this->AdminModel->getVideo(6);


		$this->load->view('include/header',$data);
		$this->load->view('welcome_message',$data);
		$this->load->view('include/footer',$data);
	}

	public function switchLang() {
		$lang = $_POST['value'];

        $this->session->set_userdata('site_lang', $lang);
        echo json_encode(array(
			"status" => "sukses",
			"msg" => "Ubah Bahasa berhasil!",
		));die;
    }

    private function getnegara($ip)
	{
    	// $ip = $this->input->ip_address(); // dapatkan IP user
	    $json = file_get_contents("http://ip-api.com/json/{$ip}");
	    $data = json_decode($json);

	    if ($data && $data->status == 'success') {
	    	return $data->country;
	        
	    } else {
	        return "";
	    }
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->model('AdminModel'); // Pastikan model di-load
        $this->load->library('session');

        // Cek apakah session ada
        if (!$this->session->userdata('logged_in')) {
            redirect('login'); // Jika tidak ada session, redirect ke login
        }
    }
	public function index()
	{
		$data['title'] = "Dashboard";
		$this->load->view('admin/include/header',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/include/footer');
	}

	public function about()
	{
		$data['title'] = "Tentang Perusahaan";
		$data['profil'] = $this->AdminModel->getProfil();

		$this->load->view('admin/include/header',$data);
		$this->load->view('admin/about',$data);
		$this->load->view('admin/include/footer');
	}

	public function sertifikat()
	{
		$data['title'] = "Sertifikat";
		$data['sertifikat'] = $this->AdminModel->getSertifikat();

		$this->load->view('admin/include/header',$data);
		$this->load->view('admin/sertifikat',$data);
		$this->load->view('admin/include/footer');
	}

	public function updateprofil(){
		$isi = $_POST['isi'];
		$visi = $_POST['visi'];
		$misi = $_POST['misi'];

		$data = array(
			'isi' => $isi,
			'visi' => $visi,
			'misi' => $misi,
		);
		if ($this->AdminModel->updateprofil($data)) {

            $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
            echo json_encode(array(
				"status" => "sukses",
				"msg" => "Data berhasil diperbarui!",
			));die;
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data.');
            echo json_encode(array(
				"status" => "gagal",
				"msg" => "Gagal memperbarui data.",
			));die;
        }
	}
}

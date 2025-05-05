<?php

class MY_Controller extends CI_Controller {

    public $lang_data;
    public $current_lang;

    public function __construct() {
        parent::__construct();

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

    public function render($view, $data = []) {
        $lang = $this->lang_data;
        $data['lang'] = $lang;
        $data['current_lang'] = $this->current_lang;
        $data['title'] = $lang[$data['title']];
        $UserID = $this->session->userdata("id_user");

        $query = $this->db->select("*")
                        ->from("user")
                        ->where('id_user = ',$UserID)->limit(1)->get()->row();
        $data['user'] = $query;

        $this->load->view('admin/include/header',$data);
        $this->load->view($view, $data);
        $this->load->view('admin/include/footer',$data);

    }
}

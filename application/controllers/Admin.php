<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

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

    public function deteksi_negara()
	{
	    $ip = $this->input->ip_address(); // dapatkan IP user
	    $json = file_get_contents("http://ip-api.com/json/{$ip}");
	    $data = json_decode($json);

	    if ($data && $data->status == 'success') {
	        echo "Negara: " . $data->country . "<br>";
	        echo "Kota: " . $data->city . "<br>";
	        echo "ISP: " . $data->isp . "<br>";
	        echo "IP: " . $ip . "<br>";
	    } else {
	        echo "Gagal mendeteksi lokasi.";
	    }
	}

	public function generatenegara()
	{
	    // Ambil semua IP dari tabel visitor
	    $query = $this->db->select("ip")
	                      ->from("visitor")
	                      ->where("country is null")
	                      ->order_by("date","DESC")
	                      ->get();

	    foreach ($query->result() as $row) {
	        $ip = $row->ip;

	        // Ambil data lokasi dari ip-api.com
	        $json = @file_get_contents("http://ip-api.com/json/{$ip}");
	        $geo = json_decode($json);

	        if ($geo && $geo->status == 'success') {
	            // Update kolom country di database
	            $this->db->where('ip', $row->ip)
	                     ->update('visitor', ['country' => $geo->country]);

	            // Optional: log hasilnya
	            echo "IP: {$ip} - Negara: {$geo->country} ✅<br>";
	        } else {
	            echo "IP: {$ip} - Gagal deteksi lokasi ❌<br>";
	        }

	        // (Optional) delay agar tidak melebihi rate limit API
	        sleep(1); // jeda 1 detik per request
	    }
	}


    public function getVisitor(){

    	$warnaArray = [
              "255, 99, 132",
              "54, 162, 235",
              "255, 206, 86",
              "75, 192, 192",
              "153, 102, 255",
              "255, 159, 64",
              "231, 76, 60",
              "46, 204, 113",
              "52, 152, 219",
              "155, 89, 182",
              "241, 196, 15",
              "230, 126, 34",
              "26, 188, 156",
              "52, 73, 94",
              "192, 57, 43",
              "243, 156, 18",
              "22, 160, 133",
              "127, 140, 141",
              "39, 174, 96",
              "142, 68, 173",
              "44, 62, 80",
              "241, 148, 138",
              "84, 153, 199",
              "245, 176, 65",
              "169, 204, 227",
              "82, 190, 128",
              "236, 112, 99",
              "205, 97, 85",
              "133, 193, 233",
              "163, 228, 215",
              "174, 214, 241",
              "250, 219, 216",
              "255, 195, 113",
              "120, 111, 166",
              "255, 87, 34",
              "96, 125, 139",
              "0, 150, 136",
              "124, 179, 66",
              "100, 181, 246",
              "255, 171, 145",
              "149, 117, 205",
              "77, 182, 172",
              "174, 213, 129",
              "129, 212, 250",
              "255, 138, 101",
              "186, 104, 200",
              "38, 166, 154",
              "156, 204, 101",
              "79, 195, 247",
              "255, 112, 67",
              "171, 71, 188",
              "0, 150, 136",
              "255, 87, 34",
              "158, 158, 158",
              "33, 150, 243",
              "76, 175, 80",
              "244, 67, 54",
              "3, 169, 244",
              "255, 235, 59",
              "63, 81, 181",
              "255, 193, 7",
              "156, 39, 176",
              "139, 195, 74",
              "0, 188, 212",
              "121, 85, 72",
              "205, 220, 57",
              "233, 30, 99",
              "103, 58, 183",
              "0, 188, 212",
              "96, 125, 139",
              "255, 87, 34",
              "76, 175, 80",
              "255, 152, 0",
              "33, 150, 243",
              "139, 195, 74",
              "244, 67, 54",
              "156, 39, 176",
              "255, 235, 59",
              "0, 150, 136",
              "121, 85, 72",
              "100, 181, 246",
              "124, 179, 66",
              "255, 171, 145",
              "38, 166, 154",
              "255, 138, 101",
              "149, 117, 205",
              "255, 112, 67",
              "79, 195, 247",
              "156, 204, 101",
              "186, 104, 200",
              "174, 213, 129",
              "171, 71, 188",
              "129, 212, 250",
              "0, 188, 212",
              "255, 152, 0",
              "158, 158, 158",
              "33, 150, 243",
              "76, 175, 80",
              "244, 67, 54",
              "255, 193, 7",
              "3, 169, 244",
              "255, 235, 59"
            ];

    	$lang = $this->lang_data;
    	$value = $_POST['value'];
    	if($value == "week"){
    		$query = "
				SELECT 
				    CASE DAYOFWEEK(tanggal)
				        WHEN 1 THEN '".$lang['sunday']."'
				        WHEN 2 THEN '".$lang['monday']."'
				        WHEN 3 THEN '".$lang['tuesday']."'
				        WHEN 4 THEN '".$lang['wednesday']."'
				        WHEN 5 THEN '".$lang['thursday']."'
				        WHEN 6 THEN '".$lang['friday']."'
				        WHEN 7 THEN '".$lang['saturday']."'
				    END AS hari,
				    tanggal AS date,
				    COUNT(DISTINCT v.ip) AS total_visitor,
				    COALESCE(SUM(v.hits), 0) AS total_hits
				FROM (
				    SELECT CURDATE() AS tanggal
				    UNION ALL SELECT CURDATE() - INTERVAL 1 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 2 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 3 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 4 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 5 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 6 DAY
				) AS kalender
				LEFT JOIN visitor v ON v.date = kalender.tanggal
				GROUP BY tanggal
				ORDER BY tanggal ASC
			";
			$query_country = "
				SELECT 
				    CASE DAYOFWEEK(tanggal)
				        WHEN 1 THEN '".$lang['sunday']."'
				        WHEN 2 THEN '".$lang['monday']."'
				        WHEN 3 THEN '".$lang['tuesday']."'
				        WHEN 4 THEN '".$lang['wednesday']."'
				        WHEN 5 THEN '".$lang['thursday']."'
				        WHEN 6 THEN '".$lang['friday']."'
				        WHEN 7 THEN '".$lang['saturday']."'
				    END AS hari,
				    tanggal AS date,
				    country,
				    COUNT(DISTINCT v.ip) AS total_visitor,
				    COALESCE(SUM(v.hits), 0) AS total_hits
				FROM (
				    SELECT CURDATE() AS tanggal
				    UNION ALL SELECT CURDATE() - INTERVAL 1 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 2 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 3 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 4 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 5 DAY
				    UNION ALL SELECT CURDATE() - INTERVAL 6 DAY
				) AS kalender
				LEFT JOIN visitor v ON v.date = kalender.tanggal
				GROUP BY country
				ORDER BY country ASC
			";
    	} else if ($value == "month"){
    		$query = "
				SELECT 
				    CASE DAYOFWEEK(tanggal)
				        WHEN 1 THEN 'Minggu'
				        WHEN 2 THEN 'Senin'
				        WHEN 3 THEN 'Selasa'
				        WHEN 4 THEN 'Rabu'
				        WHEN 5 THEN 'Kamis'
				        WHEN 6 THEN 'Jumat'
				        WHEN 7 THEN 'Sabtu'
				    END AS hari,
				    tanggal AS date,
				    COUNT(DISTINCT v.ip) AS total_visitor,
				    COALESCE(SUM(v.hits), 0) AS total_hits
				FROM (
				    SELECT DATE_SUB(CURDATE(), INTERVAL n DAY) AS tanggal
				    FROM (
				        SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
				        UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
				        UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14
				        UNION ALL SELECT 15 UNION ALL SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19
				        UNION ALL SELECT 20 UNION ALL SELECT 21 UNION ALL SELECT 22 UNION ALL SELECT 23 UNION ALL SELECT 24
				        UNION ALL SELECT 25 UNION ALL SELECT 26 UNION ALL SELECT 27 UNION ALL SELECT 28 UNION ALL SELECT 29
				    ) AS angka
				) AS kalender
				LEFT JOIN visitor v ON v.date = kalender.tanggal
				GROUP BY tanggal
				ORDER BY tanggal ASC;
			";

			$query_country = "
				SELECT 
				    CASE DAYOFWEEK(tanggal)
				        WHEN 1 THEN 'Minggu'
				        WHEN 2 THEN 'Senin'
				        WHEN 3 THEN 'Selasa'
				        WHEN 4 THEN 'Rabu'
				        WHEN 5 THEN 'Kamis'
				        WHEN 6 THEN 'Jumat'
				        WHEN 7 THEN 'Sabtu'
				    END AS hari,
				    tanggal AS date,
				    country,
				    COUNT(DISTINCT v.ip) AS total_visitor,
				    COALESCE(SUM(v.hits), 0) AS total_hits
				FROM (
				    SELECT DATE_SUB(CURDATE(), INTERVAL n DAY) AS tanggal
				    FROM (
				        SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
				        UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
				        UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14
				        UNION ALL SELECT 15 UNION ALL SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19
				        UNION ALL SELECT 20 UNION ALL SELECT 21 UNION ALL SELECT 22 UNION ALL SELECT 23 UNION ALL SELECT 24
				        UNION ALL SELECT 25 UNION ALL SELECT 26 UNION ALL SELECT 27 UNION ALL SELECT 28 UNION ALL SELECT 29
				    ) AS angka
				) AS kalender
				LEFT JOIN visitor v ON v.date = kalender.tanggal
				GROUP BY country
				ORDER BY country ASC;
			";

    	} else if ($value == "year"){
    		$query = "
    			SELECT 
				    CASE MONTH(tanggal)
				        WHEN 1 THEN '".$lang['january']."'
				        WHEN 2 THEN '".$lang['february']."'
				        WHEN 3 THEN '".$lang['march']."'
				        WHEN 4 THEN '".$lang['april']."'
				        WHEN 5 THEN '".$lang['may']."'
				        WHEN 6 THEN '".$lang['june']."'
				        WHEN 7 THEN '".$lang['july']."'
				        WHEN 8 THEN '".$lang['august']."'
				        WHEN 9 THEN '".$lang['september']."'
				        WHEN 10 THEN '".$lang['october']."'
				        WHEN 11 THEN '".$lang['november']."'
				        WHEN 12 THEN '".$lang['december']."'
				    END AS nama_bulan,
				    DATE_FORMAT(tanggal, '%Y-%m') AS bulan, -- bisa dipakai untuk urutan
				    DATE_FORMAT(tanggal, '%Y') AS tahun, -- bisa dipakai untuk urutan
				    COUNT(DISTINCT v.ip) AS total_visitor,
				    COALESCE(SUM(v.hits), 0) AS total_hits
				FROM (
				    SELECT LAST_DAY(CURDATE()) - INTERVAL (n) MONTH AS tanggal
				    FROM (
				        SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
				        UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
				        UNION ALL SELECT 10 UNION ALL SELECT 11
				    ) AS angka
				) AS kalender
				LEFT JOIN visitor v ON DATE_FORMAT(v.date, '%Y-%m') = DATE_FORMAT(kalender.tanggal, '%Y-%m')
				GROUP BY bulan
				ORDER BY bulan ASC

    		";

    		$query_country = "
    			SELECT 
    				country,
				    CASE MONTH(tanggal)
				        WHEN 1 THEN '".$lang['january']."'
				        WHEN 2 THEN '".$lang['february']."'
				        WHEN 3 THEN '".$lang['march']."'
				        WHEN 4 THEN '".$lang['april']."'
				        WHEN 5 THEN '".$lang['may']."'
				        WHEN 6 THEN '".$lang['june']."'
				        WHEN 7 THEN '".$lang['july']."'
				        WHEN 8 THEN '".$lang['august']."'
				        WHEN 9 THEN '".$lang['september']."'
				        WHEN 10 THEN '".$lang['october']."'
				        WHEN 11 THEN '".$lang['november']."'
				        WHEN 12 THEN '".$lang['december']."'
				    END AS nama_bulan,
				    DATE_FORMAT(tanggal, '%Y-%m') AS bulan, -- bisa dipakai untuk urutan
				    DATE_FORMAT(tanggal, '%Y') AS tahun, -- bisa dipakai untuk urutan
				    COUNT(DISTINCT v.ip) AS total_visitor,
				    COALESCE(SUM(v.hits), 0) AS total_hits
				FROM (
				    SELECT LAST_DAY(CURDATE()) - INTERVAL (n) MONTH AS tanggal
				    FROM (
				        SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
				        UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
				        UNION ALL SELECT 10 UNION ALL SELECT 11
				    ) AS angka
				) AS kalender
				LEFT JOIN visitor v ON DATE_FORMAT(v.date, '%Y-%m') = DATE_FORMAT(kalender.tanggal, '%Y-%m')
				GROUP BY country
				ORDER BY country ASC

    		";
    	}

    	$data = $this->db->query($query)->result();
    	$data_country = $this->db->query($query_country)->result();
    	$hitung_data_country = $this->db->query($query_country)->num_rows();

    	$labels = [];
		$values = [];
    	foreach ($data as $key) {
    		if($value == "week"){
				$labels[] = $key->hari; // atau bisa pakai $key->date untuk format tanggal
			} else if($value == "month"){
				$labels[] = $this->ubahFormatTanggal($key->date); // atau bisa pakai $key->date untuk format tanggal
    		} else {
				$labels[] = $key->nama_bulan . " ".$key->tahun; // atau bisa pakai $key->date untuk format tanggal

    		}

    		$values[] = (int)$key->total_hits;
    	}

    	$result = [
		    'labels' => $labels,
		    'values' => $values
		];

    	$labels_country = [];
		$values_country = [];
		$backgroundColor = [];
		$borderColor = [];
    	foreach ($data_country as $key) {
    		if($value == "week"){
				$labels_country[] = $key->country != "" ? $key->country : $lang['unknown']; // atau bisa pakai $key->date untuk format tanggal
			} else if($value == "month"){
				$labels_country[] = $key->country != "" ? $key->country : $lang['unknown']; // atau bisa pakai $key->date untuk format tanggal
    		} else {
				$labels_country[] = $key->country != "" ? $key->country : $lang['unknown']; // atau bisa pakai $key->date untuk format tanggal

    		}

    		$values_country[] = (int)$key->total_hits;
    	}
    	// var_dump($this->db->query($query_country)->num_rows());die;
    	for ($i=0; $i < ($hitung_data_country) ; $i++) { 
    		$backgroundColor[] = 'rgba('.$warnaArray[$i].',0.7)';
			$borderColor[] = 'rgba('.$warnaArray[$i].',1)';
    	}

    	$result_country = [
		    'labels' => $labels_country,
		    'values' => $values_country,
		    'backgroundColor' => $backgroundColor,
		    'borderColor' => $borderColor,
		];

		$array= [
			'personal' => $result,
			'country' => $result_country,
		];

		header('Content-Type: application/json');
		echo json_encode($array);
		die;
    }

	public function index()
	{
    	$lang = $this->lang_data;
		
		$data['title'] = "dashboard";
		$query = "
			SELECT 
			    CASE DAYOFWEEK(tanggal)
			        WHEN 1 THEN '".$lang['sunday']."'
			        WHEN 2 THEN '".$lang['monday']."'
			        WHEN 3 THEN '".$lang['tuesday']."'
			        WHEN 4 THEN '".$lang['wednesday']."'
			        WHEN 5 THEN '".$lang['thursday']."'
			        WHEN 6 THEN '".$lang['friday']."'
			        WHEN 7 THEN '".$lang['saturday']."'
			    END AS hari,
			    tanggal AS date,
			    COUNT(DISTINCT v.ip) AS total_visitor,
			    COALESCE(SUM(v.hits), 0) AS total_hits
			FROM (
			    SELECT CURDATE() AS tanggal
			    UNION ALL SELECT CURDATE() - INTERVAL 1 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 2 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 3 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 4 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 5 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 6 DAY
			) AS kalender
			LEFT JOIN visitor v ON v.date = kalender.tanggal
			GROUP BY tanggal
			ORDER BY tanggal ASC
		";

		$query_country = "
			SELECT 
			    CASE DAYOFWEEK(tanggal)
			        WHEN 1 THEN '".$lang['sunday']."'
			        WHEN 2 THEN '".$lang['monday']."'
			        WHEN 3 THEN '".$lang['tuesday']."'
			        WHEN 4 THEN '".$lang['wednesday']."'
			        WHEN 5 THEN '".$lang['thursday']."'
			        WHEN 6 THEN '".$lang['friday']."'
			        WHEN 7 THEN '".$lang['saturday']."'
			    END AS hari,
			    tanggal AS date,
			    country,
			    COUNT(DISTINCT v.ip) AS total_visitor,
			    COALESCE(SUM(v.hits), 0) AS total_hits
			FROM (
			    SELECT CURDATE() AS tanggal
			    UNION ALL SELECT CURDATE() - INTERVAL 1 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 2 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 3 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 4 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 5 DAY
			    UNION ALL SELECT CURDATE() - INTERVAL 6 DAY
			) AS kalender
			LEFT JOIN visitor v ON v.date = kalender.tanggal
			GROUP BY country
			ORDER BY country ASC
		";

		// 1 bulan terakhir

		

		$data['visitor'] = $this->db->query($query)->result();
		$data['visitor_country'] = $this->db->query($query_country)->result();

		$data['jum_produk'] = $this->AdminModel->getProduk("","","hitung");
		$data['jum_kategori'] = $this->AdminModel->getKategori("hitung");
		$data['jum_galeri'] = $this->AdminModel->getGaleri("","","hitung");
		$data['jum_video'] = $this->AdminModel->getVideo("","","hitung");
		$this->render('admin/index',$data);
		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/include/footer');*/
	}


	private function ubahFormatTanggal($tanggal)
	{
    	$lang = $this->lang_data;
	    $bulan = [
	        1 => $lang['january'], $lang['february'], $lang['march'], $lang['april'], $lang['may'], $lang['june'],
	        $lang['july'], $lang['august'], $lang['september'], $lang['october'], $lang['november'], $lang['december']
	    ];

	    $pecah = explode('-', $tanggal);
	    $tahun = $pecah[0];
	    $bulanAngka = (int)$pecah[1];
	    $hari = $pecah[2];

	    return $hari . ' ' . $bulan[$bulanAngka] . ' ' . $tahun;
	}

	public function about()
	{
		$data['title'] = "about_company";
		$data['profil'] = $this->AdminModel->getProfil();
		$this->render('admin/about',$data);

		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/about',$data);
		$this->load->view('admin/include/footer');*/
	}

	public function sertifikat()
	{
		$data['title'] = "certificate";
		$data['sertifikat'] = $this->AdminModel->getSertifikat();
		$this->render('admin/sertifikat',$data);

		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/sertifikat',$data);
		$this->load->view('admin/include/footer');*/
	}

	public function kategori()
	{
		$data['title'] = "category";
		$data['kategori'] = $this->AdminModel->getKategori();
		$this->render('admin/kategori',$data);

		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/kategori',$data);
		$this->load->view('admin/include/footer');*/
	}
	public function usersetting()
	{
		$data['title'] = "user_setting";
		$data['usernya'] = $this->AdminModel->getUser();
		// echo "<pre>";
		// var_dump($data['user']);die;
		$this->render('admin/usersetting',$data);
	}

	public function video()
	{
		$data['title'] = "videos";
		$data['video'] = $this->AdminModel->getVideo();

		$this->render('admin/video',$data);

		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/video',$data);
		$this->load->view('admin/include/footer');*/
	}


	public function galeri()
	{
		$data['title'] = "gallery";
		$data['galeri'] = $this->AdminModel->getGaleri();

		$this->render('admin/galeri',$data);

		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/galeri',$data);
		$this->load->view('admin/include/footer');*/
	}

	public function slider()
	{
		$data['title'] = "slider";
		$data['slider'] = $this->AdminModel->getSlider();

		$this->render('admin/slider',$data);

		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/slider',$data);
		$this->load->view('admin/include/footer');*/
	}

	public function updateprofil(){
		$isi = $_POST['isi'];
		$visi = $_POST['visi'];
		$misi = $_POST['misi'];

		$isi_en = $_POST['isi_en'];
		$visi_en = $_POST['visi_en'];
		$misi_en = $_POST['misi_en'];

		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$facebook = $_POST['facebook'];
		$twitter = $_POST['twitter'];
		$instagram = $_POST['instagram'];
		$linkedin = $_POST['linkedin'];
		$embed_maps = $_POST['embed_maps'];
		$namaperusahaan = $_POST['namaperusahaan'];

		$data = array(
			'isi' => $isi,
			'visi' => $visi,
			'misi' => $misi,

			'isi_en' => $isi_en,
			'visi_en' => $visi_en,
			'misi_en' => $misi_en,

			'email' => $email,
			'telp' => $telp,
			'alamat' => $alamat,
			'facebook' => $facebook,
			'twitter' => $twitter,
			'instagram' => $instagram,
			'linkedin' => $linkedin,
			'embed_maps' => $embed_maps,
			'namaperusahaan' => $namaperusahaan,
		);

		$config['upload_path']   = FCPATH .'assets/upload/'; // Pastikan folder ini sudah ada
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
        $config['max_size']      = 4048; // Maksimal 2MB
        // $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

        $this->load->library('upload', $config); // Load library upload
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
	        if (!$this->upload->do_upload('gambar')) {
	        }else{
	        	$fileData = $this->upload->data(); // Ambil informasi file yang diupload
	        	$data['gambar'] = $fileData['file_name'];
	        }
	    }

        if (isset($_FILES['gambardua']) && $_FILES['gambardua']['error'] === UPLOAD_ERR_OK) {

	        if (!$this->upload->do_upload('gambardua')) {
	        }else{
	        	$fileData2 = $this->upload->data(); // Ambil informasi file yang diupload
	        	$data['gambardua'] = $fileData2['file_name'];

	        }
	    }


		
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

	public function dosavesertifikat() {
        // Ambil input nama
        $name = $this->input->post('namasertifikat');
        $name_en = $this->input->post('namasertifikat_en');

        // Konfigurasi upload
        $config['upload_path']   = FCPATH .'assets/upload_sertifikat/'; // Pastikan folder ini sudah ada
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
        $config['max_size']      = 4048; // Maksimal 2MB
        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

        $this->load->library('upload', $config); // Load library upload

        if (!$this->upload->do_upload('file')) {
            // Jika gagal upload
            echo json_encode(array(
				"status" => "gagal",
				"msg" => $this->upload->display_errors(),
			));die;
            
        } else {
            // Jika berhasil upload
            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

            $data = array(
            	"nama" => htmlspecialchars($name),
            	"nama_en" => htmlspecialchars($name_en),
            	"gambar" => $fileData['file_name'],
            	"user_id" => $_SESSION['id_user'],
            	"user" => $_SESSION['nama'],
            );
            if ($this->AdminModel->insertsertifikat($data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil tambah sertifikat');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah Sertifikat",
				));die;
            }
            // $this->AdminModel->insertsertifikat($data);
        }
    }

    public function dosaveproduk() {
        // Ambil input nama
        $name = $this->input->post('namaproduk');
        $name_en = $this->input->post('namaproduk_en');
        $id_kategori = $this->input->post('kategori');
        $spesifikasi = $this->input->post('spesifikasi');
        $spesifikasi_en = $this->input->post('spesifikasi_en');
        $ket = $this->input->post('ket');
        $ket_en = $this->input->post('ket_en');

        // Konfigurasi upload
        $config['upload_path']   = FCPATH .'assets/upload/'; // Pastikan folder ini sudah ada
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
        $config['max_size']      = 4048; // Maksimal 2MB
        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

        $this->load->library('upload', $config); // Load library upload

        if (!$this->upload->do_upload('file')) {
            // Jika gagal upload
            echo json_encode(array(
				"status" => "gagal",
				"msg" => $this->upload->display_errors(),
			));die;
            
        } else {
            // Jika berhasil upload
            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

            $data = array(
            	"id_kategori" => htmlspecialchars($id_kategori),
            	"namaproduk" => htmlspecialchars($name),
            	"namaproduk_en" => htmlspecialchars($name_en),
            	"spesifikasi" => ($spesifikasi),
            	"spesifikasi_en" => ($spesifikasi_en),
            	"keterangan" => ($ket),
            	"keterangan_en" => ($ket_en),
            	"gambar_prd" => $fileData['file_name'],
            	"user_id" => $_SESSION['id_user'],
            	"user" => $_SESSION['nama'],
            );
            if ($this->AdminModel->insertproduk($data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil tambah produk');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah produk",
				));die;
            }
            // $this->AdminModel->insertproduk($data);
        }
    }

    public function doeditproduk() {
        // Ambil input nama
        $id_produk = $this->input->post('id_produk');
        $name = $this->input->post('namaproduk');
        $name_en = $this->input->post('namaproduk_en');
        $id_kategori = $this->input->post('kategori');
        $spesifikasi = $this->input->post('spesifikasi');
        $spesifikasi_en = $this->input->post('spesifikasi_en');
        $ket = $this->input->post('ket');
        $ket_en = $this->input->post('ket_en');

        // Konfigurasi upload
        // var_dump($_FILES['file']);die;
        if(isset($_FILES['file']) ){
	        $config['upload_path']   = FCPATH .'assets/upload/'; // Pastikan folder ini sudah ada
	        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
	        $config['max_size']      = 4048; // Maksimal 2MB
	        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

	        $this->load->library('upload', $config); // Load library upload
	    

	        if (!$this->upload->do_upload('file')) {
	            // Jika gagal upload
	            echo json_encode(array(
					"status" => "gagal",
					"msg" => $this->upload->display_errors(),
				));die;
	            
	        } else {
	            // Jika berhasil upload
	            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

	            $data = array(

	            	"id_kategori" => htmlspecialchars($id_kategori),
	            	"namaproduk" => htmlspecialchars($name),
	            	"namaproduk_en" => htmlspecialchars($name_en),
	            	"spesifikasi" => ($spesifikasi),
	            	"spesifikasi_en" => ($spesifikasi_en),
	            	"keterangan" => ($ket),
	            	"keterangan_en" => ($ket_en),
	            	"gambar_prd" => $fileData['file_name'],
	            );
	            if ($this->AdminModel->updateproduk($id_produk,$data)) {
	            	$this->session->set_flashdata('success', 'Anda berhasil Edit produk');
	            	echo json_encode(array(
						"status" => "sukses",
						"msg" => "Data berhasil diperbarui!",
					));die;
	            } else{

	            	echo json_encode(array(
						"status" => "gagal",
						"msg" => "Gagal Tambah produk",
					));die;
	            }
	            // $this->AdminModel->insertproduk($data);
	        }
	    } else {
	    	$data = array(
            	"id_kategori" => htmlspecialchars($id_kategori),
            	"namaproduk" => htmlspecialchars($name),
            	"namaproduk_en" => htmlspecialchars($name_en),
            	"spesifikasi" => ($spesifikasi),
            	"spesifikasi_en" => ($spesifikasi_en),
            	"keterangan" => ($ket),
            	"keterangan_en" => ($ket_en),
            );
            if ($this->AdminModel->updateproduk($id_produk,$data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil Edit produk');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah produk",
				));die;
            }
	    }
    }

    public function dosavekategori() {
        // Ambil input nama
        $name = $this->input->post('namakategori');
        $name_en = $this->input->post('namakategori_en');
        $deskripsi = $this->input->post('deskripsikategori');
        $deskripsi_en = $this->input->post('deskripsikategori_en');

        // Konfigurasi upload
        $config['upload_path']   = FCPATH .'assets/upload_kategori/'; // Pastikan folder ini sudah ada
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
        $config['max_size']      = 4048; // Maksimal 2MB
        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

        $this->load->library('upload', $config); // Load library upload

        if (!$this->upload->do_upload('file')) {
            // Jika gagal upload
            echo json_encode(array(
				"status" => "gagal",
				"msg" => $this->upload->display_errors(),
			));die;
            
        } else {
            // Jika berhasil upload
            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

            $data = array(
            	"namakategori" => htmlspecialchars($name),
            	"namakategori_en" => htmlspecialchars($name_en),
            	"ket" => htmlspecialchars($deskripsi),
            	"ket_en" => htmlspecialchars($deskripsi_en),

            	"gambar" => $fileData['file_name'],
            	"user_id" => $_SESSION['id_user'],
            	"user" => $_SESSION['nama'],
            );
            if ($this->AdminModel->insertkategori($data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil tambah kategori');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah kategori",
				));die;
            }
            // $this->AdminModel->insertsertifikat($data);
        }
    }

    public function dosaveuser() {
        // Ambil input nama
        $name = $this->input->post('namauser');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $status = $this->input->post('status') == "aktif" ? "1" : "0";
        
        $data = array(
        	"nama" => htmlspecialchars($name),
        	"username" => htmlspecialchars($username),
        	"password" => md5($password),
        	"status" => htmlspecialchars($status),

        	"role_id" => 1,
        	"ParentID" => $this->session->userdata("id_user"),
        	
        );
        if ($this->AdminModel->insertuser($data)) {
        	$this->session->set_flashdata('success', 'Anda berhasil tambah user');
        	echo json_encode(array(
				"status" => "sukses",
				"msg" => "Data berhasil diperbarui!",
			));die;
        } else{

        	echo json_encode(array(
				"status" => "gagal",
				"msg" => "Gagal Tambah user",
			));die;
        }
    }

    public function doedituser() {
        // Ambil input nama
        $name = $this->input->post('namauser');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $status = $this->input->post('status') == "aktif" ? "1" : "0";
        $id_user = $this->input->post('id_user');
        $ubah = $this->input->post('ubah');

        // var_dump($_POST);die;
        

        if($ubah != "no"){
		    $data = array(
		    	"nama" => htmlspecialchars($name),
		    	"username" => htmlspecialchars($username),
		    	"status" => htmlspecialchars($status),
		    	"password" => md5($password),


		    );
        } else {
        	$data = array(
		    	"nama" => htmlspecialchars($name),
		    	"username" => htmlspecialchars($username),
		    	"status" => htmlspecialchars($status),

		    );
        }
        if ($this->AdminModel->updateuser($id_user,$data)) {
        	$this->session->set_flashdata('success', 'Anda berhasil tambah user');
        	echo json_encode(array(
				"status" => "sukses",
				"msg" => "Data berhasil diperbarui!",
			));die;
        } else{

        	echo json_encode(array(
				"status" => "gagal",
				"msg" => "Gagal Tambah user",
			));die;
        }
    }

    public function dosavevideo() {
        // Ambil input nama
        $name = $this->input->post('namavideo');
        $deskripsi = $this->input->post('deskripsivideo');
        $name_en = $this->input->post('namavideo_en');
        $deskripsi_en = $this->input->post('deskripsivideo_en');
        $link = $this->input->post('linkvideo');

        $data = array(
        	"namavideo" => htmlspecialchars($name),
        	"ket" => htmlspecialchars($deskripsi),
        	"namavideo_en" => htmlspecialchars($name_en),
        	"ket_en" => htmlspecialchars($deskripsi_en),
        	"link" => $link,
        	"user_id" => $_SESSION['id_user'],
        	"user" => $_SESSION['nama'],
        );
        if ($this->AdminModel->insertvideo($data)) {
        	$this->session->set_flashdata('success', 'Anda berhasil tambah video');
        	echo json_encode(array(
				"status" => "sukses",
				"msg" => "Data berhasil diperbarui!",
			));die;
        } else{

        	echo json_encode(array(
				"status" => "gagal",
				"msg" => "Gagal Tambah video",
			));die;
        }
    }

    public function doeditvideo() {
        // Ambil input nama
        $id_video = $this->input->post('id_video');
        $name = $this->input->post('namavideo');
        $deskripsi = $this->input->post('deskripsivideo');
        $name_en = $this->input->post('namavideo_en');
        $deskripsi_en = $this->input->post('deskripsivideo_en');
        $link = $this->input->post('linkvideo');

        $data = array(
        	"namavideo" => htmlspecialchars($name),
        	"ket" => htmlspecialchars($deskripsi),
        	"namavideo_en" => htmlspecialchars($name_en),
        	"ket_en" => htmlspecialchars($deskripsi_en),
        	"link" => $link,
        	
        );
        if ($this->AdminModel->updatevideo($id_video,$data)) {
        	$this->session->set_flashdata('success', 'Anda berhasil Edit video');
        	echo json_encode(array(
				"status" => "sukses",
				"msg" => "Data berhasil diperbarui!",
			));die;
        } else{

        	echo json_encode(array(
				"status" => "gagal",
				"msg" => "Gagal Tambah video",
			));die;
        }
    }

    public function dosavegaleri() {
        // Ambil input nama
        $name = $this->input->post('namagaleri');
        $deskripsi = $this->input->post('deskripsigaleri');
        $name_en = $this->input->post('namagaleri_en');
        $deskripsi_en = $this->input->post('deskripsigaleri_en');

        // Konfigurasi upload
        $config['upload_path']   = FCPATH .'assets/upload_galeri/'; // Pastikan folder ini sudah ada
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
        $config['max_size']      = 4048; // Maksimal 2MB
        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

        $this->load->library('upload', $config); // Load library upload

        if (!$this->upload->do_upload('file')) {
            // Jika gagal upload
            echo json_encode(array(
				"status" => "gagal",
				"msg" => $this->upload->display_errors(),
			));die;
            
        } else {
            // Jika berhasil upload
            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

            $data = array(
            	"nama" => htmlspecialchars($name),
            	"deskripsi" => htmlspecialchars($deskripsi),
            	"nama_en" => htmlspecialchars($name_en),
            	"deskripsi_en" => htmlspecialchars($deskripsi_en),
            	"gambar" => $fileData['file_name'],
            	"user_id" => $_SESSION['id_user'],
            	"user" => $_SESSION['nama'],
            );
            if ($this->AdminModel->insertgaleri($data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil tambah galeri');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah galeri",
				));die;
            }
            // $this->AdminModel->insertsertifikat($data);
        }
    }

    public function dosaveslider() {
        // Ambil input nama
        $name = $this->input->post('namaslider');
        $deskripsi = $this->input->post('deskripsislider');
        $name_en = $this->input->post('namaslider_en');
        $deskripsi_en = $this->input->post('deskripsislider_en');

        // Konfigurasi upload
        $config['upload_path']   = FCPATH .'assets/upload_slider/'; // Pastikan folder ini sudah ada
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
        $config['max_size']      = 4048; // Maksimal 2MB
        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

        $this->load->library('upload', $config); // Load library upload

        if (!$this->upload->do_upload('file')) {
            // Jika gagal upload
            echo json_encode(array(
				"status" => "gagal",
				"msg" => $this->upload->display_errors(),
			));die;
            
        } else {
            // Jika berhasil upload
            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

            $data = array(
            	"nama" => htmlspecialchars($name),
            	"deskripsi" => htmlspecialchars($deskripsi),
            	"nama_en" => htmlspecialchars($name_en),
            	"deskripsi_en" => htmlspecialchars($deskripsi_en),
            	"gambar" => $fileData['file_name'],
            	"user_id" => $_SESSION['id_user'],
            	"user" => $_SESSION['nama'],
            );
            if ($this->AdminModel->insertslider($data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil tambah slider');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah slider",
				));die;
            }
            // $this->AdminModel->insertsertifikat($data);
        }
    }

    public function doeditsertifikat() {
        // Ambil input nama
        $name = $this->input->post('namasertifikat');
        $name_en = $this->input->post('namasertifikat_en');
        $id_sertifikat = $this->input->post('id_sertifikat');

        // Konfigurasi upload
        // var_dump($_FILES['file']);die;
        if(isset($_FILES['file']) ){
	        $config['upload_path']   = FCPATH .'assets/upload_sertifikat/'; // Pastikan folder ini sudah ada
	        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
	        $config['max_size']      = 4048; // Maksimal 2MB
	        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

	        $this->load->library('upload', $config); // Load library upload
	    

	        if (!$this->upload->do_upload('file')) {
	            // Jika gagal upload
	            echo json_encode(array(
					"status" => "gagal",
					"msg" => $this->upload->display_errors(),
				));die;
	            
	        } else {
	            // Jika berhasil upload
	            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

	            $data = array(
	            	"nama" => htmlspecialchars($name),
	            	"nama_en" => htmlspecialchars($name_en),
	            	"gambar" => $fileData['file_name'],
	            );
	            if ($this->AdminModel->updatesertifikat($id_sertifikat,$data)) {
	            	$this->session->set_flashdata('success', 'Anda berhasil Edit sertifikat');
	            	echo json_encode(array(
						"status" => "sukses",
						"msg" => "Data berhasil diperbarui!",
					));die;
	            } else{

	            	echo json_encode(array(
						"status" => "gagal",
						"msg" => "Gagal Tambah Sertifikat",
					));die;
	            }
	            // $this->AdminModel->insertsertifikat($data);
	        }
	    } else {
	    	$data = array(
            	"nama" => htmlspecialchars($name),
            	"nama_en" => htmlspecialchars($name_en),
            );
            if ($this->AdminModel->updatesertifikat($id_sertifikat,$data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil Edit sertifikat');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah Sertifikat",
				));die;
            }
	    }
    }

    public function doeditkategori() {
        // Ambil input nama
        $id_kategori = $this->input->post('id_kategori');
        $name = $this->input->post('namakategori');
        $name_en = $this->input->post('namakategori_en');
        $deskripsi = $this->input->post('deskripsikategori');
        $deskripsi_en = $this->input->post('deskripsikategori_en');


        // Konfigurasi upload
        // var_dump($_FILES['file']);die;
        if(isset($_FILES['file']) ){
	        $config['upload_path']   = FCPATH .'assets/upload_kategori/'; // Pastikan folder ini sudah ada
	        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
	        $config['max_size']      = 4048; // Maksimal 2MB
	        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

	        $this->load->library('upload', $config); // Load library upload
	    

	        if (!$this->upload->do_upload('file')) {
	            // Jika gagal upload
	            echo json_encode(array(
					"status" => "gagal",
					"msg" => $this->upload->display_errors(),
				));die;
	            
	        } else {
	            // Jika berhasil upload
	            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

	            $data = array(
	            	"namakategori" => htmlspecialchars($name),
	            	"namakategori_en" => htmlspecialchars($name_en),
	            	"ket" => htmlspecialchars($deskripsi),
	            	"ket_en" => htmlspecialchars($deskripsi_en),
	            	"gambar" => $fileData['file_name'],
	            );
	            if ($this->AdminModel->updatekategori($id_kategori,$data)) {
	            	$this->session->set_flashdata('success', 'Anda berhasil Edit kategori');
	            	echo json_encode(array(
						"status" => "sukses",
						"msg" => "Data berhasil diperbarui!",
					));die;
	            } else{

	            	echo json_encode(array(
						"status" => "gagal",
						"msg" => "Gagal Tambah kategori",
					));die;
	            }
	            // $this->AdminModel->insertkategori($data);
	        }
	    } else {
	    	$data = array(
            	"namakategori" => htmlspecialchars($name),
            	"namakategori_en" => htmlspecialchars($name_en),
            	"ket" => htmlspecialchars($deskripsi),
            	"ket_en" => htmlspecialchars($deskripsi_en),

            );
            if ($this->AdminModel->updatekategori($id_kategori,$data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil Edit kategori');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah kategori",
				));die;
            }
	    }
    }

    public function doeditgaleri() {
        // Ambil input nama
        $id_galeri = $this->input->post('id_galeri');
        $name = $this->input->post('namagaleri');
        $deskripsi = $this->input->post('deskripsigaleri');
        $name_en = $this->input->post('namagaleri_en');
        $deskripsi_en = $this->input->post('deskripsigaleri_en');


        // Konfigurasi upload
        // var_dump($_FILES['file']);die;
        if(isset($_FILES['file']) ){
	        $config['upload_path']   = FCPATH .'assets/upload_galeri/'; // Pastikan folder ini sudah ada
	        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
	        $config['max_size']      = 4048; // Maksimal 2MB
	        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

	        $this->load->library('upload', $config); // Load library upload
	    

	        if (!$this->upload->do_upload('file')) {
	            // Jika gagal upload
	            echo json_encode(array(
					"status" => "gagal",
					"msg" => $this->upload->display_errors(),
				));die;
	            
	        } else {
	            // Jika berhasil upload
	            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

	            $data = array(
	            	"nama" => htmlspecialchars($name),
	            	"deskripsi" => htmlspecialchars($deskripsi),
	            	"nama_en" => htmlspecialchars($name_en),
            		"deskripsi_en" => htmlspecialchars($deskripsi_en),
	            	"gambar" => $fileData['file_name'],
	            );
	            if ($this->AdminModel->updategaleri($id_galeri,$data)) {
	            	$this->session->set_flashdata('success', 'Anda berhasil Edit galeri');
	            	echo json_encode(array(
						"status" => "sukses",
						"msg" => "Data berhasil diperbarui!",
					));die;
	            } else{

	            	echo json_encode(array(
						"status" => "gagal",
						"msg" => "Gagal Tambah galeri",
					));die;
	            }
	            // $this->AdminModel->insertgaleri($data);
	        }
	    } else {
	    	$data = array(
            	"nama" => htmlspecialchars($name),
	            "deskripsi" => htmlspecialchars($deskripsi),
	            "nama_en" => htmlspecialchars($name_en),
            	"deskripsi_en" => htmlspecialchars($deskripsi_en),

            );
            if ($this->AdminModel->updategaleri($id_galeri,$data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil Edit galeri');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah galeri",
				));die;
            }
	    }
    }

    public function doeditslider() {
        // Ambil input nama
        $name = $this->input->post('namaslider');
        $id_slider = $this->input->post('id_slider');
        $deskripsi = $this->input->post('deskripsislider');
        $name_en = $this->input->post('namaslider_en');
        $deskripsi_en = $this->input->post('deskripsislider_en');

        // Konfigurasi upload
        // var_dump($_FILES['file']);die;
        if(isset($_FILES['file']) ){
	        $config['upload_path']   = FCPATH .'assets/upload_slider/'; // Pastikan folder ini sudah ada
	        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx'; // Ekstensi yang diizinkan
	        $config['max_size']      = 4048; // Maksimal 2MB
	        $config['file_name']     = time() . "_" . $_FILES['file']['name']; // Rename file

	        $this->load->library('upload', $config); // Load library upload
	    

	        if (!$this->upload->do_upload('file')) {
	            // Jika gagal upload
	            echo json_encode(array(
					"status" => "gagal",
					"msg" => $this->upload->display_errors(),
				));die;
	            
	        } else {
	            // Jika berhasil upload
	            $fileData = $this->upload->data(); // Ambil informasi file yang diupload

	            $data = array(
	            	"nama" => htmlspecialchars($name),
	            	"deskripsi" => htmlspecialchars($deskripsi),
	            	"nama_en" => htmlspecialchars($name_en),
            		"deskripsi_en" => htmlspecialchars($deskripsi_en),
	            	"gambar" => $fileData['file_name'],
	            );
	            if ($this->AdminModel->updateslider($id_slider,$data)) {
	            	$this->session->set_flashdata('success', 'Anda berhasil Edit slider');
	            	echo json_encode(array(
						"status" => "sukses",
						"msg" => "Data berhasil diperbarui!",
					));die;
	            } else{

	            	echo json_encode(array(
						"status" => "gagal",
						"msg" => "Gagal Tambah slider",
					));die;
	            }
	            // $this->AdminModel->insertslider($data);
	        }
	    } else {
	    	$data = array(
            	"nama" => htmlspecialchars($name),
	            "deskripsi" => htmlspecialchars($deskripsi),
	            "nama_en" => htmlspecialchars($name_en),
            	"deskripsi_en" => htmlspecialchars($deskripsi_en),

            );
            if ($this->AdminModel->updateslider($id_slider,$data)) {
            	$this->session->set_flashdata('success', 'Anda berhasil Edit slider');
            	echo json_encode(array(
					"status" => "sukses",
					"msg" => "Data berhasil diperbarui!",
				));die;
            } else{

            	echo json_encode(array(
					"status" => "gagal",
					"msg" => "Gagal Tambah slider",
				));die;
            }
	    }
    }

    public function hapusdata(){
    	$id=$_POST['id'];
    	$table=$_POST['table'];

    	if ($this->AdminModel->hapusdata($id,$table)) {
        	$this->session->set_flashdata('success', 'Anda berhasil hapus '.$table);
        	echo json_encode(array(
				"status" => "sukses",
				"msg" => "Data berhasil diperbarui!",
			));die;
        } else{
        	
        	echo json_encode(array(
				"status" => "gagal",
				"msg" => "Gagal Hapus ".ucwords($table),
			));die;
        }
    }

    public function tambahproduk(){
    	$data['title'] = "add_product";
		$data['kategori'] = $this->AdminModel->getKategori();

		$this->render('admin/tambahproduk',$data);

		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/tambahproduk',$data);
		$this->load->view('admin/include/footer');*/
    }

    public function editproduk($ID){
    	$data['title'] = "edit_product";
		$data['kategori'] = $this->AdminModel->getKategori();
		$data['produk'] = $this->AdminModel->getProdukByID($ID);

		$this->render('admin/tambahproduk',$data);


		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/tambahproduk',$data);
		$this->load->view('admin/include/footer');*/
    }

    public function produk()
	{
		$data['title'] = "product";
		$data['produk'] = $this->AdminModel->getProduk();

		$this->render('admin/produk',$data);

		/*$this->load->view('admin/include/header',$data);
		$this->load->view('admin/produk',$data);
		$this->load->view('admin/include/footer');*/
	}
}

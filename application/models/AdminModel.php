<?php 

class AdminModel extends CI_model{

	public function updateprofil($data){
		$this->db->where('id_profil', 1);
        return $this->db->update('profil', $data);
	}

	public function getProfil(){

		$result= $this->db 
					  ->where('id_profil',1)
					  ->limit(1)
					  ->get('profil');

		return $result->row();
	}

	public function getSertifikat(){

		$result= $this->db 
					  ->where('id_sertifikat != 0')
					  ->where('hapus = 0')
					  ->get('sertifikat');
		return $result->result();
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function getProduk($limit = null, $keywords = null, $jenis = null){

		$result= $this->db->select("*")
						->from("produk")
						->join("kategori", "kategori.id_kategori = produk.id_kategori")

					  ->where('kd_produk != 0')
					  ->where('produk.hapus = 0');
		if($keywords != null && $keywords != ""){
			$result = $this->db->where("upper(produk.namaproduk) like '%".strtoupper($keywords)."%' ");
		}
		$this->db->order_by("kd_produk","DESC");
		if($limit != null && $limit != ""){
			$result = $this->db->limit($limit);
		}
		$result = $result->get();
		if($jenis=="hitung"){
			return $result->num_rows();

		} else {

			return $result->result();
		}
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}
	public function getProdukByID($ID){

		$result= $this->db->select("*")
						->from("produk")
						->join("kategori", "kategori.id_kategori = produk.id_kategori")

					  ->where('kd_produk = '.$ID)
					  ->get();
		return $result->row();
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function getKategori($jenis=null){

		$result= $this->db 
					  ->where('id_kategori != 0')
					  ->where('hapus = 0')
					  ->get('kategori');
		if($jenis=="hitung"){
			return $result->num_rows();

		} else{

			return $result->result();
		}
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function getUser($jenis=null){

		$result= $this->db 
					  ->where('id_user != ', $this->session->userdata('id_user'))
					  ->where('hapus = 0')
					  ->where('role_id = 1')
					  ->get('user');
		if($jenis=="hitung"){
			return $result->num_rows();

		} else{

			return $result->result();
		}
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function getVideo($limit = null, $keywords = null, $jenis=null){

		$result= $this->db->select("*")
						->from("video")
					  ->where('id_video != 0')
					  ->where('hapus = 0');

		$this->db->order_by("id_video","DESC");
		if($limit != null && $limit != ""){
			$result = $this->db->limit($limit);
		}
		$result = $result->get();
		if($jenis=="hitung"){
			return $result->num_rows();
		} else {
			return $result->result();
		}
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function getGaleri($limit = null, $keywords = null, $jenis=null){

		
		$result= $this->db->select("*")
						->from("galeri")
					  ->where('id_galeri != 0')
					  ->where('hapus = 0');

		$this->db->order_by("id_galeri","DESC");
		if($limit != null && $limit != ""){
			$result = $this->db->limit($limit);
		}
		$result = $result->get();
		if($jenis=="hitung"){
			return $result->num_rows();
		} else {
			return $result->result();
		}
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function getSlider(){

		$result= $this->db 
					  ->where('id_slider != 0')
					  ->where('hapus = 0')
					  ->get('slider');
		return $result->result();
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function insertsertifikat($data){
		return $this->db->insert('sertifikat', $data);
	}
	public function insertkategori($data){
		return $this->db->insert('kategori', $data);
	}
	public function insertvideo($data){
		return $this->db->insert('video', $data);
	}
	public function insertgaleri($data){
		return $this->db->insert('galeri', $data);
	}
	public function insertslider($data){
		return $this->db->insert('slider', $data);
	}
	public function insertproduk($data){
		return $this->db->insert('produk', $data);
	}
	public function insertuser($data){
		return $this->db->insert('user', $data);
	}

	public function hapusdata($id,$table){
		$data=array(
			"hapus" => 1,
		);
		if($table=="sertifikat"){
			$this->db->where('id_sertifikat', $id);
		}
		if($table=="kategori"){
			$this->db->where('id_kategori', $id);
		}
		if($table=="galeri"){
			$this->db->where('id_galeri', $id);
		}
		if($table=="slider"){
			$this->db->where('id_slider', $id);
		}
		if($table=="produk"){
			$this->db->where('kd_produk', $id);
		}
		if($table=="video"){
			$this->db->where('id_video', $id);
		}
		if($table=="user"){
			$this->db->where('id_user', $id);
		}
        return $this->db->update($table, $data);
	}

	public function updatesertifikat($id,$data){
		
		$this->db->where('id_sertifikat', $id);
		
        return $this->db->update("sertifikat", $data);
	}
	public function updatekategori($id,$data){
		
		$this->db->where('id_kategori', $id);
		
        return $this->db->update("kategori", $data);
	}

	public function updatevideo($id,$data){
		
		$this->db->where('id_video', $id);
		
        return $this->db->update("video", $data);
	}
	public function updategaleri($id,$data){
		
		$this->db->where('id_galeri', $id);
		
        return $this->db->update("galeri", $data);
	}
	public function updateslider($id,$data){
		
		$this->db->where('id_slider', $id);
		
        return $this->db->update("slider", $data);
	}
	public function updateproduk($id,$data){
		
		$this->db->where('kd_produk', $id);
		
        return $this->db->update("produk", $data);
	}
	public function updateuser($id,$data){
		
		$this->db->where('id_user', $id);
		
        return $this->db->update("user", $data);
	}
}
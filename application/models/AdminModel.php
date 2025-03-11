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
					  ->get('sertifikat');
		return $result->result();
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}
}
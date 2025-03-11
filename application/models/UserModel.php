<?php 

class UserModel extends CI_model{

	public function getGaleri(){

		$result= $this->db->select('*')
				->from("galeri")
				->get();

		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}
}
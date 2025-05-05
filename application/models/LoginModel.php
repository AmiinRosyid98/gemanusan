<?php 

class LoginModel extends CI_model{

	public function cek_login($username,$password){

		$result= $this->db 
					  ->where('username',$username)
					  ->where('password',($password))
					  ->where('hapus',0)
					  ->limit(1)
					  ->get('user');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return FALSE;
		}
	}
}
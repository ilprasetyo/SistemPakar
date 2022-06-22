<?php
/**
 *
 */
class Dbs extends CI_Model
{
	//fungsi untuk mengecek apakah didalam tabel ada data atau tidak
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	function getUserId($username){
		$dml = "SELECT username FROM user where username = '$username'";
		$query = $this->db->query($dml)->row();
		return $query;
	}

	function ubahpasswordUser($data,$table,$where,$value){
		$this->db->where($where,$value);
		$this->db->update($table,$data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	function resetpasswordUser($data,$table,$where,$value){
		$this->db->where($where,$value);
		$this->db->update($table,$data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

}
 ?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booklist extends CI_Model{

		public function add_user($user_info){
		// $query = "INSERT INTO users(user_name, alias, email, password, created_on, updated_on) VALUES(?, ?, ?, ?, now(), now())";
		// $query2 = "SELECT email, user_name, id, alias FROM users WHERE email = ?;";
		$query2 = "SELECT * FROM users";
		$user = [$user_info['user_name'], $user_info['alias'], $user_info['email'], $user_info['password']];
		var_dump($this->db->query($query2));
		die();
		$user2 = [$user_info['email']]; 
		if($this->db->query($query2, $user2)->row_array() == null){
			$this->db->query($query, $user);
			return $this->db->query($query2, $user2)-row_array();
		}
		else {
			return FALSE;
		}
	}




}


 ?>
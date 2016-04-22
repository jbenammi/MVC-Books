<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booklist extends CI_Model{

		public function add_user($user_info){
		$query = "INSERT INTO users(user_name, alias, email, password, created_on, updated_on) VALUES(?, ?, ?, ?, now(), now())";
		$query2 = "SELECT email, user_name, id, alias FROM users WHERE email = ?;";
		$user = [$user_info['user_name'], $user_info['alias'], $user_info['email'], $user_info['password']];
		$user2 = [$user_info['email']]; 
		if($this->db->query($query2, $user2)->row_array() == null){
			$this->db->query($query, $user);
			return $this->db->query($query2, $user2)->row_array();
		}
		else {
			return FALSE;
		}
	}
	public function signin($user_info){
		$query = "SELECT email, user_name, id, alias FROM users WHERE email = ? AND password = ?;";
		$user = [$user_info['email'], $user_info['password']];
		return $this->db->query($query, $user)->row_array();
	}
	public function get_reviews(){
		$query = "SELECT reviews.id AS review_id, reviews.review, reviews.rating, reviews.created_on, users.id AS user_id, users.alias, books.title, books.id AS book_id FROM reviews  JOIN users  ON users_id = users.id  JOIN books ON books_id = books.id JOIN authors ON books.authors_id = authors.id ORDER BY reviews.created_on DESC LIMIT 3;";
		return $this->db->query($query)->result_array();
	}
	public function get_booklist(){
		$query = "SELECT books.title, books.id FROM books";
		return $this->db->query($query)->result_array();
	}
	public function get_book($id){
		$query = "SELECT books.id AS book_id, books.title, authors.auth_name, reviews.id AS review_id, reviews.rating, reviews.review, reviews.created_on, users.alias, users.id as users_id FROM reviews JOIN users ON reviews.users_id = users.id JOIN books ON reviews.books_id = books.id JOIN authors ON books.authors_id = authors.id WHERE books.id = $id;";
		return $this->db->query($query)->result_array();
	}

	public function get_user_booklist($id){
		$query = "SELECT books.title, books.id AS book_id FROM reviews  JOIN users  ON users_id = users.id  JOIN books ON books_id = books.id where users.id = $id";
		return $this->db->query($query)->result_array();
	}
	public function get_user($id){
		$query = "SELECT count(reviews.id) AS total_reviews, user_name, users.email, users.id AS user_id, users.alias FROM reviews  JOIN users  ON users_id = users.id  JOIN books ON books_id = books.id where users.id = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_author_list(){
		$query = "SELECT * FROM books.authors;";
		return $this->db->query($query)->result_array();
	}
	public function add_book($info){
		$query1 = "INSERT INTO authors(auth_name) VALUE(?)";
		$info1 = [$info['new_author']];
		$query2 = "SELECT id FROM authors WHERE auth_name = ?;";
		$query3 = "INSERT INTO books(title, created_on, updated_on, authors_id) VALUES(?, now(), now(), ?);";
		$query4 = "SELECT id FROM books WHERE title = ? ORDER BY created_on desc;";
		$info2 = [$info['title']];
		$query5 = "INSERT INTO reviews(review, rating, users_id, books_id, created_on, updated_on) VALUES(?, ?, ?, ?, now(), now());";
		$info3 = [$info['review'], $info['rating'], $info['user_id'], $info9['id'] ];
		$info8 = [$info['title']];
		$info9 = [];
		$info9[] = $this->db->query($query4, $info8)->row_array();
		$authID = [];
		var_dump($info);
		if ($info['author'] == "New Author"){
			$this->db->query($query1, $info1);
			$authID = $this->db->query($query2, $info1)->row_array();
			$info2[] = $authID['id'];
			$this->db->query($query3, $info2);
			$info3[] = $this->db->query($query2, $info1)->row_array();
			$this->db->query($query5, $info3);
			$query6 = "SELECT reviews.id AS review_id, reviews.review, reviews.rating, reviews.created_on, users.id AS user_id, users.alias, books.title, books.id AS book_id FROM reviews  JOIN users  ON users_id = users.id  JOIN books ON books_id = books.id JOIN authors ON books.authors_id = authors.id ORDER BY reviews.created_on DESC LIMIT 3;";
			var_dump($this->db->query($query6)->result_array());
			die();
		}
	// }	else {
	// 		die();
	// 		$info2[] = $info['author'];
	// 		$this->db->query($query3, $info2);

	}
}


 ?>
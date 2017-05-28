<?php

class Users_model extends CI_Model{

	function __construct(){
		parent::__construct();
	} 



	function addUser($user){
		$this->db->select('username, student_usi');
		$this->db->from('users');
		$this->db->where('username', $user->username);
		$this->db->or_where('student_usi', $user->student_usi);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return 'Username or USI exist';
		}
		else{
			$this->db->set('username', $user->username);
			$this->db->set('first_name', $user->first_name);
			$this->db->set('last_name', $user->last_name);
			$this->db->set('password', md5($user->password)); 

			if($user->student_usi == null){
				$this->db->set('student_usi', 0);
			}
			else {
				$this->db->set('student_usi', $user->student_usi);

			} 
			$this->db->set('role', $user->role);

			}
			$this->db->set('role', $user->role);//why is this here?

			$this->db->insert('users');
			return "User Added";
		}
	}



	function getUser($user_id){
		$active = 1; 
		$data = array(
			'user_id' => $user_id,
			'active' => $active
		);

		$this->db->select('username, first_name, last_name, role');
		$this->db->from('users');
		$this->db->where($data);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->result();
		}
		else{
			return 'User does not exist';
		}
	}



	function listUsers(){
		$this->db->select('user_id, username, first_name, last_name, role');
		$this->db->from('users');
		$this->db->where('active', 1);
		$this->db->order_by('users.first_name', 'asc');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return 'Error loading list';
		}
	}



	function searchUser(){
		$username = null;
		$firstname = null;
		$lastname = null;
		$student_usi = null;
		$active = 1; 

		$username = $this->input->post('username');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$student_usi = $this->input->post('student_usi');

		$this->db->select('user_id, username, first_name, last_name, role');
		$this->db->from('users');

		if($username != null){
			$this->db->where('username', $username);
			$this->db->where('active', $active);
		}
		elseif($firstname != null){
			$this->db->where('first_name', $firstname);
			$this->db->where('active', $active);
		}
		elseif($lastname != null){
			$this->db->where('last_name', $lastname);
			$this->db->where('active', $active);
		}
		else{
			$this->db->where('student_usi', $student_usi);
			$this->db->where('active', $active);
		}

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return 'User not found';
		}
	}



	function updateUser($user_id = NULL, $user = NULL){

		$q = $this->db->where('users.user_id', $user_id)->update('users', $user);
		return $q;
	}

	function deleteUser($user_id){
		$data = array(
			'active' => 0
		);

		$q = $this->db->where('users.user_id', $user_id)->update('users', $data);
		return $q;

		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		$this->db->where('active', 1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			$q = $this->db->where('users.user_id', $user_id)->update('users', $user);
			return $q;
		}
		else{
			return "User cannot be updated";
		}
	}



	function deleteUser($user_id){
		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		$this->db->where('active', 1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			$data = array(
				'active' => 0
			);
			$q = $this->db->where('users.user_id', $user_id)->update('users', $data);
			return $q;
		}
		else{
			return "User cannot be deleted";
		}

	}



	function loginUser($user){
		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->where('username', $user->username);
		$this->db->where('password', md5($user->password));

		$this->db->where('active', 0);


		$q = $this->db->get();

		if($q->num_rows() == 1){
			$data = array (
				'session_hash' => $session_hash = bin2hex(openssl_random_pseudo_bytes(16)),
				'session_expire' => $t = time() + 3600 
			);
			$user_id = $q->row("user_id"); 
			$query = $this->db->where('users.user_id', $user_id)->update('users', $data);
			return $session_hash;
		}
		else{
			return 'Login Failed';
		}
	}



	function logoutUser($session_hash){
		$this->db->select('session_hash');
		$this->db->from('users');
		$this->db->where('session_hash', $session_hash->session_hash);

		$q = $this->db->get();

		if($q->num_rows() == 1){
			$data = array (
				'session_hash' => null,
				'session_expire' => null
			);
			$query = $this->db->where('session_hash', $session_hash->session_hash)->update('users', $data);
			return 'Logged out';
		}
		else{
			return null; 
		}
	}




	// 	function updateSession($session_hash){
	// 		$this->db->select('session_expire');
	// 		$this->db->from('users');
	// 		$this->db->where('session_expire', $session_hash->session_expire);

	// 		$q = $this->db->get();

	// 		if($q->num_rows() == 1 && $q->row("session_expire") > $t = time){
	// 			$data = array(
	// 				$t = time() = 3600; 
	// 			);
	// 			$query = $this->db->where('session_hash', $session_hash->session_hash)->update('users', $data);
	// 		}
	// 		else{
	// 			return null; 
	// 		}
	// 	}

	function updateSession($session_hash){
		$this->db->select('session_expire');
		$this->db->from('users');
		$this->db->where('session_hash', $session_hash->session_hash);

		$q = $this->db->get();

		$t = time();
		if($q->num_rows() == 1 && $q->row("session_expire") > $t){
			$data = array(
				'session_expire' => $session_expire = $t + 3600
			);
			$query = $this->db->where('session_hash', $session_hash->session_hash)->update('users', $data);
		}
		else{
			return null; 
		}
	}



	function getValuesFromSessionHash($session_hash){
		$this->db->select('user_id, username, role');
		$this->db->from('users');
		$this->db->where('session_hash', $session_hash->session_hash);

		$q = $this->db->get();

		if($q->num_rows() == 1){
			return $q->row();
		}
		else{
			return null;
		}
	}
}
?>
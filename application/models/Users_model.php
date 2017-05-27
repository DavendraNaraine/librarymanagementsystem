<?php

class Users_model extends CI_Model{

	function __construct(){
		parent::__construct();
	} 

	function addUser($user){
		//             $data = array(
		//                 'username' => $this->input->post('username'),
		//                 'password' => md5($this->input->post('password')),
		//                 'first_name' => $this->input->post('firstname'),
		//                 'last_name' => $this->input->post('lastname'),
		//                 'student_usi' => $this->input->post('student_usi'),
		//                 'role' => $this->input->post('role')
		//             );

		//             $this->db->select('username');
		//             $this->db->from('users');
		//             $this->db->where('username', $data['username']);  
		//             $query = $this->db->get();

		//             if($query->num_rows() > 0){
		//                 return "Can't add";
		//             }
		//             else{
		//                 $this->db->insert('users', $data);
		//                 return "User added";
		//             }
		$this->db->select('username, student_usi');
		$this->db->from('users');
		$this->db->where('username', $user->username);
		$this->db->or_where('student_usi', $user->student_usi);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return 'Username or USI exist';
		}
		else{
			$q = $this->db->insert('users', $user);
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
		//     $update = array (
		//       'username' => $this->input->post('username'),
		//       'password' => $this->input->post('password'),
		//       'first_name' => $this->input->post('firstname'),
		//       'last_name' => $this->input->post('lastname'),
		//       'student_usi' => $this->input->post('student_usi'),
		//       'role' => $this->input->post('role')
		//     );

		//     $data = array(
		//       'user_id' => $user_id,
		//       'active' => 1
		//     );

		//     $this->db->select('user_id');
		//     $this->db->from('users');
		//     $this->db->where($data);
		//     $query = $this->db->get();

		//     if($query->num_rows() == 1){
		//       $this->db->where('user_id', $user_id);
		//       $this->db->update('users', $update);
		//       return $user_id;
		//     }
		//     else{
		//       return 'User cannot be updated';
		//     }
		$q = $this->db->where('users.user_id', $user_id)->update('users', $user);
		return $q;
	}

	function deleteUser($user_id){
		$data = array(
			'active' => 0
		);

		$q = $this->db->where('users.user_id', $user_id)->update('users', $data);
		return $q;
	}

	function loginUser($user){
		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->where('username', $user->username);
		$this->db->where('password', md5($user->password));

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
}
?>
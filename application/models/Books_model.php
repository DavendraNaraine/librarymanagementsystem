<?php

class Books_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}



	function getBook($book_id){
		$this->db->select('*');
		$this->db->from('books');
		$this->db->join('titles', 'books.title_id = titles.title_id');
		$this->db->where('book_id', $book_id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return 'Book does not exist';
		}
	}



	function listBooks(){
		$this->db->select('*');
		$this->db->from('books');
		$this->db->join('titles', 'books.title_id = titles.title_id');
		$this->db->join('condition', 'books.condition_id = condition.condition_id');
		$this->db->join('title_subjects', 'books.title_id = title_subjects.title_id');
		$this->db->join('subjects', 'title_subjects.subject_id = subjects.subject_id');
// 		$this->db->join('borrowed_books', 'books.book_id = borrowed_books.book_id', 'left outer');
		$this->db->where('books.active', 1);
		$this->db->where('books.status', 1);
// 		$this->db->where('borrowed_books.book_id', NULL);
		$this->db->order_by('titles.title_name', 'asc');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return 'Error loading list';
		}
	}



	function updateBook($book_id = NULL, $book = NULL){
		$this->db->select('book_id');
		$this->db->from('books');
		$this->db->where('book_id', $book_id);
		$this->db->where('active', 1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			$q = $this->db->where('books.book_id', $book_id)->update('books', $book);
			return $q;	 		
		}
		else{
			return 'Book cannot be updated';
		}
	}



	function addBook($book){
		$this->db->select('ug_id');
		$this->db->from('books');
		$this->db->where('ug_id', $book->ug_id);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return "UG id taken";
		}
		else{
			$q = $this->db->insert('books', $book); 
			return "Book added, hell yeah";
		}
	}



	function deleteBook($book_id){
		$this->db->select('book_id');
		$this->db->from('books');
		$this->db->where('book_id', $book_id);
		$this->db->where('active', 1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			$data = array(
				'active' => 0
			);
			$q = $this->db->where('books.book_id', $book_id)->update('books', $data);
			return $q;			
		}
		else{
			return "Book cannot be deleted";
		}
	}



	function searchBook($book){
		$ug_id = $this->input->post('ugid');
		$this->db->select('*');
		$this->db->from('books');
		$this->db->join('titles', 'books.title_id = titles.title_id');
		$this->db->where('books.ug_id', $ug_id);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return 'Book cannot be found';
		}
	}



	function borrowBook($book){
		// 		$book->staff_lent_id = $user_info->user_id;
		// 		var_dump ($book->staff_lent_id);
		// 		$q = $this->db->insert('books', $book); 


		$this->db->set('book_id', $book->book_id);
		$this->db->set('student_usi', $book->student_usi);
		$this->db->set('borrowed_date', date("Y-m-d"));
		$this->db->set('borrowed_condition_id', $book->borrowed_condition_id);
		$this->db->set('return_date', $book->return_date);
		$this->db->set('staff_lent_id',0);
		$this->db->set('actual_return_date', 0);
		$this->db->set('staff_lent_id',0);
		$this->db->set('staff_return_id',0);
		$this->db->set('return_condition_id', 0);

		$this->db->insert('borrowed_books');
		
		$this->db->set('status', 0); //value that used to update column  
		$this->db->where('book_id', $book->book_id); 
		$this->db->update('books');  //table name
		
		
		return "Book borrowed";
	}



	// 	function returnBook($borrowed_book_id){
	// 		$update = array(
	// 			'actual_return_date'=> $this->input->post('returnDate'),
	// 			'staff_return_id'=> $this->input->post('staffReturnId'),
	// 			'return_condition_id'=> $this->input->post('condition')
	// 		);

	// 		$data = array(
	// 			'borrowed_book_id' =>$borrowed_book_id,
	// 		);

	// 		$this->db->select('actual_return_date, staff_return_id, return_condition_id');
	// 		$this->db->from('borrowed_books');
	// 		$this->db->where($data);
	// 		$query = $this->db->get();

	// 		if($query->num_rows() > 0){
	// 			$this->db->where('borrowed_book_id', $borrowed_book_id);
	// 			$this->db->update('borrowed_books', $update);
	// 			return $borrowed_book_id;
	// 		}
	// 		else{
	// 			return 'Invalid update';
	// 		}
	// 	}
}
?>
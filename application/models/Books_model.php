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
	$this->db->where('books.active', 1);
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
// 	  unset($book->book_id);
	  $q = $this->db->where('books.book_id', $book_id)->update('books', $book);
	 	return $q;	 
  }

  function addBook($book){   
      $this->db->insert('books', $book); 
   	 return "Book added, hell yeah";
  }

  function deleteBook($book_id){
//     $update = array ('active' => 0);

     $data = array(
//       'book_id' => $book_id,
      'active' => 0
    );

//     $this->db->select('book_id');
//     $this->db->from('books');
//     $this->db->where($data); 
//     $query = $this->db->get();

//     if($query->num_rows() > 0){
//       $this->db->where('book_id', $book_id);
//       $this->db->update('books', $update);
//       return $book_id;
//     }
//     else{
//       return 'Book does not exist';
//     }
	    $q = $this->db->where('books.book_id', $book_id)->update('books', $data);
	 	return $q;	
  }

  function searchBook(){
    $ug_id = $this->input->post('ugid');

    $this->db->select('*');
    $this->db->from('books');
    $this->db->join('titles', 'books.title_id = titles.title_id');
    $this->db->where('ug_id', $ug_id);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'Book does not exist';
    }
  }

  function borrowBook(){

  }

  function returnBook($borrowed_book_id){
    $update = array(
      'actual_return_date'=> $this->input->post('returnDate'),
      'staff_return_id'=> $this->input->post('staffReturnId'),
      'return_condition_id'=> $this->input->post('condition')
    );

    $data = array(
      'borrowed_book_id' =>$borrowed_book_id,
    );

    $this->db->select('actual_return_date, staff_return_id, return_condition_id');
    $this->db->from('borrowed_books');
    $this->db->where($data);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      $this->db->where('borrowed_book_id', $borrowed_book_id);
      $this->db->update('borrowed_books', $update);
      return $borrowed_book_id;
    }
    else{
      return 'Invalid update';
    }
  }
}
?>
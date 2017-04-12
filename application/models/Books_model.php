<?php

class Books_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }
  
  function addBook(){    
    $data = array(
      'subject' => $this->input->post('subject');
      'title' => $this->input->post('title');
      'author' => $this->input->post('author');
      'coAuthor' => $this->input->post('coAuthor');
      'publisher' => $this->input->post('publisher');
      'edition' => $this->input->post('edition');
      'pages' => $this->input->post('pages');
      'isbn' => $this->input->post('isbn'); 
      'copies' => $this->input->post('copies');
    );
    
    $this->db->insert('books', $data);
  }
  
  function viewBook(){
    
  }
  
  function viewBookByName(){
    
  }
  
  function viewBookByAuthor(){
    
  }
  
  function viewBookBySubject(){
    
  }
  
  function updateBook(){
    
  }
  
  function deleteBook(){
    
  }
  
  function borrowBook(){
    
  }
  
  function returnBook(){
    
  }
}
?>
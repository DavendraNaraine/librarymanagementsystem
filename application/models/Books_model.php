<?php

class Books_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }
  
  function addBook(){    
    $data = array(
      'title_name' => $this->input->post('title');
      'title_author' => $this->input->post('author');
      'title_coauthor' => $this->input->post('coAuthor');
      'title_edition' => $this->input->post('edition');
      'title_publisher' => $this->input->post('publisher');
      'edition' => $this->input->post('edition');
      'title_isbn' => $this->input->post('isbn'); 
      'title_copies' => $this->input->post('copies'); 
    );
    
    $this->db->insert('titles', $data);
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
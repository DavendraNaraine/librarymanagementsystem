<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller{
  
  public function get_book($book_id){
    $this->load->database();
    $this->load->model('books_model');
    $data['response'] = $this->books_model->getBook($book_id);
    
    $this->load->view('api/api_view', $data);
  } 
  
  public function list_books(){
    $this->load->database();
    $this->load->model('books_model');
    $data['response'] = $this->books_model->listBooks();
    
    $this->load->view('api/api_view', $data);
  }
  
  public function update_book($book_id){
    $this->load->database();
    $this->load->model('books_model');
    $data['response'] = $this->books_model->updateBook($book_id);
    
    $this->load->view('api/api_view', $data);
  }
  /*
  public function create_book(){
    $this->load->database();
    $this->load->model('books_model');
    $data['response'] = $this->books_model->addBook();
    
    $this->load->view('api/api_view', $data);
  }
  */
  public function delete_book($book_id){
    $this->load->database();
    $this->load->model('books_model');
    $data['response'] = $this->books_model->deleteBook($book_id);
    
    $this->load->view('api/api_view', $data);
  } 
  
  public function searchBookBy(){
    $this->load->database();
    $this->load->model('books_model');
    $data['response'] = $this->books_model->searchBook();
    
    $this->load->view('api/api_view', $data);
  }
  
  public function borrow_book(){
    $this->load->database();
    $this->load->model('books_model');
    $data['response'] = $this->books_model->borrowBook();
    
    $this->load->view('api/api_view', $data);
  }
  
  public function return_book(){
    $this->load->database();
    $this->load->model('books_model');
    $data['response'] = $this->books_model->returnBook();
    
    $this->load->view('api/api_view', $data);
  }
}
?>
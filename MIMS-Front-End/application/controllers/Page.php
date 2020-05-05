<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('rol_id')==='201'){
          $this->load->view('administrador');
      }else{
          echo "Access Denied";
      }

  }

  function admin(){
    //Allowing akses to staff only
    if($this->session->userdata('rol_id')==='202'){

      $this->load->view('administrador/header');
      $this->load->view('administrador/navbar');
      $this->load->view('administrador/footer');
    }else{
        echo "Access Denied";
    }
  }

  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('rol_id')==='202'){

      $this->load->view('activador/header');
      $this->load->view('activador/navbar');
      $this->load->view('activador/footer');
    }else{
        echo "Access Denied";
    }
  }

  function author(){
    //Allowing akses to author only
    if($this->session->userdata('rol_id')==='203'){
      $this->load->view('bodega');
    }else{
        echo "Access Denied";
    }
  }

}

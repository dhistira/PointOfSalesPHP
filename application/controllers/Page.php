<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('dashboard_view');
      }else{
          echo "Access Denied";
      }

  }

  function manajemen_menu(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('manajemen_menu');
      }else{
          echo "Access Denied";
      }

  }

  function manajemen_kasir(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('manajemen_kasir');
      }else{
          echo "Access Denied";
      }

  }

  function absensi_kasir(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('absensi_kasir');
      }else{
          echo "Access Denied";
      }

  }

  function tambah_menu(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('tambah_menu');
      }else{
          echo "Access Denied";
      }

  }

  function action_tambah_menu(){
    if(!empty($this->input->post('namaitem')) && !empty($this->input->post('detailitem')) && !empty($this->input->post('hargaitem'))){
      
      $a = $this->db->insert('menu',
        array(
          'nama_item' => $this->input->post('namaitem'),
          'detail_item' => $this->input->post('detailitem'),
          'harga_item' => $this->input->post('hargaitem')
        ));

      if($a){
        redirect(base_url().'page/manajemen-menu?s=true');
      } else {
        redirect(base_url().'page/tambah_menu?s=false');
      }
    }
  }

}

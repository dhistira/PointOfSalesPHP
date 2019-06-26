<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    $this->load->model('Login_model');
  }

  ////////////////////////////////////////
  ////                                ////
  ////           DASHBOARD            ////
  ////                                ////
  ////////////////////////////////////////

  function index(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('dashboard_view');
      }else{
          echo "Access Denied";
      }

  }

  ////////////////////////////////////////
  ////                                ////
  ////             MENU               ////
  ////                                ////
  ////////////////////////////////////////

  function manajemen_menu(){
      if($this->session->userdata('tipe')==='1'){

          $a = array(
            'data' => $this->Login_model->getMenu()->result());
          $this->load->view('manajemen_menu', $a);
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

  function edit_menu(){
      $iditem = $this->uri->segment('3');

      if($this->Login_model->checkMenuExist($iditem) == true){
        if($this->session->userdata('tipe')==='1'){
          $a = array(
            'data' => $this->Login_model->getSingleItem($iditem)->result());
            $this->load->view('edit_menu',$a);
        }else{
            echo "Access Denied";
        }
      } else {
        redirect(base_url().'page/manajemen-menu?s=notfound');
      }

  }

  function action_edit_menu(){
    $iditem = $this->uri->segment('3');
    if($this->Login_model->checkMenuExist($iditem) == true){
      if(!empty($this->input->post('namaitem')) && !empty($this->input->post('detailitem')) && !empty($this->input->post('hargaitem'))){
        
        $this->db->where('id',$iditem);
        $a = $this->db->update('menu',
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
    } else {
      redirect(base_url().'page/manajemen-menu?s=notfound'.$iditem);
    }
  }

  function delete_menu(){
      $iditem = $this->uri->segment('3');

      if($this->Login_model->checkMenuExist($iditem) == true){
        if($this->session->userdata('tipe')==='1'){
          $this->db->where('id',$iditem);
          if($this->db->delete('menu')){
            redirect(base_url().'page/manajemen-menu');
          } else {
            redirect(base_url().'page/manajemen-menu?s=false');
          }
        }else{
            echo "Access Denied";
        }
      } else {
        redirect(base_url().'page/manajemen-menu?s=notfound');
      }

  }

  ////////////////////////////////////////
  ////                                ////
  ////             KASIR              ////
  ////                                ////
  ////////////////////////////////////////

  function manajemen_kasir(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('manajemen_kasir');
      }else{
          echo "Access Denied";
      }

  }


  ////////////////////////////////////////
  ////                                ////
  ////         ABSENSI KASIR          ////
  ////                                ////
  ////////////////////////////////////////

  function absensi_kasir(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('absensi_kasir');
      }else{
          echo "Access Denied";
      }

  }

}

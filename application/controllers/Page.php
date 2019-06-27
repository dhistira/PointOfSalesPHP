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
        $a = array(
            'data' => $this->Login_model->getMenu()->result(),
            'transaksi_today' => $this->Login_model->getTransaksiToday(),
            'transaksi_yesterday' => $this->Login_model->getTransaksiYesterday(),
            'transaksi_thismonth' => $this->Login_model->getTransaksiThisMonth());
          $this->load->view('dashboard_view',$a);
      }else if($this->session->userdata('tipe')==='2'){
          $a = array(
            'data' => $this->Login_model->getMenu()->result(),
            'transaksi_today' => $this->Login_model->transaksiToday());
          $this->load->view('dashboard_kasir', $a);
      } else {
        echo "Access Denied";
      }

  }

  function kirim_transaksi(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('dashboard_view');
      }else if($this->session->userdata('tipe')==='2'){
          $cart = $_GET['cart'];
          $subtotal = $_GET['subtotal'];
          $iduser = $this->session->userdata('id');

          $a = $this->db->insert('transaksi',
            array(
              'tanggal_transaksi' => date("Y-m-d H:i:s"),
              'id_kasir' => $iduser,
              'id_item' => $cart,
              'total' => $subtotal
            ));

          if($a){
            redirect(base_url().'page/index?t=true');
          } else {
            redirect(base_url().'page/index?t=false');
          }

      } else {
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
        $a = array(
            'data' => $this->Login_model->getKasir()->result());
          $this->load->view('manajemen_kasir', $a);
      }else{
          echo "Access Denied";
      }

  }

  function tambah_kasir(){
      if($this->session->userdata('tipe')==='1'){
          $this->load->view('tambah_kasir');
      }else{
          echo "Access Denied";
      }

  }

  function action_tambah_kasir(){
    if(!empty($this->input->post('namakasir')) && !empty($this->input->post('usernamekasir')) && !empty($this->input->post('passwordkasir'))){
      
      $a = $this->db->insert('user',
        array(
          'tipe' => '2',
          'fullname' => $this->input->post('namakasir'),
          'username' => $this->input->post('usernamekasir'),
          'password' => md5($this->input->post('passwordkasir')),
          'date_created' => date("Y-m-d")
        ));

      if($a){
        redirect(base_url().'page/manajemen-kasir?s=true');
      } else {
        redirect(base_url().'page/tambah_kasir?s=false');
      }
    }
  }

  function edit_kasir(){
      $iditem = $this->uri->segment('3');

      if($this->Login_model->checkKasirExist($iditem) == true){
        if($this->session->userdata('tipe')==='1'){
          $a = array(
            'data' => $this->Login_model->getSingleKasir($iditem)->result());
            $this->load->view('edit_kasir',$a);
        }else{
            echo "Access Denied";
        }
      } else {
        redirect(base_url().'page/manajemen-kasir?s=notfound');
      }

  }

  function action_edit_kasir(){
    $iditem = $this->uri->segment('3');
    if($this->Login_model->checkKasirExist($iditem) == true){
      if(!empty($this->input->post('namakasir')) && !empty($this->input->post('usernamekasir'))){
        
        $this->db->where('id',$iditem);
        if(empty($this->input->post('passwordkasir'))){
          $a = $this->db->update('user',
            array(
              'fullname' => $this->input->post('namakasir'),
              'username' => $this->input->post('usernamekasir')
            ));
        } else {
          $a = $this->db->update('user',
            array(
              'fullname' => $this->input->post('namakasir'),
              'username' => $this->input->post('usernamekasir'),
              'password' => md5($this->input->post('passwordkasir'))
            ));
        }

        if($a){
          redirect(base_url().'page/manajemen-kasir?s=true');
        } else {
          redirect(base_url().'page/tambah_kasir?s=false');
        }
      }
    } else {
      redirect(base_url().'page/manajemen-kasir?s=notfound'.$iditem);
    }
  }

  function delete_kasir(){
      $iditem = $this->uri->segment('3');

      if($this->Login_model->checkKasirExist($iditem) == true){
        if($this->session->userdata('tipe')==='1'){
          $this->db->where('id',$iditem);
          if($this->db->delete('user')){
            redirect(base_url().'page/manajemen-kasir');
          } else {
            redirect(base_url().'page/manajemen-kasir?s=false');
          }
        }else{
            echo "Access Denied";
        }
      } else {
        redirect(base_url().'page/manajemen-kasir?s=notfound');
      }

  }

  ////////////////////////////////////////
  ////                                ////
  ////           TRANSAKSI            ////
  ////                                ////
  ////////////////////////////////////////

  function manajemen_transaksi(){
      if($this->session->userdata('tipe')==='1'){
        $a = array(
            'data' => $this->Login_model->getTransaksi()->result());
          $this->load->view('manajemen_transaksi', $a);
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
        $a = array(
            'data' => $this->Login_model->getAbsensi()->result());
          $this->load->view('absensi_kasir', $a);
      }else{
          echo "Access Denied";
      }

  }

}

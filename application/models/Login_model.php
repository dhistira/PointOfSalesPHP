<?php
class Login_model extends CI_Model{

  function validate($username,$password){
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    $result = $this->db->get('user',1);
    return $result;
  }

  ////////////////////////////////////////
  ////                                ////
  ////             MENU               ////
  ////                                ////
  ////////////////////////////////////////

  function getMenu(){
  	$this->db->select('*');
  	$this->db->from('menu');
  	$this->db->order_by('id','asc');
  	return $this->db->get();
  }

  function checkMenuExist($id){
  	$this->db->select('*');
  	$this->db->from('menu');
  	$this->db->where('id',$id);
  	$a = $this->db->get();
  	if($a->num_rows() >= 1){
  		return true;
  	} else {
  		return false;
  	}
  }

  function getSingleItem($id){
  	$this->db->select('*');
  	$this->db->from('menu');
  	$this->db->where('id',$id);
  	$a = $this->db->get();
  	return $a;
  }

  function deleteMenuItem($id){
  	if($this->db->delete('menu', array('id' => $id))){
  	  	return true;
  	} else {
  		return false;
  	}
  }

  ////////////////////////////////////////
  ////                                ////
  ////             KASIR              ////
  ////                                ////
  ////////////////////////////////////////

  function getKasir(){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('tipe','2');
    $this->db->order_by('id','asc');
    return $this->db->get();
  }

  function checkKasirExist($id){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where(array(
      'id' => $id,
      'tipe' => '2'
    ));
    $a = $this->db->get();
    if($a->num_rows() >= 1){
      return true;
    } else {
      return false;
    }
  }

  function getSingleKasir($id){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where(array(
      'id' => $id,
      'tipe' => '2'
    ));
    $a = $this->db->get();
    return $a;
  }

  function deleteKasir($id){
    if($this->db->delete('user', array('id' => $id))){
        return true;
    } else {
      return false;
    }
  }

  ////////////////////////////////////////
  ////                                ////
  ////            TRANSAKSI           ////
  ////                                ////
  ////////////////////////////////////////

  function getTransaksi(){
    $a = $this->db->query("SELECT transaksi.id id,transaksi.tanggal_transaksi tanggal,transaksi.id_item item,transaksi.total total,user.fullname namakasir FROM transaksi INNER JOIN user ON transaksi.id_kasir = user.id ORDER BY id asc");
    return $a;
  }

  function getTransaksiToday(){
    $a = $this->db->query("SELECT * FROM transaksi WHERE tanggal_transaksi LIKE '%".date("Y-m-d")."%'");
    $a = $a->num_rows();
    return $a;
  }

  function getTransaksiYesterday(){
    $a = $this->db->query("SELECT * FROM transaksi WHERE tanggal_transaksi LIKE '%".date("Y-m-d", strtotime("-1 day"))."%'");
    $a = $a->num_rows();
    return $a;
  }

  function getTransaksiThisMonth(){
    $a = $this->db->query("SELECT * FROM transaksi WHERE tanggal_transaksi LIKE '%".date("Y-m")."%'");
    $a = $a->num_rows();
    return $a;
  }


  ////////////////////////////////////////
  ////                                ////
  ////        ABSENSI KASIR           ////
  ////                                ////
  ////////////////////////////////////////

  function getAbsensi(){
    $a = $this->db->query("SELECT user_log.id id,user_log.date_login login,user_log.date_logout logout, user.fullname kasir FROM user_log INNER JOIN user ON user_log.id_user = user.id ORDER BY user_log.id ASC");
    return $a;
  }

}

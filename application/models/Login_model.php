<?php
class Login_model extends CI_Model{

  function validate($username,$password){
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    $result = $this->db->get('user',1);
    return $result;
  }

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

}

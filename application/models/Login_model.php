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

}

<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }

  function index(){
    $this->load->view('login_view');
  }

  function auth(){
    $username    = $this->input->post('username',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($username,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['fullname'];
        $username = $data['username'];
        $tipe = $data['tipe'];
        $id = $data['id'];
        $sesdata = array(
            'id' => $id,
            'fullname'  => $name,
            'username'     => $username,
            'tipe'     => $tipe,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for mahasiswa
        if($tipe === '1'){
            redirect('page');

        // access login for kasir
        }elseif($tipe === '2'){
          $a = $this->db->insert('user_log',
            array(
              'id_user' => $data['id'],
              'date_login' => date("Y-m-d h:i:s")
            ));

            redirect('page');

        // access login for others
        }else{
            redirect('page');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login');
    }
  }

  function logout(){
    if($this->session->userdata('tipe') == '2'){
      $this->db->where(array(
        'id' => $this->session->userdata('id'),
        'date_logout' => NULL));
      $this->db->update('user_log',
          array(
            'date_logout' => date("Y-m-d h:i:s")
          ));
    }
      $this->session->sess_destroy();
      redirect('login');
  }

}

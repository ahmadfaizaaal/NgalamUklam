<?php
    class login extends CI_Controller{

        function __construct(){
          parent::__construct();
          //$this->load->database();
          $this->load->model('model_member');
        }

        function index(){
            $this->load->view('view_login');
        }
        function submitlogin(){
            $pengacak = "Wow, you open my code, go away man!!!";
            $username = $this->input->post("username");
            $pass = md5(md5($pengacak).md5($this->input->post("password")).md5($pengacak));

            $count = $this->model_member->count_user($username);
            $row = $this->model_member->get_member($username);

            if($count>0){
              //user found
              if($row[0]->password == $pass){
                //pasword match, login success
                  $this->session->set_userdata(array('username'=>$username),true);
                  redirect( base_url());
              }
            }
            $data['error'] = true;
            $this->load->view('view_login',$data);
        }
    }
?>

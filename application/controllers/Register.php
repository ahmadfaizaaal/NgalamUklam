<?php
    class register extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->model('model_member');
        }
        function index(){
            $this->load->view('view_register');
        }
        function submitregister(){
            $pengacak = "Wow, you open my code, go away man!!!";
            $password = md5(md5($pengacak).md5($this->input->post("password")).md5($pengacak));
            $data = array(
                'username'      => $this->input->post("username"),
                'password'      => $password,
                'nama'          => $this->input->post("nama"),
                'foto_profil'   => "noprofil.jpg"
            );
            $this->model_member->simpandata($data);
            echo '1';
        }
        function cekusername($username){
            echo $this->model_member->count_user($username);
        }
    }
?>
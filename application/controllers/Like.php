<?php

    class like extends CI_Controller{
        public $CI = NULL;
        function __construct() {
            parent::__construct();
            $this->CI = & get_instance();
            $this->load->database();
            $this->load->model('model_like');
            $this->load->helper(array('form', 'url'));
        }
        
        function likefoto($idFoto){
            $data = array(
                'foto'   => $idFoto,
                'member' => $this->session->userdata( 'username' )
            );
            $this->model_like->simpanlike($data);
            echo '1';
        }
        function unlikefoto($idFoto){
            $data = array(
                'foto'   => $idFoto,
                'member' => $this->session->userdata( 'username' )
            );
            $this->model_like->hapuslike($data);
            echo '1';
        }
        
    }
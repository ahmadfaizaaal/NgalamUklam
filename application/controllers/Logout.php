<?php
    class logout extends CI_Controller{

        function dologout(){
          $this->session->sess_destroy();
          redirect(base_url());
        }
    }
?>

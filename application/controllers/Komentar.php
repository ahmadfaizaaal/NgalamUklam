<?php

class komentar extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_komentar');
        
    }
    function tambahkomentar($idFoto){
        $data = array(
            'foto'          => $idFoto,
            'member'        => $this->session->userdata( 'username' ),
            'isiKomentar'   => $this->input->post("komentar")
        );
        $this->model_komentar->simpankomentar($data);
        echo '1';
    }
    function editkomentar(){
        $komentar = $this->model_komentar->get_komentar_single($this->input->post("idcomment"));
        if($komentar[0]->member == $this->session->userdata( 'username' )){
            $data = array(
                'isiKomentar'   => $this->input->post("comment")
            );
            $this->model_komentar->editKomentar($data,$this->input->post("idcomment"));
            $data['foto'] = $this->model_komentar->get_komentar_single($this->input->post("idcomment"));
            echo json_encode($data);
        }
    }
    function hapuskomentar($idKomentar){
        $komentar = $this->model_komentar->get_komentar_single($idKomentar);
        if($komentar[0]->member == $this->session->userdata( 'username' )){
            $this->model_komentar->deleteKomentar($idKomentar);
            echo '1';
        }
    }
}
?>
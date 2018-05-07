<?php
    class foto extends CI_Controller{
        public $CI = NULL;
        function __construct() {
            parent::__construct();
            $this->CI = & get_instance();
            $this->load->database();
            $this->load->model('model_foto');
            $this->load->model('model_komentar');
            $this->load->model('model_like');
            $this->load->helper(array('form', 'url'));
        }
        function index(){
            $data['page'] = "view_foto";
            $data['foto'] = $this->model_foto->get_foto();
            $this->load->view('main',$data);
        }
        //ganti lihafoto
        function lihatfoto(){
            $idFoto                     = $this->uri->segment(3);
            $data['foto']               = $this->model_foto->get_foto($idFoto);
            $data['foto'][0]->tanggal   = $this->convert_time($data['foto'][0]->tanggal);
            $data['foto'][0]->session   = $this->session->userdata( 'username' );
            $data['foto'][0]->like      = $this->model_like->count_like($idFoto);
            $data['foto'][0]->comment   = $this->model_komentar->count_komentar($idFoto);
            $data['foto'][0]->islike    = $this->model_like->islike($idFoto,$this->session->userdata( 'username' ));
            $data['foto'][0]->editable  = ($data['foto'][0]->member == $this->session->userdata( 'username' )) ? 1 : 0;
            $data['komentar']           = $this->model_komentar->get_komentar($idFoto);
            echo json_encode($data);
        }
        function coba(){
            $a = redirect("Profil/aa");
            echo "aaaa";
            echo $a;
        }
        function tambahfoto(){
            $config['upload_path']      = './img/foto/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = 1000000;
            $config['encrypt_name']     = TRUE;
          
            $this->load->library('upload', $config);
            
            if ( !$this->upload->do_upload('userfile') )
            {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
            else
            {
                $upload_data = $this->upload->data(); 
                $link_foto = $upload_data['file_name'];
                $data = array(
                    'member'    => $this->session->userdata( 'username' ),
                    'caption'   => $this->input->post("caption"),
                    'location'  => $this->input->post("location"),
                    'link_foto' => $link_foto,
                    'tanggal'   => date('Y-m-d H:i:s')
                );
                $this->model_foto->simpanData($data);
                echo '1';
            }
        }
        function editcaption(){
            $idfoto = $this->input->post("idfoto");
            $foto = $this->model_foto->get_foto($idfoto);
            if($foto[0]->member == $this->session->userdata( 'username' )){
                $data = array(
                    'caption'   => $this->input->post("caption"),
                    'location'  => $this->input->post("location")
                );
                $this->model_foto->editData($data,$idfoto);
                $this->session->set_flashdata('msuccess', 'Foto berhasil di ubah.');
                redirect( base_url() );
            }
        }
        function hapusfoto($idFoto){
            $foto = $this->model_foto->get_foto($idFoto);
            if($foto[0]->member == $this->session->userdata( 'username' )){
                $this->model_foto->hapusData($idFoto);
                $this->session->set_flashdata('msuccess', 'Foto berhasil di hapus.');
                redirect( base_url() );
            }
        }
        function convert_time($time = ''){
            if( $time == '' ){
                $time = $_GET['time'];
                $echo = 1;
            }
            $time1 = str_replace('-','/',$time);
            $time2 = date('Y/m/d H:i:s');

            $diff  = abs(strtotime($time1) - strtotime($time2));
            if(floor($diff / (60*60*24*30))>=12){
                    $waktu = "tahun lalu";
            }else if(floor($diff / (60*60*24*30))<12 && floor($diff / (60*60*24*30))>0){
                    $waktu = "bulan lalu";
            }else if(floor($diff / (60*60*24))>=7){
                    $waktu = "minggu lalu";
            }else if(floor($diff / (60*60*24)) < 7 && floor($diff / (60*60*24))>0){
                    if($diff / (60*60*24)<2){
                            $waktu = "Satu hari lalu";
                    }else{
                            $waktu = floor($diff/(60*60*24))." hari lalu";
                    }
            }else if(floor($diff / (60*60))>=1){
                    if($diff / (60*60)<2){
                            $waktu = "Satu jam lalu";
                    }else{
                            $waktu = floor($diff/(60*60))." jam lalu";
                    }
            }else if(floor($diff / (60))>=1){
                    if($diff / (60)<2){
                            $waktu = "Satu menit lalu";
                    }else{
                            $waktu = floor($diff / (60))." menit lalu";
                    }
            }else{
                    $waktu = "Beberapa detik";
            }
            if(@$echo==1){
                echo $waktu;
            }
            return $waktu;
        }
    }
?>

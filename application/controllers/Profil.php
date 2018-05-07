<?php
    class profil extends CI_Controller{
        //public $CI = NULL;
        function __construct() {
            parent::__construct();
            $this->load->database();
            $this->load->model('model_foto');
            $this->load->model('model_komentar');
            $this->load->model('model_like');
            $this->load->model('model_member');
            $this->load->helper(array('form', 'url', 'file'));
        }
        function index(){
            
        }
        function aa(){
            return "halo";
        }
        function lihatprofil($username){
            $data['page']       = "view_profil";
            $data['profil']     = $this->model_member->get_member($username);
            $data['totalfoto']  = $this->model_foto->totalFoto($username);
            $data['totallike']  = $this->model_like->totalLike($username);
            $data['foto']       = $this->model_foto->get_foto_user($username);
            $this->load->view('main',$data);
        }
        function editprofil(){
            $data = array(
                'nama'      => $this->input->post( 'nama' ),
                'deskripsi' => $this->input->post( 'deskripsi' )
            );
            if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
                //user update foto profil
                $config['upload_path']      = './img/pp/';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = 1000000;
                $config['encrypt_name']     = TRUE;

                $this->load->library('upload', $config);

                $this->upload->do_upload('userfile');
                $upload_data = $this->upload->data(); 
                $link_foto = $upload_data['file_name'];
                
                $data['foto_profil'] = $link_foto;
                
                $file = $this->model_member->get_member($this->session->userdata( 'username' ));
                if($file[0]->foto_profil!='noprofil.jpg'){
                    unlink('./img/pp/'.$file[0]->foto_profil);
                }
            }
            if(!empty($this->input->post("password"))){
                $pengacak = "Wow, you open my code, go away man!!!";
                $data['password'] = md5(md5($pengacak).md5($this->input->post("password")).md5($pengacak));
            }
            $this->model_member->editData($data,$this->session->userdata( 'username' ));
            $this->session->set_flashdata('msuccess', 'Profil berhasil di ubah.');
            redirect( base_url().'profil/lihatprofil/'.$this->session->userdata( 'username' ) );
            
        }
    }
<?php
    class model_foto extends CI_Model{
        function get_foto($where = -1){
            if($where!=-1){
            $query = $this->db->where('idFoto',$where);
            }
            $query = $this->db->join('member', 'member.username = foto.member', 'left');
            $query = $this->db->order_by("tanggal", "desc");
            $query = $this->db->get('foto');
            //echo $this->db->queries[0];
            return $query->result();
        }
        function get_foto_user($user){
            $query = $this->db->where('foto.member',$user);
            $query = $this->db->join('member', 'member.username = foto.member', 'left');
            $query = $this->db->order_by("tanggal", "desc");
            $query = $this->db->get('foto');
            return $query->result();
        }
        function simpanData($data){
            $this->db->insert('foto', $data); 
        }
        function editData($data,$idFoto){
            $query = $this->db->where('idFoto',$idFoto);
            $query = $this->db->update('foto',$data);
        }
        function hapusData($idFoto){
            $query = $this->db->where('idFoto', $idFoto);
            $query = $this->db->delete('foto'); 
        }
        function totalFoto($username){
            $query = $this->db->where('member', $username);
            $query = $this->db->from('foto');
            $query = $this->db->count_all_results();
            return $query;
        }
    }
?>

<?php
    class model_komentar extends CI_Model{
      function get_komentar($where){
        $query = $this->db->where('foto',$where);
        $query = $this->db->get('komentar');
        return $query->result();
      }
      function count_komentar($idFoto){
        $query = $this->db->where('foto', $idFoto);
        $query = $this->db->from('komentar');
        $query = $this->db->count_all_results();
        return $query;
      }
      function simpankomentar($data){
        $this->db->insert('komentar', $data); 
      }
      function editKomentar($data,$idKomentar){
        $query = $this->db->where('idKomentar',$idKomentar);
        $query = $this->db->update('komentar',$data);
      }
      function deleteKomentar($idKomentar){
        $query = $this->db->where('idKomentar', $idKomentar);
        $query = $this->db->delete('komentar'); 
      }
      function get_komentar_single($idKomentar){
        $query = $this->db->where('idKomentar',$idKomentar);
        $query = $this->db->get('komentar');
        return $query->result();
      }
      
      
    }
?>

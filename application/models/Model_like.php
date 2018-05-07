<?php
    class model_like extends CI_Model{
      function count_like($idFoto){
        $query = $this->db->where('foto', $idFoto);
        $query = $this->db->from('like');
        $query = $this->db->count_all_results();
        return $query;
      }
      function islike($idFoto,$member){
        $query = $this->db->where('foto', $idFoto);
        $query = $this->db->where('member', $member);
        $query = $this->db->from('like');
        $query = $this->db->count_all_results();
        return $query;
      }
      function simpanlike($data){
          $this->db->insert('like', $data); 
      }
      function hapuslike($data){
          $query    = $this->db->where($data);
          $qry      = $this->db->delete('like');
      }
      function totalLike($username){
          $query    = $this->db->query("SELECT COUNT(*) as result FROM `like` WHERE foto IN (SELECT idFoto from foto WHERE member = '$username')");
          $query    = $query->result();
          return $query[0]->result;
      }
    }
?>

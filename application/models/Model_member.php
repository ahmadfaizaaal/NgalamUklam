<?php
    class model_member extends CI_Model{
        function get_member($where){
            $query = $this->db->where('username',$where);
            $query = $this->db->get('member');
            return $query->result();
        }
        function simpandata($data){
            $this->db->insert('member', $data); 
        }
        function editData($data,$username){
            $query = $this->db->where('username',$username);
            $query = $this->db->update('member',$data);
        }
        function count_user($username){
            $query = $this->db->where('username', $username);
            $query = $this->db->from('member');
            $query = $this->db->count_all_results();
            return $query;
        }
    }
?>

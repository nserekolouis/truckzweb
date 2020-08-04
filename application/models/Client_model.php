<?php defined('BASEPATH') OR exit('No direct script access allowed');

   class Client_model extends CI_Model{
     
     public function verify_client($data){
       $query = $this->db->get_where('clients',$data);
       if($query->num_rows()>0){
         return 1;
       }else{
         return 0;
       }
     }
     
    public function register_client($data){
      $phonenumber = $data['phonenumber'];
      $query = $this->db->get_where('clients',array('phonenumber'=>$phonenumber));
      if($query->num_rows() > 0){
        return false;
      }else{
        $this->db->insert('clients',$data);
        return true;
      }
    }
     
   }
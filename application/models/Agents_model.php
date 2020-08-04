   <?php defined('BASEPATH') OR exit('No direct script access allowed');

   class Agents_model extends CI_Model{

      public function add_agents($data){
      	$this->db->insert('agents',$data);
        return $this->db->insert_id();
      }

      public function get_list_agents($limit, $start){
         $this->db->limit($limit,$start);
      	$result=$this->db->get('agents');
      	return $result->result_array();
      }

      public function get_agent($id){
         $this->db->where('id',$id);
         $result =$this->db->get('agents');
         return $result->row_array();
      }

      public function get_list_search_agents($limit, $start,$search){
         $this->db->limit($limit,$start);
         $this->db->where('first_name LIKE ',$search);
         $result=$this->db->get('agents');
         return $result->result_array();
      }

      public function get_search_agents_count($search){
         $this->db->where('first_name LIKE ',$search);
         $result=$this->db->get('agents');
         return $result->num_rows();
      }

      public function update_agent_information($id,$data){
         $this->db->where('id',$id);
         $this->db->update('agents',$data);
      }


      public function activate_agent($id,$pin){
      	$this->db->set('active','1');
        $this->db->set('pin',$pin);
      	$this->db->where('id',$id);
      	return $this->db->update('agents');  
      }

      public function deactivate_agent($id){
      	$this->db->set('active','0');
      	$this->db->where('id',$id);
      	$this->db->update('agents');   
      }

      public function get_agent_count(){
         $result=$this->db->get('agents');
         return $result->num_rows();
      }
     
     public function change_pin($agent,$code){
       $this->db->set('pin',$code);
       $this->db->set('change_pin','1');
       $this->db->where('id',$agent);
       $this->db->update('agents');
     }
     
     public function verify_agent($agent,$old_code){
       $this->db->where('id',$agent);
       $this->db->where('pin',$old_code);
       $query = $this->db->get('agents');
       if($query->num_rows()>0){
         return 1;
       }else{
         return 0;
       }
     }
     
     public function does_phonenumber_exist($data){
       $query = $this->db->get_where('agents',$data);
       if($query->num_rows() > 0){
         return true;
       }else{
         return false;
       }
     }
      
   }

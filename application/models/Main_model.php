<?php defined('BASEPATH') OR exit('No direct script access allowed');

   class Main_model extends CI_Model{

   	 
     public function get_truck_owners($limit,$start){
        $this->db->limit($limit, $start); 
   	 	  $query=$this->db->get('truck_owners');
   	 	  return $query->result_array();
   	 }

     public function get_truck_owner_count(){
        $query=$this->db->get('truck_owners');
        return $query->num_rows();
     }

     public function get_search_truck_owners($limit,$start,$search){
        $this->db->where('first_name LIKE ',$search);
        $this->db->limit($limit, $start); 
        $query=$this->db->get('truck_owners');
        return $query->result_array();
     }

     public function get_truck_owner_search_count($search){
        $this->db->where('first_name LIKE ',$search);
        $query=$this->db->get('truck_owners');
        return $query->num_rows();
     }

   	 public function get_individual_truck_owners($limit,$start){
      $this->db->limit($limit, $start);
   	 	$query=$this->db->get_where('truck_owners',array('iscompany' =>0));
   	 	return $query->result_array();
   	 }

     public function get_individual_truck_owner_count(){
      $query=$this->db->get_where('truck_owners',array('iscompany' =>0));
      return $query->num_rows();
     }

   	 public function get_company_truck_owners($limit,$start){
      $this->db->limit($limit, $start); 
   	 	$query=$this->db->get_where('truck_owners',array('iscompany' =>1));
   	 	return $query->result_array();
   	 }

     public function get_company_truck_owners_count(){
      $query=$this->db->get_where('truck_owners',array('iscompany' =>1));
      return $query->num_rows();
     }

       public function activate_truck_owner($id,$code){
         $this->db->set('active','1');
         $this->db->set('code',$code);
         $this->db->where('id',$id);
         $this->db->update('truck_owners');
       }

       public function deactivate_truck_owner($id)
       {
         $this->db->set('active','0');
         $this->db->where('id',$id);
         $this->db->update('truck_owners');
       }

       public function get_truck_owner($id)
       {
         $query=$this->db->get_where('truck_owners',array('id'=>$id));
         return $query->row_array();
       }

       public function get_owner_trucks($owner_id){
        $query=$this->db->get_where('trucks',array('truck_owners' =>$owner_id));
        return $query->result_array();
       }
     
     public function get_owner_drivers($owner_id){
        $query=$this->db->get_where('drivers',array('truck_owners' =>$owner_id));
        return $query->result_array();
       }

       public function get_owner_email($id)
       {
        $this->db->select('email');
        $query=$this->db->get_where('truck_owners',array('id' => $id));
        return $query->row_array();
       }

       public function activate_truck($id)
       {
         $this->db->set('active','1');
         $this->db->where('id',$id);
         $this->db->update('trucks');
       }

       public function deactivate_truck($id)
       {
         $this->db->set('active','0');
         $this->db->where('id',$id);
         $this->db->update('trucks');
       }

       public function get_owner_id($truck_id)
       {
        $this->db->select('owner');
        $query=$this->db->get_where('trucks',array('id' => $truck_id));
        return $query->result_array();
       }

       public function get_truck_cat_count(){
        $this->db->where('type',2);
        $query = $this->db->get('truck_categories');
        return $query->num_rows();
       }
       
       public function get_truck_categories($limit,$start){
        $this->db->limit($limit, $start);
        $this->db->where('type',2);
        $query = $this->db->get('truck_categories');
        return $query->result_array();
       }
     
//      public function get_truck_categories_without(){
//        $this->db->limit($limit, $start);
//        $query = $this->db->get('truck_categories');
//        return $query->result_array();
//      }

       public function add_category_truck($data){
        $this->db->insert('truck_categories',$data);
        return $this->db->insert_id();
       }
     
     public function update_category_truck($id,$images){
       $this->db->set('image2',$images);
       $this->db->where('id',$id);
       $this->db->update('truck_categories');
     }

       public function get_orders($limit,$start){
          $this->db->order_by('id','desc'); 
          $this->db->limit($limit, $start);
          $query=$this->db->get('orders');
          return $query->result_array();
       }

      public function get_order_count(){
         return $this->db->count_all('orders');
      }

      public function get_order_item($id){
         $this->db->where('id',$id);
         $query=$this->db->get('orders');
         return $query->row_array();
      }

      public function get_client_information($client_id){
         $query=$this->db->get_where('clients',array('id'=>$client_id));
         return $query->row_array();
      }

      public function get_truck_category($category_id){
         $query=$this->db->get_where('truck_categories',array('id'=>$category_id));
         return $query->row_array();
      }
     
     public function get_notifications(){
       $this->db->order_by('id','desc');
       $query = $this->db->get('notifications');
       return $query->result_array();
     }
     
     public function get_driver_details($data){
       $query = $this->db->get_where('drivers',$data);
       return $query->row_array();
     }
     
     public function approve_driver($driver_id,$code){
       $this->db->set('admin_verification','1');
       $this->db->set('code',$code);
       $this->db->where('id',$driver_id);
       $this->db->update('drivers');
     }
     
     public function get_owner_details($data){
       $query = $this->db->get_where('truck_owners',$data);
       return $query->row_array();
     }
     
     public function get_unassigned_agents($data){
       $this->db->limit('1');
       $query = $this->db->get_where('agents',$data);
       if($query->num_rows()>0){
         return $query->row_array();
       }else{
         $this->db->set('assigned','0');
         $this->db->where('assigned','1');
         $this->db->update('agents');
         
         $this->db->limit('1');
         $query = $this->db->get_where('agents',$data);
         return $query->row_array();
       }
     }
     
     public function assign_owner_agent($agent_id,$owner_id){
       $this->db->set('agents',$agent_id);
       $this->db->where('id',$owner_id);
       $this->db->update('truck_owners');
     }
     
     public function approve_truckowner($owner_id,$code){
       $this->db->set('code',$code);
       $this->db->set('admin_verification','1');
       $this->db->where('id',$owner_id);
       $this->db->update('truck_owners');
     }
     
     public function get_truck_details($data){
       $query = $this->db->get_where('trucks',$data);
       return $query->row_array();
     }
     
     public function assign_truck_agent($agent_id,$truck_id){
       $this->db->set('agents',$agent_id);
       $this->db->where('id',$truck_id);
       $this->db->update('trucks');
     }
     
     public function approve_truck($truck_id){
       $this->db->set('admin_verification','1');
       $this->db->where('id',$truck_id);
       $this->db->update('trucks');
     }

     public function get_notification_count(){
      $this->db->order_by('id','desc');
      $query = $this->db->get('notifications');
      return $query->num_rows();
     }
     
   }
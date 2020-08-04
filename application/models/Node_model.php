<?php defined('BASEPATH') OR exit('No direct script access allowed');

   class Node_model extends CI_Model{


      public function login($data){
      	$result = $this->db->get_where('agents',$data);
      	return $result;
      }
     
     public function update_agent_device_token($device_token,$phonenumber,$pin){
       $this->db->set('token',$device_token);
       $this->db->where('phonenumber',$phonenumber);
       $this->db->where('pin',$pin);
       $this->db->update('agents');
     }

      public function add_truck_owner($data){
         $this->db->insert('truck_owners',$data);
         return $this->db->insert_id();
      }

//       public function getlistowners($agent_id = NULL,$query = NULL){
//         if(isset($agent_id)){
//           $this->db->where('agents',$agent_id);
//           $result=$this->db->get('truck_owners');
//           return $result->result_array();
//         }elseif(isset($query)){
//           $this->db->like('first_name',$query);
//           $this->db->or_like('second_name',$query);
//           $this->db->or_like('company',$query);
//           $result=$this->db->get('truck_owners');
//           return $result->result_array();
//         }else{
//           return array();
//         }
//       }
     
     public function get_agent_list_owners($agent_id){
       $this->db->where('agents',$agent_id);
       $result=$this->db->get('truck_owners');
       return $result->result_array();
     }
     
     public function get_search_list_owners($query){
       $this->db->like('first_name',$query);
       $this->db->or_like('second_name',$query);
       $this->db->or_like('company',$query);
       #$this->db->where('verified','0');
       #$this->db->or_where('all_trucks_verified','0');
       $result=$this->db->get('truck_owners');
       return $result->result_array();
     }

      public function add_truck_info($data){
        $this->db->insert('trucks',$data);
        return $this->db->insert_id();
      }

      public function add_number($number,$code,$token){
          $query=$this->db->get_where('clients',array('phonenumber' => $number));
          if($query->num_rows()>0){
            $this->db->set('fcm_token',$token);
            $this->db->set('verification_code',$code);
            $this->db->where('phonenumber', $number);
            $this->db->update('clients');
          }else{
            $this->db->insert('clients',array('phonenumber' => $number,'verification_code'=> $code,'fcm_token'=> $token));
          }
          
      }

      public function add_user_phone_number($data){
         $this->db->insert('clients',$data);
      }

      public function add_client_profile($phonenumber,$data){
        $this->db->where('phonenumber',$phonenumber);
        $this->db->update('clients',$data);
      }

      public function get_trucks_by_category($category){
        $query=$this->db->get_where('trucks',array('category' => $category));
        return $query->result_array();
      }

      public function check_code_and_number($data){
        $query=$this->db->get_where('clients',$data);
        if($query->num_rows()>0){
          return 1;
        }else{
          return 0 ;
        }
      }

      public function get_category_types($query){
        if(empty($query)){
          $this->db->where('type','2');
          $query = $this->db->get('truck_categories');
          return $query->result_array();
        }else{
          $this->db->where('type','2');
          $this->db->like('name',$query);
          $query = $this->db->get('truck_categories');
          return $query->result_array();
        }
      }
     
     public function verify_truck_owner_phonenumber($data){
       $query = $this->db->get_where('truck_owners',$data);
       if($query->num_rows()>0){
         return '1';
       }else{
         return '0';
       }
     }
     
     public function check_owner_approved($data){
       $query = $this->db->get_where('truck_owners',$data);
       if($query->num_rows()>0){
         return '1';
       }else{
         return '0';
       }
     }
     
     public function check_driver_approved($data){
       $query=$this->db->get_where('drivers',$data);
       if($query->num_rows() > 0){
         return 1;
       }else{
         return 0;
       }
     }
     
     public function verify_truck_owner($data){
       $this->db->where('phonenumber',$data['phonenumber']);
       $this->db->where('code',$data['code']);
       $query = $this->db->get('truck_owners');
       if($query->num_rows()>0){
         $this->db->set('token',$data['token']);
         $this->db->where('phonenumber',$data['phonenumber']);
         $this->db->where('code',$data['code']);
         $this->db->update('truck_owners');
         return '1';
       }else{
         return '0';
       }
     }
     
     public function verify_truck_driver_phonenumber($data){
       $query=$this->db->get_where('drivers',$data);
       if($query->num_rows() > 0){
         return 1;
       }else{
         return 0;
       }
     }
     
     public function verify_truck_driver($data){
       $this->db->where('phonenumber',$data['phonenumber']);
       $this->db->where('code',$data['code']);
       $query=$this->db->get('drivers');
       if($query->num_rows() > 0){
         $this->db->set('token',$data['token']);
         $this->db->where('phonenumber',$data['phonenumber']);
         $this->db->where('code',$data['code']);
         $this->db->update('drivers');
         return 1;
       }else{
         return 0;
       }
     }

      public function get_id_where_number($phonenumber)
      {
        $this->db->select('id');
        $query=$this->db->get_where('truck_owners',array('phonenumber' => $phonenumber));
        return $query->row_array(); 
      }

      public function get_my_trucks($id){
        $query=$this->db->get_where('trucks',array('truck_owners' => $id));
        return $query->result_array();
      }

      public function add_driver_info($data){
        $this->db->insert('drivers',$data);
        return $this->db->insert_id();
      }

      public function get_my_drivers($id)
      {
        $query=$this->db->get_where('drivers',array('owner_id' =>$id));
        return $query->result_array();
      }

      public function update_driver($truck_id,$driver_id)
      {
        $this->db->where('id',$driver_id);
        $this->db->set('truck_id',$truck_id);
        $this->db->update('drivers');
      }

      public function update_truck($truck_id,$driver_id)
      {
        $this->db->where('id',$truck_id);
        $this->db->set('drivers_id',$driver_id);
        $this->db->update('trucks');  
      }
      public function get_truck_number_plate($truck_id)
      {
        $this->db->select('number_plate');
        $query=$this->db->get_where('trucks',array('id' => $truck_id));
        return $query->row_array();
      }

      public function make_order($data)
      {
        $this->db->insert('orders',$data);
        $id=$this->db->insert_id();
        return $id;
      }
      
      public function get_client_id($phonenumber){
        $this->db->where('phonenumber',$phonenumber);
        $query = $this->db->get('clients');
        return $query->row_array();
      }

      public function get_status($order_number){
         $this->db->select('status');
         $query=$this->db->get_where('orders',array('id' => $order_number));
         return $query->row_array();
      }

      public function get_orders()
      {
         $query=$this->db->get('orders');
         return $query->result_array();
      }

      public function get_order($order_id){
         $this->db->where('id',$order_id);
         $query=$this->db->get('orders');
         return $query->row_array();
      }

      public function get_category_name($truck_type){
         $this->db->select('name','image');
         $query=$this->db->get_where('truck_categories',array('id'=>$truck_type));
         return $query->row_array();
      }

      public function get_service_provider($phonenumber){
        $query=$this->db->get_where('truck_owners',array('phonenumber' =>$phonenumber));
        return $query->row_array();
      }

      public function get_available_trucks($data){
        $this->db->where('truck_categories',$data['truck_type']);
        //$this->db->where('truck_size',$data['size']);
        $query=$this->db->get('trucks');
        return $query->result_array();
      }

      public function update_found_service_provider($order_id,$service_provider,$driver_id,$truck_id){
        $this->db->set('status','2');
        $this->db->set('service_provider',$service_provider);
        $this->db->set('truck_id',$truck_id);
        $this->db->set('driver_id',$driver_id);
        $this->db->where('id',$order_id);
        $this->db->update('orders');
      }
     
      public function get_my_orders($service_provider)
      {
        $query=$this->db->get_where('orders',array('service_provider'=>$service_provider));
        return $query->result_array();
      }

      public function get_job_status($order_id)
      {
        $result=$this->db->get_where('orders',array('id' => $order_id));
        return $result->row_array();
      }

      public function update_status($id,$data)
      {
        $this->db->where('id',$id);
        $this->db->update('orders',$data);
      }

      public function add_transaction($info){
         $this->db->insert('transactions',$info);
      }

      public function add_sp_transaction($info){
         $this->db->insert('sp_transactions',$info);
      }

      public function get_user_id($contact){
        $this->db->where('phonenumber',$contact);
        $query=$this->db->get('clients');
        return $query->row_array();
      }

      public function get_sp_id($contact){
        $this->db->where('phonenumber',$contact);
        $query=$this->db->get('truck_owners');
        return $query->row_array();
      }

      public function get_transactions($client){
        $this->db->order_by('id','desc');
        $this->db->where('client',$client);
        $this->db->where('status','initiated');
        $query=$this->db->get('transactions');
        return $query->result_array();
      }

      public function get_sp_transactions($sp){
        $this->db->order_by('id','desc');
        $this->db->where('truck_owners',$sp);
        $this->db->where('status','initiated');
        $query=$this->db->get('sp_transactions');
        return $query->result_array();
      }

      public function update_transaction_status($trans_id,$status){
        $this->db->set('status',$status);
        $this->db->set('read','1');
        $this->db->where('trans_id',$trans_id);
        $this->db->update('transactions');
      }

      public function update_sp_transaction_status($trans_id,$status){
        $this->db->set('status',$status);
        $this->db->set('read','1');
        $this->db->where('trans_id',$trans_id);
        $this->db->update('sp_transactions');
      }

     
      public function get_approved_transactions($client){
        $this->db->where('client',$client);
        $this->db->where('status','delivered');
        $this->db->where('read','0');
        $query=$this->db->get('transactions');
        return $query->result_array();
      }

      public function get_sp_approved_transactions($sp){
        $this->db->where('truck_owners',$sp);
        $this->db->where('status','delivered');
        $this->db->where('read','0');
        $query=$this->db->get('sp_transactions');
        return $query->result_array();
      }

      public function get_transaction_details($trans_id){
        $this->db->where('trans_id',$trans_id);
        $query = $this->db->get('transactions');
        return $query->row_array();
      }

      public function get_sp_transaction_details($trans_id){
        $this->db->where('trans_id',$trans_id);
        $query = $this->db->get('sp_transactions');
        return $query->row_array();
      }

      public function change_read_status($id){
        $this->db->set('read','1');
        $this->db->where('id',$id);
        $this->db->update('transactions');
      }

      public function change_sp_read_status($id){
        $this->db->set('read','1');
        $this->db->where('id',$id);
        $this->db->update('sp_transactions');
      }

      public function update_sp_wallet($sp,$amount){
         $query=$this->db->get_where('wallet_service_providers',array('truck_owners' =>$sp));
         if($query->num_rows()>0){
           $old_amount=$query->row_array()['credit'];
           $new_amount=$old_amount+$amount;
           $this->db->set('timestamp',date("Y-m-d h:i:sa"));
           $this->db->set('credit',$new_amount);
           $this->db->where('truck_owners',$sp);
           $this->db->update('wallet_service_providers');
         }else{
           $this->db->insert('wallet_service_providers',array('truck_owners' =>$sp,'credit'=>$amount,'timestamp'=>date("Y-m-d h:i:sa")));
         }
      }

       public function update_client_wallet($client,$amount){
         $query=$this->db->get_where('wallet_clients',array('client' =>$client));
         if($query->num_rows()>0){
           $old_amount=$query->row_array()['credit'];
           $new_amount=$old_amount+$amount;
           $this->db->set('timestamp',date("Y-m-d h:i:sa"));
           $this->db->set('credit',$new_amount);
           $this->db->where('client',$client);
           $this->db->update('wallet_clients');
         }else{
           $this->db->insert('wallet_clients',array('client' =>$client,'credit'=>$amount,'timestamp'=>date("Y-m-d h:i:sa")));
         }
      }





      public function get_wallet_balance($client){
       $this->db->where('client',$client);
       $query=$this->db->get('wallet_clients');
       return $query->row_array()['credit'];
      }

      public function get_sp_wallet_balance($sp){
       $this->db->where('truck_owners',$sp);
       $query=$this->db->get('wallet_service_providers');
       return $query->row_array()['credit'];
      }

      public function get_all_transactions($client){
        $this->db->order_by('id','desc');
        $this->db->where('client',$client);
        $query=$this->db->get('transactions');
        return $query->result_array();
      }

      public function get_truck_type($id){
        $this->db->where('id',$id);
        $query=$this->db->get('truck_categories');
        return $query->row_array();
      }

      public function request_code($phonenumber){
         $query=$this->db->get_where('clients',array('phonenumber' =>$phonenumber));
         if($query->num_rows()>0){
          return true;
         }else{
          return false;
         }
      }
      
      public function update_verification_code($phonenumber,$code,$token){
        $this->db->set('verification_code',$code);
        $this->db->set('fcm_token',$token);
        $this->db->where('phonenumber',$phonenumber);
        $this->db->update('clients');
      }

      public function get_order_status($order_id)
      {
         $this->db->where('id',$order_id);
         $query=$this->db->get('orders');
         return $query->row_array();
      }

      public function get_client_details($client_id){
         $this->db->where('id',$client_id);
         $query=$this->db->get('clients');
         return $query->row_array();
      }
     
     public function get_client_details_phone($phonenumber){
         $this->db->where('phonenumber',$phonenumber);
         $query = $this->db->get('clients');
         return $query->row_array();
      }
      
      public function get_client_info($order_id)
      {
         $this->db->where('id',$order_id);
         $query=$this->db->get('orders');
         return $query->row_array();
      }

      public function get_truck_categories(){
        $this->db->where('type','1');
        $query=$this->db->get('truck_categories');
        return $query->result_array();
     }

     public function get_fcm_code($id){
       $this->db->select('token');
       $this->db->where('id',$id);
       $query=$this->db->get('truck_owners');
       return $query->row_array();
     }

     public function get_truck_driver($owner,$truck_category){
         $this->db->where('truck_owners',$owner);
         $this->db->where('truck_categories',$truck_category);
         $this->db->where('job_status','0');
         $this->db->limit(1);
         $query = $this->db->get('trucks');
         return $query->row_array();
     }

     public function get_driver_fcm_token($driver_id){
         $this->db->where('id',$driver_id);
         $query=$this->db->get('drivers');
         return $query->row_array();
     }

     public function get_client_detail($id){
        $this->db->where('id',$id);
        $query=$this->db->get('clients');
        return $query->row_array();
     }

    public function get_sp_fcm_token($id){
       $this->db->where('id',$id);
       $query=$this->db->get('truck_owners');
       return $query->row_array()['token'];
    }

    public function update_rating($data){
      $this->db->insert('rating',$data);
    }

    public function get_client_orders($client_id){
      $this->db->where('client_id',$client_id);
      $query=$this->db->get('orders');
      return $query->result_array();
    }

    public function get_agent_registered_trucks($data){
      $query=$this->db->get_where('trucks',$data);
      return $query->result_array();
    }

    public function get_truck_category($data){
      $query =$this->db->get_where('truck_categories',$data);
      return $query->row_array();
    }

    public function get_truck_owner($data){
      $query =$this->db->get_where('truck_owners',$data);
      return $query->row_array();
    }
    
    public function is_client_number_set($phonenumber){
      $query=$this->db->get_where('clients',array('phonenumber'=>$phonenumber));
      if($query->num_rows()>0){
        return true;
      }else{
        return false;
      }
    }
    
    public function if_owner_exists($phonenumber){
      $query=$this->db->get_where('truck_owners',array('phonenumber'=>$phonenumber));
      if($query->num_rows()>0){
        return true;
      }else{
        return false;
      }
    }
     
     public function if_driver_exists($phonenumber){
      $query=$this->db->get_where('drivers',array('phonenumber'=>$phonenumber));
      if($query->num_rows()>0){
        return true;
      }else{
        return false;
      }
    }
     
     public function update_owner_code($phonenumber,$code){
       $this->db->set('code',$code);
       $this->db->set('change_code','0');
       $this->db->where('phonenumber',$phonenumber);
       $this->db->update('truck_owners');
     }
     
     public function update_driver_code($phonenumber,$code){
       $this->db->set('code',$code);
       $this->db->set('change_code','0');
       $this->db->where('phonenumber',$phonenumber);
       $this->db->update('drivers');
     }
     
     public function search_trucks($query){
       $this->db->like('number_plate',$query);
       $query = $this->db->get('trucks');
       return $query->result_array();
     }
     
     public function get_serviceprovider_trucks($serviceprovider_id){
       $query = $this->db->get_where('trucks',array('truck_owners'=>$serviceprovider_id,'verified'=>'0'));
       return $query->result_array();
     }
     
     public function verify_truck($agent_id,$truck_id){
       $this->db->set('agents',$agent_id);
       $this->db->set('agent_verification','1');
       $this->db->where('id',$truck_id);
       $this->db->update('trucks');
     }
     
      public function verify_owner($agent_id,$owner_id){
       $this->db->set('agents',$agent_id);
       $this->db->set('agent_verification','1');
       $this->db->where('id',$owner_id);
       $this->db->update('truck_owners');
     }
     
     public function get_owner_details($owner_id){
       $query = $this->db->get_where('truck_owners',array('id' => $owner_id));
       return $query->row_array();
     }
     
     public function get_truck_details($truck_id){
       $query = $this->db->get_where('trucks',array('id'=>$truck_id));
       return $query->row_array();
     }
     
     public function count_verified_trucks($owner_id){
       $query = $this->db->get_where('trucks',array('truck_owners'=>$owner_id,'agent_verification'=>'1'));
       return $query->num_rows();
     }
     
     public function owner_exists($owner_id,$code){
       $query = $this->db->get_where('truck_owners',array('id'=>$owner_id,'code'=>$code));
       if($query->num_rows()>0){
         return 1;
       }else{
         return 0;
       }
     }
     
     public function driver_exists($driver_id,$code){
       $query = $this->db->get_where('drivers',array('id'=>$driver_id,'code'=>$code));
       if($query->num_rows()>0){
         return 1;
       }else{
         return 0;
       }
     }
     
     public function change_pin_owner($owner_id,$code){
       $this->db->set('code',$code);
       $this->db->set('change_code','1');
       $this->db->where('id',$owner_id);
       $this->db->update('truck_owners');
     }
     
     public function change_pin_driver($driver_id,$code){
       $this->db->set('code',$code);
       $this->db->set('change_code','1');
       $this->db->where('id',$driver_id);
       $this->db->update('drivers');
     }
     
     public function add_notified_owner($data){
       $this->db->insert('sp_notified',$data);
     }
     
     public function get_available_drivers($data){
       $query = $this->db->get_where('drivers',$data);
       return $query->result_array();
     }
     
     public function get_busy_drivers($data){
       $query = $this->db->get_where('drivers',$data);
       return $query->result_array();
     }
     
     public function get_available_truckz($data){
        $query = $this->db->get_where('trucks',$data);
        return $query->result_array();
     }
     
     public function get_busy_trucks($data){
        $query = $this->db->get_where('trucks',$data);
        return $query->result_array();
     }
     
     public function get_unassigned_drivers($data){
        $query = $this->db->get_where('drivers',$data);
        return $query->result_array(); 
     }
     
     public function set_notification($data){
       $this->db->insert('notifications',$data);
     }
     
     public function get_registered_drivers($data){
       $query = $this->db->get_where('drivers',$data);
       return $query->result_array();
     }
     
     public function get_registered_trucks($data){
       $query = $this->db->get_where('trucks',$data);
       return $query->result_array();
     }
     
     public function get_driver_details_verification($data){
       $query = $this->db->get_where('drivers',$data);
       return $query->row_array();
     }
     
     public function get_driver_details($driver_id){
       $query = $this->db->get_where('drivers',array('id'=>$driver_id));
       return $query->row_array();
     }
     
     public function update_truck_info($truck_id,$data){
       $this->db->set($data);
       $this->db->where('id',$truck_id);
       $this->db->update('trucks');
     }
     
     public function update_truck_owner($owner_id,$data){
       $this->db->set($data);
       $this->db->where('id',$owner_id);
       $this->db->update('truck_owners');
     }
     
     public function update_driver_info($driver_id,$data){
       $this->db->set($data);
       $this->db->where('id',$driver_id);
       $this->db->update('drivers');
     }
     
     public function checkowner_agent_verification($data){
       $query = $this->db->get_where('truck_owners',$data);
       return $query;
     }
     
     public function checkowner_admin_verification($data){
       $query = $this->db->get_where('truck_owners',$data);
       return $query;
     }
     
     public function checktruck_agent_verification($data){
       $query = $this->db->get_where('trucks',$data);
       return $query;
     }
     
     public function checktruck_admin_verification($data){
       $query = $this->db->get_where('trucks',$data);
       return $query;
     }
     
     public function checkdriver_admin_verification($data){
       $query = $this->db->get_where('trucks',$data);
       return $query;
     }
     
     public function set_agent_notification($data){
       $this->db->insert('agent_notifications',$data);
     }   
     
     public function update_owner_online_status($owner_id){
       $this->db->set('offline_status','1');
       $this->db->where('id',$owner_id);
       $this->db->update('truck_owners');
     }
     
     public function update_driver_online_status($driver_id){
       $this->db->set('offline_status','1');
       $this->db->where('id',$driver_id);
       $this->db->update('drivers');
     }
     
     public function removeOfflineDrivers(){
       $this->db->set('offline_status','0');
       $this->db->where('offline_status','1');
       $this->db->update('drivers');
     }
     
     public function removeOfflineOwners(){
       $this->db->set('offline_status','0');
       $this->db->where('offline_status','1');
       $this->db->update('truck_owners');
     }
     
     public function does_client_exist($username,$password){
       $this->db->where('username',$username);
       $this->db->where('password',$password);
       $query = $this->db->get('clients');
       return $query;
     }
     
     public function add_rating($data){
     $insert = $this->db->insert('rating',$data); 
      return $insert;
     }
     
     public function update_token($phonenumber,$token){
       $this->db->where('phonenumber',$phonenumber);
       $this->db->update('clients',array('fcm_token'=>$token));
     }

     public function get_notification_count(){
      
     }
}
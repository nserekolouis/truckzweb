 <?php defined('BASEPATH') OR exit('No direct script access allowed');

   class Wallet_model extends CI_Model{

       public function get_client_wallet($id){
            $query = $this->db->get_where('wallet_clients',array('client'=>$id));
            return $query->row_array(); 
       }

       public function get_service_provider_wallet($id){
            $query = $this->db->get_where('wallet_service_providers',array('truck_owners'=>$id));
            return $query->row_array(); 
       }

        public function credit_sp_wallet($sp,$amount){
           $query = $this->db->get_where('wallet_service_providers',array('truck_owners' =>$sp));
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

       public function debit_sp_wallet($sp,$amount){
          $query = $this->db->get_where('wallet_service_providers',array('truck_owners' =>$sp));
          if($query->num_rows()>0){
             $old_amount=$query->row_array()['credit'];
             $new_amount=$old_amount-$amount;
             $this->db->set('timestamp',date("Y-m-d h:i:sa"));
             $this->db->set('credit',$new_amount);
             $this->db->where('truck_owners',$sp);
             $this->db->update('wallet_service_providers'); 
          }else{
             $this->db->insert('wallet_service_providers',array('truck_owners' =>$sp,'credit'=>$amount,'timestamp'=>date("Y-m-d h:i:sa")));
          }
      }

       public function credit_client_wallet($client,$amount){
          $query = $this->db->get_where('wallet_clients',array('client' =>$client));
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

      public function debit_client_wallet($client,$amount){
          $query = $this->db->get_where('wallet_clients',array('client' =>$client));
          if($query->num_rows()>0){
             $old_amount=$query->row_array()['credit'];
             $new_amount=$old_amount-$amount;
             $this->db->set('timestamp',date("Y-m-d h:i:sa"));
             $this->db->set('credit',$new_amount);
             $this->db->where('client',$client);
             $this->db->update('wallet_clients'); 
          }else{
            $this->db->insert('wallet_clients',array('client' =>$client,'credit'=>$amount,'timestamp'=>date("Y-m-d h:i:sa")));
          }
      }

       public function credit_service_provider_wallet($client,$amount){
          $query = $this->db->get_where('wallet_service_providers',array('truck_owners' =>$client));
          if($query->num_rows()>0){
             $old_amount=$query->row_array()['credit'];
             $new_amount=$old_amount+$amount;
             $this->db->set('timestamp',date("Y-m-d h:i:sa"));
             $this->db->set('credit',$new_amount);
             $this->db->where('truck_owners',$client);
             $this->db->update('wallet_service_providers'); 
          }else{
            $this->db->insert('wallet_service_providers',array('truck_owners' =>$client,'credit'=>$amount,'timestamp'=>date("Y-m-d h:i:sa")));
          }
      }

      public function debit_service_provider_wallet($client,$amount){
          $query = $this->db->get_where('wallet_service_provider',array('truck_owners' => $client));
          if($query->num_rows()>0){
             $old_amount=$query->row_array()['credit'];
             $new_amount=$old_amount-$amount;
             $this->db->set('timestamp',date("Y-m-d h:i:sa"));
             $this->db->set('credit',$new_amount);
             $this->db->where('truck_owners',$client);
             $this->db->update('wallet_service_providers'); 
          }else{
            $this->db->insert('wallet_service_providers',array('truck_owners' =>$client,'credit'=>$amount,'timestamp'=>date("Y-m-d h:i:sa")));
          }
      }
   }

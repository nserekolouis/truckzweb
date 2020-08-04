 <?php defined('BASEPATH') OR exit('No direct script access allowed');

   class Order_model extends CI_Model{
     
     public function update_order_status($order_id,$status){
       $this->db->set('status',$status);
       $this->db->where('id',$order_id);
       $this->db->update('orders');
     }
     
     public function update_service_provider_truck(){
       
     }
     
   }
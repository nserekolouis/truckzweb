 <?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Driver_model extends CI_Model{
   
   public function add_driver_location($data){
     return $this->db->insert('driver_location',$data);
   }
   
   public function get_driver_location($driver_id){
     $query = $this->db->get_where('driver_location',array('driver_id'=>$driver_id));
     return $query->row_array();
   }
   
 }
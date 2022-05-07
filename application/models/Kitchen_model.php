<?php 

    class Kitchen_model extends CI_Model{
        
        // Orders 
        
        public function display_all_pending_orders(){
          $this->db->order_by('created_date', 'ASC');
          $this->db->where('status', 'Pending');
          $query = $this->db->get('order_items')->result();
          return $query;
        }
        
        public function display_all_delivering_orders(){
          $this->db->order_by('created_date', 'ASC');
          $this->db->where('status', 'Delivering');
          $query = $this->db->get('order_items')->result();
          return $query;
        }
        
        public function display_all_delivered_orders(){
          $this->db->order_by('created_date', 'ASC');
          $this->db->where('status', 'Delivered');
          $query = $this->db->get('order_items')->result();
          return $query;
        }
        
        public function display_all_cancelled_orders(){
          $this->db->order_by('created_date', 'ASC');
          $this->db->where('status', 'Cancelled');
          $query = $this->db->get('order_items')->result();
          return $query;
        }
        
        public function cancel_order($id, $status){
          $query = $this->db->query("UPDATE order_items SET status = '$status' WHERE id = '$id' ");
        }
    
        public function delivering_order($id, $status){
          $query = $this->db->query("UPDATE order_items SET status = '$status' WHERE id = '$id' ");
        }
        
        public function pending_order($id, $status){
          $query = $this->db->query("UPDATE order_items SET status = '$status' WHERE id = '$id' ");
        }
    
        public function delivered_order($id, $status){
          $query = $this->db->query("UPDATE order_items SET status = '$status' WHERE id = '$id' ");
        }
    
        public function delete_order($id){
          $query = $this->db->query("DELETE FROM order_items WHERE id = '$id' ");
        }
        
        // End of Orders 
    }

?>
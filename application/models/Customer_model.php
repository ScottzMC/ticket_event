<?php 

    class Customer_model extends CI_Model{
        
        // Profile 
        
        public function display_all_user_info($email){
            $this->db->where('email', $email);
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function update_user_info($email, $data){
            $this->db->where('email', $email);
            $query = $this->db->update('users', $data);
            return $query;
        }
        
        // End of Profile 
        
        // Orders 
        
        public function display_order_count(){
            $query = $this->db->query("SELECT COUNT(*) AS order_count FROM order_items")->result();
            return $query;
        }
        
        public function display_all_pending_orders_by_email($email){
            $this->db->order_by('created_date', 'ASC');
            $this->db->where('active', '0');
            $this->db->where('status', 'Pending');
            $this->db->where('email', $email);
            $query = $this->db->get('order_items')->result();
            return $query;
        }
        
        public function display_all_delivering_order_by_email($email){
          $this->db->order_by('created_date', 'ASC');
          $this->db->where('active', '0');
          $this->db->where('status', 'Delivering');
          $this->db->where('email', $email);
          $query = $this->db->get('order_items')->result();
          return $query;
        }
        
        public function display_all_delivered_order_by_email($email){
          $this->db->order_by('created_date', 'ASC');
          $this->db->where('active', '0');
          $this->db->where('status', 'Delivered');
          $this->db->where('email', $email);
          $query = $this->db->get('order_items')->result();
          return $query;
        }
        
        public function display_all_cancelled_orders_by_email($email){
	      $this->db->where('email', $email);
	      $this->db->where('status', 'Cancelled');
	      $this->db->where('active', '0');
	      $query = $this->db->get('order_items')->result();
	      return $query;
	    }
	    
	    public function update_order_status($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('order_items', $data);
          return $query;
        }
        
        public function delete_order($id){
          $query = $this->db->query("DELETE FROM order_items WHERE id = '$id' ");
        }
        
        public function update_order($id){
          $query = $this->db->query("UPDATE order_items SET active = '1' WHERE id = '$id' ");
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
        
        // End of Orders
        
        // Ticket 
        
        public function display_ticket_orders_by_email($status, $email){
          $this->db->select('ticket_order.code, ticket_order.ticket_code, ticket_order.title, ticket_order.status, ticket_order.active, ticket_order.customer_email, ticket_order.created_date, ticket_order.price, ticket_order.quantity, ticket_order.checked, events.title AS events, events.code, events.created_date AS event_date');
          $this->db->from('ticket_order');
          $this->db->join('events', 'ticket_order.code = events.code');
          $this->db->where('ticket_order.status', $status);
          $this->db->where('ticket_order.active', '0');
          $this->db->where('ticket_order.customer_email', $email);
          $this->db->order_by('ticket_order.created_date', 'DESC');
          
          $query = $this->db->get()->result();
          return $query;
        }
        
        public function display_ticket_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('ticket')->result();
            return $query;
        }
        
        public function display_ticket_filter_report($email, $start_date, $end_date){
            $this->db->where('customer_email', $email);
            $this->db->where('created_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $query = $this->db->get("ticket_order")->result();
            return $query;
        }
        
        public function update_ticket($id){
          $query = $this->db->query("UPDATE ticket_order SET active = '1' WHERE id = '$id' ");
        }
        
        public function delete_ticket($id){
          $query = $this->db->query("DELETE FROM ticket_order WHERE id = '$id' ");
        }
        
        // End of Ticket 
        
        // Shopping 
        
        public function display_all_orders_by_email($email){
	        $this->db->where('active', '0');
	        $this->db->where('email', $email);
	        $query = $this->db->get('order_items')->result();
	        return $query;
	    }
        
        // End of Shopping 
        
        
        public function display_all_booking_by_email($email){
	        $this->db->where('email', $email);
	        $query = $this->db->get('booking')->result();
	        return $query;
	    }
        
    }

?>
<?php 

    class Data_model extends CI_Model{
        
        // Account 
        
        public function create_user($data){
            $escape_data = $this->db->escape_str($data);
            $query = $this->db->insert('users', $escape_data);
            return $query;
        }
        
        public function apply_business_account($data){
            $escape_data = $this->db->escape_str($data);
            $query = $this->db->insert('users', $escape_data);
            return $query;
        }
      	  
      	public function validate($email, $password){
      	    $this->db->where('email', $email);
      	    $this->db->select('*');
            $this->db->from('users');
      	    $query = $this->db->get();
      	      
      	    $result = $query->row_array();
      	      
      	    if($this->bcrypt->check_password($password, $result['password'])){
      	       return $query->result();
      	    }else{
      	       return $query->result();
      	    }
      	  }
      	  
      	  public function activate_user($code){
              $query = $this->db->query("UPDATE users SET status = 'Activated' WHERE code = '$code' ");
              return $query;
          }
          	
          public function update_user_password($email, $password){
             $query = $this->db->query("UPDATE users SET password = '$password' WHERE email = '$email' ");
             return $query;
          }
        
        // End of Account
        
        // Home 
        
        public function display_status(){
            //$this->db->order_by('category','ASC');
            //$query = $this->db->query("SELECT * FROM menu_status WHERE currency_type = '$type' ORDER BY category ASC")->result();
            $query = $this->db->query("SELECT * FROM menu_status ORDER BY category ASC")->result();
            return $query;
        }
        
        public function display_events(){
            $this->db->limit('12');
            $this->db->order_by('created_date','DESC');
            //$this->db->where('type', $type);
            $query = $this->db->get('events')->result();
            return $query;
        }
        
        public function display_slider($category){
            $this->db->where('category', $category);
            //$this->db->where('type', $type);
            $query = $this->db->get('slider')->result();
            return $query;
        }
        
        public function display_youtube_banner(){
            //$this->db->limit('1');
            $this->db->where('type', 'Home');
            //$this->db->where('currency_type', $type);
            $query = $this->db->get("videos")->result();
            return $query;
        }
        
        public function display_customer_by_ticket($ticket_code){
            $this->db->where('ticket_code', $ticket_code);
            $query = $this->db->get('ticket_order')->result();
            return $query;
        }
        
        public function display_footer(){
          $query = $this->db->get('footer')->result();
          return $query;
        }
        
        // End of Home 
        
        // Events 
        
        public function display_event_by_detail($code){
            $this->db->where('code', $code);
            //$this->db->where('type', $type);
            $query = $this->db->get('events')->result();
            return $query;
        }
        
        public function display_venue_by_detail($id){
            $this->db->where('id', $id);
            $query = $this->db->get('venue')->result();
            return $query;
        }
        
        public function display_related_events($category){
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('category', $category);
            //$this->db->where('type', $type);
            $this->db->distinct();
            $query = $this->db->get('events')->result();
            return $query; 
        }
        
        public function record_event_category_count($category){
          $this->db->from('events');
          $this->db->where('category', $category);
          $query = $this->db->count_all_results();
          return $query;
        }
        
        public function record_event_search_count(){
          $query = $this->db->count_all('events');
          return $query;
        }
        
        public function fetch_search_data($limit, $start, $title){
           $this->db->limit($limit, $start);
           $query = $this->db->query("SELECT * FROM events WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
    
        public function fetch_event_category_data($category, $limit, $start){
         $this->db->limit($limit, $start);
         $this->db->order_by('created_date', 'DESC');
         $this->db->where('category', $category);
         $query = $this->db->get("events");
    
         if ($query->num_rows() > 0) {
             foreach ($query->result() as $row) {
                 $data[] = $row;
             }
             return $data;
          }
          
           return false;
        }
         
        // End of Events 
        
        // Ticket 
        
        public function display_all_ticket($code){
            $this->db->where('event_code', $code);
            $query = $this->db->get('ticket')->result();
            return $query;
        }
        
        public function display_successful_ticket($code){
            //$this->db->where('type', $type);
            $this->db->where('code', $code);
            $query = $this->db->get('ticket_order')->result();
            return $query;
        }
        
        public function display_all_ticket_by_code($code){
            $this->db->where('event_code', $code);
            $query = $this->db->get('ticket')->result();
            return $query;
        }
        
        public function display_all_ticket_by_tcode($code){
            $this->db->where('code', $code);
            $query = $this->db->get('ticket')->result();
            return $query;
        }
        
        public function count_ticket_basket($email){
            $query = $this->db->query("SELECT COUNT(*) AS count FROM ticket_basket WHERE email = '$email' ")->result();
            return $query;
        }
          
        public function display_ticket_basket($email){
            $this->db->where('email', $email);
            $query = $this->db->get('ticket_basket')->result();
            return $query;
        }
          
        public function insert_ticket_basket($data){
    	    $query = $this->db->insert('ticket_basket', $data);
        	return $query;
        }
        
        public function insert_ticket_order($data){
    	    $query = $this->db->insert('ticket_order', $data);
        	return $query;
        }
        
        public function update_ticket_quantity($code, $quantity){
            $query = $this->db->query("UPDATE ticket SET quantity = quantity - $quantity WHERE code = '$code' ");
            return $query;
        }
          
        public function destroy_basket($email){
            $query = $this->db->query("DELETE FROM ticket_basket WHERE email = '$email' ");
            return $query;
        }
          
        public function delete_basket($id){
            $query = $this->db->query("DELETE FROM ticket_basket WHERE id = '$id' ");
            return $query;
        }
        
        // End of Ticket 
        
    }

?>
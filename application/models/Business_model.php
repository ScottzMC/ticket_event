<?php 

    class Business_model extends CI_Model{
        
        // Profile 
        
        public function display_all_user_info($email){
            $this->db->where('email', $email);
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function display_all_user_payment($id){
            $this->db->where('user_id', $id);
            $query = $this->db->get('user_payments')->result();
            return $query;
        }
        
        public function update_user_info($email, $data){
            $this->db->where('email', $email);
            $query = $this->db->update('users', $data);
            return $query;
        }
        
        public function insert_user_payment($data){
            $query = $this->db->insert('user_payments', $data);
            return $query;
        }
        
        public function display_gbp_total($business_id){
          $query = $this->db->query("SELECT SUM(total) AS gbp FROM ticket_order WHERE business_id = '$business_id'")->result();
          return $query;
        }
        
        /*public function display_usd_total($business_id){
          $query = $this->db->query("SELECT SUM(total_usd) AS usd FROM ticket_order WHERE business_id = '$business_id'")->result();
          return $query;
        }
        
        public function display_shilling_total($business_id){
          $query = $this->db->query("SELECT SUM(total_shilling) AS shilling FROM ticket_order WHERE business_id = '$business_id'")->result();
          return $query;
        }
        
        public function display_leone_total($business_id){
          $query = $this->db->query("SELECT SUM(total_leone) AS leone FROM ticket_order WHERE business_id = '$business_id' ")->result();
          return $query;
        }*/
        
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
        
        // Venue
        
        public function display_all_venue(){
          $this->db->order_by('title', 'ASC');
          $query = $this->db->get("venue")->result();
          return $query;
        }
    
        public function display_all_venue_by_company($business_id){
          $this->db->order_by('title', 'ASC');
          $this->db->where('business_id', $business_id);
          $query = $this->db->get("venue")->result();
          return $query;
        }
        
        public function display_venue_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('venue')->result();
            return $query;
        }
        
        public function update_venue($id, $data){
            $this->db->where('id', $id);
            $query = $this->db->update('venue', $data);
            return $query;
        }
        
        public function update_venue_image1($id, $image1){
         $query = $this->db->query("UPDATE venue SET image1 = '$image1' WHERE id = '$id' ");
         return $query;
       }
        
        public function update_venue_image2($id, $image2){
         $query = $this->db->query("UPDATE venue SET image2 = '$image2' WHERE id = '$id' ");
         return $query;
       }
        
        public function insert_venue($data){
          $query = $this->db->insert('venue', $data);
          return $query;
        }
        
        public function delete_venue($id){
          $query = $this->db->query("DELETE FROM venue WHERE id = '$id' ");
        }
        
        // End of Venue 
        
        // Event 
        
        public function display_all_event(){
          $this->db->order_by('title', 'ASC');
          $query = $this->db->get("events")->result();
          return $query;
        }
        
        public function display_all_event_by_company($business_id){
          $this->db->order_by('title', 'ASC');
          $this->db->where('business_id', $business_id);
          $query = $this->db->get("events")->result();
          return $query;
        }
        
        public function display_event_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('events')->result();
            return $query;
        }
        
        public function update_event($id, $data){
            $this->db->where('id', $id);
            $query = $this->db->update('events', $data);
            return $query;
        }
        
        public function update_event_image($id, $image1){
         $query = $this->db->query("UPDATE events SET image = '$image1' WHERE id = '$id' ");
         return $query;
       }
        
        public function insert_event($data){
          $query = $this->db->insert('events', $data);
          return $query;
        }
        
        public function delete_event($id){
          $query = $this->db->query("DELETE FROM events WHERE id = '$id' ");
        }
        
        // Banner 
    
        public function display_all_event_banner(){
          $query = $this->db->query("SELECT events.id, events_banner.id as banner_id, events.title, events_banner.event_id, events_banner.topic, events_banner.image FROM events INNER JOIN events_banner ON events.id = events_banner.event_id")->result();
          return $query;
        }
        
        public function display_event_banner_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('events_banner')->result();
            return $query;
        }
        
        public function update_event_banner($id, $data){
            $this->db->where('id', $id);
            $query = $this->db->update('events_banner', $data);
            return $query;
        }
        
        public function insert_event_banner($data){
          $query = $this->db->insert('events_banner', $data);
          return $query;
        }
        
        public function delete_event_banner($id){
          $query = $this->db->query("DELETE FROM events_banner WHERE id = '$id' ");
        }
        
        // End of Banner 
        
        // Age 
        
        public function display_all_event_age(){
          $query = $this->db->query("SELECT events.id, events.title, events_age.id as age_id, events_age.event_id, events_age.topic, events_age.image FROM events INNER JOIN events_age ON events.id = events_age.event_id")->result();
          return $query;
        }
        
        public function display_event_age_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('events_age')->result();
            return $query;
        }
        
        public function update_event_age($id, $data){
            $this->db->where('id', $id);
            $query = $this->db->update('events_age', $data);
            return $query;
        }
        
        public function insert_event_age($data){
          $query = $this->db->insert('events_age', $data);
          return $query;
        }
        
        public function delete_event_age($id){
          $query = $this->db->query("DELETE FROM events_age WHERE id = '$id' ");
        }
        
        // End of Age
        
        // Dress code 
        
        public function display_all_event_dress_code(){
          $query = $this->db->query("SELECT events.id, events.title, events_dress_code.event_id, events_dress_code.id as dress_id, events_dress_code.topic, events_dress_code.image FROM events INNER JOIN events_dress_code ON events.id = events_dress_code.event_id")->result();
          return $query;
        }
        
        public function display_event_dress_code_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('events_dress_code')->result();
            return $query;
        }
        
        public function update_event_dress_code($id, $data){
            $this->db->where('id', $id);
            $query = $this->db->update('events_dress_code', $data);
            return $query;
        }
        
        public function insert_event_dress_code($data){
          $query = $this->db->insert('events_dress_code', $data);
          return $query;
        }
        
        public function delete_event_dress_code($id){
          $query = $this->db->query("DELETE FROM events_dress_code WHERE id = '$id' ");
        }
        
        // End of Dress code
        
        // Last Entry
        
        public function display_all_event_last_entry(){
          $query = $this->db->query("SELECT events.id, events.title, events_last_entry.id as last_id, events_last_entry.event_id, events_last_entry.topic, events_last_entry.image FROM events INNER JOIN events_last_entry ON events.id = events_last_entry.event_id")->result();
          return $query;
        }
        
        public function display_event_last_entry_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('events_last_entry')->result();
            return $query;
        }
        
        public function update_event_last_entry($id, $data){
            $this->db->where('id', $id);
            $query = $this->db->update('events_last_entry', $data);
            return $query;
        }
        
        public function insert_event_last_entry($data){
          $query = $this->db->insert('events_last_entry', $data);
          return $query;
        }
        
        public function delete_event_last_entry($id){
          $query = $this->db->query("DELETE FROM events_last_entry WHERE id = '$id' ");
        }
        
        // End of Last entry
        
        // End of Event
        
        // Report 
        
        public function display_ticket_report_by_id($id){
            $this->db->order_by('created_date', 'ASC');
            $this->db->where('ticket_id', $id);
            $query = $this->db->get('ticket_order')->result();
            return $query;
        }
        
        public function display_excel_ticket_report_by_id($id){
            $this->db->order_by('created_date', 'ASC');
            $this->db->where('ticket_id', $id);
            $query = $this->db->get('ticket_order')->result();
            return $query;
        }
        
        public function display_ticket_filter_report($id, $start_date, $end_date){
            $this->db->where('ticket_id', $id);
            $this->db->where('created_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $query = $this->db->get("ticket_order")->result();
            return $query;
        }
        
        // Payout 
        
        public function display_all_payout_by_business($id){
            $this->db->order_by('created_date', 'ASC');
            $this->db->where('company_id', $id);
            $query = $this->db->get('payout_request')->result();
            return $query;
        }
        
        public function display_all_payout_by_id($id){
            $query = $this->db->query("SELECT payout_request.company_id, payout_request.id, payout_request.company, payout_request.company_email, payout_request.amount, payout_request.status, payout_request.notes, payout_request.created_date, users.id AS user_id, users.telephone, users.address, users.postcode, users.town FROM payout_request INNER JOIN users ON payout_request.company_id = users.id WHERE payout_request.id = '$id' ")->result();
            return $query;
        }
        
        public function display_all_payout_filter($start_date, $end_date){
            $this->db->where('created_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $query = $this->db->get('payout_request')->result();
            return $query;
        }
        
        public function insert_payout_request($data){
            $query = $this->db->insert('payout_request', $data);
            return $query;
        }
        
        public function approve_invoice($id, $status){
          $query = $this->db->query("UPDATE payout_request SET status = '$status' WHERE id = '$id' ");
        }
        
        public function cancel_invoice($id, $status){
          $query = $this->db->query("UPDATE payout_request SET status = '$status' WHERE id = '$id' ");
        }
        
        // End of Payout 
        
        // End of Report 
        
        // Ticket 
        
        public function display_all_ticket_by_company($business_id){
          $this->db->order_by('title', 'ASC');
          $this->db->where('business_id', $business_id);
          $query = $this->db->get("ticket")->result();
          return $query;
        }
        
        public function display_all_purchased_ticket_by_company($status, $business_id){
          $this->db->order_by('title', 'ASC');
          $this->db->where('status', $status);
          $this->db->where('business_id', $business_id);
          $query = $this->db->get("ticket_order")->result();
          return $query;
        }
        
        public function display_ticket_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('ticket')->result();
            return $query;
        }
        
        public function update_ticket($id, $data){
            $this->db->where('id', $id);
            $query = $this->db->update('ticket', $data);
            return $query;
        }
        
        public function update_ticket_image($id, $image1){
         $query = $this->db->query("UPDATE ticket SET image = '$image1' WHERE id = '$id' ");
         return $query;
       }
        
        public function insert_ticket($data){
          $query = $this->db->insert('ticket', $data);
          return $query;
        }
        
        public function insert_ticket_order($data){
          $query = $this->db->insert('ticket_order', $data);
          return $query;
        }
        
        public function update_ticket_to_refund($id, $array){
            $this->db->where('charge_id', $id);
            $query = $this->db->update('ticket_order', $array);
            return $query;
        }
        
        public function cancel_ticket($id, $status){
          $query = $this->db->query("UPDATE ticket_order SET status = '$status' WHERE id = '$id' ");
        }
        
        public function delete_ticket($id){
          $query = $this->db->query("DELETE FROM ticket WHERE id = '$id' ");
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
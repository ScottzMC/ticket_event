<?php

  class Admin_model extends CI_Model{

    // Dashboard

    public function display_user_count(){
      $query = $this->db->query("SELECT COUNT(*) AS user_count FROM users")->result();
      return $query;
    }

    public function display_order_count(){
      $query = $this->db->query("SELECT COUNT(*) AS order_count FROM order_items")->result();
      return $query;
    }

    public function display_food_count(){
      $query = $this->db->query("SELECT COUNT(*) AS food_count FROM food")->result();
      return $query;
    }
    
    public function display_gbp_total(){
      $query = $this->db->query("SELECT SUM(total) AS gbp FROM ticket_order")->result();
      return $query;
    }
    
    public function display_usd_total(){
      $query = $this->db->query("SELECT SUM(total_usd) AS usd FROM ticket_order")->result();
      return $query;
    }
    
    public function display_shilling_total(){
      $query = $this->db->query("SELECT SUM(total_shilling) AS shilling FROM ticket_order")->result();
      return $query;
    }
    
    public function display_leone_total(){
      $query = $this->db->query("SELECT SUM(total_leone) AS leone FROM ticket_order")->result();
      return $query;
    }

    public function display_all_users(){
      $query = $this->db->query("SELECT * FROM users ORDER BY created_date DESC LIMIT 5")->result();
      return $query;
    }

    public function display_all_food(){
      $query = $this->db->query("SELECT * FROM food ORDER BY created_date DESC LIMIT 5")->result();
      return $query;
    }
    
    // End of Dashboard

    // Food

    public function record_food_count() {
        $query = $this->db->count_all("food");
        return $query;
    }

    public function fetch_food_data($limit, $start){
        $this->db->limit($limit, $start);
        $this->db->order_by('created_date', 'DESC');
        $query = $this->db->get("food");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function display_food_by_id($id){
     $query = $this->db->query("SELECT menu.id AS menu_id, menu.category AS menu_category, food.id, food.category, food.title, food.price, food.image1, food.stock FROM menu INNER JOIN food ON menu.id = food.category WHERE food.id = '$id' ")->result();
     return $query;
   }

   public function insert_food($data){
     $query = $this->db->insert('food', $data);
     return $query;
   }
   
   public function update_food($id, $data){
      $this->db->where('id', $id);
      $query = $this->db->update('food', $data);
      return $query;
    }

   public function update_food_image1($id, $image1){
     $query = $this->db->query("UPDATE food SET image1 = '$image1' WHERE id = '$id' ");
     return $query;
   }
   
   public function update_food_image2($id, $image2){
     $query = $this->db->query("UPDATE food SET image2 = '$image2' WHERE id = '$id' ");
     return $query;
   }
   
   public function update_food_image3($id, $image3){
     $query = $this->db->query("UPDATE food SET image3 = '$image3' WHERE id = '$id' ");
     return $query;
   }
   
   public function update_food_image4($id, $image4){
     $query = $this->db->query("UPDATE food SET image4 = '$image4' WHERE id = '$id' ");
     return $query;
   }
   
   public function update_food_image5($id, $image5){
     $query = $this->db->query("UPDATE food SET image5 = '$image5' WHERE id = '$id' ");
     return $query;
   }

   public function delete_food($id){
      $query = $this->db->query("DELETE FROM food WHERE id = '$id' ");
   }

    // End of Food
    
    // User Grid

    public function display_user_grid(){
      $query = $this->db->query("SELECT * FROM users ORDER BY created_date DESC ")->result();
      return $query;
    }

    // End of User Grid

    // Orders
    
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
    
    public function delete_order_details($order_id){
      $query = $this->db->query("DELETE FROM order_details WHERE order_id = '$order_id' ");
    }

    public function display_all_pending_orders(){
      $this->db->order_by('created_date', 'ASC');
      $this->db->where('status', 'Pending');
      $query = $this->db->get('order_items')->result();
      return $query;
    }
    
    public function display_all_pending_order_by_id($id){
      $this->db->order_by('created_date', 'ASC');
      $this->db->where('status', 'Pending');
      $this->db->where('id', $id);
      $query = $this->db->get('order_items')->result();
      return $query;
    }
    
    public function display_all_delivering_orders(){
      $this->db->order_by('created_date', 'ASC');
      $this->db->where('status', 'Delivering');
      $query = $this->db->get('order_items')->result();
      return $query;
    }
    
    public function display_all_delivering_order_by_id($id){
      $this->db->order_by('created_date', 'ASC');
      $this->db->where('status', 'Delivering');
      $this->db->where('id', $id);
      $query = $this->db->get('order_items')->result();
      return $query;
    }
    
    public function display_all_delivered_orders(){
      $this->db->order_by('created_date', 'ASC');
      $this->db->where('status', 'Delivered');
      $query = $this->db->get('order_items')->result();
      return $query;
    }
    
    public function display_all_delivered_order_by_id($id){
      $this->db->order_by('created_date', 'ASC');
      $this->db->where('status', 'Delivered');
      $this->db->where('id', $id);
      $query = $this->db->get('order_items')->result();
      return $query;
    }
    
    public function display_all_cancelled_orders(){
      $this->db->order_by('created_date', 'ASC');
      $this->db->where('status', 'Cancelled');
      $query = $this->db->get('order_items')->result();
      return $query;
    }
    
    public function display_all_refunded_orders(){
      $this->db->order_by('created_date', 'ASC');
      $this->db->where('status', 'Refunded');
      $query = $this->db->get('order_items')->result();
      return $query;
    }
    
    public function update_order_items_to_refund($id, $array){
        $this->db->where('charge_id', $id);
        $query = $this->db->update('order_items', $array);
        return $query;
    }
    
    public function display_all_order_details(){
      $query = $this->db->query("SELECT order_items.id, order_items.order_id, order_items.email, order_items.title, order_items.price, order_items.quantity, order_items.seat_type, order_items.delivery_category,
      order_items.status, order_items.order_notes, order_items.created_time, order_items.created_date, order_details.order_id, order_details.firstname, order_details.lastname, order_details.telephone, 
      order_details.address, order_details.town, order_details.postcode FROM order_items INNER JOIN order_details ON order_items.order_id = order_details.order_id WHERE order_items.status = 'Delivered' 
      ORDER BY order_items.created_date ASC")->result();
      return $query;
    }

    // End of Orders
    
    // Venue 
    
    public function display_all_venue(){
      $this->db->order_by('title', 'ASC');
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
    
    public function display_food_report_by_id($id){
        $this->db->order_by('created_date', 'ASC');
        $this->db->where('category', $id);
        $query = $this->db->get('order_items')->result();
        return $query;
    }
    
    public function display_excel_report_by_id($id){
        $this->db->order_by('created_date', 'ASC');
        $this->db->where('category', $id);
        $query = $this->db->get('order_items')->result();
        return $query;
    }
    
    public function display_food_filter_report($id, $start_date, $end_date){
        $this->db->where('category', $id);
        $this->db->where('created_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $query = $this->db->get("order_items")->result();
        return $query;
    }
    
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
    
    public function display_all_payout(){
        $this->db->order_by('created_date', 'ASC');
        $query = $this->db->get('payout_request')->result();
        return $query;
    }
    
    public function display_all_payout_by_id($id){
        $query = $this->db->query("SELECT payout_request.company_id, payout_request.id, payout_request.company, payout_request.company_email, payout_request.amount, payout_request.status, payout_request.notes, payout_request.start_date, payout_request.end_date, payout_request.created_date, users.id AS user_id, users.telephone, users.address, users.postcode, users.town FROM payout_request INNER JOIN users ON payout_request.company_id = users.id WHERE payout_request.id = '$id' ")->result();
        return $query;
    }
    
    public function display_all_payout_filter($start_date, $end_date){
        $this->db->where('created_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $query = $this->db->get('payout_request')->result();
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
    
    public function display_all_ticket(){
      $this->db->order_by('title', 'ASC');
      $query = $this->db->get("ticket")->result();
      return $query;
    }
    
    public function display_all_purchased_checked_ticket($status){
      $this->db->order_by('title', 'ASC');
      $this->db->where('checked', $status);
      $query = $this->db->get("ticket_order")->result();
      return $query;
    }
    
    public function display_all_purchased_non_checked_ticket($status){
      $this->db->order_by('title', 'ASC');
      $this->db->where('checked', $status);
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
    
    public function check_in_ticket($id, $checked){
      $query = $this->db->query("UPDATE ticket_order SET checked = '$checked' WHERE id = '$id' ");
    }
    
    public function cancel_ticket($id, $status){
      $query = $this->db->query("UPDATE ticket_order SET status = '$status' WHERE id = '$id' ");
    }
    
    public function delete_ticket($id){
      $query = $this->db->query("DELETE FROM ticket WHERE id = '$id' ");
    }
    
    // End of Ticket
    
    // Staff
    
    public function display_staff_grid(){
      $query = $this->db->query("SELECT * FROM staff ORDER BY created_date DESC ")->result();
      return $query;
    }
    
    // End of Staff

     // Edit Banners 

    public function get_menu_banner_category(){
      //$this->db->where('type', $type);
      $query = $this->db->get('menu')->result();
      return $query;
    }

    public function display_banners(){
      $query = $this->db->get('banner')->result();
      return $query;
    }

    public function display_banners_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('banner')->result();
      return $query;
    }

    public function update_banner_image($id, $image){
      $query = $this->db->query("UPDATE banner SET image = '$image' WHERE id = '$id' ");
      return $query;
    }

    public function update_banner_title($id, $title){
      $query = $this->db->query("UPDATE banner SET title = '$title' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_banner_type($id, $type){
      $query = $this->db->query("UPDATE banner SET type = '$type' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_banner($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('banner', $data);
        return $query;
    }

    public function insert_banner($data){
      $query = $this->db->insert('banner', $data);
      return $query;
    }

    public function delete_banner($id){
      $query = $this->db->query("DELETE FROM banner WHERE id = '$id' ");
      return $query;
    }

     // End of Edit Banners
     
      // Edit Sliders 

    public function get_menu_slider_category(){
      //$this->db->where('type', $type);
      $query = $this->db->get('menu')->result();
      return $query;
    }

    public function display_sliders(){
      $query = $this->db->get('slider')->result();
      return $query;
    }

    public function display_slider_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('slider')->result();
      return $query;
    }

    public function update_slider_image($id, $image){
      $query = $this->db->query("UPDATE slider SET image = '$image' WHERE id = '$id' ");
      return $query;
    }

    public function update_slider_category($id, $category){
      $query = $this->db->query("UPDATE slider SET category = '$category' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_slider_subtitle($id, $subtitle){
      $query = $this->db->query("UPDATE slider SET subtitle = '$subtitle' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_slider_title($id, $title){
      $query = $this->db->query("UPDATE slider SET title = '$title' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_slider($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('slider', $data);
        return $query;
    }

    public function insert_slider($data){
      $query = $this->db->insert('slider', $data);
      return $query;
    }

    public function delete_slider($id){
      $query = $this->db->query("DELETE FROM slider WHERE id = '$id' ");
      return $query;
    }

     // End of Edit Sliders

     // Edit Menu

     public function display_menu(){
      $query = $this->db->get('menu_category')->result();
      return $query;
    }

    public function display_menu_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('menu_category')->result();
      return $query;
    }

    public function insert_menu($data){
      $query = $this->db->insert('menu_category', $data);
      return $query;
    }

    public function update_category_info($id, $category){
      $query = $this->db->query("UPDATE menu_category SET category = '$category' WHERE id = '$id' ");
      return $query;
    }

    public function delete_menu($id){
      $this->db->where('id', $id);
      $query = $this->db->delete("menu_category");
      return $query;
    }

     // End of Edit Menu
     
     // Edit Config

     public function display_config(){
      $query = $this->db->get('config')->result();
      return $query;
    }

    public function display_config_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('config')->result();
      return $query;
    }

    public function insert_config($data){
      $query = $this->db->insert('config', $data);
      return $query;
    }
    
    public function update_config($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('config', $data);
        return $query;
    }

    public function delete_config($id){
      $query = $this->db->query("DELETE FROM config WHERE id = '$id' ");
      return $query;
    }

     // End of Edit Config
     
      // Edit Status Menu

     public function display_status_menu(){
      $query = $this->db->get('menu_status')->result();
      return $query;
    }

    public function display_status_menu_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('menu_status')->result();
      return $query;
    }

    public function insert_status_menu($data){
      $query = $this->db->insert('menu_status', $data);
      return $query;
    }

    public function update_status_category_info($id, $category){
      $query = $this->db->query("UPDATE menu_status SET category = '$category' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_status_menu($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('menu_status', $data);
        return $query;
    }

    public function delete_status_menu($id){
      $query = $this->db->query("DELETE FROM menu_status WHERE id = '$id' ");
      return $query;
    }

     // End of Edit Status Menu
     
     // Edit Footer

    public function display_footer(){
      $query = $this->db->get('footer')->result();
      return $query;
    }

    public function display_footer_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('footer')->result();
      return $query;
    }

    public function insert_footer($data){
      $query = $this->db->insert('footer', $data);
      return $query;
    }

    public function update_footer_category_info($id, $body){
      $query = $this->db->query("UPDATE footer SET body = '$body' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_footer($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('footer', $data);
        return $query;
    }

    public function delete_footer($id){
      $query = $this->db->query("DELETE FROM footer WHERE id = '$id' ");
      return $query;
    }

     // End of Edit Footer
     
     // Edit Seating Menu

    public function display_seating_menu(){
      $query = $this->db->get('menu_seating')->result();
      return $query;
    }

    public function display_seating_menu_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('menu_seating')->result();
      return $query;
    }

    public function insert_seating_menu($data){
      $query = $this->db->insert('menu_seating', $data);
      return $query;
    }

    public function update_seating_category_info($id, $category){
      $query = $this->db->query("UPDATE menu_seating SET category = '$category' WHERE id = '$id' ");
      return $query;
    }

    public function delete_seating_menu($id){
      $query = $this->db->query("DELETE FROM menu_seating WHERE id = '$id' ");
      return $query;
    }

     // End of Edit Seating Menu
     
     // Edit Food Menu

     public function display_food_menu(){
      $query = $this->db->get('menu')->result();
      return $query;
    }

    public function display_food_menu_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('menu')->result();
      return $query;
    }

    public function insert_food_menu($data){
      $query = $this->db->insert('menu', $data);
      return $query;
    }

    public function update_food_category_info($id, $category){
      $query = $this->db->query("UPDATE menu SET category = '$category' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_food_info($id, $data){
      $this->db->where('id', $id);
      $query = $this->db->update('menu', $data);
      return $query;
    }

    public function delete_food_menu($id){
      $this->db->where('id', $id);
      $query = $this->db->delete("menu");
      return $query;
    }

     // End of Edit Food Menu
     
      // Edit Videos

     public function display_video(){
      $query = $this->db->get('videos')->result();
      return $query;
    }

    public function display_video_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('videos')->result();
      return $query;
    }

    public function insert_video($data){
      $query = $this->db->insert('videos', $data);
      return $query;
    }

    public function update_video_category_info($id, $data){
      $this->db->where('id', $id);
      $query = $this->db->update("videos", $data);
      return $query;
    }

    public function delete_video($id){
      $this->db->where('id', $id);
      $query = $this->db->delete("videos");
      return $query;
    }

     // End of Edit Videos
     
  }

?>

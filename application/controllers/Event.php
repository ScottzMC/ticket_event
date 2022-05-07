<?php 

    class Event extends CI_Controller{
        
        public function detail($code){
            $query = $this->db->query("SELECT venue_id, category FROM events WHERE code = '$code' ")->result();
            foreach($query as $qry){
                $venue_id = $qry->venue_id;
                $category = $qry->category;
            }
            
            //$data['type'] = $type;
            
            $data['detail'] = $this->Data_model->display_event_by_detail($code);
            $data['related_events'] = $this->Data_model->display_related_events($category);
            $data['ticket'] = $this->Data_model->display_all_ticket_by_code($code);
            $data['venue'] = $this->Data_model->display_venue_by_detail($venue_id);
            
            $session_email = $this->session->userdata('uemail');
            
            $data['basket_count'] = $this->Data_model->count_ticket_basket($session_email);
            
            $this->session->set_userdata('previous_url', current_url());
            
            //$this->load->view('menu/main/nav', $data);
            $this->load->view('site/event/detail', $data);
            //$this->load->view('menu/main/footer', $data);
        }
        
        public function category($category){
            $config['base_url'] = base_url('event/category/'.$category);
            $total_row = $this->Data_model->record_event_category_count($category);      
            $config['total_rows'] = $total_row;
            $config['per_page'] = 12;
            $config['uri_segment'] = 3;
            $choice = $config['total_rows']/$config['per_page'];
            $config['num_links'] = round($choice);
    
            $config['full_tag_open'] = '<ul style="margin-left: 100px;" class="pagination">';
            $config['full_tag_close'] = '</ul>';
    
            $config['first_tag_open'] = '<li><a><i class="fa fa-angle-double-right">';
            $config['last_tag_open'] = '<li><a><i class="fa fa-angle-double-left">';
    
            $config['next_tag_open'] = '<li><a>';
            $config['prev_tag_open'] = '<li><a>';
    
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
    
            $config['first_tag_close'] = '</i></a></li>';
            $config['last_tag_close'] = '</i></a></li>';
    
            $config['next_tag_close'] = '</a></li>';
            $config['prev_tag_close'] = '</a></li>';
    
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
    
            $this->pagination->initialize($config);
    
            $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
            
            //$data['type'] = $type;
    
            $data["category"] = $this->Data_model->fetch_event_category_data($category, $config["per_page"], $page);
            
            $session_email = $this->session->userdata('uemail');
            
            $data['basket_count'] = $this->Data_model->count_ticket_basket($session_email);
            
            $this->session->set_userdata('previous_url', current_url());
            
            //$this->load->view('menu/main/nav', $data);
            $this->load->view('site/event/category', $data);
            //$this->load->view('menu/main/footer', $data);
        }
        
        public function search(){
            $search_query = $this->input->post('search_query');
            
            $config['base_url'] = base_url('event/search');
            $total_row = $this->Data_model->record_event_search_count();      
            $config['total_rows'] = $total_row;
            $config['per_page'] = 12;
            $config['uri_segment'] = 4;
            $choice = $config['total_rows']/$config['per_page'];
            $config['num_links'] = round($choice);
    
            $config['full_tag_open'] = '<ul style="margin-left: 100px;" class="pagination">';
            $config['full_tag_close'] = '</ul>';
    
            $config['first_tag_open'] = '<li><a><i class="fa fa-angle-double-right">';
            $config['last_tag_open'] = '<li><a><i class="fa fa-angle-double-left">';
    
            $config['next_tag_open'] = '<li><a>';
            $config['prev_tag_open'] = '<li><a>';
    
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
    
            $config['first_tag_close'] = '</i></a></li>';
            $config['last_tag_close'] = '</i></a></li>';
    
            $config['next_tag_close'] = '</a></li>';
            $config['prev_tag_close'] = '</a></li>';
    
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
    
            $this->pagination->initialize($config);
    
            $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
            
            //$data['type'] = $type;
    
            $data["search"] = $this->Data_model->fetch_search_data($config["per_page"], $page, $search_query);
            
            $session_email = $this->session->userdata('uemail');
            
            $data['basket_count'] = $this->Data_model->count_ticket_basket($session_email);
            
            $this->session->set_userdata('previous_url', current_url());
            
            //$this->load->view('menu/main/nav', $data);
            $this->load->view('site/event/search', $data);
            //$this->load->view('menu/main/footer', $data);
        }
        
        public function book($code){
            $session_email = $this->session->userdata('uemail');
            
            $data['basket_count'] = $this->Data_model->count_ticket_basket($session_email);
            $data['ticket'] = $this->Data_model->display_all_ticket_by_code($code);
            
            $this->session->set_userdata('previous_url', current_url());
            
            //$this->load->view('menu/main/nav', $data);
            $this->load->view('site/event/book', $data);
            //$this->load->view('menu/main/footer', $data);
        }
        
        public function cart($code){
              $session_email = $this->session->userdata('uemail');
              
              $data['basket_count'] = $this->Data_model->count_ticket_basket($session_email);
              $data['basket'] = $this->Data_model->display_ticket_basket($session_email);
              
              //$data['type'] = $type;
              
              $this->session->set_userdata('previous_url', current_url());
              
              //$this->load->view('menu/main/nav', $data);
              $this->load->view('site/event/cart', $data);
              //$this->load->view('menu/main/footer', $data);
        }
        
        public function add_cart($code){
          $session_email = $this->session->userdata('uemail'); 
          
          $submit = $this->input->post('submit');
          
          if(isset($submit)){
              $ticket_id = $this->input->post('ticket_id');
              $code = $this->input->post('code');    
              $event_code = $this->input->post('event_code'); 
              $fullname = $this->input->post('fullname');
              $title = $this->input->post('title');  
              $price = $this->input->post('price');
              $quantity = $this->input->post('quantity');
              $image = $this->input->post('image');
              
              $ticket = $this->Data_model->display_all_ticket_by_tcode($code);
              foreach($ticket as $tick){
                $query_quantity = $tick->quantity;
              }
              
              if($quantity > $query_quantity || $query_quantity == 0){ ?>
                  <script>
                    alert('Ticket has sold out');
                    window.location.href="<?php echo site_url('home'); ?>";
                  </script>
        <?php }else{
                  $insert_items = array(
                    'fullname' => $fullname,
                    'email' => $session_email,
                    'ticket_id' => $ticket_id,
                    'code' => $code,
                    'event_code' => $event_code,
                    'title' => $title,
                    'price' => $price,
                    'quantity' => $quantity,
                    'image' => $image,
                  );
            
                  $this->Data_model->insert_ticket_basket($insert_items);
               }
              
             ?>
             <script>
                 alert('Added to Basket');
                 window.location.href="<?php echo site_url('event/cart/'.$code); ?>";
             </script>  
       <?php
            
          }
          
        }
        
        public function delete_basket(){
          $id = $this->input->post('ticket_id');
          
          $this->Data_model->delete_basket($id);
        }
        
        public function payment($code){
            $session_email = $this->session->userdata('uemail');
            
            $data['basket_count'] = $this->Data_model->count_ticket_basket($session_email);
            $data['ticket'] = $this->Data_model->display_ticket_basket($session_email);
            
            //$data['type'] = $type;
            
            $this->session->set_userdata('previous_url', current_url());
            
            //$this->load->view('menu/main/nav', $data);
            $this->load->view('site/event/payment', $data);
            //$this->load->view('menu/main/footer', $data);
        }
        
        public function stripe_post($code){
            require_once('application/libraries/stripe-php/init.php');
            
            $shuffle = str_shuffle("TIKDEFGXCV");
            $unique = rand(00, 99);
            $ticket_code = $shuffle.$unique;
            
            $fullname = $this->input->post('fullname');
            $title = $this->input->post('title');
            $code = $this->input->post('code');
            $ticket_id = $this->input->post('ticket_id');
            $email = $this->input->post('email');
            $quantity = $this->input->post('quantity');
            $price = $this->input->post('price');
            $event_code = $this->input->post('event_code');
            
            $total = $this->input->post('total');
            $date = date('Y-m-d H:i:s');
            
            $query = $this->db->query("SELECT title FROM events WHERE code = '$event_code' ")->result();
            foreach($query as $qry){
                $events = $qry->title;
            }
            
            //$data['type'] = $type;

            \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
            
            $charge = \Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "gbp",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payment from Wee Gee Dem" 
            ]);
            
            $chargeID = $charge->id;
            
            //if($type == 'gbp'){
                $array = array(
                    'charge_id' => $chargeID,
                    'code' => $code,
                    'ticket_code' => $ticket_code,
                    'ticket_id' => $ticket_id,
                    'type' => $type,
                    'fullname' => $fullname,
                    'customer_email' => $email,
                    'title' => $title,
                    'price' => $price,
                    'total' => $total,
                    'quantity' => $quantity,
                    'events' => $events,
                    'active' => '0',
                    'status' => 'Purchased',
                    'checked' => 'Not checked',
                    'created_date' => $date
                );
            /*}else if($type == 'usd'){
                $array = array(
                    'charge_id' => $chargeID,
                    'code' => $code,
                    'ticket_code' => $ticket_code,
                    'ticket_id' => $ticket_id,
                    'type' => $type,
                    'fullname' => $fullname,
                    'customer_email' => $email,
                    'title' => $title,
                    'price' => $price,
                    'total_usd' => $total,
                    'quantity' => $quantity,
                    'events' => $events,
                    'active' => '0',
                    'status' => 'Purchased',
                    'checked' => 'Not checked',
                    'created_date' => $date
                );
            }else if($type == 'shilling'){
                $array = array(
                    'charge_id' => $chargeID,
                    'code' => $code,
                    'ticket_code' => $ticket_code,
                    'ticket_id' => $ticket_id,
                    'type' => $type,
                    'fullname' => $fullname,
                    'customer_email' => $email,
                    'title' => $title,
                    'price' => $price,
                    'total_shilling' => $total,
                    'quantity' => $quantity,
                    'events' => $events,
                    'active' => '0',
                    'status' => 'Purchased',
                    'checked' => 'Not checked',
                    'created_date' => $date
                );
            }else if($type == 'leone'){
                $array = array(
                    'charge_id' => $chargeID,
                    'code' => $code,
                    'ticket_code' => $ticket_code,
                    'ticket_id' => $ticket_id,
                    'type' => $type,
                    'fullname' => $fullname,
                    'customer_email' => $email,
                    'title' => $title,
                    'price' => $price,
                    'total_leone' => $total,
                    'quantity' => $quantity,
                    'events' => $events,
                    'active' => '0',
                    'status' => 'Purchased',
                    'checked' => 'Not checked',
                    'created_date' => $date
                );
            }*/
            
            $query = $this->db->query("SELECT * FROM ticket_basket WHERE email = '$email' ")->result();
            
            foreach($query as $bask){
              $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'smtp.scottnnaghor.com',
                 'smtp_port' => 25,
                 'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
                 'smtp_pass' => 'TigerPhenix100', // change it to account email password
                 'mailtype' => 'html',
                 'priority' => 1,
                 'starttls'  => true,
                 'newline'   => "\r\n",
              );
              
              $data = array(
                  'ticket_code' => $ticket_code,
                  'ticket_id' => $ticket_id,
                  'fullname' => $fullname,
                  'title' => $title,
                  'events' => $events,
                  'quantity' => $quantity,
                  'type' => $type,
                  'total' => $total
                );
              
              $subject = "Purchased Ticket";
              $body = $this->load->view('email/purchased_ticket',$data,TRUE);
    
             $this->load->library('email', $config);
             //$this->load->library('encrypt');
             $this->email->set_mailtype("html");
             $this->email->from('admin@scottnnaghor.com', "Ticket Event Team");
             $this->email->to("$email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
            }
            
            $this->Data_model->insert_ticket_order($array);
            $this->Data_model->update_ticket_quantity($code, $quantity);
            $this->Data_model->destroy_basket($email);
            
            ?>
            <script>
                alert('Purchased Ticket Successfully');
                window.location.href="<?php echo site_url('event/success/'.strtolower($code)); ?>";
            </script>
            <?php 
        }
        
        public function success($code){
            $data['ticket'] = $this->Data_model->display_successful_ticket($type, $code);
            //$data['type'] = $type;
            
            $this->session->set_userdata('previous_url', current_url());
            
            $this->load->view('site/event/success', $data);
        }
        
        /*function generate_pdf($code){
            $this->load->model('Procedure_model');
            $data['detail'] = $this->Procedure_model->display_procedure_by_id($id);
            $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
            $unique = rand(000, 999);
            $code = $shuffle.$unique;
                
            $this->load->library('pdf');
            $view = $this->load->view('pdf/procedure', $data, true);
            //$html = $this->load->view('admin/house/reporting/pdf', [], true);
            $this->pdf->createPDF($view, 'procedure_'.$code, false);
        }*/
        
    }

?>
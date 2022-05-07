<?php 
    
    class Eat extends CI_Controller{
        
        // Home
        
        public function index(){

          if(!$this->cart->contents()){
    		$data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
    	  }else{
    		$data['message'] = $this->session->flashdata('message');
    	  }
    	  
    	  $this->session->set_userdata('previous_url', current_url());
    	  
    	  $email = $this->session->userdata('uemail');
    	  
    	  $data['menu'] = $this->Eat_model->display_food_menu();
    	  
          /*$data['rice'] = $this->Eat_model->display_meal_for_rice();    
          $data['stews'] = $this->Eat_model->display_meal_for_stew();  
          $data['vegan'] = $this->Eat_model->display_meal_for_vegan();  
          $data['side'] = $this->Eat_model->display_meal_for_side();  
          $data['dessert'] = $this->Eat_model->display_meal_for_dessert();*/  
          
          $data['slider'] = $this->Eat_model->display_slider_by_home("restaurant");

          $this->load->view('eat/view', $data);
        }
        
        // End of Home
        
        // Shopping
        
        public function view_cart(){
          $session_email = $this->session->userdata('uemail');
          
          $this->session->set_userdata('previous_url', current_url());

          if(!$this->cart->contents()){
			$data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			$data['message'] = $this->session->flashdata('message');
		  }
		  
		  //$submit = $this->input->post('submit');
		  
		  /*if(isset($submit)){
		      $query = $this->db->query("SELECT * FROM booking WHERE email = '$session_email' ")->result();
		      foreach($query as $qry){ $booked_email = $qry->email; }
		      
		      if(empty($booked_email)){ ?>
		          <script>
		            alert('Please book a room in order to place an order');
		            window.location.href="<?php echo site_url('eat'); ?>";
		          </script>
		  <?php }
		       else{
		          redirect('eat/checkout');
		      }
		  }*/
          
          $this->load->view('eat/shopping/view_cart', $data);
        }
        
        public function add_cart(){
          $insert_items = array(
            'id' => $this->input->post('code'),
            'name' => $this->input->post('title'),
            'price' => $this->input->post('price'),
            'category' => $this->input->post('category'),
            'qty' => 1,
            'image' => $this->input->post('image')
          );
    
         $this->cart->insert($insert_items);
         ?>
         <script>
             alert('Added to Cart');
             window.location.href="<?php echo site_url('eat'); ?>";
         </script> 
         <?php
        }
    
        public function remove_cart($rowid){
          if($rowid=="all"){
             $this->cart->destroy();
          }else{
            $data = array(
              'rowid'   => $rowid,
              'qty'     => 0
            );
    
            $this->cart->update($data);
          }
          redirect('eat');
        }
    
        public function clear(){
          $this->cart->destroy();
          redirect('eat');
        }
    
        public function update_cart(){
          foreach($_POST['cart'] as $id => $cart){
           $price = $cart['price'];
           $amount = $price * $cart['qty'];
           $this->Eat_model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
        }
    
          redirect('eat/view_cart');
        }
        
        function updateItemQty(){
            $update = 0;
            
            // Get cart item info
            $rowid = $this->input->get('rowid');
            $qty = $this->input->get('qty');
            
            // Update item in the cart
            if(!empty($rowid) && !empty($qty)){
                $data = array(
                    'rowid' => $rowid,
                    'qty'   => $qty
                );
                $update = $this->cart->update($data);
            }
            
            // Return response
            echo $update?'ok':'err';
        }
        
        public function checkout(){
          $session_email = $this->session->userdata('uemail');
          $this->session->set_userdata('previous_url', current_url());

          if(!$this->cart->contents()){
			$data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			$data['message'] = $this->session->flashdata('message');
		  }
		  
		  $data['seating'] = $this->Eat_model->display_seating_menu();
		  
		  $this->load->view('eat/shopping/view_checkout', $data);
        }
        
        public function place_order(){
          $session_email = $this->session->userdata('uemail');

          $submit_btn = $this->input->post('order'); 
      
      //if(isset($submit_btn)){
          
            $shuffle = str_shuffle("ABCDEFGH-TUVXY");
            $unique = rand(00110, 90099);
            $order_code = $shuffle.$unique;
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $seating = $this->input->post('seating');
            $order_notes = $this->input->post('order_notes');
            
            if($cart = $this->cart->contents()):
    			foreach ($cart as $item):
    			   $total = $item['price'] * $item['qty'];
    			   
			       $array = array(
                        'order_id' => $order_code,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'email' => $session_email,
                        'title' => $item['name'],
            			'price' => $item['price'],
                        'quantity' => $item['qty'],
                        'total' => $total,
                        'category' => $item['category'],
                        'image' => $item['image'],
                        'seating' => $seating,
                        'order_notes' => $order_notes,
                        'status' => 'Pending',
                        'active' => 0,
                        'created_time' => time(),
                        'created_date'  => date('Y-m-j H:i:s')
                    );
                    
                $order_items = $this->Eat_model->insert_order_items($array);

                endforeach;
    		endif;
            
            //$this->cart->destroy();
            
            if($order_items){ ?>
                <script>
                    //alert('Order Successfully');
                    window.location.href="<?php echo site_url('eat/make_order_payment/'.strtolower($order_code)); ?>";
                    //window.location.href="<?php echo site_url('eat'); ?>";
                </script>
      <?php }else{ ?>
                <script>
                    alert('Could not process order');
                    window.location.href="<?php echo site_url('eat'); ?>";
                </script> 
    <?php } 
        //}
      }
      
      public function make_order_payment($order_code){

           if(!$this->cart->contents()){
			 $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		   }else{
			 $data['message'] = $this->session->flashdata('message');
		   }
		   
		   $this->session->set_userdata('previous_url', current_url());
          
           $data['order_item'] = $this->Eat_model->display_all_order_by_code($order_code);
           

           $this->load->view('eat/shopping/payment', $data);

        }
        
        public function stripe_order_post(){
            require_once('application/libraries/stripe-php/init.php');
            
    		$cart_total = $this->cart->total();
            
            \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

            $charge = \Stripe\Charge::create ([
                "amount" => $cart_total * 100,
                "currency" => "gbp",
                "source" => $this->input->post('stripeToken'),
                "description" => "WeeGeeDem" 
            ]);
            
             $chargeID = $charge->id;
            
             $order_id = $this->input->post('order_id');
             $title = $this->input->post('title');
             $price = $this->input->post('price');
             $quantity = $this->input->post('quantity'); 
             $email = $this->input->post('customer_email');
             
    		 $array = array(
    		     'charge_id' => $chargeID
    		 );
    		 
    		 $this->Eat_model->update_stripe_charge($order_id, $array);
    		 
    		 $query = $this->db->get('config')->result();
    		 foreach($query as $qry){
    		     $config_url = $qry->url;
    		     $config_email = $qry->email;
    		     $config_password = $qry->password;
    		 }

             $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => $config_url,
                 'smtp_port' => 25,
                 'smtp_user' => $config_email, // change it to account email
                 'smtp_pass' => $config_password, // change it to account email password
                 'mailtype' => 'html',
                 'priority' => 1,
                 'starttls'  => true,
                 'newline'   => "\r\n",
              );
              
              $data['order_item'] = $this->Eat_model->display_all_order_by_code($order_id);
              
              $subject = "Order Notification";
              $body = $this->load->view('email/order', $data, TRUE);
        
             $this->load->library('email', $config);
             //$this->load->library('encrypt');
             $this->email->set_mailtype("html");
             $this->email->from('admin@scottnnaghor.com', "WeeGeeDem Team");
             $this->email->to("$email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
            
             //}
            
             $this->cart->destroy();

            //$this->session->set_flashdata('success', 'Payment made successfully.');
            ?>
            
            <script>
                //alert('Order was successful');
                window.location.href="<?php echo site_url('eat/success/'.$order_id); ?>";
            </script>
    <?php }
    
        public function success($order_code){
            if(!$this->cart->contents()){
			 $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		   }else{
			 $data['message'] = $this->session->flashdata('message');
		   }
          
           $data['order_item'] = $this->Eat_model->display_all_order_by_code($order_code);
           
           $this->session->set_userdata('previous_url', current_url());
           
           $this->load->view('eat/shopping/success', $data);
        }
        
        public function cancel_order(){
          $id = $this->input->post('ord_id');
          $this->Eat_model->cancel_order($id);  
        }
        
        public function delete_order(){
            $did = $this->input->post('del_id');
            $this->Eat_model->delete_order($did);
        }
        
        public function delete_message(){
            $did = $this->input->post('del_id');
            $this->Eat_model->delete_message($did);
        }
        
        // End of Shopping
        
        // Discount 
        
        public function use_voucher(){
            $discount = $this->input->post('discount');

            $btn_submit = $this->input->post('submit');
            
            if(isset($btn_submit)){
                
                $voucher_array = array('code' => $discount, 'percent' => "10");
                
                $apply_voucher = $this->Eat_model->add_temp_vouchers($voucher_array);
                
                if($apply_voucher && $discount == "datguydon"){ ?>
                    <script>
                        alert('Applied Voucher');
                        window.location.href="<?php echo site_url('eat/view_cart/'); ?>";
                    </script>
          <?php }else{ ?>
                  <script>
                    alert('Voucher was not added');
                    window.location.href="<?php echo site_url('eat/view_cart'); ?>";
                  </script>
         <?php }   
            }
        }
        
        public function destroy_voucher(){
            $id = $this->input->post('del_id');
            $this->Eat_model->remove_voucher($id);
        }
        
        // End of Discount 
    }
    
?>
<?php 

    class Orders extends CI_Controller{
        
        public function pending(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['pending'] = $this->Admin_model->display_all_pending_orders();
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $btn_delivering = $this->input->post('delivering');
            $btn_delivered = $this->input->post('delivered');
            $btn_cancelled = $this->input->post('cancelled');
    
            if(isset($btn_delivering)){
              $this->Admin_model->delivering_order($id, "Delivering"); 
              
              $subject = "Order Notification";
              $body = "
                Dear Customer, please find your ordered products and the current order status
                Order Code - $order_id,
                Order Title - $title,
                Order Price - $price,
                Order Quantity - $quantity,
                Order Status - Delivering
              ";
        
              $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.scottnnaghor.com',
             'smtp_port' => 25,
             'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
             'smtp_pass' => 'TigerPhenix100', // change it to account email password
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
             );
        
             $this->load->library('email', $config);
             //$this->load->library('encrypt');
             $this->email->from('admin@scottnnaghor.com', "WeeGeeDem Team");
             $this->email->to("$customer_email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
             
             //redirect('admin/dashboard');
            ?>
              
              <script>
                alert('Order is now delivering');
                window.location.href="<?php echo site_url('admin/dashboard'); ?>";
              </script> 
      <?php }
      
            if(isset($btn_delivered)){
              $this->Admin_model->delivered_order($id, "Delivered"); 
              
              $subject = "Order Notification";
              $body = "
                Dear Customer, please find your ordered products and the current order status
                Order Code - $order_id,
                Order Title - $title,
                Order Price - $price,
                Order Quantity - $quantity,
                Order Status - Delivered
              ";
        
              $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.scottnnaghor.com',
             'smtp_port' => 25,
             'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
             'smtp_pass' => 'TigerPhenix100', // change it to account email password
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
             );
        
             $this->load->library('email', $config);
             //$this->load->library('encrypt');
             $this->email->from('admin@scottnnaghor.com', "WeeGeeDem Team");
             $this->email->to("$customer_email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
              
             //redirect('admin/dashboard');
            ?>
              
              <script>
                alert('Order is now delivered');
                window.location.href="<?php echo site_url('admin/dashboard'); ?>";
              </script> 
      <?php }
      
            if(isset($btn_cancelled)){
              $this->Admin_model->cancel_order($id, "Cancelled"); 
              
              $subject = "Order Notification";
              $body = "
                Dear Customer, please find your ordered products and the current order status
                Order Code - $order_id,
                Order Title - $title,
                Order Price - $price,
                Order Quantity - $quantity,
                Order Status - Cancelled
              ";
        
              $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.scottnnaghor.com',
             'smtp_port' => 25,
             'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
             'smtp_pass' => 'TigerPhenix100', // change it to account email password
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
             );
        
             $this->load->library('email', $config);
             //$this->load->library('encrypt');
             $this->email->from('admin@scottnnaghor.com', "WeeGeeDem Team");
             $this->email->to("$customer_email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
             
             //redirect('admin/dashboard'); 
            ?>
              
              <script>
                alert('Order is has been cancelled');
                window.location.href="<?php echo site_url('admin/dashboard'); ?>";
              </script> 
      <?php }
    
            $this->load->view('admin/order/pending', $data);
          }else{
            redirect('home');
          }
        }
        
        public function delivering(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['delivering'] = $this->Admin_model->display_all_delivering_orders();
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $btn_delivered = $this->input->post('delivered');
            $btn_cancelled = $this->input->post('cancelled');
    
            if(isset($btn_delivered)){
              $this->Admin_model->delivered_order($id, "Delivered"); 
              
              $subject = "Order Notification";
              $body = "
                Dear Customer, please find your ordered products and the current order status
                Order Code - $order_id,
                Order Title - $title,
                Order Price - $price,
                Order Quantity - $quantity,
                Order Status - Delivered
              ";
        
              $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.scottnnaghor.com',
             'smtp_port' => 25,
             'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
             'smtp_pass' => 'TigerPhenix100', // change it to account email password
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
             );
        
             $this->load->library('email', $config);
             //$this->load->library('encrypt');
             $this->email->from('admin@scottnnaghor.com', "WeeGeeDem Team");
             $this->email->to("scottphenix24@gmail.com");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
             
             //redirect('admin/dashboard');
              
            ?>
              
              <script>
                alert('Order is now delivered');
                window.location.href="<?php echo site_url('admin/dashboard'); ?>";
              </script> 
      <?php }
      
            if(isset($btn_cancelled)){
              $this->Admin_model->cancel_order($id, "Cancelled"); 
              
              $subject = "Order Notification";
              $body = "
                Dear Customer, please find your ordered products and the current order status
                Order Code - $order_id,
                Order Title - $title,
                Order Price - $price,
                Order Quantity - $quantity,
                Order Status - Cancelled
              ";
        
              $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.scottnnaghor.com',
             'smtp_port' => 25,
             'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
             'smtp_pass' => 'TigerPhenix100', // change it to account email password
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
             );
        
             $this->load->library('email', $config);
             //$this->load->library('encrypt');
             $this->email->from('admin@scottnnaghor.com', "WeeGeeDem Team");
             $this->email->to("scottphenix24@gmail.com");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
             
             //redirect('admin/dashboard');
              
            ?>
              
              <script>
                alert('Order is has been cancelled');
                window.location.href="<?php echo site_url('admin/dashboard'); ?>";
              </script> 
      <?php }
    
            $this->load->view('admin/order/delivering', $data);
          }else{
            redirect('home');
          }
        }
        
        public function delivered(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['delivered'] = $this->Admin_model->display_all_delivered_orders();
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $btn_cancelled = $this->input->post('cancelled');
    
            if(isset($btn_cancelled)){
              $this->Admin_model->cancel_order($id, "Cancelled"); 
              
              $subject = "Order Notification";
              $body = "
                Dear Customer, please find your ordered products and the current order status
                Order Code - $order_id,
                Order Title - $title,
                Order Price - $price,
                Order Quantity - $quantity,
                Order Status - Cancelled
              ";
        
              $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.scottnnaghor.com',
             'smtp_port' => 25,
             'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
             'smtp_pass' => 'TigerPhenix100', // change it to account email password
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
             );
        
             $this->load->library('email', $config);
             //$this->load->library('encrypt');
             $this->email->from('admin@scottnnaghor.com', "WeeGeeDem Team");
             $this->email->to("scottphenix24@gmail.com");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
             
             //redirect('admin/dashboard');
              
            ?>
              
              <script>
                alert('Order is has been cancelled');
                window.location.href="<?php echo site_url('admin/dashboard'); ?>";
              </script> 
      <?php }
    
            $this->load->view('admin/order/delivered', $data);
          }else{
            redirect('home');
          }
        }
        
        public function cancelled(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['cancelled'] = $this->Admin_model->display_all_cancelled_orders();
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $this->load->view('admin/order/cancelled', $data);
          }else{
            redirect('home');
          }
        }
        
        public function refunded(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['refunded'] = $this->Admin_model->display_all_refunded_orders();
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $this->load->view('admin/order/refunded', $data);
          }else{
            redirect('home');
          }
        }
        
        public function make_refund(){
            require_once('application/libraries/stripe-php/init.php');
            
            $charge_id = $this->input->post('charge_id');
                
            \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
            \Stripe\Refund::create([
                'charge' => $charge_id
            ]);
            
            $array = array('status' => 'Refunded');
            
            $this->Admin_model->update_order_items_to_refund($charge_id, $array);
            
            //redirect('admin/refunded');
            ?>
            <script>
                alert("Refunded");
                window.location.href="<?php echo site_url('admin/orders/refunded'); ?>";
            </script>
            <?php
            //redirect($_SERVER['HTTP_REFERER']);
       }
        
        public function delivering_order(){
          $pid = $this->input->post('order_id');
          $status = "Delivering";
          $this->Admin_model->delivering_order($pid, $status);
        }
        
        public function delivered_order(){
          $pid = $this->input->post('order_id');
          $status = "Delivered";
          $this->Admin_model->delivered_order($pid, $status);
        }
    
        public function cancel_order(){
          $pid = $this->input->post('order_id');
          $status = "Cancelled";
          $this->Admin_model->cancel_order($pid, $status);
        }
    
        public function delete_order(){
          $id = $this->input->post('order_id');
          
          $query = $this->db->query("SELECT order_id FROM order_items WHERE id = '$id' ")->result();
          foreach($query as $qry){
              $order_id = $qry->order_id;
          }
          
          $this->Admin_model->delete_order($id);
          $this->Admin_model->delete_order_details($order_id);
        }
        
        function delete_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                for($count = 0; $count < count($id); $count++){
                    $this->Admin_model->delete_order($id[$count]);
                }
            }    
        }
        
        function deliver_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                $status = "Delivering";
                for($count = 0; $count < count($id); $count++){
                    $this->Admin_model->delivering_order($id[$count], $status);
                }
            }    
        }
        
        function delivered_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                $status = "Delivered";
                for($count = 0; $count < count($id); $count++){
                    $this->Admin_model->delivered_order($id[$count], $status);
                }
            }    
        }
        
        function cancelled_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                $status = "Cancelled";
                for($count = 0; $count < count($id); $count++){
                    $this->Admin_model->cancel_order($id[$count], $status);
                }
            }    
        }
    }

?>
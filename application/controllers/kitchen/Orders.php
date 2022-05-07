<?php 

    class Orders extends CI_Controller{
        
        public function pending(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Kitchen"){
            $data['pending'] = $this->Kitchen_model->display_all_pending_orders();
            
            $this->load->view('kitchen/order/pending', $data);
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $btn_delivering = $this->input->post('delivering');
            $btn_delivered = $this->input->post('delivered');
            $btn_cancelled = $this->input->post('cancelled');
    
            if(isset($btn_delivering)){
              $this->Kitchen_model->delivering_order($id, "Delivering"); 
              
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
              
            ?>
              
              <script>
                alert('Order is now delivering');
                window.location.href="<?php echo site_url('kitchen/dashboard'); ?>";
              </script> 
      <?php }
      
            if(isset($btn_delivered)){
              $this->Kitchen_model->delivered_order($id, "Delivered"); 
              
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
              
            ?>
              
              <script>
                alert('Order is now delivered');
                window.location.href="<?php echo site_url('kitchen/dashboard'); ?>";
              </script> 
      <?php }
      
            if(isset($btn_cancelled)){
              $this->Kitchen_model->cancel_order($id, "Cancelled"); 
              
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
              
            ?>
              
              <script>
                alert('Order is has been cancelled');
                window.location.href="<?php echo site_url('kitchen/dashboard'); ?>";
              </script> 
      <?php }
    
          }else{
            redirect('home');
          }
        }
        
        public function delivering(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Kitchen"){
            $data['delivering'] = $this->Kitchen_model->display_all_delivering_orders();
            $this->load->view('kitchen/order/delivering', $data);

            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $btn_delivered = $this->input->post('delivered');
            $btn_cancelled = $this->input->post('cancelled');
    
            if(isset($btn_delivered)){
              $this->Kitchen_model->delivered_order($id, "Delivered"); 
              
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
              
            ?>
              
              <script>
                alert('Order is now delivered');
                window.location.href="<?php echo site_url('kitchen/dashboard'); ?>";
              </script> 
      <?php }
      
            if(isset($btn_cancelled)){
              $this->Kitchen_model->cancel_order($id, "Cancelled"); 
              
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
              
            ?>
              
              <script>
                alert('Order is has been cancelled');
                window.location.href="<?php echo site_url('kitchen/dashboard'); ?>";
              </script> 
      <?php }
            
          }else{
            redirect('home');
          }
        }
        
        public function delivered(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Kitchen"){
            $data['delivered'] = $this->Kitchen_model->display_all_delivered_orders();
            $this->load->view('kitchen/order/delivered', $data);
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $btn_cancelled = $this->input->post('cancelled');
    
            if(isset($btn_cancelled)){
              $this->Kitchen_model->cancel_order($id, "Cancelled"); 
              
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
              
            ?>
              
              <script>
                alert('Order is has been cancelled');
                window.location.href="<?php echo site_url('kitchen/dashboard'); ?>";
              </script> 
      <?php }
    
          }else{
            redirect('home');
          }
        }
        
        public function cancelled(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Kitchen"){
            $data['cancelled'] = $this->Kitchen_model->display_all_cancelled_orders();
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $this->load->view('kitchen/order/cancelled', $data);
          }else{
            redirect('home');
          }
        }
        
        public function delivering_order(){
          $pid = $this->input->post('order_id');
          $status = "Delivering";
          $this->Kitchen_model->delivering_order($pid, $status);
        }
        
        public function delivered_order(){
          $pid = $this->input->post('order_id');
          $status = "Delivered";
          $this->Kitchen_model->delivered_order($pid, $status);
        }
    
        public function cancel_order(){
          $pid = $this->input->post('order_id');
          $status = "Cancelled";
          $this->Kitchen_model->cancel_order($pid, $status);
        }
    
        public function delete_order(){
          $id = $this->input->post('order_id');
          
          $query = $this->db->query("SELECT order_id FROM order_items WHERE id = '$id' ")->result();
          foreach($query as $qry){
              $order_id = $qry->order_id;
          }
          
          $this->Kitchen_model->delete_order($id);
        }
        
        function delete_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                for($count = 0; $count < count($id); $count++){
                    $this->Kitchen_model->delete_order($id[$count]);
                }
            }    
        }
        
        function deliver_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                $status = "Delivering";
                for($count = 0; $count < count($id); $count++){
                    $this->Kitchen_model->delivering_order($id[$count], $status);
                }
            }    
        }
        
        function delivered_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                $status = "Delivered";
                for($count = 0; $count < count($id); $count++){
                    $this->Kitchen_model->delivered_order($id[$count], $status);
                }
            }    
        }
        
        function cancelled_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                $status = "Cancelled";
                for($count = 0; $count < count($id); $count++){
                    $this->Kitchen_model->cancel_order($id[$count], $status);
                }
            }    
        }
        
    }

?>
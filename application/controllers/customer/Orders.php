<?php 

    class Orders extends CI_Controller{
        
        public function pending(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "User"){
            $data['total_order_count'] = $this->Customer_model->display_order_count();
            $data['pending'] = $this->Customer_model->display_all_pending_orders_by_email($email);
            $this->load->view('customer/order/pending', $data);
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
    
            $btn_delivering = $this->input->post('delivering');
            $btn_delivered = $this->input->post('delivered');
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
             $this->email->to("$email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
              
            ?>
              
              <script>
                alert('Order is has been cancelled');
                window.location.href="<?php echo site_url('customer/dashboard'); ?>";
              </script> 
      <?php }
    
          }else{
            redirect('home');
          }
        }
        
        public function delivering(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "User"){
            $data['total_order_count'] = $this->Customer_model->display_order_count();
            $data['delivering'] = $this->Customer_model->display_all_delivering_order_by_email($email);
            $this->load->view('customer/order/delivering', $data);
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
    
            $btn_delivered = $this->input->post('delivered');
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
             $this->email->to("$email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
              
            ?>
              
              <script>
                alert('Order is has been cancelled');
                window.location.href="<?php echo site_url('customer/dashboard'); ?>";
              </script> 
      <?php }
          }else{
            redirect('home');
          }
        }
        
        public function delivered(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "User"){
            $data['total_order_count'] = $this->Customer_model->display_order_count();
            $data['delivered'] = $this->Customer_model->display_all_delivered_order_by_email($email);
            
            $order_id = $this->input->post('order_id');
            $title = $this->input->post('title');
            $price = $this->input->post('price');
            $quantity = $this->input->post('quantity'); 
            $customer_email = $this->input->post('customer_email');
            
            $this->load->view('customer/order/delivered', $data);
          }else{
            redirect('home');
          }
        }
        
        public function cancelled(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "User"){
            $data['cancelled'] = $this->Customer_model->display_all_cancelled_orders_by_email($email);
            
            $this->load->view('customer/order/cancelled', $data);
          }else{
            redirect('home');
          }
        }
    
        public function update_order(){
          $id = $this->input->post('order_id');
          
          $array = array('active' => 1);
          
          $this->Customer_model->update_order_status($id, $array);
        }
        
        function delete_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                for($count = 0; $count < count($id); $count++){
                    $this->Customer_model->update_order($id[$count]);
                }
            }    
        }
        
        function deliver_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                $status = "Delivering";
                for($count = 0; $count < count($id); $count++){
                    $this->Customer_model->delivering_order($id[$count], $status);
                }
            }    
        }
        
        function delivered_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                $status = "Delivered";
                for($count = 0; $count < count($id); $count++){
                    $this->Customer_model->delivered_order($id[$count], $status);
                }
            }    
        }
        
        function cancelled_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                $status = "Cancelled";
                for($count = 0; $count < count($id); $count++){
                    $this->Customer_model->cancel_order($id[$count], $status);
                }
            }    
        }
    }

?>
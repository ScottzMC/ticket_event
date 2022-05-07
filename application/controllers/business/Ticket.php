<?php 
    class Ticket extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
          $status = "Purchased";
          
          $query = $this->db->query("SELECT id FROM users WHERE email = '$email' ")->result();
           foreach($query as $qry){
               $business_id = $qry->id;
           }
          
          if($role == "Business"){
            $data['ticket'] = $this->Business_model->display_all_ticket_by_company($business_id);
            
            $this->load->view('business/ticket/view', $data);

          }else{
            redirect('home');
          }
        }
        
        public function add(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $this->form_validation->set_rules('title', 'Title', 'trim|required');
           $this->form_validation->set_rules('price', 'Price', 'trim|required');
           $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $query = $this->db->query("SELECT id FROM users WHERE email = '$email' ")->result();
           foreach($query as $qry){
               $business_id = $qry->id;
           }
           
           $data['events'] = $this->Business_model->display_all_event_by_company($business_id);
           
           $this->load->view('business/ticket/add', $data);
    
          if($role == "Business"){
    
            if(isset($submit_btn)){
              $shuffle = str_shuffle("ABCDEFGUVXYZXCV");
              $unique = rand(000, 999);
              $code = $shuffle.$unique;
              
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $category = $this->input->post('category');
              $price = $this->input->post('price');
              $usd = $this->input->post('usd');
              $shilling = $this->input->post('shilling');
              $leone = $this->input->post('leone');
              $quantity = $this->input->post('quantity');
              $event_code = $this->input->post('event_code');
              $date = date('Y-m-d H:i:s');
              
              $files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);

              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/ticket/",
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite'     => TRUE,
                    'max_size'      => "3000",  // Can be set to particular file size
                    //'max_height'    => "768",
                    //'max_width'     => "1024"
                );
    
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
    
                $this->upload->do_upload('userFiles1');
                $fileName1 = $_FILES['userFiles1']['name'];
              }
              
              $array = array(
                'business_id' => $business_id,
                'code' => $code,
                'title' => $str_title,
                'event_code' => $event_code,
                'category' => $category,
                'price' => $price,
                'usd' => $usd,
                'shilling' => $shilling,
                'leone' => $leone,
                'quantity' => $quantity,
                'image' => $fileName1,
                'created_date' => $date
              );
    
              $insert = $this->Business_model->insert_ticket($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('business/ticket'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('business/ticket');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('business/ticket'); ?>";
                </script>
          <?php 
                $this->load->view('business/ticket/add');
              }
            }
    
          }else{
            redirect('home');
          }  
        }
        
        public function edit($id){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
          if($role == "Business"){
            $data['edit'] = $this->Business_model->display_ticket_by_id($id);
            $data['events'] = $this->Business_model->display_all_event();
            
            $form_valid = $this->form_validation->run();
            
            $submit_btn = $this->input->post('edit');
    
            if($form_valid == FALSE){
              $this->load->view('business/ticket/edit', $data);
            }
            
            if(isset($submit_btn)){
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $event_code = $this->input->post('event_code');
              $category = $this->input->post('category');
              $price = $this->input->post('price');
              $usd = $this->input->post('usd');
              $shilling = $this->input->post('shilling');
              $leone = $this->input->post('leone');
              $quantity = $this->input->post('quantity');
              $date = date('Y-m-d H:i:s');
              
              $array = array(
                'title' => $str_title,
                'event_code' => $event_code,
                'category' => $category,
                'price' => $price,
                'usd' => $usd,
                'shilling' => $shilling,
                'leone' => $leone,
                'quantity' => $quantity,
                'created_date' => $date
              );
    
              $update = $this->Business_model->update_ticket($id, $array);

              if($update){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/ticket'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Update Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_company');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/ticket'); ?>";
                </script>
          <?php 
                $this->load->view('business/ticket/edit', $data);
              }
            }
            
          }else{
            redirect('home');
          }  
        }
        
        public function edit_image($id){
          $submit_btn = $this->input->post('upload_image');
          
          if(isset($submit_btn)){
              $files = $_FILES;
              $cpt2 = count($_FILES['userFiles1']['name']);
        
              for($i=0; $i<$cpt2; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/ticket/",
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite'     => TRUE,
                    'max_size'      => "3000",  // Can be set to particular file size
                    //'max_height'    => "768",
                    //'max_width'     => "1024"
                );
    
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                
                $this->upload->do_upload('userFiles1');
                $fileName1 = $_FILES['userFiles1']['name'];
              }
    
              $update_image = $this->Business_model->update_ticket_image($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/ticket'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/ticket'); ?>";
                </script>
          <?php
                $this->load->view('business/ticket/edit', $data);
              }  
          }
        }
        
        public function process_ticket(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $this->form_validation->set_rules('fullname', 'Customer Name', 'trim|required');
           $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required');
           $this->form_validation->set_rules('price', 'Price', 'trim|required');
           $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $data['events'] = $this->Business_model->display_all_event();
           
           $this->load->view('business/ticket/process_ticket', $data);
    
          if($role == "Business"){
    
            if(isset($submit_btn)){
              $shuffle = str_shuffle("TIKDEFGXCV");
              $unique = rand(00, 99);
              $ticket_code = $shuffle.$unique;
            
              $code = $this->input->post('code');
              
              $fullname = $this->input->post('fullname');
              $customer_email = $this->input->post('customer_email');
              $category = $this->input->post('category');
              $quantity = $this->input->post('quantity');
              $events = $this->input->post('events');
              $date = date('Y-m-d H:i:s');
              
              $query = $this->db->query("SELECT title, price FROM ticket WHERE code = '$code' ")->result();
              foreach($query as $qry){
                  $title = $qry->title;
                  $price = $qry->price;
              }
              
              $array = array(
                'code' => $code,
                'ticket_code' => $ticket_code,
                'fullname' => $fullname,
                'customer_email' => $customer_email,
                'title' => $title,
                'price' => $price,
                'quantity' => $quantity,
                'events' => $events,
                'status' => "Purchased",
                'created_date' => $date
              );
              
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
                  'fullname' => $fullname,
                  'title' => $title,
                  'events' => $events,
                  'quantity' => $quantity,
                  'price' => $price
                );
              
              $subject = "Purchased Ticket";
              $body = $this->load->view('email/processed_ticket',$data,TRUE);
    
             $this->load->library('email', $config);
             //$this->load->library('encrypt');
             $this->email->set_mailtype("html");
             $this->email->from('admin@scottnnaghor.com', "Wee Gee Dem Team");
             $this->email->to("$customer_email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
             $this->email->send();
             
             $insert = $this->Business_model->insert_ticket_order($array);
             $this->Data_model->update_ticket_quantity($code, $quantity);
    
              if($insert){ 
              ?>
                <script>
                    alert('Processed Successfully');
                    window.location.href="<?php echo site_url('business/ticket'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('business/ticket');
                ?>
                <script>
                    alert('Processed Failed');
                    window.location.href="<?php echo site_url('business/ticket'); ?>";
                </script>
          <?php 
              }
            }
    
          }else{
            redirect('home');
          }  
        }
        
        public function purchased(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
          $status = "Purchased";
          
          $query = $this->db->query("SELECT id FROM users WHERE email = '$email' ")->result();
           foreach($query as $qry){
               $business_id = $qry->id;
           }
          
          if($role == "Business"){
            $data['purchased'] = $this->Business_model->display_all_purchased_ticket_by_company($status, $business_id);
            
            $this->load->view('business/ticket/purchased', $data);

          }else{
            redirect('home');
          }
        }
        
        public function cancel_ticket(){
          $id = $this->input->post('id');
          $status = "Cancelled";
          $this->Business_model->cancel_ticket($id, $status);
        }
        
        public function delete_ticket(){
          $id = $this->input->post('booking_id');
          
          $this->Business_model->update_ticket($id);
        }
        
        function delete_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                for($count = 0; $count < count($id); $count++){
                    $this->Business_model->update_ticket($id[$count]);
                }
            }    
        }
    }

?>
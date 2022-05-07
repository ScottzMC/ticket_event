<?php 

    class Event extends CI_Controller{
        
        public function index(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $query = $this->db->query("SELECT id FROM users WHERE email = '$email' ")->result();
           foreach($query as $qry){
               $business_id = $qry->id;
           }
    
          if($role == "Business"){
            $data['event'] = $this->Business_model->display_all_event_by_company($business_id);
    
            $this->load->view('business/event/view', $data);
          }else{
            redirect('home');
          } 
        }
        
        public function add(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $this->form_validation->set_rules('title', 'Title', 'trim|required');
           $this->form_validation->set_rules('body', 'Content', 'trim|required');
           $this->form_validation->set_rules('maps', 'Maps', 'trim|required');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $query = $this->db->query("SELECT id FROM users WHERE email = '$email' ")->result();
           foreach($query as $qry){
               $business_id = $qry->id;
           }
           
           $data['venue'] = $this->Admin_model->display_all_venue();
           
           $this->load->view('business/event/add', $data);
    
          if($role == "Business"){
    
            if(isset($submit_btn)){
              $shuffle = str_shuffle("ABCDEFGUVXYZXCV");
              $unique = rand(000, 999);
              $code = $shuffle.$unique;
              
              $venue_id = $this->input->post('venue_id');
              
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $body = $this->input->post('body');
              $type = $this->input->post('type');
              $category = $this->input->post('category');
              $video = $this->input->post('video');
              $event_date = $this->input->post('event_date');
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
                    'upload_path'   => "./uploads/events/",
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
                'venue_id' => $venue_id,
                'code' => $code,
                'title' => $str_title,
                'body' => $body,
                'type' => $type,
                'category' => $category,
                'video' => $video,
                'image' => $fileName1,
                'event_date' => $event_date, 
                'created_date' => $date
              );
    
              $insert = $this->Business_model->insert_event($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('business/event'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('admin/event');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('business/event'); ?>";
                </script>
          <?php 
                $this->load->view('business/event/add');
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
            $data['edit'] = $this->Business_model->display_event_by_id($id);
            $data['venue'] = $this->Admin_model->display_all_venue();
            
            $form_valid = $this->form_validation->run();
            
            $submit_btn = $this->input->post('edit');
    
            if($form_valid == FALSE){
              $this->load->view('business/event/edit', $data);
            }
            
            if(isset($submit_btn)){
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $body = $this->input->post('body');
              $type = $this->input->post('type');
              $category = $this->input->post('category');
              $video = $this->input->post('video');
              $event_date = $this->input->post('event_date');
              $date = date('Y-m-d H:i:s');
              
              $venue_id = $this->input->post('venue_id');
              
              $array = array(
                'venue_id' => $venue_id,
                'title' => $str_title,
                'body' => $body,
                'type' => $type,
                'category' => $category,
                'video' => $video,
                'event_date' => $event_date,
                'created_date' => $date
              );
    
              $update = $this->Business_model->update_event($id, $array);

              if($update){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Update Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_company');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event'); ?>";
                </script>
          <?php 
                $this->load->view('business/event/edit', $data);
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
                    'upload_path'   => "./uploads/events/",
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
    
              $update_image = $this->Business_model->update_event_image($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event'); ?>";
                </script>
          <?php
                $this->load->view('business/event/edit', $data);
              }  
          }
        }
        
        public function edit_image2($id){
          $submit_btn = $this->input->post('upload_image');
          
          if(isset($submit_btn)){
              $files = $_FILES;
              $cpt2 = count($_FILES['userFiles2']['name']);
        
              for($i=0; $i<$cpt2; $i++){
                $_FILES['userFiles2']['name']= $files['userFiles2']['name'][$i];
                $_FILES['userFiles2']['type']= $files['userFiles2']['type'][$i];
                $_FILES['userFiles2']['tmp_name']= $files['userFiles2']['tmp_name'][$i];
                $_FILES['userFiles2']['error']= $files['userFiles2']['error'][$i];
                $_FILES['userFiles2']['size']= $files['userFiles2']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/venue/",
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite'     => TRUE,
                    'max_size'      => "3000",  // Can be set to particular file size
                    //'max_height'    => "768",
                    //'max_width'     => "1024"
                );
    
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                
                $this->upload->do_upload('userFiles2');
                $fileName2 = $_FILES['userFiles2']['name'];
              }
    
              $update_image = $this->Business_model->update_venue_image2($id, $fileName2);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/venue'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/venue'); ?>";
                </script>
          <?php
                $this->load->view('business/venue/edit', $data);
              }  
          }
        }
        
        public function delete_event(){
          $did = $this->input->post('del_id');
          $this->Business_model->delete_event($did);
        }
        
        // Banner 
        
        public function add_banner(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $data['event'] = $this->Business_model->display_all_event();
           
           $this->load->view('business/event/banner/add', $data);
    
          if($role == "Business"){
    
            if(isset($submit_btn)){
                
              $event_id = $this->input->post('event_id');
              $topic = $this->input->post('topic');
              
              $files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);

              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/banner/",
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
                'event_id' => $event_id,
                'topic' => $topic,
                'image' => $fileName1
              );
    
              $insert = $this->Business_model->insert_event_banner($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('business/event/banner'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('business/event/banner'); ?>";
                </script>
          <?php 
              }
            }
    
          }else{
            redirect('home');
          }  
        }
        
        public function banner(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           if($role == "Business"){
            $data['banner'] = $this->Business_model->display_all_event_banner();
            
            $this->load->view('business/event/banner/view', $data);
          }else{
            redirect('home');
          }  
        }
        
        public function edit_banner($id){
          $submit_btn = $this->input->post('upload');
          
          $data['event'] = $this->Business_model->display_all_event();
          $data['edit'] = $this->Business_model->display_event_banner_by_id($id);
          
          $this->load->view('business/event/banner/edit', $data);
          
          if(isset($submit_btn)){
              
              $topic = $this->input->post('topic');
              
              $array = array('topic' => $topic);
    
              $update_image = $this->Business_model->update_event_banner($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event/banner'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event/banner'); ?>";
                </script>
          <?php
                
              }  
          }
        }
        
        public function edit_banner_image($id){
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
                    'upload_path'   => "./uploads/banner/",
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
              
              $array = array('image' => $fileName1);
    
              $update_image = $this->Business_model->update_event_banner($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event/banner'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event/banner'); ?>";
                </script>
          <?php
                
              }  
          }
        }
        
        public function delete_event_banner(){
          $did = $this->input->post('del_id');
          $this->Business_model->delete_event_banner($did);
        }
        
        // End of Banner
        
        // Age 
        
        public function add_age(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $data['event'] = $this->Business_model->display_all_event();
           
           $this->load->view('business/event/age/add', $data);
    
          if($role == "Business"){
    
            if(isset($submit_btn)){
                
              $event_id = $this->input->post('event_id');
              $topic = $this->input->post('topic');
              
              /*$files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);

              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/events/",
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
              }*/
              
              $array = array(
                'event_id' => $event_id,
                'topic' => $topic
                //'image' => $fileName1
              );
    
              $insert = $this->Business_model->insert_event_age($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('business/event/age'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('business/event/age'); ?>";
                </script>
          <?php 
              }
            }
    
          }else{
            redirect('home');
          }  
        }
        
        public function age(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           if($role == "Business"){
            $data['age'] = $this->Business_model->display_all_event_age();
            
            $this->load->view('business/event/age/view', $data);
          }else{
            redirect('home');
          }  
        }
        
        public function edit_age($id){
          $submit_btn = $this->input->post('upload');
          
          $data['event'] = $this->Business_model->display_all_event();
          $data['edit'] = $this->Business_model->display_event_age_by_id($id);
          
          $this->load->view('business/event/age/edit', $data);
          
          if(isset($submit_btn)){
              
              $topic = $this->input->post('topic');
              
              $array = array('topic' => $topic);
    
              $update_image = $this->Business_model->update_event_age($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event/age'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event/age'); ?>";
                </script>
          <?php
                
              }  
          }
        }
        
        /*public function edit_age_image($id){
          $submit_btn = $this->input->post('upload_image');
          
          $data['event'] = $this->Admin_model->display_all_event();
          
          $this->load->view('business/event/age/edit', $data);
          
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
                    'upload_path'   => "./uploads/events/",
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
    
              $update_image = $this->Business_model->update_event_banner($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event/banner'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event/banner'); ?>";
                </script>
          <?php
                
              }  
          }
        }*/
        
        public function delete_event_age(){
          $did = $this->input->post('del_id');
          $this->Business_model->delete_event_age($did);
        }
        
        // End of Age
        
        // Dress Code 
        
        public function add_dress_code(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $data['event'] = $this->Business_model->display_all_event();
           
           $this->load->view('business/event/dress_code/add', $data);
    
          if($role == "Business"){
    
            if(isset($submit_btn)){
                
              $event_id = $this->input->post('event_id');
              $topic = $this->input->post('topic');
              
              /*$files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);

              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/events/",
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
              }*/
              
              $array = array(
                'event_id' => $event_id,
                'topic' => $topic
                //'image' => $fileName1
              );
    
              $insert = $this->Business_model->insert_event_dress_code($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('business/event/dress_code'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('business/event/dress_code');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('business/event/dress_code'); ?>";
                </script>
          <?php 
              }
            }
    
          }else{
            redirect('home');
          }  
        }
        
        public function dress_code(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           if($role == "Business"){
            $data['dress_code'] = $this->Business_model->display_all_event_dress_code();
            
            $this->load->view('business/event/dress_code/view', $data);
          }else{
            redirect('home');
          }  
        }
        
        public function edit_dress_code($id){
          $submit_btn = $this->input->post('upload');
          
          $data['event'] = $this->Business_model->display_all_event();
          $data['edit'] = $this->Business_model->display_event_dress_code_by_id($id);
          
          $this->load->view('business/event/dress_code/edit', $data);
          
          if(isset($submit_btn)){
              
              $topic = $this->input->post('topic');
              
              $array = array('topic' => $topic);
    
              $update_image = $this->Business_model->update_event_dress_code($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event/dress_code'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event/dress_code'); ?>";
                </script>
          <?php
                
              }  
          }
        }
        
        /*public function edit_dress_code_image($id){
          $submit_btn = $this->input->post('upload_image');
          
          $data['event'] = $this->Business_model->display_all_event();
          
          $this->load->view('business/event/age/edit', $data);
          
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
                    'upload_path'   => "./uploads/events/",
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
    
              $update_image = $this->Business_model->update_event_dress_code($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event/dress_code'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event/dress_code'); ?>";
                </script>
          <?php
                
              }  
          }
        }*/
        
        public function delete_event_dress_code(){
          $did = $this->input->post('del_id');
          $this->Business_model->delete_event_dress_code($did);
        }
        
        // End of Dress code
        
        // Last entry
        
        public function add_last_entry(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $data['event'] = $this->Business_model->display_all_event();
           
           $this->load->view('business/event/last_entry/add', $data);
    
          if($role == "Business"){
    
            if(isset($submit_btn)){
                
              $event_id = $this->input->post('event_id');
              $topic = $this->input->post('topic');
              
              /*$files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);

              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/events/",
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
              }*/
              
              $array = array(
                'event_id' => $event_id,
                'topic' => $topic
                //'image' => $fileName1
              );
    
              $insert = $this->Business_model->insert_event_last_entry($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('business/event/last_entry'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('business/event/last_entry');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('business/event/last_entry'); ?>";
                </script>
          <?php 
              }
            }
    
          }else{
            redirect('home');
          }  
        }
        
        public function last_entry(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           if($role == "Business"){
            $data['last_entry'] = $this->Business_model->display_all_event_last_entry();
            
            $this->load->view('business/event/last_entry/view', $data);
          }else{
            redirect('home');
          }  
        }
        
        public function edit_last_entry($id){
          $submit_btn = $this->input->post('upload');
          
          $data['event'] = $this->Business_model->display_all_event();
          $data['edit'] = $this->Business_model->display_event_last_entry_by_id($id);
          
          $this->load->view('business/event/last_entry/edit', $data);
          
          if(isset($submit_btn)){
              
              $topic = $this->input->post('topic');
              
              $array = array('topic' => $topic);
    
              $update_image = $this->Business_model->update_event_last_entry($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event/last_entry'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event/last_entry'); ?>";
                </script>
          <?php
                
              }  
          }
        }
        
        /*public function edit_last_entry_image($id){
          $submit_btn = $this->input->post('upload_image');
          
          $data['event'] = $this->Business_model->display_all_event();
          
          $this->load->view('business/event/last_entry/edit', $data);
          
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
                    'upload_path'   => "./uploads/events/",
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
    
              $update_image = $this->Business_model->update_event_last_entry($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/event/last_entry'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/event/last_entry'); ?>";
                </script>
          <?php
                
              }  
          }
        }*/
        
        public function delete_event_last_entry(){
          $did = $this->input->post('del_id');
          $this->Business_model->delete_event_last_entry($did);
        }
        
        // End of Last entry
    }

?>
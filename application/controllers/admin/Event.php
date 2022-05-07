<?php 

    class Event extends CI_Controller{
        
        public function index(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['event'] = $this->Admin_model->display_all_event();
            
            $this->load->view('admin/event/view', $data);
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
           
           $data['status'] = $this->Admin_model->display_status_menu();
           $data['venue'] = $this->Admin_model->display_all_venue();
           
           $this->load->view('admin/event/add', $data);
    
          if($role == "Admin"){
    
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
                'venue_id' => $venue_id,
                'code' => $code,
                'title' => $title,
                'body' => $body,
                'type' => $type,
                'category' => $category,
                'video' => $video,
                'image' => $fileName1,
                'event_date' => $event_date, 
                'created_date' => $date
              );
    
              $insert = $this->Admin_model->insert_event($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/event'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('admin/event');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('admin/event'); ?>";
                </script>
          <?php 
                $this->load->view('admin/event/add');
              }
            }
    
          }else{
            redirect('home');
          }  
        }

        public function edit($id){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['edit'] = $this->Admin_model->display_event_by_id($id);
            $data['status'] = $this->Admin_model->display_status_menu();
            $data['venue'] = $this->Admin_model->display_all_venue();
            
            $form_valid = $this->form_validation->run();
            
            $submit_btn = $this->input->post('edit');
    
            if($form_valid == FALSE){
              $this->load->view('admin/event/edit', $data);
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
                'title' => $title,
                'body' => $body,
                'type' => $type,
                'category' => $category,
                'video' => $video,
                'event_date' => $event_date,
                'created_date' => $date
              );
    
              $update = $this->Admin_model->update_event($id, $array);

              if($update){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Update Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_company');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event'); ?>";
                </script>
          <?php 
                $this->load->view('admin/event/edit', $data);
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
    
              $update_image = $this->Admin_model->update_event_image($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event'); ?>";
                </script>
          <?php
                $this->load->view('admin/event/edit', $data);
              }  
          }
        }
        
        public function delete_event(){
          $did = $this->input->post('del_id');
          $this->Admin_model->delete_event($did);
        }
        
        public function delete_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                for($count = 0; $count < count($id); $count++){
                    $this->Admin_model->delete_event($id[$count]);
                }
            }    
        }
        
        // Banner 
        
        public function add_banner(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $data['event'] = $this->Admin_model->display_all_event();
           
           $this->load->view('admin/event/banner/add', $data);
    
          if($role == "Admin"){
    
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
    
              $insert = $this->Admin_model->insert_event_banner($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/event/banner'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('admin/event/banner');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('admin/event/banner'); ?>";
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
    
           if($role == "Admin"){
            $data['banner'] = $this->Admin_model->display_all_event_banner();
            
            $this->load->view('admin/event/banner/view', $data);
          }else{
            redirect('home');
          }  
        }
        
        public function edit_banner($id){
          $submit_btn = $this->input->post('upload');
          
          $data['event'] = $this->Admin_model->display_all_event();
          $data['edit'] = $this->Admin_model->display_event_banner_by_id($id);
          
          $this->load->view('admin/event/banner/edit', $data);
          
          if(isset($submit_btn)){
              
              $topic = $this->input->post('topic');
              
              $array = array('topic' => $topic);
    
              $update_image = $this->Admin_model->update_event_banner($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event/banner'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event/banner'); ?>";
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
    
              $update_image = $this->Admin_model->update_event_banner($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event/banner'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event/banner'); ?>";
                </script>
          <?php
                
              }  
          }
        }
        
        public function delete_event_banner(){
          $did = $this->input->post('del_id');
          $this->Admin_model->delete_event_banner($did);
        }
        
        // End of Banner
        
        // Age 
        
        public function add_age(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $data['event'] = $this->Admin_model->display_all_event();
           
           $this->load->view('admin/event/age/add', $data);
    
          if($role == "Admin"){
    
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
    
              $insert = $this->Admin_model->insert_event_age($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/event/age'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('admin/event/age');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('admin/event/age'); ?>";
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
    
           if($role == "Admin"){
            $data['age'] = $this->Admin_model->display_all_event_age();
            
            $this->load->view('admin/event/age/view', $data);
          }else{
            redirect('home');
          }  
        }
        
        public function edit_age($id){
          $submit_btn = $this->input->post('upload');
          
          $data['event'] = $this->Admin_model->display_all_event();
          $data['edit'] = $this->Admin_model->display_event_age_by_id($id);
          
          $this->load->view('admin/event/age/edit', $data);
          
          if(isset($submit_btn)){
              
              $topic = $this->input->post('topic');
              
              $array = array('topic' => $topic);
    
              $update_image = $this->Admin_model->update_event_age($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event/age'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event/age'); ?>";
                </script>
          <?php
                
              }  
          }
        }
        
        /*public function edit_age_image($id){
          $submit_btn = $this->input->post('upload_image');
          
          $data['event'] = $this->Admin_model->display_all_event();
          
          $this->load->view('admin/event/age/edit', $data);
          
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
    
              $update_image = $this->Admin_model->update_event_banner($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event/banner'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event/banner'); ?>";
                </script>
          <?php
                
              }  
          }
        }*/
        
        public function delete_event_age(){
          $did = $this->input->post('del_id');
          $this->Admin_model->delete_event_age($did);
        }
        
        // End of Age
        
        // Dress Code 
        
        public function add_dress_code(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $data['event'] = $this->Admin_model->display_all_event();
           
           $this->load->view('admin/event/dress_code/add', $data);
    
          if($role == "Admin"){
    
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
    
              $insert = $this->Admin_model->insert_event_dress_code($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/event/dress_code'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('admin/event/dress_code');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('admin/event/dress_code'); ?>";
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
    
           if($role == "Admin"){
            $data['dress_code'] = $this->Admin_model->display_all_event_dress_code();
            
            $this->load->view('admin/event/dress_code/view', $data);
          }else{
            redirect('home');
          }  
        }
        
        public function edit_dress_code($id){
          $submit_btn = $this->input->post('upload');
          
          $data['event'] = $this->Admin_model->display_all_event();
          $data['edit'] = $this->Admin_model->display_event_dress_code_by_id($id);
          
          $this->load->view('admin/event/dress_code/edit', $data);
          
          if(isset($submit_btn)){
              
              $topic = $this->input->post('topic');
              
              $array = array('topic' => $topic);
    
              $update_image = $this->Admin_model->update_event_dress_code($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event/dress_code'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event/dress_code'); ?>";
                </script>
          <?php
                
              }  
          }
        }
        
        /*public function edit_dress_code_image($id){
          $submit_btn = $this->input->post('upload_image');
          
          $data['event'] = $this->Admin_model->display_all_event();
          
          $this->load->view('admin/event/age/edit', $data);
          
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
    
              $update_image = $this->Admin_model->update_event_dress_code($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event/dress_code'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event/dress_code'); ?>";
                </script>
          <?php
                
              }  
          }
        }*/
        
        public function delete_event_dress_code(){
          $did = $this->input->post('del_id');
          $this->Admin_model->delete_event_dress_code($did);
        }
        
        // End of Dress code
        
        // Last entry
        
        public function add_last_entry(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
           $form_valid = $this->form_validation->run();
           $submit_btn = $this->input->post('add');
           
           $data['event'] = $this->Admin_model->display_all_event();
           
           $this->load->view('admin/event/last_entry/add', $data);
    
          if($role == "Admin"){
    
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
    
              $insert = $this->Admin_model->insert_event_last_entry($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/event/last_entry'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('admin/event/last_entry');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('admin/event/last_entry'); ?>";
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
    
           if($role == "Admin"){
            $data['last_entry'] = $this->Admin_model->display_all_event_last_entry();
            
            $this->load->view('admin/event/last_entry/view', $data);
          }else{
            redirect('home');
          }  
        }
        
        public function edit_last_entry($id){
          $submit_btn = $this->input->post('upload');
          
          $data['event'] = $this->Admin_model->display_all_event();
          $data['edit'] = $this->Admin_model->display_event_last_entry_by_id($id);
          
          $this->load->view('admin/event/last_entry/edit', $data);
          
          if(isset($submit_btn)){
              
              $topic = $this->input->post('topic');
              
              $array = array('topic' => $topic);
    
              $update_image = $this->Admin_model->update_event_last_entry($id, $array);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event/last_entry'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event/last_entry'); ?>";
                </script>
          <?php
                
              }  
          }
        }
        
        /*public function edit_last_entry_image($id){
          $submit_btn = $this->input->post('upload_image');
          
          $data['event'] = $this->Admin_model->display_all_event();
          
          $this->load->view('admin/event/last_entry/edit', $data);
          
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
    
              $update_image = $this->Admin_model->update_event_last_entry($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/event/last_entry'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/event/last_entry'); ?>";
                </script>
          <?php
                
              }  
          }
        }*/
        
        public function delete_event_last_entry(){
          $did = $this->input->post('del_id');
          $this->Admin_model->delete_event_last_entry($did);
        }
        
        // End of Last entry
    
    }

?>
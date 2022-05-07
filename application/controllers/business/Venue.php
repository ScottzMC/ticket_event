<?php 

    class Venue extends CI_Controller{
        
        public function index(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $query = $this->db->query("SELECT id FROM users WHERE email = '$email' ")->result();
           foreach($query as $qry){
               $business_id = $qry->id;
           }
    
          if($role == "Business"){
            $data['venue'] = $this->Business_model->display_all_venue_by_company($business_id);
    
            $this->load->view('business/venue/view', $data);
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
           
           $this->load->view('business/venue/add');
    
          if($role == "Business"){
    
            if(isset($submit_btn)){
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $body = $this->input->post('body');
              $maps = $this->input->post('maps');
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
                    'upload_path'   => "./uploads/venue/",
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
                'title' => $str_title,
                'body' => $body,
                'image1' => $fileName1,
                'maps' => $maps,
                'created_date' => $date
              );
    
              $insert = $this->Business_model->insert_venue($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('business/venue'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('business/venue'); ?>";
                </script>
          <?php 
                $this->load->view('business/venue/add');
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
            $data['edit'] = $this->Business_model->display_venue_by_id($id);
            
            $form_valid = $this->form_validation->run();
            
            $submit_btn = $this->input->post('edit');
    
            if($form_valid == FALSE){
              $this->load->view('business/venue/edit', $data);
            }
            
            if(isset($submit_btn)){
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $body = $this->input->post('body');
              $maps = $this->input->post('maps');
              $date = date('Y-m-d H:i:s');
              
              $array = array(
                'title' => $str_title,
                'body' => $body,
                'maps' => $maps,
                'created_date' => $date
              );
    
              $update = $this->Business_model->update_venue($id, $array);

              if($update){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('business/venue'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Update Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_company');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('business/venue'); ?>";
                </script>
          <?php 
                $this->load->view('business/venue/edit', $data);
              }
            }
            
          }else{
            redirect('home');
          }  
        }
        
        public function edit_image1($id){
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
                    'upload_path'   => "./uploads/venue/",
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
    
              $update_image = $this->Business_model->update_venue_image1($id, $fileName1);
    
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
        
        public function delete_venue(){
          $did = $this->input->post('del_id');
          $this->Business_model->delete_venue($did);
        }
    }

?>
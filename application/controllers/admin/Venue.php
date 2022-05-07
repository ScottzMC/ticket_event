<?php 

    class Venue extends CI_Controller{
        
        public function index(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['venue'] = $this->Admin_model->display_all_venue();
    
            $this->load->view('admin/venue/view', $data);
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
           
           $this->load->view('admin/venue/add');
    
          if($role == "Admin"){
    
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
                'title' => $title,
                'body' => $body,
                'image1' => $fileName1,
                'maps' => $maps,
                'created_date' => $date
              );
    
              $insert = $this->Admin_model->insert_venue($array);
    
              if($insert){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/venue'); ?>";
                </script>
        <?php }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('admin/venue');
                ?>
                <script>
                    alert('Upload Failed');
                    window.location.href="<?php echo site_url('admin/venue'); ?>";
                </script>
          <?php 
                $this->load->view('admin/venue/add');
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
            $data['edit'] = $this->Admin_model->display_venue_by_id($id);
            
            $form_valid = $this->form_validation->run();
            
            $submit_btn = $this->input->post('edit');
    
            if($form_valid == FALSE){
              $this->load->view('admin/venue/edit', $data);
            }
            
            if(isset($submit_btn)){
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $body = $this->input->post('body');
              $maps = $this->input->post('maps');
              $date = date('Y-m-d H:i:s');
              
              $array = array(
                'title' => $title,
                'body' => $body,
                'maps' => $maps,
                'created_date' => $date
              );
    
              $update = $this->Admin_model->update_venue($id, $array);

              if($update){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/venue'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Update Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_company');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/venue'); ?>";
                </script>
          <?php 
                $this->load->view('admin/venue/edit', $data);
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
    
              $update_image = $this->Admin_model->update_venue_image1($id, $fileName1);
    
              if($update_image){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/venue'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/venue'); ?>";
                </script>
          <?php
                $this->load->view('admin/venue/edit', $data);
              }  
          }
        }
        
        public function delete_venue(){
          $did = $this->input->post('del_id');
          $this->Admin_model->delete_venue($did);
        }
    }

?>
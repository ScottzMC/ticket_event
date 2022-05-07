<?php 

    class Banner extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['banner'] = $this->Admin_model->display_banners();
            $data['status'] = $this->Admin_model->display_status_menu();
    
            $this->load->view('admin/website/banner/detail', $data);
          }else{
            redirect('home');
          }
        }
        
        public function add(){
          if(!empty($_FILES['fileBanner']['name'])){
            $files = $_FILES;
            //$images = array();
            $cpt = count($_FILES['fileBanner']['name']);
            for($i=0; $i<$cpt; $i++){
              $_FILES['fileBanner']['name']= $files['fileBanner']['name'][$i];
              $_FILES['fileBanner']['type']= $files['fileBanner']['type'][$i];
              $_FILES['fileBanner']['tmp_name']= $files['fileBanner']['tmp_name'][$i];
              $_FILES['fileBanner']['error']= $files['fileBanner']['error'][$i];
              $_FILES['fileBanner']['size']= $files['fileBanner']['size'][$i];
    
              $config = array(
                  'upload_path'   => "./uploads/banner/",
                  'allowed_types' => "gif|jpg|png|jpeg",
                  'overwrite'     => TRUE,
                  'max_size'      => "3000",  // Can be set to particular file size
                  //'max_height'    => "768",
                  //'max_width'     => "1024"
              );
    
              $this->load->library('upload', $config);
              $this->upload->initialize($config);
    
              $this->upload->do_upload('fileBanner');
              $fileName = $_FILES['fileBanner']['name'];
            }
    
            $type = $this->input->post('type');
            $currency_type = $this->input->post('currency_type');
            $category = $this->input->post('category');
            $url = $this->input->post('url');
            
            $title = $this->input->post('title');
            
            $banner_data = array(
                'title' => $title,
                'image' => $fileName,
                'type' => $type,
                'currency_type' => $currency_type,
                'url' => $url,
                'category_id' => $category
            );
    
            $insert_banner = $this->Admin_model->insert_banner($banner_data);
    
            if($insert_banner){ ?>
              <script>
                  alert('Added Successfully');
                  window.location.href="<?php echo site_url('admin/banner'); ?>";
              </script>
     <?php }else{ ?>
              <script>
                  alert('Error!!. Try Again');
                  window.location.href="<?php echo site_url('admin/banner'); ?>";
              </script>
    <?php
            }
          }
        }
        
        public function edit($id){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['edit_banner'] = $this->Admin_model->display_banners_by_id($id);
          $data['status'] = $this->Admin_model->display_status_menu();
    
          $this->form_validation->set_rules('title', 'Banner Title', 'trim|required');
          $this->form_validation->set_rules('type', 'Banner Type', 'trim|required');
          $form_valid = $this->form_validation->run();
          
          $btn_submit = $this->input->post('edit');
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/banner/edit', $data);
          }else if(isset($btn_submit)){
            
            $title = $this->input->post('title');
            $type = $this->input->post('type');
            $currency_type = $this->input->post('currency_type');
            $category = $this->input->post('category');
            $url = $this->input->post('url');
            
            $data = array(
                'title' => $title,
                'type' => $type,
                'currency_type' => $currency_type,
                'category_id' => $category,
                'url' => $url
            );
            
            $update_banner = $this->Admin_model->update_banner($id, $data);
            
            if($update_banner){ ?>
              <script>
                  alert('Updated Successfully');
                  window.location.href="<?php echo site_url('admin/banner'); ?>";
              </script>
      <?php }else{ ?>
              <script>
                  alert('Update Failed');
                  window.location.href="<?php echo site_url('admin/banner/edit/'.$id); ?>";
              </script>
              <?php 
              /*$statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgEditError', $statusMsg);
              $this->load->view('admin/menu/nav', $data);
              $this->load->view('admin/website/edit_banner_detail', $data);
              $this->load->view('admin/menu/footer'); */
            }
          }
        }
        
        public function edit_image($id){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['edit_banner'] = $this->Admin_model->display_banners_by_id($id);
          $data['status'] = $this->Admin_model->display_status_menu();
          
          $btn_submit = $this->input->post('edit_image');
    
          if(isset($btn_submit)){
            $files = $_FILES;
            //$images = array();
            $cpt = count($_FILES['fileBanner']['name']);
            for($i=0; $i<$cpt; $i++){
              $_FILES['fileBanner']['name']= $files['fileBanner']['name'][$i];
              $_FILES['fileBanner']['type']= $files['fileBanner']['type'][$i];
              $_FILES['fileBanner']['tmp_name']= $files['fileBanner']['tmp_name'][$i];
              $_FILES['fileBanner']['error']= $files['fileBanner']['error'][$i];
              $_FILES['fileBanner']['size']= $files['fileBanner']['size'][$i];
    
              $config = array(
                  'upload_path'   => "./uploads/banner/",
                  'allowed_types' => "gif|jpg|png|jpeg",
                  'overwrite'     => TRUE,
                  'max_size'      => "3000",  // Can be set to particular file size
                  //'max_height'    => "768",
                  //'max_width'     => "1024"
              );
    
              $this->load->library('upload', $config);
              $this->upload->initialize($config);
    
              $this->upload->do_upload('fileBanner');
              $fileName = $_FILES['fileBanner']['name'];
            }
            
            $data = array(
                'image' => $fileName
            );
            
            $update_banner = $this->Admin_model->update_banner($id, $data);

            if($update_banner){ ?>
              <script>
                  alert('Updated Successfully');
                  window.location.href="<?php echo site_url('admin/banner'); ?>";
              </script>
      <?php }else{ ?>
              <script>
                  alert('Update Failed');
                  window.location.href="<?php echo site_url('admin/banner/edit/'.$id); ?>";
              </script>
              <?php 
              /*$statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgEditError', $statusMsg);
              $this->load->view('admin/menu/nav', $data);
              $this->load->view('admin/website/edit_banner_detail', $data);
              $this->load->view('admin/menu/footer'); */
            }
          }
        }
        
        public function delete_banner(){
          $did = $this->input->post('banner_id');
          $this->Admin_model->delete_banner($did);
        }
    }

?>
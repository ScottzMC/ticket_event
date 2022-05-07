<?php 

    class Slider extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['total_order_count'] = $this->Admin_model->display_order_count();
            $data['slider'] = $this->Admin_model->display_sliders();
    
            $this->load->view('admin/website/slider/detail', $data);
          }else{
            redirect('home');
          }
        }
        
        public function add(){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['slider'] = $this->Admin_model->display_sliders();
          $data['category_menu'] = $this->Admin_model->display_menu();
    
          $this->form_validation->set_rules('category', 'Category', 'trim|required');
    
          $form_valid = $this->form_validation->run();
          
          $btn_submit = $this->input->post('add');
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/slider/detail', $data);
          }else if(!empty($_FILES['fileSlider']['name'])){
            $files = $_FILES;
            //$images = array();
            $cpt = count($_FILES['fileSlider']['name']);
            for($i=0; $i<$cpt; $i++){
              $_FILES['fileSlider']['name']= $files['fileSlider']['name'][$i];
              $_FILES['fileSlider']['type']= $files['fileSlider']['type'][$i];
              $_FILES['fileSlider']['tmp_name']= $files['fileSlider']['tmp_name'][$i];
              $_FILES['fileSlider']['error']= $files['fileSlider']['error'][$i];
              $_FILES['fileSlider']['size']= $files['fileSlider']['size'][$i];
    
              $config = array(
                  'upload_path'   => "./uploads/slider/",
                  'allowed_types' => "gif|jpg|png|jpeg",
                  'overwrite'     => TRUE,
                  'max_size'      => "3000",  // Can be set to particular file size
                  //'max_height'    => "768",
                  //'max_width'     => "1024"
              );
    
              $this->load->library('upload', $config);
              $this->upload->initialize($config);
    
              $this->upload->do_upload('fileSlider');
              $fileName = $_FILES['fileSlider']['name'];
            }
    
            $category = $this->input->post('category');
            $title = $this->input->post('title');
            $type = $this->input->post('type');
    
            $add_data = array(
                'title' => $title, 
                'type' => $type, 
                'category' => $category,
                'image' => $fileName
            );
    
            $insert_slider = $this->Admin_model->insert_slider($add_data);
    
            if($insert_slider){
              ?>
              <script>
                  alert('Added Successfully');
                  window.location.href="<?php echo site_url('admin/slider'); ?>";
              </script>
     <?php }else{ ?>
              <script>
                  alert('Failed');
                  window.location.href="<?php echo site_url('admin/slider'); ?>";
              </script>
             <?php 
             /*$statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgAddedError', $statusMsg);
              $this->load->view('admin/menu/nav', $data);
              $this->load->view('admin/website/slider_detail', $data);
              $this->load->view('admin/menu/footer');*/
            }
          }
        }
        
        public function edit($id){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['edit_slider'] = $this->Admin_model->display_slider_by_id($id);
          $data['category_menu'] = $this->Admin_model->display_menu();
    
          $this->form_validation->set_rules('title', 'Title', 'trim|required');
          $this->form_validation->set_rules('subtitle', 'Subtitle', 'trim|required');
          $this->form_validation->set_rules('category', 'Category', 'trim|required');
          $form_valid = $this->form_validation->run();
          
          $btn_submit = $this->input->post('edit');
    
          $this->load->view('admin/website/slider/edit', $data);
          
          if(isset($btn_submit)){
            $title = $this->input->post('title');
            $type = $this->input->post('type');
            $category = $this->input->post('category');
            
            $data = array(
                'title' => $title,
                'type' => $type,
                'category' => $category
            );
            
            $update_slider = $this->Admin_model->update_slider($id, $data);
            
            if($update_slider){ ?>
              <script>
                  alert('Updated Successfully');
                  window.location.href="<?php echo site_url('admin/slider'); ?>";
              </script>
      <?php }else{?>
              <script>
                  alert('Update Failed');
                  window.location.href="<?php echo site_url('admin/slider/edit/'.$id); ?>";
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
                  'upload_path'   => "./uploads/slider/",
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
            
            $update_slider = $this->Admin_model->update_slider($id, $data);

            if($update_slider){ ?>
              <script>
                  alert('Updated Successfully');
                  window.location.href="<?php echo site_url('admin/slider'); ?>";
              </script>
      <?php }else{ ?>
              <script>
                  alert('Update Failed');
                  window.location.href="<?php echo site_url('admin/slider/edit/'.$id); ?>";
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
        
        public function delete_slider(){
          $did = $this->input->post('slider_id');
          $this->Admin_model->delete_slider($did);
        }
    }

?>
<?php 

    class Food extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
    
            $config['base_url'] = base_url()."admin/food";
            $total_row = $this->Admin_model->record_food_count();
            $config['total_rows'] = $total_row;
            $config['per_page'] = 800;
            $config['uri_segment'] = 3;
            $choice = $config['total_rows']/$config['per_page'];
            $config['num_links'] = round($choice);
    
            $config['full_tag_open'] = '<ul style="margin-left: 100px;" class="pagination">';
            $config['full_tag_close'] = '</ul>';
    
            $config['first_tag_open'] = '<li>';
            $config['last_tag_open'] = '<li>';
    
            $config['next_tag_open'] = '<li>';
            $config['prev_tag_open'] = '<li>';
    
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
    
            $config['first_tag_close'] = '</li>';
            $config['last_tag_close'] = '</li>';
    
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_close'] = '</li>';
    
            $config['cur_tag_open'] = '<li class="active"><span><b>';
            $config['cur_tag_close'] = '</b></span></li>';
    
            $this->pagination->initialize($config);
    
            $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
    
            $data["food"] = $this->Admin_model->fetch_food_data($config["per_page"], $page);
    
            $this->load->view('admin/food/view', $data);
          }else{
            redirect('home');
          }
        }
        
        public function add(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
    
            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('price', 'Price', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
    
            $form_valid = $this->form_validation->run();
            $submit_btn = $this->input->post('add');
            
            if($form_valid == FALSE){
              $this->load->view('admin/food/add');
            }
    
            if(isset($submit_btn)){
              $shuffle = str_shuffle("ABCDEFGUVXYZXCV");
              $unique = rand(000, 999);
              $code = $shuffle.$unique;
    
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $price = $this->input->post('price');
              $type = $this->input->post('type');
              $category = $this->input->post('category');
              
              $stock = $this->input->post('stock');
              
              $time = time();
              $date = date('Y-m-j H:i:s');
    
              $files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);
    
              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
                
                $config1 = array(
                    'upload_path'   => "./uploads/food/",
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
                'code' => $code,
                'title' => $title,
                'price' => $price,
                'type' => $type,
                'category' => $category,
                'image1' => $fileName1,
                'sold' => 0,
                'stock' => $stock,
                'created_time' => $time,
                'created_date' => $date
              );  
    
              $insert_food = $this->Admin_model->insert_food($array);
    
              if($insert_food){ 
              ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/food'); ?>";
                </script>
        <?php }else{ ?>
                <script>
                    alert('Food Failed');
                    window.location.href="<?php echo site_url('admin/food'); ?>";
                </script>
          <?php 
                $this->load->view('admin/food/add');
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
            $data['edit_food'] = $this->Admin_model->display_food_by_id($id);
    
            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('price', 'Price', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[30]|max_length[1000]');
    
            $form_valid = $this->form_validation->run();
            
            $submit_btn = $this->input->post('upload');
    
            if($form_valid == FALSE){
              $this->load->view('admin/food/edit', $data);
            }
            
            if(isset($submit_btn)){
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $price = $this->input->post('price');
              $type = $this->input->post('type');
              $category = $this->input->post('category');
              $stock = $this->input->post('stock');
    
              $str_category = str_replace(' ', '-', $category);
    
              $food_array = array(
                'title' => $title,
                'price' => $price,
                'type' => $type,
                'category' => $category,
                'stock' => $stock
              ); 
    
              $update_food = $this->Admin_model->update_food($id, $food_array);
    
              if($update_food){ 
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/food'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                redirect('admin/food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/food'); ?>";
                </script>
          <?php 
                $this->load->view('admin/food/edit', $data);
              }
            }
          }else{
            redirect('home');
          }
        }
        
        public function delete_food(){
          $pid = $this->input->post('del_id');
    
          $this->Admin_model->delete_food($pid);
        }
        
        public function edit_image($id){
          $submit_btn = $this->input->post('upload_image');
          
          if(isset($submit_btn)){
              $files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);
    
              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
                
                $config1 = array(
                    'upload_path'   => "./uploads/food/",
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
                'image1' => $fileName1
              ); 
    
              $update_image = $this->Admin_model->update_food($id, $array);
    
              if($update_image){ 
              //redirect('admin/view_food');
              ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/food'); ?>";
                </script>
          <?php
              }else{
                $msgError = '<div class="alert alert-danger>Upload Failed</div>';
                $this->session->set_flashdata('msgError', $msgError); 
                //redirect('admin/view_food');
                ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('admin/food'); ?>";
                </script>
          <?php
                $this->load->view('admin/food/edit', $data);
              }  
          }
        }
    }

?>
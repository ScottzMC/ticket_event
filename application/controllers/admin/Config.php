<?php 

    class Config extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['total_order_count'] = $this->Admin_model->display_order_count();
            $data['config'] = $this->Admin_model->display_config();
    
            $this->load->view('admin/website/config/detail', $data);
          }else{
            redirect('home');
          }
        }
        
        public function add(){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['config'] = $this->Admin_model->display_config();
    
          $this->form_validation->set_rules('email', 'Email', 'trim|required');
          $form_valid = $this->form_validation->run();
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/config/detail', $data);
          }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $url = $this->input->post('url');
            
            $url = 'smtp.'.$url;
    
            $add = array('url' => $url, 'email' => $email, 'password' => $password);
            $insert = $this->Admin_model->insert_config($add);
    
            if($insert){ 
            ?>
              <script>
                  alert('Added Successfully');
                  window.location.href="<?php echo site_url('admin/config'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgMenuError', $statusMsg);
              $this->load->view('admin/website/config/detail', $data);
            }
          }
        }
        
        public function edit($id){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['edit_config'] = $this->Admin_model->display_config_by_id($id);
    
          $this->form_validation->set_rules('email', 'Email', 'trim|required');
          $form_valid = $this->form_validation->run();
          $submit = $this->input->post('edit');
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/config/edit', $data);          
          }
          if(isset($submit)){
            $email = $this->input->post('email');

            $password = $this->input->post('password');
            
            $url = $this->input->post('url');
            
            $url = 'smtp.'.$url;
            
            $data = array('url' => $url, 'email' => $email, 'password' => $password);
    
            $update = $this->Admin_model->update_config($id, $data);
    
            if($update){
              ?>
              <script>
                  alert('Edited Successfully');
                  window.location.href="<?php echo site_url('admin/config'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgEditError', $statusMsg);
              $this->load->view('admin/website/config/edit', $data);
            }
          }
        }
        
        public function delete_config(){
          $id = $this->input->post('id');
          $this->Admin_model->delete_config($id);
        }
    }

?>
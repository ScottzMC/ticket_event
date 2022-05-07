<?php 

    class Status_menu extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['total_order_count'] = $this->Admin_model->display_order_count();
            $data['menu'] = $this->Admin_model->display_status_menu();
    
            $this->load->view('admin/website/status_menu/detail', $data);
          }else{
            redirect('home');
          }
        }
        
        public function add(){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['menu'] = $this->Admin_model->display_status_menu();
    
          $this->form_validation->set_rules('category', 'Category', 'trim|required');
          $form_valid = $this->form_validation->run();
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/status_menu/detail', $data);
          }else{
            $category = $this->input->post('category');
            $currency_type = $this->input->post('currency_type');
    
            $str_category = str_replace(' ', '-', $category);
    
            $add_menu = array('category' => $category, 'currency_type' => $currency_type);
            $insert_menu = $this->Admin_model->insert_status_menu($add_menu);
    
            if($insert_menu){ 
            ?>
              <script>
                  alert('Added Successfully');
                  window.location.href="<?php echo site_url('admin/status_menu'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgMenuError', $statusMsg);
              $this->load->view('admin/website/status_menu/detail', $data);
            }
          }
        }
        
        public function edit($id){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['edit_menu'] = $this->Admin_model->display_status_menu_by_id($id);
    
          $this->form_validation->set_rules('category', 'Category', 'trim|required');
          $form_valid = $this->form_validation->run();
          $submit = $this->input->post('edit');
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/status_menu/edit', $data);          
          }
          if(isset($submit)){
            $category = $this->input->post('category');
            $str_category = str_replace(' ', '-', $category);
            
            $currency_type = $this->input->post('currency_type');
            
            $data = array('category' => $category, 'currency_type' => $currency_type);
    
            $update = $this->Admin_model->update_status_menu($id, $data);
    
            if($update){
              ?>
              <script>
                  alert('Edited Successfully');
                  window.location.href="<?php echo site_url('admin/status_menu'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgEditError', $statusMsg);
              $this->load->view('admin/website/status_menu/edit', $data);
            }
          }
        }
        
        public function delete_status_menu(){
          $id = $this->input->post('id');
          $this->Admin_model->delete_status_menu($id);
        }
    }

?>
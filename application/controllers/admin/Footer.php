<?php 

    class Footer extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['total_order_count'] = $this->Admin_model->display_order_count();
            $data['footer'] = $this->Admin_model->display_footer();
    
            $this->load->view('admin/website/footer/detail', $data);
          }else{
            redirect('home');
          }
        }
        
        public function add(){
          $submit = $this->input->post('submit'); 
          //if(isset($submit)){
            $body = $this->input->post('body');

            $add_data = array('body' => $body);
            $insert = $this->Admin_model->insert_footer($add_data);
    
            if($insert){ 
            ?>
              <script>
                  alert('Added Successfully');
                  window.location.href="<?php echo site_url('admin/footer'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgMenuError', $statusMsg);
              $this->load->view('admin/website/footer/detail', $data);
            }
          //}
        }
        
        public function edit($id){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['edit'] = $this->Admin_model->display_footer_by_id($id);
    
          $this->form_validation->set_rules('body', 'Body', 'trim|required');
          $form_valid = $this->form_validation->run();
          $submit = $this->input->post('edit');
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/footer/edit', $data);          
          }
          if(isset($submit)){
            $body = $this->input->post('body');

            $data = array('body' => $body);
    
            $update = $this->Admin_model->update_footer($id, $data);
    
            if($update){
              ?>
              <script>
                  alert('Edited Successfully');
                  window.location.href="<?php echo site_url('admin/footer'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgEditError', $statusMsg);
              $this->load->view('admin/website/footer/edit', $data);
            }
          }
        }
        
        public function delete_footer(){
          $id = $this->input->post('id');
          $this->Admin_model->delete_footer($id);
        }
    }

?>
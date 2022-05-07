<?php 

    class Video extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['total_order_count'] = $this->Admin_model->display_order_count();
            $data['video'] = $this->Admin_model->display_video();
    
            $this->load->view('admin/website/video/detail', $data);
          }else{
            redirect('home');
          }
        }
        
        public function add(){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['video'] = $this->Admin_model->display_video();
    
          $this->form_validation->set_rules('type', 'Type', 'trim|required');
          $form_valid = $this->form_validation->run();
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/video/detail', $data);
          }else{
            $title = $this->input->post('title');
            $type = $this->input->post('type');
            $url = $this->input->post('url');
            $playlist = $this->input->post('playlist');
            $currency_type = $this->input->post('currency_type');

            $add = array(
                'title' => $title,
                'type' => $type,
                'url' => $url,
                'playlist' => $playlist,
                'currency_type' => $currency_type
            );
            $insert = $this->Admin_model->insert_video($add);
    
            if($insert){ 
            //redirect('admin/menu');
            ?>
              <script>
                  alert('Added Successfully');
                  window.location.href="<?php echo site_url('admin/video'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgMenuError', $statusMsg);
              $this->load->view('admin/website/video/detail', $data);
            }
          }
        }
        
        public function edit($id){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['edit_video'] = $this->Admin_model->display_video_by_id($id);
    
          $this->form_validation->set_rules('type', 'Type', 'trim|required');
          $form_valid = $this->form_validation->run();
          $submit = $this->input->post('edit');
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/video/edit', $data);          }
          if(isset($submit)){
            $title = $this->input->post('title');
            $type = $this->input->post('type');
            $url = $this->input->post('url');
            $playlist = $this->input->post('playlist');
            $currency_type = $this->input->post('currency_type');

            $array = array(
                'title' => $title,
                'type' => $type,
                'url' => $url,
                'playlist' => $playlist,
                'currency_type' => $currency_type
            );
    
            $update = $this->Admin_model->update_video_category_info($id, $array);
    
            if($update){
                //redirect('admin/menu');
              ?>
              <script>
                  alert('Edited Successfully');
                  window.location.href="<?php echo site_url('admin/video'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgEditError', $statusMsg);
              $this->load->view('admin/website/video/edit', $data);
            }
          }
        }
        
        public function delete_video(){
          $id = $this->input->post('video_id');
          $this->Admin_model->delete_video($id);
        }
    }

?>
<?php 

    class Food_menu extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['total_order_count'] = $this->Admin_model->display_order_count();
            $data['menu'] = $this->Admin_model->display_food_menu();
    
            $this->load->view('admin/website/food_menu/detail', $data);
          }else{
            redirect('home');
          }
        }
        
        public function add(){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['menu'] = $this->Admin_model->display_food_menu();
    
          $this->form_validation->set_rules('category', 'Category', 'trim|required');
          $form_valid = $this->form_validation->run();
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/food_menu/detail', $data);
          }else{
            $category = $this->input->post('category');
    
            $str_category = str_replace(' ', '-', $category);
            
            $rank = $this->input->post('rank');
    
            $add_menu = array('category' => $str_category, 'rank' => $rank);
            $insert_menu = $this->Admin_model->insert_food_menu($add_menu);
    
            if($insert_menu){ 
            //redirect('admin/menu');
            ?>
              <script>
                  alert('Added Successfully');
                  window.location.href="<?php echo site_url('admin/food_menu'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgMenuError', $statusMsg);
              $this->load->view('admin/website/food_menu/detail', $data);
            }
          }
        }
        
        public function edit($id){
          $data['total_order_count'] = $this->Admin_model->display_order_count();
          $data['edit_menu'] = $this->Admin_model->display_food_menu_by_id($id);
    
          $this->form_validation->set_rules('category', 'Category', 'trim|required');
          $form_valid = $this->form_validation->run();
          $submit = $this->input->post('edit');
    
          if($form_valid == FALSE){
            $this->load->view('admin/website/food_menu/edit', $data);          
          }
          if(isset($submit)){
            $category = $this->input->post('category');
            $str_category = str_replace(' ', '-', $category);
            
            $rank = $this->input->post('rank');
            
            $data = array('category' => $str_category, 'rank' => $rank);
    
            $update_category_info = $this->Admin_model->update_food_info($id, $data);
    
            if($update_category_info){
                //redirect('admin/menu');
              ?>
              <script>
                  alert('Edited Successfully');
                  window.location.href="<?php echo site_url('admin/food_menu'); ?>";
              </script>
      <?php }else{
              $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
              $this->session->set_flashdata('msgEditError', $statusMsg);
              $this->load->view('admin/website/food_menu/edit', $data);
            }
          }
        }
        
        public function delete_food_menu(){
          $did = $this->input->post('menu_id');
          $this->Admin_model->delete_food_menu($did);
        }
    }

?>
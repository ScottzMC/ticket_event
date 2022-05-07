<?php 

    class User_grid extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['users'] = $this->Admin_model->display_user_grid();
    
            $this->load->view('admin/user_grid', $data);
          }else{
            redirect('home');
          }
        }
        
    }

?>
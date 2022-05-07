<?php 

    class Dashboard extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Kitchen"){
            $data['pending'] = $this->Kitchen_model->display_all_pending_orders();
            $data['delivering'] = $this->Kitchen_model->display_all_delivering_orders();
            $data['delivered'] = $this->Kitchen_model->display_all_delivered_orders();
            $data['cancelled'] = $this->Kitchen_model->display_all_cancelled_orders();
    
            $this->load->view('kitchen/dashboard', $data);
          }else{
            redirect('home');
          }
        }
    }

?>
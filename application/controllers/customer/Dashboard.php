<?php 

    class Dashboard extends CI_Controller{
        
        public function index(){
          $session_email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
          $status = "Purchased";
    
          if($role == "User"){
    
            $data['orders'] = $this->Customer_model->display_all_orders_by_email($session_email);
            $data['ticket'] = $this->Customer_model->display_ticket_orders_by_email($status, $session_email);
    
            $this->load->view('customer/dashboard', $data);
          }else{
            redirect('home');
          }
        }
    }

?>
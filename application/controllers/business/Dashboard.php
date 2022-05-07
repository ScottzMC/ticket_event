<?php 

    class Dashboard extends CI_Controller{
        
        public function index(){
          $session_email = $this->session->userdata('uemail');
          $session_id = $this->session->userdata('uid');
          
          $role = $this->session->userdata('urole');
    
          if($role == "Business"){
    
            $data['orders'] = $this->Business_model->display_all_orders_by_email($session_email);
            $data['gbp'] = $this->Business_model->display_gbp_total($session_id);
            /*$data['usd'] = $this->Business_model->display_usd_total($session_id);
            $data['shilling'] = $this->Business_model->display_shilling_total($session_id);
            $data['leone'] = $this->Business_model->display_leone_total($session_id);*/
    
            $this->load->view('business/dashboard', $data);
          }else{
            redirect('home');
          }
        }
    }

?>
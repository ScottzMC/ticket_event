<?php 

    class Dashboard extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['total_user_count'] = $this->Admin_model->display_user_count();
            $data['total_order_count'] = $this->Admin_model->display_order_count();
            $data['total_food_count'] = $this->Admin_model->display_food_count();
            
            $data['gbp'] = $this->Admin_model->display_gbp_total();
            $data['usd'] = $this->Admin_model->display_usd_total();
            $data['shilling'] = $this->Admin_model->display_shilling_total();
            $data['leone'] = $this->Admin_model->display_leone_total();
            
            $data['user_status'] = $this->Admin_model->display_all_users();
            $data['food'] = $this->Admin_model->display_all_food();

            $data['pending'] = $this->Admin_model->display_all_pending_orders();
            $data['delivering'] = $this->Admin_model->display_all_delivering_orders();
            $data['delivered'] = $this->Admin_model->display_all_delivered_orders();
            $data['cancelled'] = $this->Admin_model->display_all_cancelled_orders();
    
            $this->load->view('admin/dashboard', $data);
          }else{
            redirect('home');
          }
        }
    }

?>
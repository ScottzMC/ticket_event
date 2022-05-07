<?php 

    class Payout extends CI_Controller{
        
        public function index(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['payout'] = $this->Admin_model->display_all_payout();
    
            $this->load->view('admin/report/payout/view', $data);
          }else{
            redirect('home');
          }
        }
        
        public function invoice($id){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['id'] = $id;
            $data['invoice'] = $this->Admin_model->display_all_payout_by_id($id);
    
            $this->load->view('admin/report/payout/invoice', $data);
          }else{
            redirect('home');
          }
        }
        
        public function filter(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $start_date = $this->input->post('start_date');
           $end_date = $this->input->post('end_date');
    
          if($role == "Admin"){
            $data['filter'] = $this->Admin_model->display_all_payout_filter($start_date, $end_date);
    
            $this->load->view('admin/report/payout/filter', $data);
          }else{
            redirect('home');
          }
        }
        
        public function approve_invoice(){
          $id = $this->input->post('id');
          $status = "Approved";
          $this->Admin_model->approve_invoice($id, $status);
        }
        
        public function cancel_invoice(){
          $id = $this->input->post('id');
          $status = "Cancelled";
          $this->Admin_model->cancel_invoice($id, $status);
        }
    }

?>
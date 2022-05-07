<?php 

    class Payout extends CI_Controller{
        
        public function index(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $session_id = $this->session->userdata('uid');
    
          if($role == "Business"){
            $data['payout'] = $this->Business_model->display_all_payout_by_business($session_id);
    
            $this->load->view('business/report/payout/view', $data);
          }else{
            redirect('home');
          }
        }
        
        public function invoice($id){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $session_id = $this->session->userdata('uid');
    
          if($role == "Business"){
            $data['id'] = $id;
            $data['invoice'] = $this->Business_model->display_all_payout_by_id($id);
    
            $this->load->view('business/report/payout/invoice', $data);
          }else{
            redirect('home');
          }
        }
        
        public function filter(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $start_date = $this->input->post('start_date');
           $end_date = $this->input->post('end_date');
    
          if($role == "Business"){
            $data['filter'] = $this->Business_model->display_all_payout_filter($start_date, $end_date);
    
            $this->load->view('business/report/payout/filter', $data);
          }else{
            redirect('home');
          }
        }
        
        public function add(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $session_id = $this->session->userdata('uid');
           
           $query = $this->db->query("SELECT * FROM users WHERE id = '$session_id' ")->result();
           foreach($query as $qry){
               $company = $qry->company;
               $company_email = $qry->email;
           }
           
           $submit = $this->input->post('add_bank');
    
          if($role == "Business"){
            $data['user_payment'] = $this->Business_model->display_all_user_payment($session_id);
    
            $this->load->view('business/report/payout/add', $data);
            
            if(isset($submit)){
                $payment_id = $this->input->post('payment_id');
                $amount = $this->input->post('amount');
                $notes = $this->input->post('notes');
                $start_date = $this->input->post('start_date');
                $end_date = $this->input->post('end_date');
                $date = date('Y-m-d H:i:s');
                
                $data_array = array(
                    'payment_id' => $payment_id,
                    'company_id' => $session_id,
                    'company' => $company,
                    'company_email' => $company_email,
                    'amount' => $amount,
                    'status' => "Pending",
                    'notes' => $notes,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'created_date' => $date
                );
                
                $insert = $this->Business_model->insert_payout_request($data_array);
                
                if($insert){ ?>
                    <script>
                        alert('Added Successfully');
                        window.location.href="<?php echo site_url('business/report/payout'); ?>";
                    </script>
            <?php }else{ ?>
                    <script>
                        alert('Failed');
                        window.location.href="<?php echo site_url('business/report/payout'); ?>";
                    </script>
            <?php }
            }
            
          }else{
            redirect('home');
          }
        }
        
    }

?>
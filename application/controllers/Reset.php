<?php 

    class Reset extends CI_Controller{
        
        public function index(){
          $session_email = $this->session->userdata('uemail');
            
          $submit_code = $this->input->post('code');
          $email = $this->input->post('email');
          $submit = $this->input->post('reset');
          
          $query = $this->db->query("SELECT email FROM users WHERE email = '$email' ")->result();
          foreach($query as $qry){
              $query_email = $qry->email;
          }
          
          $this->load->view('site/account/reset', $data);
          
          if(isset($submit)){
            if(!empty($query_email) && $query_email == $email){
            $password = $this->input->post('password');
            $hashed_password = $this->bcrypt->hash_password($password);
            
            $update_detail = $this->Data_model->update_user_password($query_email, $hashed_password);
    
            if($update_detail){ ?>
              <script>
                alert('Account updated successfully. Please login with your new details');
                window.location.href="<?php echo base_url('login'); ?>";
              </script> 
      <?php }else{ ?>
              <script>
                alert('Reset Password Failed');
                window.location.href="<?php echo base_url('login'); ?>";
              </script> 
        <?php }
           }else{ ?>
              <script>
                alert("Email does not exist");
                window.location.href="<?php echo site_url('login'); ?>";
              </script>
           <?php }
          }
        }
    }

?>
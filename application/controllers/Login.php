<?php 

    class Login extends CI_Controller{
        
        public function index(){
            $this->load->library('user_agent');
            
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
          
            $form_valid = $this->form_validation->run();
            $submit_btn = $this->input->post('login');
            
            if($form_valid == FALSE){

                $this->load->view('site/account/login');
            }
            
            if(isset($submit_btn)){
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $uresult = $this->Data_model->validate($email, $password);
                if(count($uresult) > 0){
                  $sess_data = array(
                  'login' => TRUE,
                  'uid' => $uresult[0]->id,
                  'uemail' => $uresult[0]->email,
                  'ufirstname' => $uresult[0]->firstname,
                  'ulastname' => $uresult[0]->lastname,
                  'urole' => $uresult[0]->role
                 );
        
                  $this->session->set_userdata($sess_data);
                  //redirect($_SERVER['HTTP_REFERER']);
                  
                  $previous_url = $this->session->userdata('previous_url');
                  
                  if(!empty($previous_url)){
                  ?>
                  <script>
                      alert('Login successfully');
                      window.location.href="<?php echo $previous_url; ?>";
                  </script> 
                  <?php
                  }else{ ?>
                    <script>
                      alert('Login successfully');
                      window.location.href="<?php echo site_url('home'); ?>";
                  </script>   
                  <?php }
              }else{ ?>
                <script>
                  alert('Login Failed');
                  window.location.href="<?php echo site_url('login'); ?>";
                </script> 
                <?php
               }
            }
        }
    }

?>
<?php 

    class Register extends CI_Controller{
        
        public function index(){
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            //$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
          
            $form_valid = $this->form_validation->run();
            $submit_btn = $this->input->post('register');
            
            if($form_valid == FALSE){
                //$data['menu'] = $this->Data_model->display_menu_options();

                $this->load->view('site/account/register');
            }
            
            if(isset($submit_btn)){
                $shuffle = "ABCDEFGHZXCQWE";
                $unique = rand(000, 999);
                $code = $shuffle.$unique;
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $hashed_password = $this->bcrypt->hash_password($password);
                $role = "User";
                $time = time();
                $date = date('Y-m-d H:i:s');
                
                $register_array = array(
                    'firstname' => "FirstName",
                    'lastname' => "LastName",
                    'email' => $email,
                    'password' => $hashed_password,
                    'role' => $role,
                    'created_time' => $time,
                    'created_date' => $date
                );
                
                $add_user = $this->Data_model->create_user($register_array);
                
                $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'smtp.scottnnaghor.com',
                 'smtp_port' => 25,
                 'smtp_user' => 'admin@scottnnaghor.com', 
                 'smtp_pass' => 'TigerPhenix100',
                 'mailtype' => 'html',
                 'priority' => 1,
                 'starttls'  => true,
                 'newline'   => "\r\n",
                );
                 
                $subject = "Your Account has been created";
                
                $data = array('code' => $code);
        			   
                /*$body = "
                    Welcome to 3JS and thank you for registering an account. Upon clicking the link, your account would be activated,
                    Your email is - $email
                    please click the link to activate the account - https://scottnnaghor.com/hotel/activate_user/activate/$code
                    ";*/
                $body = $this->load->view('email/verify',$data,TRUE);
                
                 $this->load->library('email', $config);
                 $this->email->set_mailtype("html");
                 //$this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
                //$this->email->set_header('Content-type', 'text/html'); //must add this line

                 $this->email->from('admin@scottnnaghor.com', "Ticket Event Team");
                 $this->email->to("$email");
                 //$this->email->cc("testcc@domainname.com");
                 $this->email->subject("$subject");
                 $this->email->message("$body");
                 $this->email->send();

                if($add_user){ ?>
                    <script>
                        alert('Account has been created successfully.');
                        window.location.href="<?php echo site_url('login'); ?>";
                    </script>
          <?php }else{ ?>
                   <script>
                        alert('Account has not been created');
                   </script> 
          <?php }
            }
        }
    }

?>
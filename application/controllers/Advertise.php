<?php 

    class Advertise extends CI_Controller{
        
        public function index(){
            $session_email = $this->session->userdata('uemail');
            
            $data['basket_count'] = $this->Data_model->count_ticket_basket($session_email);
            //$data['type'] = $type;
            
            $form_valid = $this->form_validation->run();
            $submit_btn = $this->input->post('submit');
            
            if($form_valid == FALSE){
                //$this->load->view('menu/main/nav', $data);
                $this->load->view('site/advertise', $data);
                //$this->load->view('menu/main/footer', $data);
            }
            
            if(isset($submit_btn)){
                $fullname = $this->input->post('fullname');
                $email = $this->input->post('email');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');
                
                $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
                $userIp = $this->input->ip_address();
             
                $secret = $this->config->item('google_secret');
           
                $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
         
                $ch = curl_init(); 
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch); 
                curl_close($ch);      
                 
                $status= json_decode($output, true);
                
                $body = " Fullname - $fullname,
                          Email - $email,
                          $message";
        
                  $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'smtp.scottnnaghor.com',
                 'smtp_port' => 25,
                 'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
                 'smtp_pass' => 'TigerPhenix100', // change it to account email password
                 'mailtype' => 'html',
                 'charset' => 'iso-8859-1',
                 'wordwrap' => TRUE
                 );
        
                 $this->load->library('email', $config);
                 //$this->load->library('encrypt');
                 $this->email->from('admin@scottnnaghor.com', "Ticket Event Team");
                 $this->email->to("bookings@ticketevent.com");
                 //$this->email->cc("testcc@domainname.com");
                 $this->email->subject("$subject");
                 $this->email->message("$body");
                 
                 $mail = $this->email->send();
                 
                 
                /*if ($status['success']) {
                    print_r('Google Recaptcha Successful');
                    exit;
                }else{
                    $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
                }*/

                if($mail && $status['success']){ ?>
                    <script>
                        alert('Sent successfully.');
                        window.location.href="<?php echo site_url('home'); ?>";
                    </script>
          <?php }else{ ?>
                   <script>
                        alert('Please validate ReCaptcha');
                   </script> 
          <?php }
            }
        }
    }

?>
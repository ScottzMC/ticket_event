<?php 
    
    class Forgot_password extends CI_Controller{
        
        public function index(){

            $email = $this->input->post('email');
            $submit = $this->input->post('forgot');
            
            $this->load->view('site/account/forgot_password');
            
            $query = $this->db->query("SELECT email FROM users WHERE email = '$email' ")->result();
              foreach($query as $qry){
                 $query_email = $qry->email;
              }
    
          if(isset($submit) && $email == $query_email){
              
              $code = str_shuffle("ABCDEFXJKZAG");
    
              $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'smtp.scottnnaghor.com',
                 'smtp_port' => 25,
                 'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
                 'smtp_pass' => 'TigerPhenix100', // change it to account email password
                 'mailtype' => 'html',
                 'priority' => 1,
                 'starttls'  => true,
                 'newline'   => "\r\n",
              );
              
              $data = array('code' => $code);
              
              
              $subject = "Forgot Password";
              /*$body = "
                The reset code - $code
                Upon clicking the link, put your reset code and new password in the reset page. 
                If you want to reset your password, please click the link to reset the password - https://scottnnaghor.com/hotel/reset";*/
               $body = $this->load->view('email/forgot',$data,TRUE);
              $time = time();
              $date = date('Y-m-d H:i:s');
    
             $this->load->library('email', $config);
             $this->email->set_mailtype("html");
             $this->email->from('admin@scottnnaghor.com', "Wee Gee Dem Team");
             $this->email->to("$email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
    
            if($this->email->send()){ ?>
            <script>
                alert('Mail sent successfully. Please check your mail to reset your Password');
                window.location.href="<?php echo base_url('login'); ?>";
            </script>    
            <?php }else{ ?>
            <script>
                alert("Email does not exist ");
                window.location.href="<?php echo site_url('login'); ?>";
            </script>
       <?php }
           }
      }
    }

?>
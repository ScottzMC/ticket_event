<?php 

    class My extends CI_Controller{
        
        public function index(){
            $session_email = $this->session->userdata('uemail');
            $role = $this->session->userdata('urole');
          
            $submit = $this->input->post('submit');
        
            if($role == "User"){
        
                $data['user'] = $this->Customer_model->display_all_user_info($session_email);
                $this->load->view('customer/my', $data);
                
                if(isset($submit)){
                    $firstname = $this->input->post('firstname');
                    $lastname = $this->input->post('lastname');
                    $telephone = $this->input->post('telephone');
                    $address = $this->input->post('address');
                    $postcode = $this->input->post('postcode');
                    $town = $this->input->post('town');
                    
                    $array = array(
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'telephone' => $telephone,
                        'address' => $address,
                        'postcode' => $postcode,
                        'town' => $town,
                    );
                    
                    $update = $this->Customer_model->update_user_info($session_email, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('customer/my'); ?>";
                        </script>
                    }else{ ?>
                        <script>
                            alert('Update failed');
                            window.location.href="<?php echo site_url('customer/my'); ?>";
                        </script>
             <?php }
                }
            }else{
                redirect('home');
            }
        }
    }

?>
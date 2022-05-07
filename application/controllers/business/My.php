<?php 

    class My extends CI_Controller{
        
        public function index(){
            $session_email = $this->session->userdata('uemail');
            $session_id = $this->session->userdata('uid');
            $role = $this->session->userdata('urole');
          
            $submit = $this->input->post('submit');
            $add = $this->input->post('add_bank');
        
            if($role == "Business"){
        
                $data['user'] = $this->Business_model->display_all_user_info($session_email);
                $data['user_payment'] = $this->Business_model->display_all_user_payment($session_id);
                
                $this->load->view('business/my', $data);
                
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
                    
                    $update = $this->Business_model->update_user_info($session_email, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('business/my'); ?>";
                        </script>
                    }else{ ?>
                        <script>
                            alert('Update failed');
                            window.location.href="<?php echo site_url('business/my'); ?>";
                        </script>
             <?php }
                }
                
                if(isset($add)){
                    $bank = $this->input->post('bank');
                    $sort_code = $this->input->post('sort_code');
                    $account_number = $this->input->post('account_number');

                    $add_array = array(
                        'user_id' => $session_id,
                        'bank' => $bank,
                        'sort_code' => $sort_code,
                        'account_number' => $account_number
                    );
                    
                    $add = $this->Business_model->insert_user_payment($add_array);
                    
                    if($add){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('business/my'); ?>";
                        </script>
                    }else{ ?>
                        <script>
                            alert('failed');
                            window.location.href="<?php echo site_url('business/my'); ?>";
                        </script>
             <?php }
                }
            }else{
                redirect('home');
            }
        }
    }

?>
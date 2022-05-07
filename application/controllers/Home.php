<?php 

    class Home extends CI_Controller{
        
        public function index(){
            $this->session->set_userdata('previous_url', current_url());
            
            //$type = "gbp";
            
            $data['event'] = $this->Data_model->display_events();
            
            $data['slider'] = $this->Data_model->display_slider("Home");

            $data['youtube_banner'] = $this->Data_model->display_youtube_banner();
            
            $data['status'] = $this->Data_model->display_status();
            
            //$data['type'] = "gbp";
            
            //$data['banner'] = $this->Data_model->display_banner();

            $session_email = $this->session->userdata('uemail');
            
            $data['basket_count'] = $this->Data_model->count_ticket_basket($session_email);
            
            //$this->load->view('menu/main/nav', $data);
            $this->load->view('site/home', $data);
            //$this->load->view('menu/main/footer', $data);
        }
        
        /*public function view($type){
            if(!empty($type)){
                $data['event'] = $this->Data_model->display_events($type);
                
                $data['slider'] = $this->Data_model->display_slider($type, "Home");
    
                $data['youtube_banner'] = $this->Data_model->display_youtube_banner($type);
                
                $data['status'] = $this->Data_model->display_status($type);
                
                $data['type'] = $type;
                
                //$data['banner'] = $this->Data_model->display_banner();
    
                $data['adverts'] = $this->Data_model->display_ads_for_home();
                
                $session_email = $this->session->userdata('uemail');
                
                $data['basket_count'] = $this->Data_model->count_ticket_basket($session_email);
                
                $this->session->set_userdata('previous_url', current_url());
                
                //$this->load->view('menu/main/nav', $data);
                $this->load->view('site/home', $data);
                //$this->load->view('menu/main/footer', $data);
            }else{
                redirect('home');
            }
        }*/
    }

?>
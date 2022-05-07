<?php 

    class Qr extends CI_Controller{
        
        public function validate($ticket_code, $type){
            
            $data['ticket'] = $this->Data_model->display_customer_by_ticket($ticket_code);
            
            $data['type'] = $type;
            
            $this->load->view('qr/view', $data);
        }
    }

?>
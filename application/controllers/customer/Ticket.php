<?php 
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    class Ticket extends CI_Controller{
        
        public function index(){
          $email = $this->session->userdata('uemail');
          $role = $this->session->userdata('urole');
          $status = "Purchased";
          
          if($role == "User"){
            $data['ticket'] = $this->Customer_model->display_ticket_orders_by_email($status, $email);
            
            $this->load->view('customer/ticket/view', $data);

          }else{
            redirect('home');
          }
        }
        
        public function filter(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $start_date = $this->input->post('start_date');
           $end_date = $this->input->post('end_date');
    
          if($role == "User"){
            $data['filter'] = $this->Customer_model->display_ticket_filter_report($email, $start_date, $end_date);
    
            $this->load->view('customer/ticket/filter', $data);
          }else{
            redirect('home');
          }
        }
        
        public function delete_ticket(){
          $id = $this->input->post('booking_id');
          
          $this->Customer_model->update_ticket($id);
        }
        
        function delete_all(){
            if($this->input->post('checkbox_value')){
                $id = $this->input->post('checkbox_value');
                for($count = 0; $count < count($id); $count++){
                    $this->Customer_model->update_ticket($id[$count]);
                }
            }    
        }
         
        /*public function export($id){
             
            $report_data = $this->Business_model->display_excel_ticket_report_by_id($id);
            
            $ticket = $this->Business_model->display_ticket_by_id($id);
            foreach($ticket as $tick){
                $report_category = $tick->title;
            }
            
            $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
    
            $sheet = $spreadsheet->getActiveSheet();
            
            $object = $spreadsheet->setActiveSheetIndex(0);
        
            $table_columns = array("#", "Order ID", "Charge ID", "Events", "Customer", "Sales (£)", "Sales ($)", "Sales (SHL)", "Sales (LE)", "Date");
        
            $column = 0;
        
            foreach($table_columns as $field){
                $sheet->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }
            
            $excel_row = 2;
    
            foreach($report_data as $row){
                $fullname = str_replace('-', ' ', $row->fullname);
                $date = date('j M Y', strtotime($row->created_date));
                
                $sheet->setCellValueByColumnAndRow(1, $excel_row, $row->code);
                $sheet->setCellValueByColumnAndRow(2, $excel_row, $row->charge_id);
                $sheet->setCellValueByColumnAndRow(3, $excel_row, $row->events);
               $sheet->setCellValueByColumnAndRow(4, $excel_row, $fullname);
               $sheet->setCellValueByColumnAndRow(5, $excel_row, $row->total);
               $sheet->setCellValueByColumnAndRow(6, $excel_row, $row->total_usd);
               $sheet->setCellValueByColumnAndRow(7, $excel_row, $row->total_shilling);
               $sheet->setCellValueByColumnAndRow(8, $excel_row, $row->total_leone);
               $sheet->setCellValueByColumnAndRow(9, $excel_row, $date);
               $excel_row++;
            }
            
            $writer = new Xlsx($spreadsheet); // instantiate Xlsx
     
            $filename = str_replace('-', ' ', $report_category).' Report'; // set filename for excel file to be exported
     
            header('Content-Type: application/vnd.ms-excel'); // generate excel file
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');
            
            $writer->save('php://output');	// download file 
        }*/
    }

?>
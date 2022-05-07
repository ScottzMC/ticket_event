<?php 
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    class Food extends CI_Controller{
        
        public function index(){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['menu'] = $this->Admin_model->display_food_menu();
    
            $this->load->view('admin/report/food/view', $data);
          }else{
            redirect('home');
          } 
        }
        
        public function category($id){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
    
          if($role == "Admin"){
            $data['id'] = $id; 
            $data['menu'] = $this->Admin_model->display_food_menu_by_id($id);
            $data['report'] = $this->Admin_model->display_food_report_by_id($id);
    
            $this->load->view('admin/report/food/category', $data);
          }else{
            redirect('home');
          } 
        }
        
        public function filter($id){
           $email = $this->session->userdata('uemail');
           $role = $this->session->userdata('urole');
           
           $start_date = $this->input->post('start_date');
           $end_date = $this->input->post('end_date');
    
          if($role == "Admin"){
            $data['id'] = $id; 
            $data['menu'] = $this->Admin_model->display_food_menu_by_id($id);
            $data['filter'] = $this->Admin_model->display_food_filter_report($id, $start_date, $end_date);
    
            $this->load->view('admin/report/food/filter', $data);
          }else{
            redirect('home');
          }
        }
         
         public function export($id){
             
            $report_data = $this->Admin_model->display_excel_report_by_id($id);
            
            $menu = $this->Admin_model->display_food_menu_by_id($id);
            foreach($menu as $men){
                $report_category = $men->category;
            }
            
            $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
    
            $sheet = $spreadsheet->getActiveSheet();
            
            $object = $spreadsheet->setActiveSheetIndex(0);
        
            $table_columns = array("#", "Order ID", "Charge ID", "Title", "Price (£)", "Quantity", "Seating", "Date");
        
            $column = 0;
        
            foreach($table_columns as $field){
                $sheet->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }
            
            $excel_row = 2;
    
            foreach($report_data as $row){
                $title = str_replace('-', ' ', $row->title);
                $date = date('j M Y', strtotime($row->created_date));
                
                $sheet->setCellValueByColumnAndRow(1, $excel_row, $row->order_id);
                $sheet->setCellValueByColumnAndRow(2, $excel_row, $row->charge_id);
               $sheet->setCellValueByColumnAndRow(3, $excel_row, $title);
               $sheet->setCellValueByColumnAndRow(4, $excel_row, $row->price);
               $sheet->setCellValueByColumnAndRow(5, $excel_row, $row->quantity);
               $sheet->setCellValueByColumnAndRow(6, $excel_row, $row->seating);
               $sheet->setCellValueByColumnAndRow(7, $excel_row, $date);
               $excel_row++;
            }
            
            $writer = new Xlsx($spreadsheet); // instantiate Xlsx
     
            $filename = $report_category.' Report'; // set filename for excel file to be exported
     
            header('Content-Type: application/vnd.ms-excel'); // generate excel file
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');
            
            $writer->save('php://output');	// download file 
        }
    }

?>
<?php 

    class Activate_user extends CI_Controller {
        
        public function activate($code){
            //$code = $_GET['code'];
            $this->Data_model->activate_user($code); ?>
            <script>
                alert('Activated Successfully');
                window.location.href="<?php echo site_url('login'); ?>";
            </script>
            //redirect('login');
  <?php }
    }

?>
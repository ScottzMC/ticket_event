<!-- jQuery -->
    <script src="<?php echo base_url('vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    
	<!-- Data table JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('dist/js/dataTables-data.js'); ?>"></script>
	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url('dist/js/jquery.slimscroll.js'); ?>"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js'); ?>"></script>
	<!-- Init JavaScript -->
	<script src="<?php echo base_url('dist/js/init.js'); ?>"></script>

  <!-- Summernote Plugin JavaScript -->
  <script src="<?php echo base_url('vendors/bower_components/summernote/dist/summernote.min.js'); ?>"></script>

  <!-- Summernote Wysuhtml5 Init JavaScript -->
  <script src="<?php echo base_url('dist/js/summernote-data.js'); ?>"></script>

<!-- Init JavaScript -->
<script src="<?php echo base_url('dist/js/init.js'); ?>"></script>
<script src="<?php echo base_url('dist/js/dashboard3-data.js'); ?>"></script>
<script src="<?php echo base_url('dist/js/check-length.js'); ?>"></script>

<script type="text/javascript">

        //edtor summernote
        $('#editordata').summernote({
          height: 300,
          toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture',['picture']]
          ],

          onImageUpload: function(files, editor, welEditable) {
            for (var i = files.lenght - 1; i >= 0; i--) {
            uploadFile(files[i], this);
            }
          }
        });

        $('#editorspecific').summernote({
          height: 300,
          toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture',['picture']]
          ],

          onImageUpload: function(files, editor, welEditable) {
            for (var i = files.lenght - 1; i >= 0; i--) {
            uploadFile(files[i], this);
            }
          }
        });

        $('#editorabout').summernote({
          height: 300,
          toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture',['picture']]
          ],

          onImageUpload: function(files, editor, welEditable) {
            for (var i = files.lenght - 1; i >= 0; i--) {
            uploadFile(files[i], this);
            }
          }
        });

        function uploadFile(file) {
          data = new FormData();
          data.append("file", file);

          $.ajax({
              data: data,
              type: "POST",
              url: "admin/product/add_product/saveFile", //replace with your url
              cache: false,
              contentType: false,
              processData: false,
              success: function(url) {
               console.log(url);
               $('#editordata').summernote("insertImage", url);
              }
          });
        }

</script>



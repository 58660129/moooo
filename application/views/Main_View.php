<!-- Modal -->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabel">Select CSV File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- loadfile -->
                <form method="post" id="import_csv" enctype="multipart/form-data">
                    <div class="input-group" method="post" id="import_csv" enctype="multipart/form-data">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="csv_file" id="csv_file" required accept=".csv" class="custom-file-input">
                            <label class="custom-file-label" for="csv_file">Choose file</label>

                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" name="import_csv" class="btn btn-success" id="import_csv_btn">Next</button>
            </div>
        </div>
    </div>
</div>


<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php echo base_url('/assets/vendor/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- Optional JS -->
<script src="<?php echo base_url('/assets/vendor/chart.js/dist/Chart.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/vendor/chart.js/dist/Chart.extension.js'); ?>"></script>
<!-- Argon JS -->
<script src="<?php echo base_url('/assets/js/argon.js?v=1.0.0'); ?>"></script>
</body>

</html>

<script>  
      $(document).ready(function(){  
           $('#import_csv').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"<?php echo base_url(); ?>csv_import/import",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          if(data=='Error1')  
                          {  
                               alert("Invalid File");  
                          }  
                          else if(data == "Error2")  
                          {  
                               alert("Please Select File");  
                          }  
                          else  
                          {  
                               $('#employee_table').html(data);  
                          }  
                     }  
                })  
           });  
      });  
 </script>  
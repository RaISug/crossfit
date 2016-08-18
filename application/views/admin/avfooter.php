            </div> <!-- end of content -->
        </div> <!-- end of wrapper -->

		<div id="footer"> <!-- start of footer -->
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<h5>Зa контакти : </h5>
						<h6>some.email@gmail.com</h6>
					</div>
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4">
					</div>
	
					<div class="col-sm-2">
						<h6>Copyright &copy 2016</h6>
					</div>
				</div>
			</div>
		</div>
        
        <script src="<?php echo base_url("assets/js/jquery/jquery-2.1.3.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery/jquery-ui.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/bootstrap/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/summernote/summernote.min.js"); ?>"></script>
        
        <?php 
			if (strpos(uri_string(), 'admin/news/creation') !== FALSE) {
				echo "<script>
            			$(document).ready(function() {
            				$('#news').summernote({
            					height: 250,
						        onKeyup: function(e) {
						           //$('#product_desc_l').html($(this).code());
						        }
            				}); 
						});
            		 </script>";
			}
        ?>
    </body>
</html>
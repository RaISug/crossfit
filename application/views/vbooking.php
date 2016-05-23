<?php

	include "vheader.php"

?>
	
	<style>
		
		.warning-message {
			padding: 15px;
			color: #31708f;
			font-size: 25px;
			border: 1px solid #d9edf7;
			border-radius: 2px;
			background-color: #d9edf7;
		}
		
		.booking-form {
			align: center;
			margin-top: 10px;
			margin-bottom: 55px;
		}
		
		.booking-button {
	        color: #fff;
		    background-color: #337ab7;
		    border-color: #2e6da4;
    		display: inline-block;
		    padding: 6px 12px;
		    margin-bottom: 0;
		    font-size: 14px;
		    font-weight: 400;
		    line-height: 1.42857143;
		    text-align: center;
		    white-space: nowrap;
		    vertical-align: middle;
		    -ms-touch-action: manipulation;
		    touch-action: manipulation;
		    cursor: pointer;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;
		    background-image: none;
		    border: 1px solid transparent;
		    border-radius: 4px;
		    width: 150px;
		}
		
		.booking-button:hover {
		    color: #fff;
		    background-color: #286090;
		    border-color: #204d74;
		}
		
	</style>
	
	<div class="container">
		<div class="page_content">
			<div class="content_body">
				<div class="warning-message">
				 	<span class="fa fa-warning"></span>Внимание. Моля когато нямате възможност да присъствате да се отпишите от часа, така че някой
		 			друг, който иска да присъства да се запише.
				</div>
				
				<div class="booking-form">
					<h3 align="center">За да се запишите моля натиснете бутона:</h3>
					<form method="POST" action="<?php echo base_url("booking"); ?>" align="center">
						<button class="booking-button" type="submit">Записване</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
<?php

	include "vfooter.php"

?>
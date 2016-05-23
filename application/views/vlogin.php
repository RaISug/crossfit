<style>
	body {
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #eee;
	}
	
	.form-signin {
		max-width: 330px;
		padding: 35px;
		margin: 0 auto;
		box-shadow: 5px 5px 15px gray;
	}
	
	.form-signin .form-signin-heading, .form-signin .checkbox {
		margin-bottom: 10px;
	}
	
	.form-signin .checkbox {
		font-weight: normal;
	}
	
	.form-signin .form-control {
		position: relative;
		height: auto;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		padding: 10px;
		font-size: 16px;
	}
	
	.form-signin .form-control:focus {
		z-index: 2;
	}
	
	.form-signin input[type="email"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}
	
	.form-signin input[type="password"] {
		margin-bottom: 10px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
</style>

<link href="<?php echo base_url("assets/css/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet">

<div>

	<div class="container">

		<form class="form-signin" method="POST" action="<?php echo base_url("login"); ?>">
			<h2 class="form-signin-heading">Вход в системата</h2>

			<label for="email" class="sr-only">Емайл адрес</label>
			<input type="email" class="form-control" placeholder="Емайл адрес" required autofocus>
			
			<label for="password" class="sr-only">Парола</label>
			<input type="password" class="form-control" placeholder="Парола" required>

			<button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
		</form>

	</div>
	<!-- /container -->


</div>
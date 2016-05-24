<style>
	body {
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #eee;
	}
	
	.form-registration {
		max-width: 330px;
		padding: 35px;
		margin: 0 auto;
		box-shadow: 5px 5px 15px gray;
	}
	
	.form-registration .form-registration-heading, .form-registration .checkbox {
		margin-bottom: 10px;
	}
	
	.form-registration .checkbox {
		font-weight: normal;
	}
	
	.form-registration .form-control {
		position: relative;
		height: auto;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		padding: 10px;
		font-size: 16px;
	}
	
	.form-registration .form-control:focus {
		z-index: 2;
	}
	
	.form-registration input[type="email"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}
	
	.form-registration input[type="password"] {
		margin-bottom: -1px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
	
	.form-registration input[type="text"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}
	
	.form-button {
		margin-top: 10px;
	}
	
</style>

<link href="<?php echo base_url("assets/css/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet">

<div>

	<div class="container">

		<form class="form-registration" method="POST" action="<?php echo base_url("registration"); ?>">
			<h2 class="form-registration-heading">Регистрация</h2>

			<label for="email" class="sr-only">Емайл адрес</label>
			<input type="email" class="form-control" name="email" placeholder="Емайл адрес" required autofocus>
			
			<label for="password" class="sr-only">Парола</label>
			<input type="password" class="form-control" name="password" placeholder="Парола" required>
			
			<label for="r_password" class="sr-only">Повторете парола</label>
			<input type="password" class="form-control" name="r_password" placeholder="Повторете паролата" required>
			
			<label for="firstName" class="sr-only">Име</label>
			<input type="text" class="form-control" name="firstName" placeholder="Име" required autofocus>
			
			<label for="lastName" class="sr-only">Фамилия</label>
			<input type="text" class="form-control" name="lastName" placeholder="Фамилия" required autofocus>

			<button class="btn btn-lg btn-primary btn-block form-button" type="submit">Регистрация</button>
		</form>

	</div>
	<!-- /container -->


</div>
<?php 

	function markPageAsSelectedIfTheCurrentPageStartsWith($pages) {
		foreach ($pages as $page) {
			if (strpos(uri_string(), $page) !== FALSE) {
				return "active";
			}
		}
		return "";
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crossfit</title>

    <link href="<?php echo base_url("assets/css/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/jquery/jquery-ui.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/admin.css"); ?>" rel="stylesheet">

  </head>
  <body>
      <div id="wrapper">
          <div id="content">
	          <nav class="navbar navbar-default">
			    <div class="container-fluid">
			        <div class="container">
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			                    <span class="sr-only">Toggle navigation</span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                </button>
			                <a class="navbar-brand" href="">CrossFit</a>
			            </div>
			            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			                <ul class="nav navbar-nav">
			                    <li class="dropdown <?php echo markPageAsSelectedIfTheCurrentPageStartsWith(array('admin/schedule'));?>">
			                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Графици <span class="caret"></span></a>
			                        <ul class="dropdown-menu" role="menu">
			                            <li><a href=<?php echo base_url('admin/schedule/creation'); ?>>Създаване</a></li>
			                            <li><a href=<?php echo base_url('admin/schedule/searching'); ?>>Изтриване</a></li>
			                        </ul>
			                    </li>
			                    
			                    <li class="dropdown <?php echo markPageAsSelectedIfTheCurrentPageStartsWith(array('admin/training'));?>">
			                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Тренировки <span class="caret"></span></a>
			                        <ul class="dropdown-menu" role="menu">
			                            <li><a href=<?php echo base_url('admin/training/creation'); ?>>Създаване</a></li>
			                            <li><a href=<?php echo base_url('admin/training/searching'); ?>>Изтриване</a></li>
			                        </ul>
			                    </li>

			                    <li class="dropdown <?php echo markPageAsSelectedIfTheCurrentPageStartsWith(array('admin/galery', 'admin/album')); ?>">
			                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Галерия <span class="caret"></span></a>
			                        <ul class="dropdown-menu" role="menu">
			                            <li><a href=<?php echo base_url('admin/album/creation'); ?>>Създаване на албум</a></li>
			                            <li><a href=<?php echo base_url('admin/album/deletion'); ?>>Изтриване на албум</a></li>
			                            <li><a href=<?php echo base_url('admin/galery/creation'); ?>>Добавяне на файл</a></li>
			                            <li><a href=<?php echo base_url('admin/galery/searching'); ?>>Изтриване на файл</a></li>
			                        </ul>
			                    </li>
			                    
	                            <li class="<?php echo markPageAsSelectedIfTheCurrentPageStartsWith(array('admin/participants')); ?>">
	                		        <a href=<?php echo base_url('admin/participants'); ?>>Списък с присъстващи</a>
	      			            </li>
	      			            
	                            <li class="<?php echo markPageAsSelectedIfTheCurrentPageStartsWith(array('admin/training/types')); ?>">
	                		        <a href=<?php echo base_url('admin/training/types/creation'); ?>>Типове тренировки</a>
	      			            </li>
			                </ul>
	
			                <ul class="nav navbar-nav navbar-right">
			                    <li><a href="<?php echo base_url('logout'); ?>">Изход</a></li>
			                </ul>
			            </div>
			        </div>
			    </div>
			</nav>

          
<?php

	include_once "vheader.php";

	function displayTrainingsForTheSpecifiedHour($schedules, $trainingHour) {
		foreach ($schedules as $schedule) {
			if ($schedule->time === $trainingHour) {
				$message = "Вид: " . $schedule->training_type . "<br>Места: " . $schedule->reserved_seats . "/" . $schedule->available_seats;
				$messageColor = $schedule->reserved_seats === $schedule->available_seats ? "red" : "green";
				$endpointUrl = base_url("booking?schedule=".$schedule->id);
				return "<div><a href='$endpointUrl' style='color: $messageColor; text-decoration: none;'>$message</a></div>";
			}
		}
		return "Няма тренировка";
	}
	
	function getTheDateAfterNDays($numberOf) {
		$currentDate = date_create(date("d.m.Y"));
		date_add($currentDate, date_interval_create_from_date_string("$numberOf days"));
	
		$formattedDate = date_format($currentDate, 'd.m.Y');
		$dayName = date('l', strtotime($formattedDate));
		$translatedDateName = getTranslatedNameOfTheDate($dayName);
	
		return sprintf("<div style='color: #0294CF'>%s - %s</div>", $translatedDateName, $formattedDate);
	}
	
	function getTranslatedNameOfTheDate($dayName) {
		if ($dayName === 'Monday') {
			return 'Понеделник';
		} else if ($dayName === 'Tuesday') {
			return 'Вторник';
		} else if ($dayName === 'Wednesday') {
			return 'Сряда';
		} else if ($dayName === 'Thursday') {
			return 'Четвъртък';
		} else if ($dayName === 'Friday') {
			return 'Петък';
		} else if ($dayName === 'Saturday') {
			return 'Събота';
		}
		return 'Неделя';
	}

?>
	
	<style>
	
		.schedule_table {
			width: 100%;
			table-layout: fixed;
			border-collapse: collapse;
		}
		
		.schedule_table tbody tr th {
			padding: 5px;
			font-size: 15px;
		}
		
		.schedule_table tbody tr td {
			padding: 5px;
			height: 50px;
			text-align:center;
		}
		
		.schedule_table tbody tr th {
			border: 1px solid black;
		}
		
		.schedule_table tbody tr:first-child th {
			border-top: 0;
		}

		.schedule_table tbody tr td {
			border: 1px solid black;
		}
		
		.schedule_table tbody tr td:first-child, .schedule_table tr th:first-child {
			border-left: 0;
		}
		
		.schedule_table tbody tr td:last-child, .schedule_table tbody tr th:last-child {
			border-right: 0;
		}
		
		.schedule_table tbody tr td.training_hour {
			font-size: 15px;
			text-align: center;
		}
		
		.schedule-slots:hover {
			box-shadow: 2px 4px 8px 2px rgba(0, 0, 0, 0.2);
		}

		@media screen and (max-width: 1024px) {
			.schedule_table {
				display: none;!important
			}
		}
		
		@media screen and (min-width: 1024px) {
			.schedule_block {
				display: none;!important
			}
		}
		
	</style>
	
	<link href="<?php echo base_url("assets/css/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet">
	
	<div class="container">
		<div class="page_content">
			<div class="content_body">
			
				<?php 
					if (isset($errorMessage)) {
						echo "<p style='text-align: center; color: red;'>$errorMessage</p>";
					} else if (isset($schedules)) {
					?>
						<h1>График за следващите седем дена: </h1><br>
						<table class="schedule_table">
							<tbody>
								<tr>
									<th></th>
									<?php 
										for ($interval = 0 ; $interval < 7 ; $interval++) {
											echo "<th>" . getTheDateAfterNDays($interval) . "</th>";
										}
									?>
								</tr>
								<?php
									for ($i = 9 ; $i <= 19 ; $i++) {
										$trainingHour = sprintf("%02d:00:00", $i);
										echo "
											<tr>
												<td class='training_hour' style='color: #0294CF'>$trainingHour</td>
												<td class='schedule-slots'>" . displayTrainingsForTheSpecifiedHour($schedules[0], $trainingHour) . "</td>
												<td class='schedule-slots'>" . displayTrainingsForTheSpecifiedHour($schedules[1], $trainingHour) . "</td>
												<td class='schedule-slots'>" . displayTrainingsForTheSpecifiedHour($schedules[2], $trainingHour) . "</td>
												<td class='schedule-slots'>" . displayTrainingsForTheSpecifiedHour($schedules[3], $trainingHour) . "</td>
												<td class='schedule-slots'>" . displayTrainingsForTheSpecifiedHour($schedules[4], $trainingHour) . "</td>
												<td class='schedule-slots'>" . displayTrainingsForTheSpecifiedHour($schedules[5], $trainingHour) . "</td>
												<td class='schedule-slots'>" . displayTrainingsForTheSpecifiedHour($schedules[6], $trainingHour) . "</td>
											</tr>
										";
									}
								?>
							</tbody>
						</table>
						
						<div class="schedule_block">
					  		<?php
								echo "<div class='row'>";
					  			for ($interval = 0 ; $interval < 7 ; $interval++) {
					  				echo "
										<div class='col-sm-6 col-md-4'>
									    	<div class='thumbnail' style='box-shadow: 5px 0px 15px #888888;'>
										      	<div class='caption' style='text-align: center'>
										        	<h3>" . getTheDateAfterNDays($interval) . "</h3>
										        	<p><a href=" . base_url("schedule/mobile?interval=") . $interval. " class='btn btn-primary' role='button'>Избери час</a></p>
										      	</div>
										    </div>
									  	</div>
									";
					  			}
							  	echo "</div>";
				  			?>
						</div>
				<?php 
					} else if (isset($schedule)) {
						echo "<h1>График по часове: </h1>";
						echo "<div class='row'>";
	  					for ($i = 9 ; $i <= 19 ; $i++) {
							$trainingHour = sprintf("%02d:00:00", $i); 
							echo "
								<div class='col-sm-6 col-md-4'>
							    	<div class='thumbnail' style='box-shadow: 5px 0px 15px #888888; max-height: 150px; min-height: 150px;'>
								      	<div class='caption' style='text-align: center'>
								      		<p>Час: $trainingHour</p>
								        	<h3>" . displayTrainingsForTheSpecifiedHour($schedule, $trainingHour) . "</h3>
								      	</div>
								    </div>
							  	</div>
							";
	  					}
	  					echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
	
<?php

	include_once "vfooter.php";

?>
	
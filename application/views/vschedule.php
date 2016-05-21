<?php

include_once "vheader.php";

function displayTrainingsForTheSpecifiedHour($schedules, $trainingHour) {
	foreach ($schedules as $schedule) {
		if ($schedule->time === $trainingHour) {
			return "Вид: " . $schedule->training_type . "<br>Места: " . $schedule->seats;
		}
	}
	return "--";
}

?>

	<div class="container">
		<div class="page_content">
			<div class="content_body">
				<h1>График</h1>
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
										<td class='training_hour'>$trainingHour</td>
										<td>" . displayTrainingsForTheSpecifiedHour($schedules[0], $trainingHour) . "</td>
										<td>" . displayTrainingsForTheSpecifiedHour($schedules[1], $trainingHour) . "</td>
										<td>" . displayTrainingsForTheSpecifiedHour($schedules[2], $trainingHour) . "</td>
										<td>" . displayTrainingsForTheSpecifiedHour($schedules[3], $trainingHour) . "</td>
										<td>" . displayTrainingsForTheSpecifiedHour($schedules[4], $trainingHour) . "</td>
										<td>" . displayTrainingsForTheSpecifiedHour($schedules[5], $trainingHour) . "</td>
										<td>" . displayTrainingsForTheSpecifiedHour($schedules[6], $trainingHour) . "</td>
									</tr>
								";
							}
						
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
<?php

include_once "vfooter.php";

?>
	
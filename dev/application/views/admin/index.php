<!DOCTYPE html>
<html>
<head>
	<title>Admin | Vote For My Team</title>
	<link rel="stylesheet" href="/assets/css/admin-style.css" type="text/css" />
</head>

<body>

	<?php $this->load->helper('form'); ?>

		<?php $all_teams_option = array(); ?>

		<!-- pack the array with team names for the dropdowns -->
		<?php foreach ($team_names as $name): ?>

			<?php $all_teams_option[$name['team_id']] = $name['team_name']; ?>

		<?php endforeach; ?>



	<div id="wrapper">

		<?php echo form_open('teams/set'); ?>

			<div class="admin-team-select">

				<h2>Sweet 16 Teams</h2>

					<?php foreach ($sweet16teams as $sweet16team): ?>

						<?php echo form_dropdown('sweet16_'.$sweet16team['bracket_id'], $all_teams_option, $sweet16team['team_id']); ?><br />

					<?php endforeach; ?>

			</div><!--/ .admin-team-select -->



			<div class="admin-team-select">

				<h2>Elite 8 Teams</h2>

					<?php foreach ($elite8teams as $elite8team): ?>

						<?php echo form_dropdown('elite8_'.$elite8team['bracket_id'], $all_teams_option, $elite8team['team_id']); ?><br />

					<?php endforeach; ?>

			</div><!--/ .admin-team-select -->



			<div class="admin-team-select">

				<h2>Final 4 Teams</h2>

					<?php foreach ($final4teams as $final4team): ?>

						<?php echo form_dropdown('final4_'.$final4team['bracket_id'], $all_teams_option, $final4team['team_id']); ?><br />

					<?php endforeach; ?>

			</div><!--/ .admin-team-select -->



			<div class="admin-team-select">

				<h2>Championship Teams</h2>

					<?php foreach ($championshipteams as $championshipteam): ?>

						<?php echo form_dropdown('championship_'.$championshipteam['bracket_id'], $all_teams_option, $championshipteam['team_id']); ?><br />

					<?php endforeach; ?>

			</div><!--/ .admin-team-select -->

			<?php

				$submit_attributes = array('class' => 'submit-button', 'name' => 'teams_submit');

				echo form_submit($submit_attributes, 'Update Teams');

			?>

		<?php echo form_close(); ?>


	</div><!--/ #wrapper -->	

</body>
</html>
<?php $this->load->helper('form'); ?>
<?php define('IMG_PATH', '/assets/teams/'); ?>


<div id="TabbedPanels1" class="TabbedPanels">

	<ul class="TabbedPanelsTabGroup">

    	<li class="TabbedPanelsTab" tabindex="0"><center>SWEET 16</center></li>

    	<li class="TabbedPanelsTab" tabindex="0"><center>ELITE 8</center></li>

    	<li class="TabbedPanelsTab" tabindex="0"><center>FINAL 4</center></li>

        <li class="TabbedPanelsTab" tabindex="0"><center>CHAMPIONSHIP</center></li>

    </ul><!-- .TabbedPanelsTabGroup -->


	<div class="TabbedPanelsContentGroup">

			<div class="TabbedClassContent">

				<div class="contentheader">Team up with the American Red Cross</div><!--/ .contentheader -->
				
				<table>

						<?php foreach ($sweet16_teams as $team): ?>

							<tr>
								<td>
									<?php
										$sweet16_bar_length = 300;
										$sum_votes = $total_votes[0]['total_votes'];
										$team_id = $team['team_id'];
										$votes = $votes_by_team[$team_id]['num_votes'];
										$team_vote_pct = ($votes / $sum_votes);
										$vote_bar_size = $team_vote_pct * $sweet16_bar_length;
										
										$sweet16_attr = array('class' => 'team', 'target' => 'blank');
										$hidden = array('team_id' => $team['team_id'], 'team_name' => $team['team_name']);
										$input = array(
											'name' => 'num_votes',
											);
										echo form_open('start', $sweet16_attr, $hidden);
										echo form_input($input);
										echo form_submit('start', 'Vote');
										
									?>

									<?php echo form_close(); ?>

									<!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
										<input type="hidden" name="cmd" value="xclick">
										<input type="hidden" name="upload" value="1">
										<input type="hidden" name="business" value="jslind-facilitator@bex.net">
										<input type="hidden" name="item_number" value="<?php // echo $team['team_id']; ?>">
										<input type="hidden" name="item_name" value="<?php //echo $team['team_name']; ?>">
										<input type="hidden" name="amount" value="1.00">
										<input type="text" name="quantity">
										<input type="hidden" name="return_url" value="http://www.voteformyteam.com/challenge">
										<input type="hidden" name="cancel_url" value="http://www.voteformyteam.com">
										<input type="hidden" name="notify_url" value="http://www.voteformyteam.com/success">
										<input type="hidden" name="currency_code" value="USD">
										<input type="submit" name="vote" value="vote" />
									</form> -->



								</td>
								<td class="sweet16-team-row">
								
									<img src="<?php echo IMG_PATH.$team['team_img']; ?>" alt="<?php echo $team['team_name']; ?>" title="<?php echo $team['team_name']; ?>">

								</td>
								<td class="sweet16-end-row-l">
									<div class="vote-bar" style="width:<?php echo $vote_bar_size; ?>px;"></div>
								</td>
								<td class="sweet16-end-row-r">
								</td>
							</tr>

						<?php endforeach ?>

				</table>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				
				<div class="contentheader">Team up with the American Red Cross</div><!--/ .contentheader -->
				

					<table>

						<?php foreach ($elite8_teams as $team): ?>

							<tr>
								<td>
									<?php
										$sweet16_bar_length = 300;
										$sum_votes = $total_votes[0]['total_votes'];
										$team_id = $team['team_id'];
										$votes = $votes_by_team[$team_id]['num_votes'];
										$team_vote_pct = ($votes / $sum_votes);
										$vote_bar_size = $team_vote_pct * $sweet16_bar_length;
										
										$sweet16_attr = array('class' => 'team');
										$hidden = array('team_id' => $team['team_id']);
										$input = array(
											'name' => 'num_votes',
											);
										echo form_open('vote', $sweet16_attr, $hidden);
										echo form_input($input);
										echo form_submit('vote', 'Vote');

									?>

									<?php echo form_close(); ?>

								</td>
								<td class="sweet16-team-row">
									<img src="<?php echo IMG_PATH.$team['team_img']; ?>" alt="<?php echo $team['team_name']; ?>" title="<?php echo $team['team_name']; ?>">
								</td>
								<td class="sweet16-end-row-l">
									<div class="vote-bar" style="width:<?php echo $vote_bar_size; ?>px;"></div>
								</td>
								<td class="sweet16-end-row-r">
								</td>
							</tr>

						<?php endforeach ?>

				</table>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				
				<div class="contentheader">Team up with the American Red Cross</div><!--/ .contentheader -->
				

					<table>

						<?php foreach ($final4_teams as $team): ?>

							<tr>
								<td>
									<?php
										$sweet16_bar_length = 300;
										$sum_votes = $total_votes[0]['total_votes'];
										$team_id = $team['team_id'];
										$votes = $votes_by_team[$team_id]['num_votes'];
										$team_vote_pct = ($votes / $sum_votes);
										$vote_bar_size = $team_vote_pct * $sweet16_bar_length;
										
										$sweet16_attr = array('class' => 'team');
										$hidden = array('team_id' => $team['team_id']);
										$input = array(
											'name' => 'num_votes',
											);
										echo form_open('vote', $sweet16_attr, $hidden);
										echo form_input($input);
										echo form_submit('vote', 'Vote');

									?>

									<?php echo form_close(); ?>

								</td>
								<td class="sweet16-team-row">
									<img src="<?php echo IMG_PATH.$team['team_img']; ?>" alt="<?php echo $team['team_name']; ?>" title="<?php echo $team['team_name']; ?>">
								</td>
								<td class="sweet16-end-row-l">
									<div class="vote-bar" style="width:<?php echo $vote_bar_size; ?>px;"></div>
								</td>
								<td class="sweet16-end-row-r">
								</td>
							</tr>

						<?php endforeach ?>

				</table>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				
				<div class="contentheader">Team up with the American Red Cross</div><!--/ .contentheader -->
				

					<table>

						<?php foreach ($championship_teams as $team): ?>

							<tr>
								<td>
									<?php
										$sweet16_bar_length = 300;
										$sum_votes = $total_votes[0]['total_votes'];
										$team_id = $team['team_id'];
										$votes = $votes_by_team[$team_id]['num_votes'];
										$team_vote_pct = ($votes / $sum_votes);
										$vote_bar_size = $team_vote_pct * $sweet16_bar_length;
										
										$sweet16_attr = array('class' => 'team');
										$hidden = array('team_id' => $team['team_id']);
										$input = array(
											'name' => 'num_votes',
											);
										echo form_open('vote', $sweet16_attr, $hidden);
										echo form_input($input);
										echo form_submit('vote', 'Vote');

									?>

									<?php echo form_close(); ?>

								</td>
								<td class="sweet16-team-row">							
									<img src="<?php echo IMG_PATH.$team['team_img']; ?>" alt="<?php echo $team['team_name']; ?>" title="<?php echo $team['team_name']; ?>">
								</td>
								<td class="sweet16-end-row-l">
									<div class="vote-bar" style="width:<?php echo $vote_bar_size; ?>px;"></div>
								</td>
								<td class="sweet16-end-row-r">
								</td>
							</tr>

						<?php endforeach ?>

				</table>

			</div><!--/ .TabbedClassContent -->

	</div><!--/ .TabbedPanelsContentGroup -->

</div><!--/ #TabbedPanels1 -->

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
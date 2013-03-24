<?php $this->load->helper('form'); ?>
<?php define('IMG_PATH', '/assets/teams/'); ?>


<?php

$content_top = "<p>Red Cross teams up with communities, neighborhoods, and individuals in the event of emergencies. We ask you to TEAM UP with Red Cross to raise money to support their mission.  Vote for your favorite basketball team and lend your support to American Red Cross.</p>
 <br/>
<p>Your vote dollars will impact disaster relief, blood collection, health/safety training and education, and support for armed forces families around the world.  Even a small vote (donation) can go a long way to easing suffering and begin putting shattered lives back together.</p>
 <br/>
<p>Show your support for your favorite basketball team and also for American Red Cross.  Cast your vote for your favorite team below, each vote will cost $1 and net proceeds will go directly to American Red Cross to help support the tremendous work being performed daily.</p>";

?>

<div id="TabbedPanels1" class="TabbedPanels">

	<ul class="TabbedPanelsTabGroup">

		<li class="TabbedPanelsTab" tabindex="0"><center>SIXTEEN</center></li>
    	<?php /*
    	<li class="TabbedPanelsTab" tabindex="0"><center>EIGHT</center></li>

    	<li class="TabbedPanelsTab" tabindex="0"><center>FOUR</center></li>

        <li class="TabbedPanelsTab" tabindex="0"><center>CHAMPIONSHIP</center></li>
        */ ?>

    </ul><!-- .TabbedPanelsTabGroup -->


	<div class="TabbedPanelsContentGroup">

			<div class="TabbedClassContent">

				<div id="error-msg"><p>Please enter a vote quantity using only digits.</div>

				<div class="contentheader"><?php echo $content_top; ?></div><!--/ .contentheader -->
				
				<table>
					<tr>
						<td colspan="2">&nbsp;</td>
						<td><strong>VOTES</strong></td>
					</tr>
					<?php
					$form_attr = array('class' => 'team', 'target' => '_blank');
					$submit_attr = array('name' => 'start', 'class' => 'vote-submit');
					echo form_open('start', $form_attr);

					?>

						<?php foreach ($sweet16_teams as $team): ?>

							<tr>
								<td>
									<?php
										$team_bar_length = 300;
										$sum_votes = $total_votes[0]['total_votes'];
										$team_id = $team['team_id'];
										$votes = $votes_by_team[$team_id]['num_votes'];
										if ($sum_votes > 0)
										{
											$team_vote_pct = ($votes / $sum_votes);	
										}
										else {$team_vote_pct = 0;}
										$percent_display = intval($team_vote_pct * 100);
										$vote_bar_size = $team_vote_pct * $team_bar_length;
									?>

									<input type="text" name="team_<?php echo $team['team_id']; ?>" class="num_votes">
									

								</td>
								<td class="sweet16-team-row">
								
									<img src="<?php echo IMG_PATH.$team['team_img']; ?>" alt="<?php echo $team['team_name']; ?>" title="<?php echo $team['team_name']; ?>">

								</td>
								<td class="sweet16-end-row-l">
									<div class="vote-bar" style="width:<?php echo $vote_bar_size; ?>px;"></div>
									<?php if($percent_display != 0){echo $percent_display.'%';} ?>
								</td>
								<td class="sweet16-end-row-r">
								</td>
							</tr>

						<?php endforeach ?>

				</table>

						<?php

						echo form_submit($submit_attr, 'VOTE!');
						echo form_close();

						?>


			</div><!--/ .TabbedClassContent -->

			<?php /*
			<div class="TabbedClassContent">

				
				<div class="contentheader"><?php echo $content_top; ?></div><!--/ .contentheader -->
				

					<table>
						
						<tr>
							<td colspan="2">&nbsp;</td>
							<td><strong>VOTES</strong></td>
						</tr>
					
					<?php
					$form_attr = array('class' => 'team', 'target' => '_blank');
					echo form_open('start', $form_attr);

					?>

						<?php foreach ($elite8_teams as $team): ?>

							<tr>
								<td>
									<?php
										$team_bar_length = 300;
										$sum_votes = $total_votes[0]['total_votes'];
										$team_id = $team['team_id'];
										$votes = $votes_by_team[$team_id]['num_votes'];
										if ($sum_votes > 0)
										{
											$team_vote_pct = ($votes / $sum_votes);	
										}
										else {$team_vote_pct = 0;}
										$percent_display = intval($team_vote_pct * 100);
										$vote_bar_size = $team_vote_pct * $team_bar_length;
									?>

									<input type="text" name="team_<?php echo $team['team_id']; ?>" class="num_votes">
									

								</td>
								<td class="sweet16-team-row">
								
									<img src="<?php echo IMG_PATH.$team['team_img']; ?>" alt="<?php echo $team['team_name']; ?>" title="<?php echo $team['team_name']; ?>">

								</td>
								<td class="sweet16-end-row-l">
									<div class="vote-bar" style="width:<?php echo $vote_bar_size; ?>px;"></div>
									<?php if($percent_display != 0){echo $percent_display.'%';} ?>
								</td>
								<td class="sweet16-end-row-r">
								</td>
							</tr>

						<?php endforeach ?>

				</table>

						<?php

						echo form_submit($submit_attr, 'Vote');
						echo form_close();

						?>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				
				<div class="contentheader"><?php echo $content_top; ?></div><!--/ .contentheader -->
				

					<table>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td><strong>VOTES</strong></td>
						</tr>
					<?php
					$form_attr = array('class' => 'team', 'target' => '_blank');
					echo form_open('start', $form_attr);

					?>

						<?php foreach ($final4_teams as $team): ?>

							<tr>
								<td>
									<?php
										$team_bar_length = 300;
										$sum_votes = $total_votes[0]['total_votes'];
										$team_id = $team['team_id'];
										$votes = $votes_by_team[$team_id]['num_votes'];
										if ($sum_votes > 0)
										{
											$team_vote_pct = ($votes / $sum_votes);	
										}
										else {$team_vote_pct = 0;}
										$percent_display = intval($team_vote_pct * 100);
										$vote_bar_size = $team_vote_pct * $team_bar_length;
									?>

									<input type="text" name="team_<?php echo $team['team_id']; ?>" class="num_votes">
									

								</td>
								<td class="sweet16-team-row">
								
									<img src="<?php echo IMG_PATH.$team['team_img']; ?>" alt="<?php echo $team['team_name']; ?>" title="<?php echo $team['team_name']; ?>">

								</td>
								<td class="sweet16-end-row-l">
									<div class="vote-bar" style="width:<?php echo $vote_bar_size; ?>px;"></div>
									<?php if($percent_display != 0){echo $percent_display.'%';} ?>
								</td>
								<td class="sweet16-end-row-r">
								</td>
							</tr>

						<?php endforeach ?>

				</table>

						<?php

						echo form_submit($submit_attr, 'Vote');
						echo form_close();

						?>
			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				
				<div class="contentheader"><?php echo $content_top; ?></div><!--/ .contentheader -->
				

					<table>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td><strong>VOTES</strong></td>
						</tr>
					<?php
					$form_attr = array('class' => 'team', 'target' => '_blank');
					echo form_open('start', $form_attr);

					?>

						<?php foreach ($championship_teams as $team): ?>

							<tr>
								<td>
									<?php
										$team_bar_length = 300;
										$sum_votes = $total_votes[0]['total_votes'];
										$team_id = $team['team_id'];
										$votes = $votes_by_team[$team_id]['num_votes'];
										if ($sum_votes > 0)
										{
											$team_vote_pct = ($votes / $sum_votes);	
										}
										else {$team_vote_pct = 0;}
										$percent_display = intval($team_vote_pct * 100);
										$vote_bar_size = $team_vote_pct * $team_bar_length;
									?>

									<input type="text" name="team_<?php echo $team['team_id']; ?>" class="num_votes">
									

								</td>
								<td class="sweet16-team-row">
								
									<img src="<?php echo IMG_PATH.$team['team_img']; ?>" alt="<?php echo $team['team_name']; ?>" title="<?php echo $team['team_name']; ?>">

								</td>
								<td class="sweet16-end-row-l">
									<div class="vote-bar" style="width:<?php echo $vote_bar_size; ?>px;"></div>
									<?php if($percent_display != 0){echo $percent_display.'%';} ?>
								</td>
								<td class="sweet16-end-row-r">
								</td>
							</tr>

						<?php endforeach ?>

				</table>

						<?php

						echo form_submit($submit_attr, 'Vote');
						echo form_close();

						?>

			</div><!--/ .TabbedClassContent -->
			*/ ?>
	</div><!--/ .TabbedPanelsContentGroup -->

</div><!--/ #TabbedPanels1 -->

<script src="/assets/js/index.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
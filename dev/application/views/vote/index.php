<div id="TabbedPanels1" class="TabbedPanels">

	<ul class="TabbedPanelsTabGroup">

    	<li class="TabbedPanelsTab" tabindex="0"><center>SWEET 16</center></li>

    	<li class="TabbedPanelsTab" tabindex="0"><center>ELITE 8</center></li>

    	<li class="TabbedPanelsTab" tabindex="0"><center>FINAL 4</center></li>

        <li class="TabbedPanelsTab" tabindex="0"><center>CHAMPIONSHIP</center></li>

    </ul><!-- .TabbedPanelsTabGroup -->


	<div class="TabbedPanelsContentGroup">

			<div class="TabbedClassContent">

				<h1>SWEET 16</h1>
				<hr>
				<table>

						<?php foreach ($sweet16_teams as $team): ?>

							<tr>
								<td>
									
										<input type="hidden" name="" value="<?php echo $team['team_id']; ?>">
										<input type="text" col="3" name"num_votes">
										<input type="submit" class="vote-button-16" name="vote" value="Vote">
									</form>
								</td>
								<td>
									<?php echo $team['team_name']; ?>
								</td>
								<td>
									<div class="vote-bar" style=""></div>
								</td>
							</tr>

						<?php endforeach ?>

				</table>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				<hr>
				<h1>ELITE 8</h1>
				<hr>

					<table>

						<?php foreach ($elite8_teams as $team): ?>

							<tr>
								<td>
									<input type="text" col="3" name"votes_<?php echo $team['team_id']; ?>">
									<input type="submit" class="vote-button-16" name="vote" value="Vote">
								</td>
								<td>
									<?php echo $team['team_name']; ?>
								</td>
								<td>
									<div class="vote-bar" style=""></div>
								</td>
							</tr>

						<?php endforeach ?>

					</table>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				<hr>
				<h1>FINAL 4</h1>
				<hr>

					<table>

						<?php foreach ($final4_teams as $team): ?>

							<tr>
								<td>
									<input type="text" col="3" name"votes_<?php echo $team['team_id']; ?>">
									<input type="submit" class="vote-button-16" name="votes_<?php echo $team['team_id']; ?>" value="Vote">
								</td>
								<td>
									<?php echo $team['team_name']; ?>
								</td>
								<td>
									<div class="vote-bar" style=""></div>
								</td>
							</tr>

						<?php endforeach ?>

					</table>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				<hr>
				<h1>CHAMPIONSHIP</h1>
				<hr>

					<table>

						<?php foreach ($championship_teams as $team): ?>

							<tr>
								<td>
									<input type="text" col="3" name"votes_<?php echo $team['team_id']; ?>">
									<input type="submit" class="vote-button-16" name="votes_<?php echo $team['team_id']; ?>" value="Vote">
								</td>
								<td>
									<?php echo $team['team_name']; ?>
								</td>
								<td>
									<div class="vote-bar" style=""></div>
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
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

				<?php foreach ($teams as $team): ?>

					<h1><?php echo $team['team_name']; ?></h1>

					<p><?php echo $team['team_id']; ?></p>

				<?php endforeach ?>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				<hr>
				<h1>ELITE 8</h1>
				<hr>

				<?php foreach ($teams as $team): ?>

					<h1><?php echo $team['team_name']; ?></h1>

					<p><?php echo $team['team_id']; ?></p>

				<?php endforeach ?>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				<hr>
				<h1>FINAL 4</h1>
				<hr>

				<?php foreach ($teams as $team): ?>

					<h1><?php echo $team['team_name']; ?></h1>

					<p><?php echo $team['team_id']; ?></p>

				<?php endforeach ?>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				<hr>
				<h1>CHAMPIONSHIP</h1>
				<hr>

				<?php foreach ($teams as $team): ?>

					<h1><?php echo $team['team_name']; ?></h1>

					<p><?php echo $team['team_id']; ?></p>

				<?php endforeach ?>

			</div><!--/ .TabbedClassContent -->

	</div><!--/ .TabbedPanelsContentGroup -->

</div><!--/ #TabbedPanels1 -->

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
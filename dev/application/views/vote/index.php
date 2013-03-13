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

					<?php foreach($sweet16_teams as $team): ?>
					
						<tr>
							<td><?php ?></td>
							<td><?php echo $team['team_name']; ?></td>
							<td><div></div></td>

						</tr>

						<?php // echo form_close(); ?>
					<?php endforeach; ?>

				</table>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				<hr>
				<h1>ELITE 8</h1>
				<hr>

					<table>



					</table>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				<hr>
				<h1>FINAL 4</h1>
				<hr>

					<table>


					</table>

			</div><!--/ .TabbedClassContent -->


			<div class="TabbedClassContent">

				<hr>
				<h1>CHAMPIONSHIP</h1>
				<hr>

					<table>



					</table>	

			</div><!--/ .TabbedClassContent -->

	</div><!--/ .TabbedPanelsContentGroup -->

</div><!--/ #TabbedPanels1 -->

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
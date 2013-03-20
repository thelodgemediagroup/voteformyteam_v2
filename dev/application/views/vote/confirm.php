<div id="confirm">

	<h2>Confirm Payment</h2>

	<?php $this->firephp->log($result); ?>
	<table id="voter-info">

		<tr>
			<td class="confirm-field">Email:</td>
			<td><?php echo $result['EMAIL']; ?></td>
		</tr>
		<tr>
			<td class="confirm-field">First Name:</td>
			<td><?php echo $result['FIRSTNAME']; ?></td>
		</tr>
		<tr>
			<td class="confirm-field">Last Name:</td>
			<td><?php echo $result['LASTNAME']; ?></td>
		</tr>

	</table>

	<table id="voter-pay">

		<tr>
			<th>Item</th>
			<th>Total Price</th>
		</tr>
		<tr>
			<td><?php echo $result['DESC']; ?></td>
			<td><?php echo $result['AMT']; ?></td>
		</tr>

	</table>

	<div id="paypal-buttons">

	<?php

		$this->load->helper('form');
		$this->load->helper('url');

		echo form_open('finish', '', $result);
		$submit_params = array('id' => 'confirm_button', 'name' => 'confirm_button', 'value' => 'Confirm Payment');
		echo form_submit($submit_params);
		echo form_close();

	?>
	<a href="<?php echo site_url(); ?>">Cancel</a>
	</div><!--/ #paypal-buttons -->

</div><!--/ #confirm -->

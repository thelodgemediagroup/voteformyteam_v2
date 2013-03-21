<?php

$this->load->helper('form'); 
$this->load->helper('url');

if ($email['L_QTY0'] > 1)
{
	$vote_case = 'votes';
}
else
{
	$vote_case = 'vote';
}

?>

<?php

$challenge_prepare = 'I donated '.$email['L_QTY0'].' '.$vote_case.' to the American Red Cross for the 2013 March Madness Tournament. Which team are you going to pick?';

?>
<div id="confirm">

	<h2>Thank you <?php echo $email['FIRSTNAME']; ?>,<br />for making a donation to the American Red Cross</h2>
	<br />
	<h3>Would you like to challenge a friend?</h3>

	<table id="voter-info">
		<?php echo form_open('email'); ?>
		<input type="hidden" name="sender_email" value="<?php echo $email['EMAIL']; ?>">
		<tr>

			<td class="confirm-field">Email Header:</td>
			<td><h3><input type="hidden" name"email_header" value="Vote For My Team">Vote For My Team</h3></td>

		</tr>
		<tr>

			<td class="confirm-field">Who Will you Challenge? (Email)</td>
			<td><input type="text" name="challenger" size="80"></td>

		</tr>
		<tr>

			<td class="confirm-field">Your Message:</td>
			<td><textarea cols="80" rows="6" name="challenge_message"><?php echo $challenge_prepare; ?></textarea></td>

		</tr>
		<tr>
			<?php $submit_params = array('name' => 'emailsubmit', 'value' => 'Send Email Challenge', 'class' => 'confirm-submit'); ?>
			<td><?php echo form_submit($submit_params); ?></td>
			<td><a href="<?php echo site_url(); ?>">No, Thanks</a></td>

		</tr>
		<?php echo form_close(); ?>

	</table>

</div><!--/ #confirm -->
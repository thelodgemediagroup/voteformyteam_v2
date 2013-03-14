<?php

class Paypal_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function start_checkout()
	{
		$paypal_user = 'jslind-facilitator_api1.bex.net';
		$paypal_pwd = '1363196681';
		$paypal_signature = 'AQU0e5vuZCvSg-XJploSa.sGUDlpAOzMLzUxz.wKZGk0SKuJOFmzOKTt';

		$paypal_target = 'https://api-3t.sandbox.paypal.com/nvp';

		$num_votes = $_POST['num_votes'];
		$team_id = $_POST['team_id'];
		$team_name = $_POST['team_name'];

		$fields = array(
			'USER' => urlencode($paypal_user),
			'PWD' => urlencode($paypal_pwd),
			'SIGNATURE' => urlencode($paypal_signature),
			'METHOD' => urlencode('SetExpressCheckout'),
			'VERSION' => urlencode('78'),
			'PAYMENTREQUEST_0_PAYMENTACTION' => urlencode('SALE'),
			'PAYMENTREQUEST_0_AMT' => urlencode($num_votes),
			'PAYMENTREQUEST_0_CURRENCYCODE' => urlencode('USD'),
			'CANCELURL' => urlencode('http://voteformyteam.com'),
			'RETURNURL' => urlencode('http://www.voteformyteam.com/checkout')
			);

		$fields_string = '';

		foreach ($fields as $key => $value)
		{
			$fields_string .= $key.'='.$value.'&';
		}

		rtrim($fields_string,'&');
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $paypal_target);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);

		curl_close($ch);

		
		parse_str($result, $result);

		if ( $result['ACK'] == 'Success')
		{
			header('Location: https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token='.$result['TOKEN']);
			$this->firephp->log($result);
		}
		else
		{
			echo 'The transaction did not initialize, please try again.';
		}

	}

	function confirm_checkout()
	{
		$paypal_user = 'jslind-facilitator_api1.bex.net';
		$paypal_pwd = '1363196681';
		$paypal_signature = 'AQU0e5vuZCvSg-XJploSa.sGUDlpAOzMLzUxz.wKZGk0SKuJOFmzOKTt';
		$paypal_target = 'https://api-3t.sandbox.paypal.com/nvp';

		$fields = array(
			'USER' => urlencode($paypal_user),
			'PWD' => urlencode($paypal_pwd),
			'SIGNATURE' => urlencode($paypal_signature),
			'VERSION' => urlencode('78'),
			'TOKEN' => urlencode($_GET['token']),
			'METHOD' => urlencode('GetExpressCheckoutDetails')
			);

		$fields_string = '';

		foreach ($fields as $key => $value)
		{
			$fields_string .= $key .'='.$value.'&';
		}

		rtrim($fields_string,'&');

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $paypal_target);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);

		curl_close($ch);

		parse_str($result, $result);

		if ( $result['ACK'] == 'Success')
		{
			finish_checkout();
		}
		else
		{
			echo 'The transaction did not complete, please try again.';	
		}
	}

	function finish_checkout()
	{
		$paypal_user = 'jslind-facilitator_api1.bex.net';
		$paypal_pwd = '1363196681';
		$paypal_signature = 'AQU0e5vuZCvSg-XJploSa.sGUDlpAOzMLzUxz.wKZGk0SKuJOFmzOKTt';
		$paypal_target = 'https://api-3t.sandbox.paypal.com/nvp';

		$fields = array(
              'USER' => urlencode($paypal_user),
              'PWD' => urlencode($paypal_pwd),
              'SIGNATURE' => urlencode($paypal_signature),
              'VERSION' => urlencode('78'),
              'PAYMENTREQUEST_0_PAYMENTACTION' => urlencode('Sale'),
              'PAYERID' => urlencode($result['PAYERID']),
              'TOKEN' => urlencode($result['TOKEN']),
              'PAYMENTREQUEST_0_AMT' => urlencode($result['AMT']),
              'METHOD' => urlencode('DoExpressCheckoutPayment')
          );

		$fields_string = '';
      	foreach ( $fields as $key => $value)
        {
        	$fields_string .= $key.'='.$value.'&';
        }
     	rtrim($fields_string,'&');

     	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $paypal_target);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);

		curl_close($ch);

		parse_str($result, $result);

		if ( $result['ACK'] == 'Success')
		{
			//save_transaction();
			echo 'Payment completed';
			$this->firephp->log($result);
		}
		else
		{
			echo 'Payment did not complete. Please try again';
		}
	}
}

?>
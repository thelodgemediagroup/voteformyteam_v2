<?php

class Paypal_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function start_checkout()
	{

		$votes = array();
		$vote_tally = 0;

		foreach ($_POST as $key => $value)
		{
			if (($value > 0) && is_numeric($value))
			{
				$votes[$key] = $value;
				$vote_tally += $value;
			}
		}
		
		// Formatting for paypal
		$paypal_votes = json_encode($votes);
		$payment_amt = number_format($vote_tally, 2, '.', '');
		$vote_quantity = intval($vote_tally);

		
		// Format paypal name
		if ($vote_tally >= 2)
		{
			$paypal_description = 'Votes to Donate';
		}
		else
		{
			$paypal_description = 'Vote to Donate';
		}
		/*  TEST CREDENTIALS
		$paypal_user = 'jslind-testing_api1.test.com';
		$paypal_pwd = '1363372943';
		$paypal_signature = 'ADvbVGgx3GmD9N8NvmhgLthtO2nGA4b.NtER6vez61j.28zww3FcWNOm';
		$paypal_target = 'https://api-3t.sandbox.paypal.com/nvp'; */

		// Live
		$paypal_user = 'voteformyteam_api1.gmail.com';
		$paypal_pwd = 'GMQ9DXPC5BB5LJDH';
		$paypal_signature = 'A9dePBBMsuCdujQTqS0ai4qmG89GA6uBNQBnm69kAyNH7lj8Hk1K1o1k';
		$paypal_target = 'https://api-3t.paypal.com/nvp';

		$fields = array(
			'USER' => urlencode($paypal_user),
			'PWD' => urlencode($paypal_pwd),
			'SIGNATURE' => urlencode($paypal_signature),
			'METHOD' => urlencode('SetExpressCheckout'),
			'VERSION' => urlencode('72.0'),
			'PAYMENTREQUEST_0_PAYMENTACTION' => urlencode('SALE'),
			'PAYMENTREQUEST_0_AMT' => urlencode($payment_amt),
			'PAYMENTREQUEST_0_AMT0' => urlencode($payment_amt),
			'PAYMENTREQUEST_0_ITEMAMT' => urlencode($payment_amt),
			'L_PAYMENTREQUEST_0_NAME0' => urlencode($paypal_description),
			'L_PAYMENTREQUEST_0_DESC0' => urlencode('voteformyteam.com'),
			'L_PAYMENTREQUEST_0_AMT0' => urlencode('1.00'),
			'L_PAYMENTREQUEST_0_QTY0' => urlencode($vote_quantity),
			'PAYMENTREQUEST_0_CUSTOM' => urlencode($paypal_votes),
			'ITEMAMT' => urlencode($payment_amt),
			'PAYMENTREQUEST_0_DESC' => urlencode($paypal_description),
			'PAYMENTREQUEST_0_CURRENCYCODE' => urlencode('USD'),
			'PAYMENTREQUEST_0_SHIPPINGAMT' => urlencode('0.00'),
			'PAYMENTREQUEST_0_TAXAMT' => urlencode('0.00'),
			'CANCELURL' => urlencode('http://www.voteformyteam.com/'),
			'RETURNURL' => urlencode('http://www.voteformyteam.com/checkout/')
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
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		
		$result = curl_exec($ch);

		curl_close($ch);
		

		
		parse_str($result, $result);

		if ( $result['ACK'] == 'Success')
		{
			$response = urldecode($result['TOKEN']);
			header('Location: https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token='.$response);
			exit;
		}
		else
		{
			echo 'The transaction did not initialize, please try again.';
		}
	
	}
	
	function confirm_checkout()
	{
		/* TEST CREDENTIALS
		$paypal_user = 'jslind-testing_api1.test.com';
		$paypal_pwd = '1363372943';
		$paypal_signature = 'ADvbVGgx3GmD9N8NvmhgLthtO2nGA4b.NtER6vez61j.28zww3FcWNOm';
		$paypal_target = 'https://api-3t.sandbox.paypal.com/nvp'; */

		// Live
		$paypal_user = 'voteformyteam_api1.gmail.com';
		$paypal_pwd = 'GMQ9DXPC5BB5LJDH';
		$paypal_signature = 'A9dePBBMsuCdujQTqS0ai4qmG89GA6uBNQBnm69kAyNH7lj8Hk1K1o1k';
		$paypal_target = 'https://api-3t.paypal.com/nvp';		

		$fields = array(
			'USER' => urlencode($paypal_user),
			'PWD' => urlencode($paypal_pwd),
			'SIGNATURE' => urlencode($paypal_signature),
			'VERSION' => urlencode('72.0'),
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
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		$result = curl_exec($ch);

		curl_close($ch);

		parse_str($result, $result);

		if ( $result['ACK'] == 'Success')
		{
			return $result;
		}
		else
		{
			echo 'The transaction did not complete, please try again.';	
		}
	}

	function finish_checkout($result)
	{
		/* TEST CREDENTIALS
		$paypal_user = 'jslind-testing_api1.test.com';
		$paypal_pwd = '1363372943';
		$paypal_signature = 'ADvbVGgx3GmD9N8NvmhgLthtO2nGA4b.NtER6vez61j.28zww3FcWNOm';
		$paypal_target = 'https://api-3t.sandbox.paypal.com/nvp'; */

		// Live
		$paypal_user = 'voteformyteam_api1.gmail.com';
		$paypal_pwd = 'GMQ9DXPC5BB5LJDH';
		$paypal_signature = 'A9dePBBMsuCdujQTqS0ai4qmG89GA6uBNQBnm69kAyNH7lj8Hk1K1o1k';
		$paypal_target = 'https://api-3t.paypal.com/nvp';		

		$fields = array(
              'USER' => urlencode($paypal_user),
              'PWD' => urlencode($paypal_pwd),
              'SIGNATURE' => urlencode($paypal_signature),
              'VERSION' => urlencode('72.0'),
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
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		$result = curl_exec($ch);

		curl_close($ch);
		parse_str($result, $result);

		if ( $result['ACK'] == 'Success')
		{
			return $result;
		}
		else
		{
			echo 'Payment did not complete. Please try again';
		}
	}
}

?>
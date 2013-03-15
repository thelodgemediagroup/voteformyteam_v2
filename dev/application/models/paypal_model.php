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
		$payment_amt = $num_votes * 1.00;
		if ($num_votes > 1)
		{
			$vote_string = "Votes";
		}
		else
		{
			$vote_string = "Vote";
		}
		$paypal_description = $num_votes.' '.$vote_string.' for '.$team_name;

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
			'ITEMAMT' => urlencode($num_votes),
			'PAYMENTREQUEST_0_DESC' => urlencode($paypal_description),
			'PAYMENTREQUEST_0_CURRENCYCODE' => urlencode('USD'),
			'CANCELURL' => urlencode('http://www.voteformyteam.com'),
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
		
		$paypal_user = 'jslind-facilitator_api1.bex.net';
		$paypal_pwd = '1363196681';
		$paypal_signature = 'AQU0e5vuZCvSg-XJploSa.sGUDlpAOzMLzUxz.wKZGk0SKuJOFmzOKTt';
		$paypal_target = 'https://api-3t.sandbox.paypal.com/nvp';

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
		$this->firephp->log($result);
		/*$this->firephp->log("About to loop result");
		foreach ($result as $key => $value)
			{
				foreach ($value as $key => $value)
				{
					$this->firephp->log('key: '.$key.', value: '.$value);	
				}
			}
		$this->firephp->log("Finished the loop!"); */
		$paypal_user = 'jslind-facilitator_api1.bex.net';
		$paypal_pwd = '1363196681';
		$paypal_signature = 'AQU0e5vuZCvSg-XJploSa.sGUDlpAOzMLzUxz.wKZGk0SKuJOFmzOKTt';
		$paypal_target = 'https://api-3t.sandbox.paypal.com/nvp';

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
		echo $result;
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
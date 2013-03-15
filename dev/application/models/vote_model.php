<?php

class Vote_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function set_vote($result)
	{

		$token = $result['TOKEN'];
		$team_id = $result['L_PAYMENTREQUEST_0_DESC0'];
		$num_votes = $result['L_PAYMENTREQUEST_0_QTY0'];
		$amount = $result['AMT'];
		$first_name = $result['FIRSTNAME'];
		$last_name = $result['LASTNAME'];
		$time = $result['TIMESTAMP'];

		$sql = "INSERT INTO `votes` (`team_id`, `num_votes`, `token`, `amount`, `first_name`, `last_name`, `time`) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($team_id, $num_votes, $token, $amount, $first_name, $last_name, $time));
	}

	public function get_votes_by_team()
	{
		$sql = "SELECT SUM(num_votes) AS num_votes , `team_id` FROM `votes` GROUP BY `team_id`";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function get_total_votes()
	{
		$sql = "SELECT SUM(num_votes) AS total_votes FROM `votes`";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

}
?>
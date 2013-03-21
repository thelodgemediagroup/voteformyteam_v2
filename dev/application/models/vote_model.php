<?php

class Vote_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function set_vote($result)
	{
		//payment data
		$token = $result['TOKEN'];
		$total_votes = $result['L_QTY0'];
		$amount = $result['AMT'];
		$first_name = $result['FIRSTNAME'];
		$last_name = $result['LASTNAME'];
		$time = $result['TIMESTAMP'];
		$email = $result['EMAIL'];
		$vote_choices = stripslashes($result['CUSTOM']);
		//votes by team
		$votes_json = $result['CUSTOM'];
		$vote_array = json_decode(stripslashes($votes_json));

		//insert them into the team vote database
		foreach ($vote_array as $key => $value)
		{
			$key_split = explode('_', $key);
			$team_id = $key_split[1];
			$num_votes = $value;

			$sql = "INSERT INTO `team_votes` (`team_id`, `num_votes`) VALUES (?, ?)";
			$query = $this->db->query($sql, array($team_id, $num_votes));
		}


		$sql = "INSERT INTO `votes` (`total_votes`, `token`, `amount`, `email`, `first_name`, `last_name`, `time`, `vote_choices`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($total_votes, $token, $amount, $email, $first_name, $last_name, $time, $vote_choices));
	}

	public function get_votes_by_team()
	{
		$sql = "SELECT SUM(num_votes) AS num_votes , `team_id` FROM `team_votes` GROUP BY `team_id`";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function get_total_votes()
	{
		$sql = "SELECT SUM(num_votes) AS total_votes FROM `team_votes`";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

}
?>
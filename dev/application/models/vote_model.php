<?php

class Vote_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function set_vote()
	{
		$team_id = $_POST['team_id'];
		$num_votes = $_POST['num_votes'];

		$sql = "INSERT INTO `votes` (`team_id`, `num_votes`) VALUES (?, ?)";
		$query = $this->db->query($sql, array($team_id, $num_votes));
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
<?php

class Teams_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_teams()
	{
		$sql = "SELECT * FROM `teams` ORDER BY `team_id`";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function get_teams_by_round($round = 'sweet16')
	{
		$sql = "SELECT DISTINCT * FROM $round, `teams` WHERE `teams`.`team_id` = $round.`team_id`";
		$query = $this->db->query($sql);

		$this->firephp->info($query->result_array());
		return $query->result_array();
	}
}

?>
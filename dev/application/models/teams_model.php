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
		$sql = "SELECT * FROM $round, `teams` WHERE `teams`.`team_id` = $round.`team_id`";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function set_teams()
	{
		
		foreach ($_POST as $key => $value)
		{

			$key_parts = explode("_", $key);
			$table_name = $key_parts[0];
			$bracket_id = $key_parts[1];
			$team_id = $value;

			if ($table_name != "teams")
			{
				$sql = "UPDATE ".$table_name." SET team_id = ".$team_id." WHERE bracket_id = ".$bracket_id.";";	
				$query = $this->db->query($sql);
			}
			else
			{
				return;
			}
		}
	}
}

?>
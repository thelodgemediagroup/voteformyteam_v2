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
}

/*
		"UPDATE final4
			SET team_id = CASE bracket_id
				WHEN 1 THEN 10
				WHEN 2 THEN 10
				WHEN 3 THEN 10
				WHEN 4 THEN 10
			END
		WHERE bracket_id IN (1,2,3,4);"
*/
?>
<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('teams_model');
	}

	public function index()
	{
		$data['team_names'] = $this->teams_model->get_teams();
		$data['sweet16teams'] = $this->teams_model->get_teams_by_round('sweet16');
		$data['elite8teams'] = $this->teams_model->get_teams_by_round('elite8');
		$data['final4teams'] = $this->teams_model->get_teams_by_round('final4');
		$data['championshipteams'] = $this->teams_model->get_teams_by_round('championship');

		$this->load->view('admin/index', $data);
	}

	public function update_database()
	{
		$data['updates'] = $this->teams_model->set_teams();
		$data['team_names'] = $this->teams_model->get_teams();
		$data['sweet16teams'] = $this->teams_model->get_teams_by_round('sweet16');
		$data['elite8teams'] = $this->teams_model->get_teams_by_round('elite8');
		$data['final4teams'] = $this->teams_model->get_teams_by_round('final4');
		$data['championshipteams'] = $this->teams_model->get_teams_by_round('championship');

		$this->load->view('admin/index', $data);
	}
}

?>
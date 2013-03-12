<?php

class Vote extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('teams_model');
	}

	public function index()
	{
		$data['teams'] = $this->teams_model->get_teams();
		$data['title'] = 'Team Up With The American Red Cross';

		$this->load->view('templates/header', $data);
		$this->load->view('vote/index', $data);
		$this->load->view('templates/footer', $data);
	}
}

?>
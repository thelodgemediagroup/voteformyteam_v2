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
		$data['teams'] = $this->teams_model->get_teams_by_round('sweet16');

		$this->load->view('admin/index');
	}
}

?>
<?php

class Vote extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('teams_model');
		$this->load->model('vote_model');
		$this->load->model('paypal_model');
	}

	public function index()
	{
		$data['sweet16_teams'] = $this->teams_model->get_teams_by_round('sweet16');
		$data['elite8_teams'] = $this->teams_model->get_teams_by_round('elite8');
		$data['final4_teams'] = $this->teams_model->get_teams_by_round('final4');
		$data['championship_teams'] = $this->teams_model->get_teams_by_round('championship');
		$data['votes_by_team'] = $this->vote_model->get_votes_by_team();
		$data['total_votes'] = $this->vote_model->get_total_votes();
		

		$this->load->view('templates/header', $data);
		$this->load->view('vote/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function start_paypal()
	{
		$data['paypal_data'] = $this->paypal_model->start_checkout();
	}

	public function confirm_paypal()
	{
		$data['result'] = $this->paypal_model->confirm_checkout();

		$this->load->view('templates/header', $data);
		$this->load->view('vote/confirm', $data);
		$this->load->view('templates/footer', $data);
	}

	public function finish_paypal()
	{
		$result = $_POST;
		$this->firephp->log($result);
		$finish = $this->paypal_model->finish_checkout($result);
		$record = $this->vote_model->set_vote($result);


		$this->load->view('templates/header', $result);
		$this->load->view('vote/success', $result);
		$this->load->view('templates/footer', $result);
	}

	public function set_votes()
	{
		$data['votes'] = $this->vote_model->set_vote();
		$data['sweet16_teams'] = $this->teams_model->get_teams_by_round('sweet16');
		$data['elite8_teams'] = $this->teams_model->get_teams_by_round('elite8');
		$data['final4_teams'] = $this->teams_model->get_teams_by_round('final4');
		$data['championship_teams'] = $this->teams_model->get_teams_by_round('championship');
		$data['votes_by_team'] = $this->vote_model->get_votes_by_team();
		$data['total_votes'] = $this->vote_model->get_total_votes();

		$this->load->view('templates/header', $data);
		$this->load->view('vote/index', $data);
		$this->load->view('templates/footer', $data);		
	}

	public function vote_success()
	{

		$data['sweet16_teams'] = $this->teams_model->get_teams_by_round('sweet16');
		$data['elite8_teams'] = $this->teams_model->get_teams_by_round('elite8');
		$data['final4_teams'] = $this->teams_model->get_teams_by_round('final4');
		$data['championship_teams'] = $this->teams_model->get_teams_by_round('championship');
		$data['votes_by_team'] = $this->vote_model->get_votes_by_team();
		$data['total_votes'] = $this->vote_model->get_total_votes();
		

		$this->load->view('templates/header', $data);
		$this->load->view('vote/success', $data);
		$this->load->view('templates/footer', $data);
	}

}

?>
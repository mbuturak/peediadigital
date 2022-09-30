<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->mainFolder = "web";
		$this->viewFolder = "home_v";
		$this->load->model('settings_model');
		$this->load->model('hero_model');
		$this->load->model('about_model');
		$this->load->model('services_model');
		$this->load->model('portfolio_model');
		$this->load->model('contact_model');
	}

	public function index()
	{

		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->settingItem = $this->settings_model->get_all();
		$viewData->heroItem = $this->hero_model->get_all();
		$viewData->aboutItem = $this->about_model->get_all();
		$viewData->servicesItem = $this->services_model->get_all();
		$viewData->portfolioItem = $this->portfolio_model->get_all();
		$viewData->contactItem = $this->contact_model->get_all();

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/index", $viewData);
	}
}

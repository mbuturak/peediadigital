<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardMain extends CI_Controller {

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "cms";
		$this->viewFolder = "dashboard_v";
	}

	public function index()
	{

		if (!getActiveUser()) {
		 	redirect(base_url('cms/login'));
		 	die();
		 }

		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/index", $viewData);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardNewsletter extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public $folderName = "";

	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "cms";
		$this->viewFolder = "newsletter_v";
		$this->folderName = "newsletter";
		$this->load->model('newsletter_model');
	}

	public function index()
	{

		// if (!getActiveUser()) {
		// 	redirect(base_url('login'));
		// 	die();
		// }

		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->item = $this->newsletter_model->get_all();

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function delete($id)
	{
		//Delete Services
		$delete = $this->newsletter_model->delete(array(
			"Id" => $id
		));

		if ($delete) {
			$alert = array(
				"text" => "Silme işlemi başarılı bir şekilde gerçekleştirildi",
				"type" => "success"
			);
		} else {
			$alert = array(
				"text" => "Silme işlemi tamamlanamadı",
				"type" => "error"
			);
		}

		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('cms/' . $this->folderName . '-management'));
	}
}

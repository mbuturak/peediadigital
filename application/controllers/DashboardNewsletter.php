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

		if (!getActiveUser()) {
			redirect(base_url('cms/login'));
			die();
		}

		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->item = $this->newsletter_model->get_all();

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function add()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("email", "Email", "required|trim|valid_email|xss_clean");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$add = $this->user_model->add(
				array(
					"email" => htmlspecialchars($this->input->post("email")),
					"isActive" => 1
				)
			);

			if ($add) {
				$alert = array(
					"text" => "Ekleme başarılı ",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Bilgiler güncellenemedi.",
					"type" => "error"
				);
			}
		} else {
			//Validasyon hatalı..
			$alert = array(
				"text" => "Lütfen eksiksiz ve doğru bir biçimde giriş yapınız.. ",
				"type" => "error"
			);
		}

		$this->session->set_flashdata("alert", $alert);
		redirect(base_url());
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

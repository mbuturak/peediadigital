<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardSocial extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public $folderName = "";

	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "cms";
		$this->viewFolder = "settings_v";
		$this->subViewFolder = "social_v";
		$this->load->model('social_model');
		$this->folderName = "social_v";
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
		$viewData->subViewFolder = $this->subViewFolder;
		$viewData->folderName = $this->folderName;
		$viewData->item = $this->social_model->get_all();

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/{$viewData->subViewFolder}/list/index", $viewData);
	}

	public function addForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = $this->subViewFolder;
		$viewData->folderName = $this->folderName;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/{$viewData->subViewFolder}/add/index", $viewData);
	}

	public function updateForm($id)
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = $this->subViewFolder;
		$viewData->folderName = $this->folderName;
		$viewData->item = $this->social_model->get(array(
			"Id" => $id
		));
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/{$viewData->subViewFolder}/update/index", $viewData);
	}

	public function add()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("url", "Url", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$add = $this->social_model->add(
				array(
					"title" => htmlspecialchars($this->input->post("title")),
					"url" => htmlspecialchars($this->input->post("url")),
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
		redirect(base_url('cms/social-management'));
	}

	public function update($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("url", "Url", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$add = $this->social_model->update(
				array(
					"Id" => $id
				),
				array(
					"title" => htmlspecialchars($this->input->post("title")),
					"url" => htmlspecialchars($this->input->post("url")),
					"isActive" => $this->input->post("isActive")
				)
			);

			if ($add) {
				$alert = array(
					"text" => "Güncelleme başarılı ",
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
		redirect(base_url('cms/social-management'));
	}

	public function delete($id)
	{
		$validate = $this->social_model->delete(array(
			"Id" => $id
		));

		if ($validate) {
			$alert = array(
				"text" => "Silme başarılı ",
				"type" => "success"
			);
		} else {
			$alert = array(
				"text" => "Silme işlemi tamamlanamadı.",
				"type" => "error"
			);
		}

		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('cms/social-management'));
	}
}

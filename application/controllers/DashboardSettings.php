<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardSettings extends CI_Controller
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
		$this->load->model('settings_model');
		$this->folderName = "settings";
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
		$viewData->folderName = "seo_v";
		$viewData->item = $this->settings_model->get_all();

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/seo_v/index", $viewData);
	}


	public function update()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("description", "Açıklama", "required|trim");
		$this->form_validation->set_rules("keywords", "Anahtar Kelime", "required|trim");
		$this->form_validation->set_rules("phone", "Anahtar Kelime", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$update = $this->settings_model->update(
				array("Id" =>  1),
				array(
					"title" => htmlspecialchars($this->input->post("title")),
					"description" => htmlspecialchars($this->input->post("description")),
					"keywords" => htmlspecialchars($this->input->post("keywords")),
					"phone" => htmlspecialchars($this->input->post("phone")),
					"adress" => htmlspecialchars($this->input->post("adress")),
					"maps_link" => htmlspecialchars($this->input->post("maps_link")),
				)
			);

			if ($update) {
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
		redirect(base_url('cms/seo-management'));
	}

	
}

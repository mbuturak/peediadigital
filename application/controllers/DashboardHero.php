<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardHero extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public $folderName = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "cms";
		$this->viewFolder = "hero_v";
		$this->load->model('hero_model');
		$this->folderName = "hero";
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
		$viewData->item = $this->hero_model->get_all();

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/index", $viewData);
	}

	public function update()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("description", "Açıklama", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {

				// Set preference
				$config['upload_path'] = 'assets/uploads/' . $this->folderName . '/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['image']['name'];
				$config['encrypt_name'] = TRUE;

				//Load upload library
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('image')) {
					$imageData = $this->upload->data();

					//Delete old image
					if ($this->input->post('old_image') != "no-photo.png") {
						unlink('assets/uploads/' . $this->folderName . '/' . $this->input->post('old_image'));
					}


					//Add db
					$save = $this->hero_model->update(
						array("Id" => 1),
						array(
							"image" => $imageData['file_name'],
							"title" => htmlspecialchars($this->input->post('title')),
							"description" => htmlspecialchars($this->input->post('description')),
						)
					);

					($save) ? $alert = array("text" => "Güncelleme başarılı..", "type" => "success") :
						$alert = array("text" => "Görsel ekleme sırasında bir hata meydana geldi", "type" => "error");
				} else {
					echo "<pre>";
					print_r($this->upload->display_errors());
				}
			} else {
				$save = $this->hero_model->update(
					array("Id" => 1),
					array(
						"title" => htmlspecialchars($this->input->post('title')),
						"description" => htmlspecialchars($this->input->post('description')),
					)
				);
				if ($save) {
					$alert = array(
						"text" => "Güncelleme başarılı..",
						"type" => "success"
					);
				} else {
					$alert = array(
						"text" => "Güncelleme sırasında bir hata meydana geldi ! ",
						"type" => "error"
					);
				}
			}
		} else {
			//Validasyon hatalı..
			$alert = array(
				"text" => "Lütfen eksiksiz ve doğru bir biçimde giriş yapınız.. ",
				"type" => "error"
			);
		}

		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('cms/' . $this->folderName . '-management'));
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardPortfolio extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public $folderName = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "cms";
		$this->viewFolder = "portfolio_v";
		$this->load->model('portfolio_model');
		$this->folderName = "portfolio";
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
		$viewData->item = $this->portfolio_model->get_all();

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function addForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function updateForm($id)
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->item = $this->portfolio_model->get(array(
			"Id" => $id
		));
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/update/index", $viewData);
	}

	public function add()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("description", "Açıklama", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if ($_FILES['image']['name'] != "") {
				// Set preference
				$config['upload_path'] = 'assets/uploads/portfolio/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['image']['name'];
				$config['encrypt_name'] = TRUE;

				//Load upload library
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('image')) {
					$imageData = $this->upload->data();
				} else {
					echo "<pre>";
					print_r($this->upload->display_errors());
				}
			}

			if (isset($imageData)) {
				$data = array(
					"image" => $imageData['file_name'],
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('description')),
				);
			} else {
				$data = array(
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('description')),
				);
			}

			$add = $this->portfolio_model->add($data);

			if ($add) {
				$alert = array(
					"text" => "Yeni servis eklendi!",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Yeni servis eklenirken bir hata meydana geldi!",
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

		$this->session->set_flashdata('alert', $alert);
		redirect(base_url('cms/' . $this->folderName . '-management'));
	}

	public function update($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("description", "Açıklama", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if ($_FILES['image']['name'] != "") {
				// Set preference
				$config['upload_path'] = 'assets/uploads/portfolio/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['image']['name'];
				$config['encrypt_name'] = TRUE;

				//Load upload library
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('image')) {

					//Delete Old Image
					if ($this->input->post('old_image') != 'no-photo.png') {
						unlink('assets/uploads/' . $this->folderName . '/' . $this->input->post('old_image'));
					}

					$imageData = $this->upload->data();
				} else {
					echo "<pre>";
					print_r($this->upload->display_errors());
				}
			}

			if (isset($imageData)) {
				$data = array(
					"image" => $imageData['file_name'],
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('description')),
				);
			} else {
				$data = array(
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('description')),
				);
			}

			$add = $this->portfolio_model->update(array("Id" => $id), $data);

			if ($add) {
				$alert = array(
					"text" => "Yeni servis eklendi!",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Yeni servis eklenirken bir hata meydana geldi!",
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

		$this->session->set_flashdata('alert', $alert);
		redirect(base_url('cms/' . $this->folderName . '-management'));
	}

	public function delete($id)
	{
		//Get Services Item
		$portfolioItem = $this->portfolio_model->get(array(
			"Id" => $id
		));

		//Delete Image
		if ($portfolioItem->image != null) {
			unlink('assets/uploads/portfolio/' . $portfolioItem->image);
		}

		//Delete Services
		$delete = $this->portfolio_model->delete(array(
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

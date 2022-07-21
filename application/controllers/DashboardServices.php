<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardServices extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public $folderName = "";

	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "cms";
		$this->viewFolder = "services_v";
		$this->folderName = "services";
		$this->load->model('services_model');
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
		$viewData->item = $this->services_model->get_all();

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
		$viewData->item = $this->services_model->get(array(
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

			if ($_FILES['icon']['name'] != "") {
				// Set preference
				$config['upload_path'] = 'assets/uploads/services/icon/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['icon']['name'];
				$config['encrypt_name'] = TRUE;

				//Load upload library
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('icon')) {
					$iconData = $this->upload->data();
				} else {
					echo "<pre>";
					print_r($this->upload->display_errors());
				}
			}

			if ($_FILES['image']['name'] != "") {
				// Set preference
				$config['upload_path'] = 'assets/uploads/services/image/';
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


			if (isset($imageData) && isset($iconData)) {
				//Görsel var , Icon var
				$data = array(
					"icon" => $iconData['file_name'],
					"image" => $imageData['file_name'],
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('title')),
					"rank" => htmlspecialchars($this->input->post('title')),
				);
			} else if (!isset($imageData) && isset($iconData)) {
				//Görsel yok , Icon var
				$data = array(
					"icon" => $iconData['file_name'],
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('title')),
					"rank" => htmlspecialchars($this->input->post('title')),
				);
			} else if (isset($imageData) && !isset($iconData)) {
				//Görsel var , Icon yok
				$data = array(
					"image" => $imageData['file_name'],
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('title')),
					"rank" => htmlspecialchars($this->input->post('title')),
				);
			} else {
				//Icon ve görsel yok.
				$data = array(
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('title')),
					"rank" => htmlspecialchars($this->input->post('title')),
				);
			}

			$add = $this->services_model->add($data);

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

			if (isset($_FILES['icon']) && $_FILES['icon']['name'] != "") {
				// Set preference
				$config['upload_path'] = 'assets/uploads/services/icon/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['icon']['name'];
				$config['encrypt_name'] = TRUE;

				//Load upload library
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('icon')) {

					//Delete old image
					if ($this->input->post('old_icon') != "no-photo.png") {
						unlink('assets/uploads/services/icon/' . $this->input->post('old_icon'));
					}


					$iconData = $this->upload->data();
				} else {
					echo "<pre>";
					print_r($this->upload->display_errors());
				}
			}

			if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
				// Set preference
				$config['upload_path'] = 'assets/uploads/services/image/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['image']['name'];
				$config['encrypt_name'] = TRUE;

				//Load upload library
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('image')) {

					//Delete old image
					if ($this->input->post('old_image') != "no-photo.png") {
						unlink('assets/uploads/services/image/' . $this->input->post('old_image'));
					}

					$imageData = $this->upload->data();
				} else {
					echo "<pre>";
					print_r($this->upload->display_errors());
				}
			}

			if (isset($imageData) && isset($iconData)) {
				//Görsel var , Icon var
				$data = array(
					"icon" => $iconData['file_name'],
					"image" => $imageData['file_name'],
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('title')),

				);
			} else if (!isset($imageData) && isset($iconData)) {
				//Görsel yok , Icon var
				$data = array(
					"icon" => $iconData['file_name'],
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('description')),

				);
			} else if (isset($imageData) && !isset($iconData)) {
				//Görsel var , Icon yok
				$data = array(
					"image" => $imageData['file_name'],
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('description')),

				);
			} else {
				//Icon ve görsel yok.
				$data = array(
					"title" => htmlspecialchars($this->input->post('title')),
					"description" => htmlspecialchars($this->input->post('description')),

				);
			}

			$update = $this->services_model->update(array(
				"Id" => $id
			), $data);

			if ($update) {
				$alert = array(
					"text" => "Güncelleme başarılı!",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Güncelleme sırasında bir hata meydana geldi!",
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
		$servicesItem = $this->services_model->get(array(
			"Id" => $id
		));

		//Delete Icon
		if ($servicesItem->icon != null) {
			unlink('assets/uploads/services/icon/' . $servicesItem->icon);
		}
		//Delete Image
		if ($servicesItem->image != null) {
			unlink('assets/uploads/services/image/' . $servicesItem->image);
		}

		//Delete Services
		$delete = $this->services_model->delete(array(
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

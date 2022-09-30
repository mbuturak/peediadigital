<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardUser extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $folderName = "";

	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "cms";
		$this->viewFolder = "user_v";
		$this->load->model('user_model');
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
		$viewData->folderName = $this->folderName;

		$viewData->item = $this->user_model->get_all();

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function addForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->folderName = $this->folderName;

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function updateForm($id)
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->folderName = $this->folderName;

		$viewData->item = $this->user_model->get(array(
			"Id" => $id
		));
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/update/index", $viewData);
	}

	public function loginForm()
	{

		if (getActiveUser()) {
			redirect(base_url('cms'));
			die();
		}

		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->folderName = $this->folderName;

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/login/index", $viewData);
	}

	public function add()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("username", "Kullanıcı Adı", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$add = $this->user_model->add(
				array(
					"username" => htmlspecialchars($this->input->post("username")),
					"password" => htmlspecialchars(md5($this->input->post("password"))),
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
		redirect(base_url('cms/user-management'));
	}

	public function update($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("username", "Kullanıcı Adı", "required|trim");


		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();
		if ($validate) {

			$add = $this->user_model->update(
				array(
					"Id" => $id
				),
				array(
					"username" => htmlspecialchars($this->input->post("username")),
					"password" => htmlspecialchars(md5($this->input->post("password"))),
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
		redirect(base_url('cms/user-management'));
	}

	public function delete($id)
	{
		$validate = $this->user_model->delete(array(
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
		redirect(base_url('cms/user-management'));
	}

	public function login()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("username", "Kullanıcı Adı", "required|trim");
		$this->form_validation->set_rules("password", "Parola", "required|trim");


		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();
		if ($validate) {

			$user = $this->user_model->get(
				array(
					"username" => $this->input->post('username'),
					"password" => md5($this->input->post('password'))
				)
			);

			if ($user) {
				//Giriş başarılı..
				$alert = array(
					"text" => "Giriş başarılı. ",
					"type" => "success"
				);

				$this->session->set_flashdata("alert", $alert);

				$this->session->set_userdata("user", $user);
				redirect(base_url('cms'));
				die();
			} else {
				//Giriş hatalı..
				$alert = array(
					"text" => "Böyle bir kullanıcı bulunamadı! ",
					"type" => "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url('cms/login'));
				die();
			}
		} else {
			//Validasyon hatalı..
			$alert = array(
				"text" => "Lütfen eksiksiz ve doğru bir biçimde giriş yapınız.. ",
				"type" => "error"
			);

			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('cms/login'));
			die();
		}
	}

	public function logout()
	{
		unset($_SESSION['user']);
		redirect(base_url('cms/login'));
	}
}

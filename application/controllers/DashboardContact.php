<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardContact extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public $folderName = "";

	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "cms";
		$this->viewFolder = "contact_v";
		$this->load->model('contact_model');
		$this->folderName = "contact";
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
		$viewData->item = $this->contact_model->get_all();

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function updateForm($id)
	{

		if (!getActiveUser()) {
		 	redirect(base_url('cms/login'));
		 	die();
		 }

		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->item = $this->contact_model->get(array(
			"Id" => $id
		));

		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/update/index", $viewData);
	}

	public function update($id)
	{


		$this->load->library("form_validation");

		$this->form_validation->set_rules("reply", "Yanıt", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$updateMessage = $this->contact_model->update(array(
				"Id" => $id
			), array(
				"reply" => htmlspecialchars($this->input->post('reply')),
				"replyDate" => date("dd/mm/YY H:i")
			));

			if ($updateMessage) {

				//Email Send
				$a = $this->sendMail($this->input->post('email'), "Welcome!", "Message successfully delivered! Thank you for contact us!");
				$b = $this->sendMail("mbuturak@icloud.com", "Mesajınız Var!", $this->input->post('name') . " adlı kişiden yeni bir mesaj yazıldı.");
				if ($a && $b) {

					//Status Update
					$this->contact_model->update(array(
						"Id" => $id
					), array(
						"status" => 0
					));

					$alert = array(
						"text" => "Yanıt gönderme başarılı! ",
						"type" => "success"
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

	public function delete($id)
	{
		$delete = $this->contact_model->delete(array("Id" => $id));

		if($delete){
			$alert = array(
				"text" => "Silme işlemi başarılı.",
				"type" => "success"
			);
		}else{
			$alert = array(
				"text" => "Silme işlemi tamamlanamadı.",
				"type" => "error"
			);
		}

		$this->session->set_flashdata("alert",$alert);
		redirect(base_url('cms/'.$this->folderName.'-management'));
	}

	private function sendMail($sTo, $sSubject, $sMessage)
	{
		$this->load->library('email');

		$SMTP_HOST = "smtp.yandex.com.tr";
		$SMTP_USER = "mali.buturak@halia.com.tr";
		$SMTP_PASS = "Mehmetalibuturak01";
		$SMTP_PORT = 465;

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => $SMTP_HOST,
			'smtp_port' => $SMTP_PORT,
			'smtp_user' => $SMTP_USER,
			'smtp_pass' => $SMTP_PASS,
			'smtp_crypto' => 'tls',
			'mailtype'  => 'html',
			'charset' 	=> 'utf-8',
			'wordwrap' 	=> TRUE
		);

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from($SMTP_USER, "Peedia Digital");
		$this->email->to($sTo);
		$this->email->subject($sSubject);
		$this->email->message($sMessage);
		if ($this->email->send()) {
			return true;
		} else {
			show_error($this->email->print_debugger());
		}
	}
}

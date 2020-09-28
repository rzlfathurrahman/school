<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// untuk menampilkan halaman awal user
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/topbar');
		$this->load->view('welcome_message');
		$this->load->view('templates/footer');
	}
}

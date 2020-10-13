<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// untuk menampilkan halaman awal / landing page
	public function index()
	{
		$this->load->view('templates/frontend/header');
		$this->load->view('templates/frontend/topbar');
		$this->load->view('welcome_message');
		$this->load->view('templates/frontend/footer');
	}
}

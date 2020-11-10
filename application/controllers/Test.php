<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->load->view('auth/test');
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */
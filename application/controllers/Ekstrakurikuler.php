<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikuler extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}			

	public function index()
	{
			// siapkan data user yang aktif
		$data['user'] = $this->session->userdata();
		$id_user_aktif = $data['user']['user_id'];

		// ambil data user aktif
		$data['user'] = $this->ion_auth->user()->result_array();

		// dapatkan grup user saat ini
		$data['user_groups'] = $this->ion_auth->get_users_groups()->result();

		// info halaman aktif 
		$data['halaman'] = 'ekstrakurikiler';

		// judul web
		$data['judul'] = 'Ekstrakurikuler';

		// ambil url aktif
		$data['url'] = $this->uri->segment_array();

		// ambil daftar ekstra
		$data['ekstrakurikuler'] = $this->db->get('ekstrakurikuler')->result();

		$this->load->view('templates/backend/header',$data);
		$this->load->view('templates/backend/sidebar');
		$this->load->view('backend/ekstrakurikuler/index');
		$this->load->view('templates/backend/footer');
	}

}

/* End of file Ekstrakurikuler.php */
/* Location: ./application/controllers/Ekstrakurikuler.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		if ($this->is_siswa() == false) {
			$this->session->set_flashdata("pesan","<div class='alert alert-warning'>Anda tidak berhak mengakses halaman profil siswa !</div>");
			redirect('dashboard','refresh');
		}
	}

	private function is_siswa()
	{
		$row = $this->ion_auth->user()->row();
		$nama = $row->first_name." ".$row->last_name;
		$query = $this->db->query("SELECT * FROM users,siswa WHERE siswa.nama_siswa = '$nama'")->result(); 
		if (empty($query)) {
			return false;
		}
		return true;
	}

	// untuk menampilkan halaman awal / landing page
	public function index()
	{
		$data['halaman'] = "frontend/siswa/";

		// siapkan menu
		$data['menu'] = $this->db->get('menu')->result();

		// apakah user login?
		$data['is_login'] = $this->ion_auth->logged_in();

		// siapkan data user yang aktif
		$data['user'] = $this->session->userdata();
		$id_user_aktif = $data['user']['user_id'];

		// ambil data user aktif
		$user = $this->ion_auth->user()->result();
		$nama_siswa = '';
		foreach ($user as $u) {
			$nama_siswa = $u->first_name." ".$u->last_name;
		}

		// judul web
		$data['judul'] = 'Profil Saya';

		// ambil detail siswa
		$query = "SELECT * FROM siswa,orangtua WHERE siswa.nis = orangtua.nis AND siswa.nama_siswa = '$nama_siswa'";
		$result = $this->db->query($query)->result();
		$data['result'] = $result[0];

		// var_dump($data); exit();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('templates/frontend/topbar');
		$this->load->view('frontend/siswa');
		$this->load->view('templates/frontend/footer');
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/frontend/Siswa.php */
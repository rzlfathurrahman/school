<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// untuk menampilkan halaman awal / landing page
	public function index()
	{
		// siapkan data judul , halaman
		$data['judul'] = "SMK MA'ARIF NU 1 Ajibarang";
		$data['halaman'] = "";

		// siapkan menu
		$data['menu'] = $this->db->get('menu')->result();

		// data profil kesiswaan
		$data['profil_kesiswaan'] = $this->db->get('profil_kesiswaan')->result();

		$data['is_login'] = $this->ion_auth->logged_in();

		// landing page
		$data['landing_page'] = $this->db->get_where('landing_page',['is_tampil' => 1])->result();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('templates/frontend/topbar');
		$this->load->view('frontend/home');
		$this->load->view('templates/frontend/footer');
	}
}

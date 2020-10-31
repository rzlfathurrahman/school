<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// untuk menampilkan halaman awal / landing page
	public function index()
	{
		// siapkan data judul , halaman
		$data['judul'] = "SMK MA'ARIF NU 1 Ajibarang";
		$data['halaman'] = "home";

		// siapkan menu
		$data['menu'] = $this->db->get('menu')->result();

		// data profil kesiswaan
		$data['profil_kesiswaan'] = $this->db->get('profil_kesiswaan')->result();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('templates/frontend/topbar');
		$this->load->view('frontend/home');
		$this->load->view('templates/frontend/footer');
	}
}

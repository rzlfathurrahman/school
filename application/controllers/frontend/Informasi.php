<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function index()
	{
		redirect('home','refresh');		
	}

	public function kesiswaan()
	{
		$data['halaman'] = "frontend/informasi/kesiswaan";

		// siapkan menu
		$data['menu'] = $this->db->get('menu')->result();

		// apakah user login?
		$data['is_login'] = $this->ion_auth->logged_in();

		// judul web
		$data['judul'] = 'Profil Kesiswaan';	

		// ambil profil kesiswaan
		$data['profil_kesiswaan'] = $this->db->get('profil_kesiswaan')->result();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('templates/frontend/topbar');
		$this->load->view('frontend/informasi/profil_kesiswaan');
		$this->load->view('templates/frontend/footer');
	}

	public function struktur()
	{
		$data['halaman'] = "frontend/informasi/struktur";

		// siapkan menu
		$data['menu'] = $this->db->get('menu')->result();

		// apakah user login?
		$data['is_login'] = $this->ion_auth->logged_in();

		// judul web
		$data['judul'] = 'Struktur Kesiswaan';	

		// ambil struktur kesiswaan
		$data['struktur_kesiswaan'] = $this->db->get('struktur_organisasi')->result();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('templates/frontend/topbar');
		$this->load->view('frontend/informasi/struktur_kesiswaan');
		$this->load->view('templates/frontend/footer');
	}

	public function ekstrakurikuler()
	{
		$data['halaman'] = "frontend/informasi/ekstrakurikuler";

		// siapkan menu
		$data['menu'] = $this->db->get('menu')->result();

		// apakah user login?
		$data['is_login'] = $this->ion_auth->logged_in();

		// judul web
		$data['judul'] = 'Daftar Ekstrakurikuler';	

		// ambil daftar ekstrakurikuler
		$data['ekstrakurikuler'] = $this->db->get('ekstrakurikuler')->result();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('templates/frontend/topbar');
		$this->load->view('frontend/informasi/ekstrakurikuler');
		$this->load->view('templates/frontend/footer');
	}

}

/* End of file Informasi.php */
/* Location: ./application/controllers/frontend/Informasi.php */
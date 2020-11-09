<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct(){
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
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}
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

		// list jurusan
		$data['jurusan'] = $this->db->get('jurusan')->result();

		// var_dump($data['kajur']); exit();

		// info halaman aktif 
		$data['halaman'] = 'mapel';

		// judul web
		$data['judul'] = 'Mata Pelajaran';

		// ambil url aktif
		$data['url'] = $this->uri->segment_array();

		// ambil daftar ekstra
		$data['mapel'] = $this->db->get('mapel')->result();

		$this->load->view('templates/backend/header',$data);
		$this->load->view('templates/backend/sidebar');
		$this->load->view('backend/mapel/index');
		$this->load->view('templates/backend/footer');
	}

	public function tambahMapel()
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login','refresh');
		}

		// tangkap inputan
		$kode_mapel_with_space = $this->input->post('kode_mapel');
		$nama_mapel = $this->input->post('nama_mapel');
		$jurusan = $this->input->post('kode_jurusan');
		$kelas = $this->input->post('kode_kelas');

		$kode_mapel = trim(str_replace(" ", "_", $kode_mapel_with_space)); 

		// cek apakah kode  mapel ada di database
		$result = $this->db->get_where('mapel',['kode_mapel' => $kode_mapel])->result();

		if (!empty($result)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode mapel sudah ada.</div>');
		}else{
			$data = [
				'kode_mapel' => $kode_mapel,
				'nama_mapel' => $nama_mapel,
				'kode_jurusan' => $jurusan,
				'kode_kelas' => $kelas
			];


			// jika berhasil input
			if ($this->db->insert('mapel', $data)) {
				// flashdata
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Mata Pelajaran berhasil disimpan.</div>');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mata Pelajaran gagal disimpan.</div>');

			}
		}

		redirect('mapel','refresh');

	}

	public function editMapel($kode_mapel)
	{
		// siapkan data user yang aktif
		$data['user'] = $this->session->userdata();
		$id_user_aktif = $data['user']['user_id'];

		// ambil data user aktif
		$data['user'] = $this->ion_auth->user()->result_array();

		// dapatkan grup user saat ini
		$data['user_groups'] = $this->ion_auth->get_users_groups()->result();

		// list jurusan
		$data['jurusan'] = $this->db->get('jurusan')->result();
		
		// info halaman aktif 
		$data['halaman'] = 'mapel';

		// judul web
		$data['judul'] = 'Edit Mata Pelajaran';

		// ambil url aktif
		$data['url'] = $this->uri->segment_array();

		// ambil daftar ekstra
		$data['mapel'] = $this->db->get_where('mapel',['kode_mapel' => $kode_mapel])->result();

		$this->load->view('templates/backend/header',$data);
		$this->load->view('templates/backend/sidebar');
		$this->load->view('backend/mapel/edit');
		$this->load->view('templates/backend/footer');	
	}

	public function hapusMapel($kode_mapel)
	{
		$this->db->where('kode_mapel', $kode_mapel);
		$this->db->delete('mapel');
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mata Pelajaran berhasil dihapus.</div>');
		redirect('mapel','refresh');

	}

}

/* End of file Mapel.php */
/* Location: ./application/controllers/Mapel.php */
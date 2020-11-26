<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	///////////////////////
	//  MANAJEMEN KELAS  //
	///////////////////////
	///
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

		// info halaman aktif 
		$data['halaman'] = 'kelas';

		// judul web
		$data['judul'] = 'Daftar Kelas';

		// ambil url aktif
		$data['url'] = $this->uri->segment_array();

		// daftar kelas
		$data['kelas'] = $this->db->get('kelas')->result();

		// ambil data jurusan
		$data['jurusan'] = $this->db->query("SELECT nama_jurusan,kode_jurusan FROM jurusan")->result();

		$this->load->view('templates/backend/header',$data);
		$this->load->view('templates/backend/sidebar');
		$this->load->view('backend/kelas/index');
		$this->load->view('templates/backend/footer');
	}

	public function tambah_kelas()
	{
		$tingkat = $this->input->post('tingkat');
		$jurusan = $this->input->post('jurusan');
		$tag = strtoupper($this->input->post('tag'));
		$kelas = $tingkat." ".$jurusan." ".$tag;

		$is_added = $this->db->get_where('kelas',['kelas' => $kelas])->result();

		// validasi form
		if ($this->_rules($tingkat,$jurusan,$tag)) {
			// jika sukses maka cek apakah kelas sudah ada do database atau belum
			if (!empty($is_added)) {
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Kelas sudah terdaftar di Database.</div>');
			}else{
				// jika belum ada di db, maka masukan data kelas tsb 
				$data = [
					'tingkat' => $tingkat,
					'jurusan' => $jurusan,
					'tag' => $tag,
					'kelas' => $kelas
				];
				if ($this->db->insert('kelas', $data)) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelas berhasil ditambah.</div>');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kelas gagal ditambah.</div>');
				}
			}

		}else{
			// jika validasi gagal
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Harap isi semua data !</div>' ); 
		}
			redirect('kelas','refresh');

	}

	private function _rules($tingkat,$jurusan)
	{
		if (!empty($tingkat) && !empty($jurusan)) {
			return true;
		}

		return false;
	}

	public function edit_kelas()
	{

	}

	public function update_kelas()
	{
		
	}

	public function hapus_kelas()
	{

	}


}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */
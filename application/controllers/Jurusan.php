<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

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

		// list kajur
		$data['kajur'] = $this->db->query("SELECT users.first_name,users.last_name,groups.name FROM users,groups JOIN users_groups WHERE users_groups.user_id = users.id AND users_groups.group_id = groups.id AND groups.name='kajur'")->result();

		// var_dump($data['kajur']); exit();

		// info halaman aktif 
		$data['halaman'] = 'jurusan';

		// judul web
		$data['judul'] = 'Daftar Jurusan';

		// ambil url aktif
		$data['url'] = $this->uri->segment_array();

		// ambil daftar ekstra
		$data['jurusan'] = $this->db->get('jurusan')->result();

		$this->load->view('templates/backend/header',$data);
		$this->load->view('templates/backend/sidebar');
		$this->load->view('backend/jurusan/index');
		$this->load->view('templates/backend/footer');
	}

	public function tambahJurusan()
	{

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login','refresh');
		}

		// tangkap inputan
		$kode_jurusan = $this->input->post('kode_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');
		$kajur = $this->input->post('kajur');

		// ambil daftar koide jurusan
		$jurusan = $this->db->get_where('jurusan',['kode_jurusan' => $kode_jurusan])->result();
		// ambil data kajur
		$kepala_jurusan = $this->db->get_where('jurusan',['kajur' => $kajur])->result();
		
		// var_dump($jurusan); exit();
		// cek apakah kode jurusan dan kajur sudah ada ditabase atau belum
		if (!empty($jurusan)) {
			// jika sudah , maka jangan masukan ke database
			// flashdata
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode jurusan sudah terdaftar pada sistem.</div>');
		}elseif(!empty($kepala_jurusan)){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kepala jurusan sudah terdaftar.</div>');
		}else{
			// jika tidak masukan ke database
			$data = [
				'kode_jurusan' => $kode_jurusan,
				'nama_jurusan' => $nama_jurusan,
				'kajur' => $kajur
			];

			// jika berhasil input
			if ($this->db->insert('jurusan', $data)) {
				// flashdata
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Jurusan berhasil disimpan.</div>');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jurusan gagal disimpan.</div>');

			}
		}
		// redirect ke jurusan
		redirect('jurusan','refresh');
	}

	public function hapusJurusan($kode_jurusan)
	{
		$this->db->where('kode_jurusan', $kode_jurusan);
		$this->db->delete('jurusan');
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jurusan berhasil dihapus.</div>');
		redirect('jurusan','refresh');

	}

}

/* End of file Jurusan.php */
/* Location: ./application/controllers/Jurusan.php */
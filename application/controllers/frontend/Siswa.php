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

	/**
	 * @param int|string|bool $id
	 *
	 * @return bool Whether the user is an siswa
	 * @author Rizal Fathur Rahman
	 */
	public function is_siswa($id = FALSE)
	{
		// dapatkan grup user saat ini
		$user_groups = $this->ion_auth->get_users_groups()->result();
		if ($user_groups[0]->name == 'Siswa') {
			return true;
		}else{
			return false;
		}
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

		// jika user belum terdaftar sebagai siswa
		if (empty($result)) {
			$data['result'] = null;
		}else{
			$data['result'] = $result[0];
		}

		// var_dump($data); exit();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('templates/frontend/topbar');
		$this->load->view('frontend/siswa');
		$this->load->view('templates/frontend/footer');
	}

	public function tambah_siswa()
	{
		$data['halaman'] = "tambah siswa";

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
		$data['judul'] = 'Tambah Siswa';

		// ambil detail siswa
		$query = "SELECT * FROM siswa,orangtua WHERE siswa.nis = orangtua.nis AND siswa.nama_siswa = '$nama_siswa'";
		$result = $this->db->query($query)->result();

		// jika user belum terdaftar sebagai siswa
		if (empty($result)) {
			$data['result'] = null;
		}else{
			$data['result'] = $result[0];
		}

		$data['user'] = $this->ion_auth->user()->row();

		// data kelas
		$data['kelas'] = $this->db->get('kelas')->result();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('templates/frontend/topbar');
		$this->load->view('frontend/tambah_siswa');
		$this->load->view('templates/frontend/footer');
	}

	private function _new_img_name($foto)
	{
		$this->load->helper('string');
		//pecah gambar orangtua
		$pecah_gambar = explode('.', $foto);
		$nama_gambar = random_string('alnum',8);
		$ekstensi = $pecah_gambar[1];

		$new_img_name = $nama_gambar.".".$ekstensi;
		return $new_img_name;
	}

	public function tambah_siswa_aksi()
	{
		$nis = $this->input->post('nis');
		$nisn = $this->input->post('nisn');
		$nama_siswa = $this->input->post('nama_siswa');
		$tempat_tgl_lahir = $this->input->post('tempat_tgl_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$agama = $this->input->post('agama');
		$kelas = $this->input->post('kelas');
		$alamat_siswa = $this->input->post('alamat_siswa');
		$foto_siswa = $_FILES['foto']['name'];
		$lulus = 0;
		$point = 100;
		$telepon = $this->input->post('telepon_siswa');
		$nama_img_siswa = $this->_new_img_name($foto_siswa);

		$nama_orangtua = $this->input->post('nama');
		$telepon_orangtua = $this->input->post('telepon');
		$alamat_orangtua = $this->input->post('alamat');
		$is_wali = $this->input->post('is_wali');
		// $foto_orangtua =  $_FILES['foto_ortu']['name'];
		$pekerjaan_orangtua = $this->input->post('pekerjaan');
		// $nama_img_orangtua = $this->_new_img_name($foto_orangtua);

		$nis_is_added = $this->db->get_where('siswa',['nis' => $nis])->result();
		$nisn_is_added = $this->db->get_where('siswa',['nisn' => $nisn])->result();

		// cek apakah nis / nisn sudah terdaftar
		if (!empty($nis_is_added)) {
			// jika sudah ada langsung lempar ke halaman tambah siswa
			$this->session->set_flashdata("pesan","<div class='alert alert-danger'>NIS sudah terdaftar!</div>");
			redirect('frontend/siswa/tambah_siswa','refresh');
		}elseif(!empty($nisn_is_added)){
			// jika sudah ada langsung lempar ke halaman tambah siswa
			$this->session->set_flashdata("pesan","<div class='alert alert-danger'>NISN sudah terdaftar!</div>");
			redirect('frontend/siswa/tambah_siswa','refresh');
		}else{
			// if ($this->_do_upload($foto_siswa,$nama_img_siswa) && $this->_do_upload($foto_orangtua,$nama_img_orangtua) ) {
			if ($this->_do_upload($foto_siswa,$nama_img_siswa)) {

				$data_siswa = [
					'nis' => $nis,
					'nisn' => $nisn,
					'nama_siswa' => $nama_siswa,
					'tempat_tgl_lahir' => $tempat_tgl_lahir,
					'jenis_kelamin' => $jenis_kelamin,
					'agama' => $agama,
					'kelas' => $kelas,
					'alamat_siswa' => $alamat_siswa,
					'foto_siswa' => $nama_img_siswa,
					'lulus' => $lulus,
					'point' => $point,
					'telepon_siswa' => $telepon,
				];

				$data_ortu = [
					'nama' => $nama_orangtua,
					'telepon' => $telepon_orangtua,
					'alamat' => $alamat_orangtua,
					'is_wali' => $is_wali,
					'nis' => $nis,
					// 'foto' => $nama_img_orangtua ,
					'foto' => null ,
					'pekerjaan' => $pekerjaan_orangtua,

				];
				if ($this->db->insert('siswa', $data_siswa)) {
					if ( $this->db->insert('orangtua', $data_ortu)) {
						$this->session->set_flashdata("pesan","<div class='alert alert-success'>Data berhasil dikirm!</div>");	
					}else{
						$this->session->set_flashdata("pesan","<div class='alert alert-danger'>Data gagal dikirm!</div>");	
					}
				}

			}
		}

		redirect('frontend/siswa','refresh');
	}

	private function _do_upload($foto,$file_name)
	{
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '2048';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name'] = $file_name;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger">','</div>'));
			$this->session->set_flashdata('message', $error);
			redirect('frontend/siswa/tambah_siswa','refresh');
		}

		return true;

	}

	public function edit($nis)
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

		// data kelas
		$data['kelas'] = $this->db->get('kelas')->result();

		// judul web
		$data['judul'] = 'Edit Profil';

		// ambil detail siswa
		$query = "SELECT * FROM siswa,orangtua WHERE siswa.nis = orangtua.nis AND siswa.nama_siswa = '$nama_siswa'";
		$detail = $this->db->query($query)->result();

		// jika user belum terdaftar sebagai siswa
		if (empty($detail)) {
			$data['detail'] = null;
		}else{
			$data['detail'] = $detail[0];
		}

		// var_dump($data); exit();

		$this->load->view('templates/frontend/header',$data);
		$this->load->view('templates/frontend/topbar');
		$this->load->view('frontend/edit_siswa');
		$this->load->view('templates/frontend/footer');
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/frontend/Siswa.php */
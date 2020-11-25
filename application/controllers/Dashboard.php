<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['halaman'] = 'dashboard';

		// judul web
		$data['judul'] = 'Dashboard ';

		// ambil url aktif
		$data['url'] = $this->uri->segment_array();

		// atur notif muncul hanya jika dari login
		if ($this->session->flashdata('message') != null) {
			$data['notification'] ="<script>
				$(document).ready(function(){
					const Toast = Swal.mixin({
				     toast: true,
				     position: 'top-end',
				     showConfirmButton: false,
				     timer: 3000
					});
					 toastr.success('Login Berhasil.')
				});

			</script>";
			
		}

		// informasi landing page
		$data['landing_page'] = $this->db->get('landing_page')->result();

		$this->load->view('templates/backend/header',$data);
		$this->load->view('templates/backend/sidebar');
		$this->load->view('backend/index');
		$this->load->view('templates/backend/footer');
	}

	public function informasi($status,$id)
	{
		if ($status == 'draft') {
			$result = $this->db->query("UPDATE `landing_page` SET `is_tampil` = '0' WHERE `landing_page`.`id` = $id;");
			if ($result) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Informasi berhasil draft (disembunyikan).</div>');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Informasi gagal dipublish.</div>');
			}
		}elseif($status == 'show'){
			$result = $this->db->query("UPDATE `landing_page` SET `is_tampil` = '1' WHERE `landing_page`.`id` = $id;");
			if ($result) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Informasi berhasil dipublish.</div>');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Informasi gagal disembunyikan (di draft).</div>');
			}
		}


		redirect('dashboard','refresh');
	}

	public function tambah_informasi()
	{
		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('is_tampil', 'is_tampil', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'judul' => $this->input->post('judul'),
				'is_tampil' => $this->input->post('is_tampil'),
				'keterangan' => $this->input->post('keterangan'),
			];
			$result = $this->db->insert('landing_page', $data);
			if ($result) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">Informasi berhasil disimpan.</div>');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Informasi gagal disimpan.</div>');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Informasi gagal disimpan. Semua data harus diisi !</div>');	
		}

		redirect('dashboard','refresh');

	}

	public function edit_landing_page($id)
	{
		// siapkan data user yang aktif
		$data['user'] = $this->session->userdata();
		$id_user_aktif = $data['user']['user_id'];

		// ambil data user aktif
		$data['user'] = $this->ion_auth->user()->result_array();

		// dapatkan grup user saat ini
		$data['user_groups'] = $this->ion_auth->get_users_groups()->result();

		// info halaman aktif 
		$data['halaman'] = 'dashboard';

		// judul web
		$data['judul'] = 'Edit Informasi';

		// ambil url aktif
		$data['url'] = $this->uri->segment_array();

		// informasi landing page
		$landing_page = $this->db->get_where('landing_page',['id' => $id])->result();
		$data['landing_page'] = $landing_page[0];

		$this->load->view('templates/backend/header',$data);
		$this->load->view('templates/backend/sidebar');
		$this->load->view('backend/edit_landing_page');
		$this->load->view('templates/backend/footer');
	}

	public function update_informasi()
	{
		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('is_tampil', 'is_tampil', 'trim|required');

		$id = $this->input->post('id');

		// data lama
		$judul_old = $this->input->post('judul_old');
		$keterangan_old = $this->input->post('keterangan_old');
		$is_tampil_old = $this->input->post('is_tampil_old');

		$data_old = [
			'judul' => $judul_old,
			'keterangan' => $keterangan_old,
			'is_tampil' => $is_tampil_old,
		];

		// data baru
		$judul = $this->input->post('judul');
		$keterangan = $this->input->post('keterangan');
		$is_tampil = $this->input->post('is_tampil');

		$data_new = [
			'judul' => $judul,
			'keterangan' => $keterangan_old,
			'is_tampil' => $is_tampil
		];

		////////////////////////////////
		// cek apakah validasi lancar //
		////////////////////////////////
		if ($this->form_validation->run() == TRUE) { 
		// jika iya
			// cek apakah ada yang diganti 
			if ($this->_is_edit($data_old,$data_new)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Tidak ada informasi yang diubah.</div>');
			}else{
				// jika ada diganti maka update database
				if ($this->_update($id,$data_new)) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Informasi berhasi diupdate.</div>');				
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Informasi gagal diupdate.</div>');				
				}
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Harap isi data dengam benar.</div>');
			redirect('dashboard/edit_landing_page/'.$id,'refresh');
		}

		redirect('dashboard','refresh');

	}

	private function _is_edit($old,$new)
	{
		$judul_old = $old['judul'];
		$keterangan_old = $old['keterangan'];
		$is_tampil_old = $old['is_tampil'];

		$judul = $new['judul'];
		$keterangan = $new['keterangan'];
		$is_tampil = $new['is_tampil'];

		// tak ada data yang diedit, return TRUE
		if ($judul_old == $judul && $keterangan_old == $keterangan && $is_tampil_old == $is_tampil) {
			return true;			
		}else{
			return false;
		}
	}

	private function _update($id,$data)
	{
		$this->db->where('id', $id);
		return $this->db->update('landing_page', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
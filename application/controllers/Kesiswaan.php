<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesiswaan extends CI_Controller {

	public function index()
	{
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
		else
		{
			// siapkan data user yang aktif
			$data['user'] = $this->session->userdata();
			$id_user_aktif = $data['user']['user_id'];
			
			// ambil data user aktif
			$data['user'] = $this->ion_auth->user()->result_array();

			// dapatkan grup user saat ini
			$data['user_groups'] = $this->ion_auth->get_users_groups()->result();

			// info halaman aktif 
			$data['halaman'] = 'kesiswaan';

			// judul web
			$data['judul'] = 'Manajemen Kesiswaan ';

			// data url
			$data['url'] = $this->uri->segment_array();

			// ambil data profil kesiswaan
			$data['profil_kesiswaan'] = $this->kesiswaan->getProfilKesiswaan();

			$this->load->view('templates/backend/header',$data);
			$this->load->view('templates/backend/sidebar');
			$this->load->view('backend/kesiswaan/index');
			$this->load->view('templates/backend/footer');
		}
	}

	public function setProfilKesiswaan()
	{
		// tangkap inputan 
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$keterangan = $this->input->post('keterangan');

		// masukan inputan kedalam var data
		$data = [
			'id' => (int)$id,
			'judul' => $judul,
			'keterangan' => $keterangan

		];

		// masukan id ke variable where
		$where = ['id' => $id];

		// if ($this->ion_auth->is_WKS4()) {
		// 	echo 'aku wks 4';
		// 	exit();
		// }

		// cek apakah yang menginput yang punya akses
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		// update profil
		$result = $this->kesiswaan->updateProfilKesiswaan($data);
		// var_dump($result);exit();
		// isi pesan jika berhasil
		if ($result === true) {
			$this->session->set_flashdata('message',' <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fas fa-check">Profil berhasil diperbarui.
                </div>');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger">
                  Profil gagal diperbarui!
                </div>');
		}
		redirect('kesiswaan','refresh');
		
	}
	

}

/* End of file Kesiswaan.php */
/* Location: ./application/controllers/Kesiswaan.php */
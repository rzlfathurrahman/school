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
			$data['halaman'] = 'admin/kesiswaan';

			// judul web
			$data['judul'] = 'Manajemen Kesiswaan ';

			$this->load->view('templates/backend/header',$data);
			$this->load->view('templates/backend/sidebar');
			$this->load->view('backend/kesiswaan/index');
			$this->load->view('templates/backend/footer');
		}
	}

}

/* End of file Kesiswaan.php */
/* Location: ./application/controllers/Kesiswaan.php */
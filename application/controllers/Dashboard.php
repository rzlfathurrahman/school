<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $data = [];

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

		$this->load->view('templates/backend/header',$data);
		$this->load->view('templates/backend/sidebar');
		$this->load->view('backend/index');
		$this->load->view('templates/backend/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
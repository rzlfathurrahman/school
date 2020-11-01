<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikuler extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
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
		$data['halaman'] = 'ekstrakurikuler';

		// judul web
		$data['judul'] = 'Ekstrakurikuler';

		// ambil url aktif
		$data['url'] = $this->uri->segment_array();

		// ambil daftar ekstra
		$data['ekstrakurikuler'] = $this->db->get('ekstrakurikuler')->result();

		$this->load->view('templates/backend/header',$data);
		$this->load->view('templates/backend/sidebar');
		$this->load->view('backend/ekstrakurikuler/index');
		$this->load->view('templates/backend/footer');
	}

	public function tambahEkstrakurikuler()
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

		$this->form_validation->set_rules('nama_ekstrakurikuler', 'nama_ekstrakurikuler', 'trim|required');
		$this->form_validation->set_rules('kode_ekstrakurikuler', 'kode_ekstrakurikuler', 'trim|required');
		$this->form_validation->set_rules('pembimbing', 'pembimbing', 'trim|required');
		$this->form_validation->set_rules('jadwal', 'jadwal', 'trim|required');

		if ($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$nama_ekstrakurikuler = $this->input->post("nama_ekstrakurikuler");
			$kode_ekstrakurikuler = $this->input->post("kode_ekstrakurikuler");
			$pembimbing = $this->input->post("pembimbing");
			$jadwal = $this->input->post("jadwal");

			$data = [
				'nama_ekstrakurikuler' => $nama_ekstrakurikuler,
				'kode_ekstrakurikuler' => $kode_ekstrakurikuler,
				'pembimbing' => $pembimbing,
				'jadwal' => $jadwal,
			];
			if ($this->db->insert('ekstrakurikuler', $data) === TRUE){
				$this->session->set_flashdata('message',' <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 Ekstrakurikuler berhasil ditambah.
                </div>');
			}else{
				$this->session->set_flashdata('message',' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 Ekstrakurikuler gagal ditambah.
                </div>');
			}
			redirect('ekstrakurikuler','refresh');	
		}
	}

}

/* End of file Ekstrakurikuler.php */
/* Location: ./application/controllers/Ekstrakurikuler.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller{

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
        $data['halaman'] = 'guru';

        // judul web
        $data['judul'] = 'Daftar Guru';

        // ambil url aktif
        $data['url'] = $this->uri->segment_array();

        // ambil daftar guru
        $data['guru'] = $this->db->get('guru')->result();

        // ambil data guru di tabel user
        $query = "SELECT users.first_name,users.last_name,groups.name 
                    FROM users,groups JOIN users_groups 
                    WHERE users_groups.user_id = users.id 
                    AND users_groups.group_id = groups.id
                     AND groups.name='guru'";
        $data['guru_users'] = $this->db->query($query)->result();

        // data mapel
        $data['mapel'] = $this->db->get('mapel')->result();

        $this->load->view('templates/backend/header',$data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/guru/index');
        $this->load->view('templates/backend/footer');
    }

    public function tambahGuru()
    {
        $kelas ='';
        $kode_mapel ='';
        $role ='';

        $this->form_validation->set_rules('nip', 'nip', 'trim');
        $this->form_validation->set_rules('nama_guru', 'nama_guru', 'trim|required');
        $this->form_validation->set_rules('kode_mapel[]', 'kode Mapel', 'trim|required');
        $this->form_validation->set_rules('kelas[]', 'Kelas', 'trim|required');
        $this->form_validation->set_rules('role[]', 'Kategori', 'trim|required');

        for ($i = 0; $i < count($this->input->post('kelas')) ; $i++) {
            $kelas.=  $this->input->post('kelas')[$i]. ($i < count($this->input->post('kelas')) - 1 ? "," : "" );
        }

        for ($i = 0; $i < count($this->input->post('kode_mapel')) ; $i++) {
            $kode_mapel.=  $this->input->post('kode_mapel')[$i]. ($i < count($this->input->post('kode_mapel')) - 1 ? "," : "" );
        }

        for ($i = 0; $i < count($this->input->post('role')) ; $i++) {
            $role.=  $this->input->post('role')[$i]. ($i < count($this->input->post('role')) - 1 ? "," : "" );
        }

        $guru = $this->db->get_where('guru',['nama_guru' => $this->input->post('nama_guru')])->result();

        if ($this->form_validation->run() == TRUE) {
            if (!empty($guru)) {
                // jika  guru sudah terdaftar , maka jangan masukan ke database
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'. $this->input->post('nama_guru') .' sudah terdaftar pada sistem.</div>');
                redirect('guru','refresh');
            }
            $data = [
                'nip' => $this->input->post('nip'),
                'nama_guru' => $this->input->post('nama_guru'),
                'kode_mapel' => $kode_mapel,
                'kelas' =>  $kelas,
                'role' =>  $role,

            ];
            $this->db->insert('guru', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data guru berhasil ditambah.</div>');
        } else {
            $this->session->set_flashdata('message', validation_errors());
        }
        redirect('guru','refresh');
    }

    public function editGuru($id = null)
    {
      $query = $this->db->get_where('guru',['id' => $id]);
      if ($id == null) {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tidak ada adata yang dipilih.</div>');
        redirect('guru','refresh');
      }else{
        if($query->num_rows() == 1 ) {
            // siapkan data user yang aktif
            $data['user'] = $this->session->userdata();
            $id_user_aktif = $data['user']['user_id'];

            // ambil data user aktif
            $data['user'] = $this->ion_auth->user()->result_array();

            // dapatkan grup user saat ini
            $data['user_groups'] = $this->ion_auth->get_users_groups()->result();

            // info halaman aktif 
            $data['halaman'] = 'guru';

            // judul web
            $data['judul'] = 'Edit Guru';

            // ambil url aktif
            $data['url'] = $this->uri->segment_array();

            // ambil data guru di tabel user
            $query = "SELECT users.first_name,users.last_name,groups.name 
                        FROM users,groups JOIN users_groups 
                        WHERE users_groups.user_id = users.id 
                        AND users_groups.group_id = groups.id
                         AND groups.name='guru'";
            $data['guru_users'] = $this->db->query($query)->result();

            // data mapel
            $data['mapel'] = $this->db->get('mapel')->result();

            // data guru yg akan diedit
            $data['guru'] = $this->db->get_where('guru',['id' => $id])->result();

            $this->load->view('templates/backend/header',$data);
            $this->load->view('templates/backend/sidebar');
            $this->load->view('backend/guru/edit');
            $this->load->view('templates/backend/footer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data guru tidak ditemukan.</div>');
            redirect('guru','refresh');
        }
      }
    }

    public function updateGuru()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login','refresh');
        }
    }

    public function hapusGuru($id = null)
    {
        $query = $this->db->get_where('guru',['id' => $id]);
        if ($id != null) {
            if ($query->num_rows() > 0 ) {
                $this->db->where('id', $id);
                $this->db->delete('guru');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data guru berhasil dihapus.</div>');
            }elseif($query->num_rows() == 0){
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data dengan id '. $id .' tidak ditemukan.</div>');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda tidak menghapus data apapun.</div>');
        }
        redirect('guru','refresh');
    }

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */
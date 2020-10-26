<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesiswaan_model extends CI_Model {

	public function getProfilKesiswaan()
	{
		return $this->db->get('profil_kesiswaan')->result();
	}

}

/* End of file Kesiswaan_model.php */
/* Location: ./application/models/Kesiswaan_model.php */
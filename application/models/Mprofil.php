<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mprofil extends CI_Model
{

	function __construct()
	{
        parent::__construct();
	}


	public function Mlihat_profil()
	{
		$profil = $this->db->query("SELECT * FROM admin")->result();
		return $profil;
	}

	public function Mubah_profil()
	{
		$ubah_profil = $this->db->query("SELECT * FROM admin where id_admin='1'")->result();
		return $ubah_profil;
	}

	public function Msimpan_profil($id_admin,$data)
	{
		
		$this->db->where('id_admin',$id_admin);
		$simpan_profil = $this->db->update('admin',$data);
		

		if ($simpan_profil)
		{
			redirect('Profil/index/'.'?update=1','refresh');
		}

		else

		{
			redirect('Profil/index/'.'?update=2','refresh');
		}
	}

}

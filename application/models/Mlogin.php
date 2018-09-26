<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	function __construct()
	{
        parent::__construct();
	}


	//MODEL UNNTUK LOGIN MANAGGIL TABLE USSERS
	function getlogin($username,$password)
	{
		if($username !='' && $password !='')
		{
			//$pass = md5($password);
			$pass = $password;

			$this->db->where("username",$username);
			$this->db->where("password",$pass);
			// $this->db->where("status=0");
			$query = $this->db->get("admin");
			
			if($query->num_rows() > 0){
				 
				foreach($query->result() as $row){
					$user = array(
					"username" => $row->username);
					$this->session->set_userdata($user);
					redirect('Beranda');
				}
			}

			else 
			{
				// Jika username atau password tidak sama
				redirect('Login');
			}

		}

		else 

		{
			// Jika username atau password kosong 
			redirect('Login');
		}
		
	}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdetailhari extends CI_Model
{

	public function proses_tampil()
	{
		$sql = $this->db->get('ismet_post');
		return $sql;
	}
 
	public function get_detail($id = NULL)
	{
		$query = $this->db->get_where('ismet_post', array('slug' => $id))->row();
		return $query;
	}

} 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mo_wilayah extends CI_Model
{
	public function provinces()
	{
		return $this->db->query("SELECT  * FROM provinces ORDER BY name ASC")->result_array();
	}
	
	public function get_regencies($id_provinces)
	{
		return $this->db->query("SELECT  * FROM regencies WHERE province_id =$id_provinces ORDER BY name ASC")->result_array();
	}
	
	public function get_city($id_regencies)
	{
		return $this->db->query("SELECT  * FROM districts WHERE regency_id =$id_regencies ORDER BY name ASC")->result_array();
	}
	
	public function get_dist($id_district)
	{
		return $this->db->query("SELECT  * FROM villages WHERE district_id =$id_district ORDER BY name ASC")->result_array();
	}
	
}

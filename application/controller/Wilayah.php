<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends Guess_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mo_wilayah');
		$this->data['csrf_name'] = $this->security->get_csrf_token_name();
		$this->data['csrf_hash'] = $this->security->get_csrf_hash();
	}

	public function index()
	{
		$this->data['provinces'] = $this->mo_wilayah->provinces();
		
		$this->load->view('wilayah');
	}

	public function kota($id_provinces = '')
	{
		if($id_provinces == ''){
		     exit;
		}else{
		     $getcity = $this->mo_wilayah->get_regencies($id_provinces);
		     foreach ($getcity as $data) {
		          echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
		     }
		     exit;    
		}
	}
	
	public function kecamatan($id_regencies = '')
	{
		if($id_regencies == ''){
		     exit;
		}else{
		     $getcity = $this->mo_wilayah->get_city($id_regencies);
		     foreach ($getcity as $data) {
		          echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
		     }
		     exit;    
		}
	}
		

	public function kelurahan($id_district = '')
	{
		if($id_district == ''){
		     exit;
		}else{
		     $getcity = $this->mo_wilayah->get_dist($id_district);
		     foreach ($getcity as $data) {
		          echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
		     }
		     exit;    
		}
		
	}
	
}

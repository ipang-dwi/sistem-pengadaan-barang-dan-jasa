<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$this->session->set_userdata('option','survey');
			$crud = new grocery_CRUD();
			//$crud->set_theme('datatables');
			//$crud->set_language('indonesian');
			$crud->set_table('survey');
			$crud->set_subject('Survey');
			$crud->set_relation('nama_MD','md','nama_MD');
			$crud->set_relation('lokasi_toko','lokasi_toko','lokasi_toko');
			$crud->set_relation('posisi_toko','posisi_toko','posisi_toko');
			$crud->set_relation('sekitar_toko','sekitar_toko','sekitar_toko');
			$crud->set_relation('luasan_toko','luasan_toko','luasan_toko');
			$crud->set_relation('kondisi_depan_toko','kdt','kondisi_depan_toko');
			$crud->set_relation('jual_product_gyproc','jpg','jpg');
			$crud->set_relation('shopsign_gyproc','sg','sg');
			$crud->set_field_upload('pic_sekitar_toko','assets/uploads/pics');
			$crud->set_field_upload('pic_dalam_toko','assets/uploads/pics');
			$crud->set_field_upload('pic_depan_toko','assets/uploads/pics');
			$crud->set_field_upload('pic_shopsign_other','assets/uploads/pics');
			$crud->set_field_upload('pic_shopsign_gyproc','assets/uploads/pics');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	public function md()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','MD');
			$crud = new grocery_CRUD();
			$crud->set_table('md');
			$crud->set_subject('MD');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function lokasi_toko()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','lokasi toko');
			$crud = new grocery_CRUD();
			$crud->set_table('lokasi_toko');
			$crud->set_subject('Lokasi Toko');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function posisi_toko()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','posisi toko');
			$crud = new grocery_CRUD();
			$crud->set_table('posisi_toko');
			$crud->set_subject('Posisi Toko');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function sekitar_toko()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','sekitar toko');
			$crud = new grocery_CRUD();
			$crud->set_table('sekitar_toko');
			$crud->set_subject('Sekitar Toko');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function luasan_toko()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','luasan toko');
			$crud = new grocery_CRUD();
			$crud->set_table('luasan_toko');
			$crud->set_subject('Luasan Toko');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function kondisi_depan_toko()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','kondisi depan toko');
			$crud = new grocery_CRUD();
			$crud->set_table('kdt');
			$crud->set_subject('Kondisi Depan Toko');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function jpg()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$crud = new grocery_CRUD();
			$crud->set_table('jpg');
			$crud->set_subject('Jual Product Gyproc');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function sg()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$crud = new grocery_CRUD();
			$crud->set_table('sg');
			$crud->set_subject('Shopsign Gyproc');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function user(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','user');
			$crud = new grocery_CRUD();
			$crud->set_table('user');
			$crud->display_as('job_title','Job Title');
			$crud->set_subject('User');
			//$crud->required_fields('username','password','pic');
			$crud->set_field_upload('pic','assets/uploads/pics');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function raport($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$query = $this->db->query('SELECT * FROM pekerjaan where id_user='.$idr.';');
			$data['raport'] = $query->result();
			$this->load->view('raport.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function profile(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$this->session->set_userdata('option','profile');
			$crud = new grocery_CRUD();
			$crud->set_table('user');
			$crud->unset_add()
				 ->unset_delete()
				 ->unset_print()
				 ->unset_export();
			$crud->where('username',$this->session->userdata('username'));
			$crud->display_as('job_title','Job Title');
			$crud->set_subject('User');
			$crud->required_fields('username','password','pic');
			$crud->set_field_upload('pic','assets/uploads/pics');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function _example_output($output = null)
	{
		$this->load->view('lte.php',$output);
	}
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
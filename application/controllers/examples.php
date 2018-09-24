<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',$output);
	}
	
	public function survey()
	{
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
	
	public function pekerjaan()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('pekerjaan');
		$crud->set_subject('Pekerjaan');
		$crud->set_relation('peserta1','rekanan','rekanan');
		$crud->set_relation('peserta2','rekanan','rekanan');
		$crud->display_as('peserta1','Peserta 1')
			 ->display_as('peserta2','Peserta 2');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function uraian()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('uraian');
		$crud->set_subject('uraian');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function pbj()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('pbj');
		$crud->set_subject('PBJ');
		$crud->set_relation('pejabat_komitmen','pejabat','nama')
			 ->set_relation('pejabat_pengadaan','pejabat','nama')
			 ->set_relation('pejabat_penerima','pejabat','nama');
		$crud->set_relation('id_pekerjaan','pekerjaan','kegiatan');
		$crud->display_as('pejabat_komitmen','Pejabat Pembuat Komitmen')
			 ->display_as('pejabat_pengadaan','Pejabat Pengadaan')
			 ->display_as('skkpa_pejabat','SKKPA Pejabat')
			 ->display_as('skkpa_panitia','SKKPA Panitia')
			 ->display_as('id_pekerjaan','Kegiatan')
			 ->display_as('sumber_dana','Sumber Dana')
			 ->display_as('dipa','DIPA')
			 ->display_as('nomer_dipa','Nomer Dipa')
			 ->display_as('pejabat_penerima','Pejabat Penerima');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function surat()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('surat');
		$crud->set_subject('Surat');
		$crud->set_relation('id_pekerjaan','pekerjaan','kegiatan');
		$crud->display_as('id_pekerjaan','Kegiatan');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function pejabat()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('pejabat');
		$crud->set_subject('Pejabat');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function rekanan()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('rekanan');
		$crud->set_subject('Rekanan');
		$crud->display_as('rekanan','Nama Perusahaan')
			 ->display_as('sub_bidang','Sub Bidang')
			 ->display_as('no_rek','Nomer Rekening')
			 ->display_as('nama_pemilik1','Nama Pemilik 1')
			 ->display_as('jabatan1','Jabatan')
			 ->display_as('kepemilikan1','Kepemilikan')
			 ->display_as('no_ktp1','KTP')
			 ->display_as('alamat_pemilik1','Alamat')
			 ->display_as('nama_pemilik2','Nama Pemilik 2')
			 ->display_as('jabatan2','Jabatan')
			 ->display_as('kepemilikan2','Kepemilikan')
			 ->display_as('no_ktp2','KTP')
			 ->display_as('alamat_pemilik2','Alamat')
			 ->display_as('nama_akta','Nama Akta')
			 ->display_as('tgl_akta','Tgl Akta')
			 ->display_as('no_akta','Nomer Akta')
			 ->display_as('no_siup','Nomer SIUP')
			 ->display_as('no_tdp','Nomer TDP')
			 ->display_as('tgl_berlaku','Tgl Berlaku')
			 ->display_as('masa_berlaku','Masa Berlaku')
			 ->display_as('pemberi_ijin','Instansi Pemberi Ijin')
			 ->display_as('npwp','NPWP')
			 ->display_as('bukti_pelunasan','Bukti Pelunasan');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function item()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('harga');
		$crud->set_subject('Item');
		$crud->set_relation('id_pekerjaan','pekerjaan','kegiatan');
		$crud->display_as('id_pekerjaan','Kegiatan');
		$crud->display_as('harga_p1','Harga P1');
		$crud->display_as('harga_p2','Harga P2');
		$crud->display_as('harga_nego','Harga Nego');
		$crud->display_as('hps','HPS');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function lokasi_toko()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('lokasi_toko');
		$crud->set_subject('Lokasi Toko');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function posisi_toko()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('posisi_toko');
		$crud->set_subject('Posisi Toko');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function sekitar_toko()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('sekitar_toko');
		$crud->set_subject('Sekitar Toko');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function luasan_toko()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('luasan_toko');
		$crud->set_subject('Luasan Toko');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function kondisi_depan_toko()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('kdt');
		$crud->set_subject('Kondisi Depan Toko');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function jpg()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('jpg');
		$crud->set_subject('Jual Product Gyproc');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function sg()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('sg');
		$crud->set_subject('Shopsign Gyproc');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function user(){
		//if($this->session->userdata('logged_in')!=""){
			//$this->session->set_userdata('option','user');
			$crud = new grocery_CRUD();
			$crud->set_table('user');
			$crud->display_as('job_title','Job Title');
			$crud->set_subject('User');
			//$crud->required_fields('username','password','pic');
			$crud->set_field_upload('pic','assets/uploads/pics');
			$output = $crud->render();

			$this->_example_output($output);
		//}
		//else
			//header('location:'.base_url().'');
	}
	
	public function project()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('project');
		$crud->set_subject('Project');
		$crud->required_fields('project');
		$output = $crud->render();

		$this->_example_output($output);
	}

	public function type()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('type');
		$crud->set_subject('Type');
		$crud->required_fields('type');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function part()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('part');
		$crud->set_subject('Part');
		$crud->required_fields('part');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function status()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('status');
		$crud->set_subject('Status');
		$crud->required_fields('status');
		$output = $crud->render();

		$this->_example_output($output);
	}
	
	public function task()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('task');
			$crud->set_subject('Task');
			$crud->set_relation('id_project','project','project')
				 ->set_relation('id_type','type','type')
				 ->set_relation('id_part','part','part')
				 ->set_relation('id_status','status','status');
			$crud->display_as('id_project','Project')
				 ->display_as('id_part','Part')
				 ->display_as('id_type','Type')
				 ->display_as('id_status','Status');
			$crud->required_fields('id_project','task','id_part','id_type','id_status');
			$output = $crud->render();

			$this->_example_output($output);
	}
	
	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
}
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
			$this->session->set_userdata('option','dashboard');
			$crud = new grocery_CRUD();
			//$crud->set_theme('datatables');
			//$crud->set_language('indonesian');
			$crud->set_table('pekerjaan');
			$crud->set_subject('Pekerjaan');
			$crud->set_relation('peserta1','rekanan','rekanan');
			$crud->set_relation('peserta2','rekanan','rekanan');
			$crud->set_relation('type','type','type');
			$crud->display_as('peserta1','Peserta 1')
				 ->display_as('peserta2','Peserta 2')
				 ->display_as('mak','MAK')
				 ->display_as('lmak','Long MAK')
				 ->display_as('pagu','PAGU');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	public function pejabat()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','pejabat');
			$crud = new grocery_CRUD();
			$crud->set_table('pejabat');
			$crud->set_subject('Pejabat');
			$crud->display_as('nip','NIP');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function pbj()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','PBJ');
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
		else
			header('location:'.base_url().'');
	}
	
	public function surat()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','surat');
			$crud = new grocery_CRUD();
			$crud->set_table('surat');
			$crud->set_subject('Surat');
			$crud->set_relation('id_pekerjaan','pekerjaan','kegiatan')
				 ->set_relation('uraian','uraian','uraian');
			$crud->display_as('id_pekerjaan','Kegiatan');
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function rekanan()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','rekanan');
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
		else
			header('location:'.base_url().'');
	}
	
	public function item()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','item');
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
		else
			header('location:'.base_url().'');
	}
	
	public function pekerjaan()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!="" && $this->session->userdata('jt')=="admin"){
			$this->session->set_userdata('option','pekerjaan');
			$crud = new grocery_CRUD();
			$crud->set_table('pekerjaan');
			$crud->set_subject('Pekerjaan');
			$crud->set_relation('peserta1','rekanan','rekanan');
			$crud->set_relation('peserta2','rekanan','rekanan');
			$crud->set_relation('type','type','type');
			$crud->display_as('peserta1','Peserta 1')
				 ->display_as('peserta2','Peserta 2')
				 ->display_as('mak','MAK')
				 ->display_as('lmak','Long MAK')
				 ->display_as('pagu','PAGU');
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
			$crud->callback_before_insert(array($this,'encrypt_password'));
			$crud->callback_before_update(array($this,'encrypt_password'));
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function profile(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$this->session->set_userdata('option','profile');
			$crud = new grocery_CRUD();
			$crud->set_table('user');
			$crud->columns('username','job_title','pic','since');
			$crud->fields('username','password','job_title','pic');
			$crud->unset_add()
				 ->unset_delete()
				 ->unset_print()
				 ->unset_export()
				 ->unset_read();
			$crud->where('username',$this->session->userdata('username'));
			$crud->display_as('job_title','Job Title');
			$crud->set_subject('User');
			$crud->required_fields('username','password','pic');
			$crud->set_field_upload('pic','assets/uploads/pics');
			$crud->callback_before_update(array($this,'encrypt_password'));
			$output = $crud->render();

			$this->_example_output($output);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function encrypt_password($post_array, $primary_key = null)
    {
	    $this->load->helper('security');
	    $post_array['password'] = do_hash($post_array['password'].'@adDunyaa2$MataaAdDunyaa%4#AlMarAtus91Sholihah', 'md5');
	    return $post_array;
    }
	
	public function _example_output($output = null)
	{
		$this->load->view('lte.php',$output);
	}
	
	/* ============== All report start here  ============== */
	
	public function report(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$this->session->set_userdata('option','report');
			$query = $this->db->query('SELECT p.id_pekerjaan, p.kegiatan, p.pengadaan, p.tgl_awal, t.type FROM pekerjaan p, type t WHERE p.type = t.id_type;');
			$data['kegiatan'] = $query->result();
			$this->load->view('report.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function winner($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$this->session->set_userdata('option','winner');
			$data['idr'] = $idr;
			$this->load->view('winner.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_list($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$this->session->set_userdata('option','report list');
			$query = $this->db->query('SELECT id_pekerjaan, kegiatan, pengadaan, tgl_awal FROM pekerjaan where id_pekerjaan='.$idr.';');
			$data['kegiatan'] = $query->result();
			$this->load->view('report_list.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_kegiatan($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$query = $this->db->query('SELECT * FROM pekerjaan where id_pekerjaan='.$idr.';');
			$data['kegiatan'] = $query->result();
			$this->load->view('report/kegiatan.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_pbj($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$query = $this->db->query('SELECT * FROM pbj where id_pekerjaan='.$idr.';');
			$data['kegiatan'] = $query->result();
			$this->load->view('report/pbj.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_cover($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/cover.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_kwitansi($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/kwitansi.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_bap($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/bap.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_pp($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/pp.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_bst($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/bst.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_bacf($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/bacf.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_lt($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/lt.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_pesanan($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/pesanan.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_spk($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/spk.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_spmk($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/spmk.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_sks($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/sks.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_penunjukan($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/penunjukan.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_pengumuman($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/pengumuman.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_pelaksanaan($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/pelaksanaan.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
	
	public function report_bahpl($idr){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('username')!="" && $this->session->userdata('password')!=""){
			$data['idr'] = $idr;
			$this->load->view('report/bahpl.php',$data);
		}
		else
			header('location:'.base_url().'');
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
<?php 
	include 'ctw2.php';
	include 'day.php';
;?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Andre - Dashboard | Sistem Pengadaan Barang dan Jasa</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url(); ?>assets/dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url(); ?>assets/dist/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<style>
		.borderless td, .borderless th {
			border : none !important;
		}
	</style>
  </head>
  <body onload="window.print();">
  <!--body-->
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-xs-12">
            <div class="text-center">
			<br><br><br>
					<?php
						$query = $this->db->query('select p.pengadaan, p.kegiatan, s.no, s.tgl,  pj.nama, pj.nip, r.nama_pemilik1, r.jabatan1, r.rekanan, r.alamat, p.pengadaan, p.kegiatan, r.no_rek, r.bank, pbj.skkpa_panitia
													from pekerjaan p, pbj, rekanan r, surat s, pejabat pj
													where p.id_pekerjaan = '.$idr.'
													and p.id_pekerjaan = pbj.id_pekerjaan
													and pj.id_pejabat = pbj.pejabat_penerima
													and p.winner = r.id_rekanan
													and p.id_pekerjaan = s.id_pekerjaan
													and s.uraian = 16');
						foreach ($query->result() as $u){
						$query = $this->db->query('select s.no, s.tgl
																from surat s, pekerjaan p
																where p.id_pekerjaan = '.$idr.'
																and s.id_pekerjaan = p.id_pekerjaan
																and s.uraian = 14');
									foreach ($query->result() as $row)	// untuk harga nego
									{
					?>
			<b><u>BERITA ACARA PEMERIKSAAN FISIK BARANG</u></b><br>
			<?php echo $u->no; ?><br>
			</div>
          </div><!-- /.col -->
        </div><!-- /.row -->
		
		<br>
					
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-9 table-responsive">
						<?php //echo ctw($hari,3); //echo hari("2017-01-25"); echo bulan("2017-01-25");?>
				        <?php echo "<p class='text-justify'>Pada hari ini ".hari($u->tgl)." tanggal ".ctw(date('d',strtotime($u->tgl)),3)." bulan ".bulan($u->tgl)." tahun ".ctw(date('Y',strtotime($u->tgl)),3).", 
						kami yang bertanda tangan di bawah ini Pejabat Penerima Hasil Pekerjaan Balai Pengembangan Industri Persepatuan Indonesia 
						Tahun Anggaran ".date("Y",strtotime($u->tgl))." yang ditetapkan dengan Surat Keputusan Kuasa Pengguna Anggaran  
						".$u->skkpa_panitia.", 
						menyatakan telah memeriksa Fisik Barang (daftar terlampir) 
						Pekerjaan ".$u->pengadaan." untuk Kegiatan ".$u->kegiatan." 
						Tahun ".date("Y",strtotime($u->tgl))." dari ".$u->rekanan.", 
						".$u->alamat." 
						dengan baik dan lengkap sesuai surat perintah kerja 
						Nomor :  ".$row->no." tanggal ".date("d",strtotime($row->tgl))." ".bulan($row->tgl)." ".date("Y",strtotime($row->tgl))."</p>";?>	
						<?php } ?>
						<br>
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-9 table-responsive">
								<p class="text-justify">Demikian berita acara pemeriksaan fisik barang ini dibuat untuk dapat digunakan sebagaimana mestinya.</p>	
								<br>
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<br><br>
		
		<div class="row">
			<div class="col-xs-3">
			</div><!-- /.col -->
			<div class="col-xs-4">		
				Pejabat Penerima Barang/Jasa<br><br>
				1. <?php echo strtoupper($u->nama);?><br>			
			</div><!-- /.col -->
			<div class="col-xs-4">	
				<br><br>
				: .............................	
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		<?php } ?>
      </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
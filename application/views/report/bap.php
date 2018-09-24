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
						$query = $this->db->query('select s.no, s.tgl,  pj.nama, pj.nip, r.nama_pemilik1, r.jabatan1, r.rekanan, r.alamat, p.pengadaan, p.kegiatan, r.no_rek, r.bank
													from pekerjaan p, pbj, rekanan r, surat s, pejabat pj
													where p.id_pekerjaan = '.$idr.'
													and p.id_pekerjaan = pbj.id_pekerjaan
													and pj.id_pejabat = pbj.pejabat_komitmen
													and p.winner = r.id_rekanan
													and p.id_pekerjaan = s.id_pekerjaan
													and s.uraian = 19');
						foreach ($query->result() as $u){
					?>
			<h4><b><u>BERITA ACARA PEMBAYARAN</u></b></h4>
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
				        <?php echo "<p class='text-justify'>Pada hari ini ".hari($u->tgl)." tanggal ".ctw(date('d',strtotime($u->tgl)),3)." bulan ".bulan($u->tgl)." tahun ".ctw(date('Y',strtotime($u->tgl)),3).", yang bertanda tangan di bawah ini :</p>";?>								
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-9 table-responsive">
				<table class="table borderless table-condensed">
					<tr>
						<td width="2" class="text-right">1.</td>
						<td width="150"><?php echo $u->nama;?></td>
						<td width="400">Pejabat Pembuat Komitmen Balai Pengembangan Industri Persepatuan Indonesia<br>
						Yang berkedudukan di Komplek Pasar Wisata, Kedensari, Tanggulangin, Sidoarjo<br>
						Yang selanjutnya disebut sebagai PIHAK KESATU</td>
					</tr>
					<tr>
						<td width="2" class="text-right">2.</td>
						<td width="150"><?php echo $u->nama_pemilik1;?></td>
						<td width="400"><?php echo $u->rekanan;?><br>
						Yang berkedudukan di <?php echo $u->alamat;?><br>
						Yang selanjutnya disebut sebagai PIHAK KEDUA</td>
					</tr>
				</table>
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-9 table-responsive">
								<?php
									$query = $this->db->query('select * from harga where id_pekerjaan = '.$idr.';');
									$total_nego = 0;
									foreach ($query->result() as $row)	// untuk harga nego
									{
										$total_nego = $total_nego + ($row->harga_nego * $row->volume);
									}
									$query = $this->db->query('select s.no, s.tgl
																from surat s, pekerjaan p
																where p.id_pekerjaan = '.$idr.'
																and s.id_pekerjaan = p.id_pekerjaan
																and s.uraian = 14');
									foreach ($query->result() as $row)	// untuk harga nego
									{
								?>
				                <p class="text-justify">Dengan ini menyatakan bahwa sesuai dengan Surat Perintah Kerja No. <?php echo $row->no; ?>, 
								tanggal <?php echo date("d",strtotime($row->tgl))." ".bulan($row->tgl)." ".date("Y",strtotime($row->tgl)); ?>, untuk melaksanakan <?php echo $u->pengadaan;?> untuk Kegiatan 
								<?php echo $u->kegiatan;?> Tahun <?php echo date("Y",strtotime($row->tgl)); ?> 
								pada Balai Pengembangan Industri Persepatuan Indonesia Tahun Anggaran <?php echo date("Y",strtotime($row->tgl)); } ?>.</p><br>
								<p class="text-justify">PIHAK KESATU membayar kepada PIHAK KEDUA sebesar <?php echo "Rp. ".number_format($total_nego, 0, ',', '.').",-";?> 
								(<?php echo ctw($total_nego,2);?>) 
								termasuk pajak-pajak yang berlaku selanjutnya setelah pekerjaan selesai 100% (seratus persen).</p><br>							
								<p class="text-justify">Pembayaran tersebut dapat dilakukan dengan mentransfer uang sejumlah tersebut di atas  ke rekening 
								No. <?php echo $u->no_rek;?> atas nama <?php echo $u->rekanan;?> pada 
								<?php echo $u->bank;?>.</p><br>
								<p class="text-justify">Demikian Berita Acara Pembayaran ini dibuat untuk dapat digunakan sebagaimana mestinya.</p>								
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<br><br>
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-4 text-center">		
				<b>PIHAK KEDUA</b><br><br><br><br>
				<b><u><?php echo strtoupper($u->nama_pemilik1);?></u></b><br>		
				<?php echo strtoupper($u->jabatan1);?><br>		
			</div><!-- /.col -->
			<div class="col-xs-1">						
			</div><!-- /.col -->
			<div class="col-xs-4 text-center">	
				<b>PIHAK KESATU</b><br><br><br><br>
				<b><u><?php echo strtoupper($u->nama);?></u></b><br>		
				<?php echo $u->nip;?><br>	
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
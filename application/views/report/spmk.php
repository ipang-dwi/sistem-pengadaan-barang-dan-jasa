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
						$query = $this->db->query('select s.no, s.tgl,  pj.nama, pj.nip, r.nama_pemilik1, r.jabatan1, r.rekanan, r.alamat, r.kota, p.pengadaan, p.kegiatan, r.no_rek, r.bank
													from pekerjaan p, pbj, rekanan r, surat s, pejabat pj
													where p.id_pekerjaan = '.$idr.'
													and p.id_pekerjaan = pbj.id_pekerjaan
													and pj.id_pejabat = pbj.pejabat_komitmen
													and p.winner = r.id_rekanan
													and p.id_pekerjaan = s.id_pekerjaan
													and s.uraian = 15');
						foreach ($query->result() as $u){
					?>
			<h4><b><u>SURAT PERINTAH MULAI KERJA (SPMK)</u></b></h4>
			<?php echo $u->no; ?><br>
			<?php echo "Paket Pekerjaan : ".$u->pengadaan; ?>
			</div><br>
          </div><!-- /.col -->
        </div><!-- /.row -->
		
		<br>
					
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-9 table-responsive">
					Yang bertanda tangan di bawah ini:<br><br>							
					<table class="table borderless table-condensed">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><b><?php echo $u->nama; ?></b></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td>:</td>
						<td>Pejabat Pembuat Komitmen</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>Komplek Pasar Wisata, Kedensari, Tanggulangin, Sidoarjo</td>
					</tr>
					</table>		
					selanjutnya disebut sebagai Pejabat Pembuat Komitmen;<br><br>	
					<?php
						$query = $this->db->query('select s.no, s.tgl
																from surat s, pekerjaan p
																where p.id_pekerjaan = '.$idr.'
																and s.id_pekerjaan = p.id_pekerjaan
																and s.uraian = 14');
						foreach ($query->result() as $row)	// untuk harga nego
						{
					?>
					berdasarkan Surat Perintah Kerja (SPK) nomor : <?php echo $row->no; ?> tanggal <?php echo date("d",strtotime($row->tgl))." ".bulan($row->tgl)." ".date("Y",strtotime($row->tgl)); } ?> , bersama ini memerintahkan:<br><br>							
					<table class="table borderless table-condensed">
					<tr>
						<td>Perusahaan</td>
						<td>:</td>
						<td><b><?php echo $u->rekanan; ?></b></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $u->alamat; ?>, <?php echo $u->kota; ?></td>
					</tr>
					</table>				
					yang dalam hal ini diwakili oleh : <b><?php echo $u->nama_pemilik1; ?></b><br><br>							
					selanjutnya disebut sebagai Penyedia Barang;<br><br>							
					untuk segera memulai pelaksanaan pekerjaan dengan memperhatikan ketentuan-ketentuan sebagai berikut:<br><br>		
					
					<table class="table borderless table-condensed">
					<?php
						$query = $this->db->query('select tgl_awal, tgl_akhir
												   from pekerjaan
												   where id_pekerjaan = '.$idr.';');
						foreach ($query->result() as $t)	// untuk harga nego
						{
					?>
					<tr>
						<td width="1%">1.</td>
						<td>Macam Pekerjaan: <?php echo $u->pengadaan; ?> Untuk Kegiatan <?php echo $u->kegiatan; ?>.</td>
					</tr>
					<tr>
						<td width="1%">2.</td>
						<td>Tanggal mulai kerja: <?php echo date("d",strtotime($u->tgl))." ".bulan($u->tgl)." ".date("Y",strtotime($u->tgl)); ?></td>
					</tr>
					<tr>
						<td>3.</td>
						<td>Syarat-syarat pekerjaan: sesuai dengan persyaratan dan ketentuan SPK;</td>
					</tr>
					<tr>
						<td>3.</td>
						<?php
							$date1=date_create($t->tgl_awal);
							$date2=date_create($t->tgl_akhir);
							//$diff=date_diff($date1,$date2);
							//echo $t->tgl_awal."".$t->tgl_akhir."".$diff->format("%a");
							$diff = ($date2->diff($date1)->format("%a"))+1;
						?>
						<td>Waktu penyelesaian selama <?php echo $diff;?> ( <?php echo ctw($diff,3);?>) Hari kalender dan pekerjaan harus sudah selesai pada tanggal <?php echo date("d",strtotime($t->tgl_akhir))." ".bulan($t->tgl_akhir)." ".date("Y",strtotime($t->tgl_akhir)); } ?>.</td>
					</tr>
					<tr>
						<td>5.</td>
						<td>Denda: Terhadap setiap hari keterlambatan pelaksanaan/penyelesaian pekerjaan Penyedia akan 
						dikenakan Denda Keterlambatan sebesar 1/1000 (satu per seribu) dari Nilai SPK atau bagian 
						tertentu dari Nilai SPK sebelum PPN sesuai dengan persyaratan dan ketentuan SPK.</td>
					</tr>
					</table>
				</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-4 text-center">	
				Sidoarjo, <?php echo date("d",strtotime($u->tgl))." ".bulan($u->tgl)." ".date("Y",strtotime($u->tgl)); ?>
				<br><br>
				Pejabat Pembuat Komitmen<br><br><br><br>
				<b><u><?php echo strtoupper($u->nama);?></u></b><br>		
				NIP. <?php echo $u->nip;?><br>	
			</div><!-- /.col -->
			<div class="col-xs-1">						
			</div><!-- /.col -->
			<div class="col-xs-4 text-center">		
				<br>Menerima dan menyetujui,<br>
				<?php echo strtoupper($u->rekanan);?><br><br><br><br>
				<b><u><?php echo strtoupper($u->nama_pemilik1);?></u></b><br>		
				<?php echo strtoupper($u->jabatan1);?><br>		
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
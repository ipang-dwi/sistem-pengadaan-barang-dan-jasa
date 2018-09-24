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
        
		<br><br>			
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-5 table-responsive">
				<br>
				<table class="table borderless table-condensed">
					<?php
								$query = $this->db->query('select s.no, s.tgl
															from surat s, pekerjaan p
															where p.id_pekerjaan = '.$idr.'
															and s.id_pekerjaan = p.id_pekerjaan
															and s.uraian = 12');
									foreach ($query->result() as $row)
									{
					?>
					<tr>
						<td width="2">Nomor</td>
						<td width="2">:</td>
						<td><?php echo $row->no; ?></td>
					</tr>
					<tr>
						<td>Lampiran</td>
						<td>:</td>
						<td>-</td>
					</tr>
					<tr>
						<td>Perihal</td>
						<td>:</td>
						<td><u><b>Penunjukan Pemenang</b></u></td>
					</tr>
				</table>
			</div><!-- /.col -->
			<?php
				$query = $this->db->query('select s.no, s.tgl, pb.nama, pb.nip, r.nama_pemilik1, r.jabatan1, r.rekanan, r.alamat, r.kota, r.npwp, p.pengadaan, p.kegiatan, p.tgl_awal, p.tgl_akhir, r.no_rek, r.bank, pbj.kantor, pbj.alamat as alamat2
															from pekerjaan p, pbj, rekanan r, surat s, pejabat pb
															where p.id_pekerjaan = '.$idr.'
															and p.id_pekerjaan = pbj.id_pekerjaan
															and p.winner = r.id_rekanan
															and p.id_pekerjaan = s.id_pekerjaan
															and pbj.pejabat_komitmen = pb.id_pejabat
															and s.uraian = 8');
				foreach ($query->result() as $u)
				{
			?>
			<div class="col-xs-4">
				Sidoarjo, <?php echo date("d",strtotime($row->tgl))." ".bulan($row->tgl)." ".date("Y",strtotime($row->tgl)); ?><br>
				Kepada Yth :<br>
				<?php echo strtoupper($u->rekanan); ?><br>
				<?php echo $u->alamat; ?><br>
				di <u><?php echo ucfirst($u->kota); ?></u>
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<br><br>			
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-9">
				<?php
								$query = $this->db->query('select * from harga where id_pekerjaan = '.$idr.';');
								$total_nego = 0;
									foreach ($query->result() as $ro)	// untuk harga nego
									{
										$total_nego = $total_nego + ($ro->harga_nego * $ro->volume);
									}
				?>
				<p class="text-justify">      
					Memperhatikan surat penawaran saudara <?php echo $u->rekanan ; ?> 
					dan Berita Acara Klarifikasi dan Negosiasi  <?php echo $u->no; ?> 
					tanggal <?php echo date("d",strtotime($u->tgl))." ".bulan($u->tgl)." ".date("Y",strtotime($u->tgl)); ?>, 
					maka dengan ini kami menyetujui harga yang telah disepakati dan disanggupi 
					bersama untuk pelaksanaan <?php echo $u->pengadaan; ?> 
					pada Balai Pengembangan Industri Persepatuan Indonesia.
				</p>
				<p class="text-justify">      
					Sehubungan dengan hal tersebut  di atas maka kami menunjuk Penyedia Barang dan Jasa untuk <?php echo $u->pengadaan; ?> adalah :
				</p>
				<table class="table borderless table-condensed">
					<tr>
						<td width="30%">Nama Perusahaan</td>
						<td width="1%">:</td>
						<td><?php echo strtoupper($u->rekanan); ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td width="1%">:</td>
						<td><?php echo $u->alamat; ?>, <?php echo ucfirst($u->kota); ?></td>
					</tr>
					<tr>
						<td>NPWP</td>
						<td width="1%">:</td>
						<td><?php echo ucfirst($u->npwp); ?></td>
					</tr>
					<tr>
						<td>Nilai</td>
						<td width="1%">:</td>
						<td><?php echo "Rp. ".number_format($total_nego, 0, ',', '.').",-";?></td>
					</tr>
				</table>
				<p class="text-justify">
				    Dan selanjutnya mohon segera membuat Surat Kesanggupan untuk memenuhi kebutuhan tersebut sebagaimana saudara tawarkan.<br>
					Demikian atas kerjasama yang baik diucapkan terima kasih.
				</p>
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<br><br>			
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-5">
			</div><!-- /.col -->
			<div class="col-xs-4">
				<p class="text-center">
				<b>Pejabat Pembuat Komitmen</b><br><br><br><br>
				<b><u><?php echo strtoupper($u->nama); ?></u></b><br>
				<?php echo "NIP. ".($u->nip); ?>
				</p>
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<br><br>
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-5">
			<small>Tembusan : <br>
			1. Kepala BPIPI<br>					
			2. Pejabat Pengadaan Barang & Jasa<br>					
			3. Bendahara Pengeluaran BPIPI<br>					
			4. Pertinggal<br>					
			</small>
			</div><!-- /.col -->
			<div class="col-xs-4">
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		<?php 
				} 
			}
		?>
      </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
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
		
					<?php
								$query = $this->db->query('select s.no, s.tgl
															from surat s, pekerjaan p
															where p.id_pekerjaan = '.$idr.'
															and s.id_pekerjaan = p.id_pekerjaan
															and s.uraian = 11');
									foreach ($query->result() as $row)
									{
					?>
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-9 table-responsive text-center">
			<h4><b><u>PENGUMUMAN PELAKSANAAN PEKERJAAN</u></b></h4>
			<?php echo $row->no; ?><br>
			</div><!-- /.col -->
			<?php
				$query = $this->db->query('select s.no, s.tgl, pb.nama, pb.nip, r.nama_pemilik1, r.jabatan1, r.rekanan, r.alamat, r.kota, r.npwp, p.pengadaan, p.kegiatan, p.tgl_awal, p.tgl_akhir, r.no_rek, r.bank, pbj.kantor, pbj.alamat as alamat2
															from pekerjaan p, pbj, rekanan r, surat s, pejabat pb
															where p.id_pekerjaan = '.$idr.'
															and p.id_pekerjaan = pbj.id_pekerjaan
															and p.winner = r.id_rekanan
															and p.id_pekerjaan = s.id_pekerjaan
															and pbj.pejabat_pengadaan = pb.id_pejabat
															and s.uraian = 10');
				foreach ($query->result() as $u)
				{
			?>
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
					Memperhatikan penetapan pemenang, melalui surat nomor : <?php echo $u->no; ?>
					tanggal <?php echo date("d",strtotime($u->tgl))." ".bulan($u->tgl)." ".date("Y",strtotime($u->tgl)); ?>, 
					dengan ini Pejabat Pengadaan Barang dan Jasa mengumumkan bahwa pelaksana <?php echo $u->pengadaan; ?> 
					untuk Kegiatan <?php echo $u->kegiatan; ?> tahun <?php echo date("Y",strtotime($u->tgl)); ?> adalah :
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
						<td>Nilai</td>
						<td width="1%">:</td>
						<td><?php echo "Rp. ".number_format($total_nego, 0, ',', '.').",-";?></td>
					</tr>
					<tr>
						<td>NPWP/PKP</td>
						<td width="1%">:</td>
						<td><?php echo ucfirst($u->npwp); ?></td>
					</tr>
				</table>
				<p class="text-justify">
				            Demikian pengumuman ini kami buat, atas kerjasama yang baik diucapkan terima kasih.
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
				Sidoarjo, <?php echo date("d",strtotime($u->tgl))." ".bulan($u->tgl)." ".date("Y",strtotime($u->tgl)); ?><br>
				<b>Pejabat Pengadaan Barang dan Jasa</b><br><br><br><br>
				<b><u><?php echo strtoupper($u->nama); ?></u></b><br>
				<?php echo "NIP. ".($u->nip); ?>
				</p>
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
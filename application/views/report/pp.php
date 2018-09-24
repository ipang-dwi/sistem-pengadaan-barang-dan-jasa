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
															and s.uraian = 18');
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
						<td>Permohonan Pembayaran</td>
					</tr>
				</table>
			</div><!-- /.col -->
			<div class="col-xs-4">
				Kepada Yth :<br>
				Pejabat Pembuat Komitmen<br>
				BPIPI<br>
				Komplek Pasar Wisata, Kedensari, Tanggulangin, Sidoarjo
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
								$query = $this->db->query('select s.no, s.tgl, r.nama_pemilik1, r.jabatan1, r.rekanan, r.alamat, p.pengadaan, p.kegiatan, r.no_rek, r.bank, pbj.kantor, pbj.alamat as alamat2
															from pekerjaan p, pbj, rekanan r, surat s
															where p.id_pekerjaan = '.$idr.'
															and p.id_pekerjaan = pbj.id_pekerjaan
															and p.winner = r.id_rekanan
															and p.id_pekerjaan = s.id_pekerjaan
															and s.uraian = 14');
									foreach ($query->result() as $u)
									{
				?>
				<p class="text-justify">Dengan hormat,<br>
				Berdasarkan Surat Perintah Kerja Nomor :  <?php echo $u->no; ?> tanggal <?php echo date("d",strtotime($u->tgl))." ".bulan($u->tgl)." ".date("Y",strtotime($u->tgl)); ?>, 
				tentang <?php echo $u->pengadaan; ?> untuk Kegiatan <?php echo $u->kegiatan; ?>  Tahun <?php echo date("Y",strtotime($u->tgl)); ?>
				pada <?php echo $u->kantor; ?>, <?php echo $u->alamat2; ?>, 
				bersama ini kami sampaikan bahwa pekerjaan telah selesai kami serahkan 100%. 
				Sesuai dengan klausul pada surat perjanjian kerja tersebut kami mohon pembayaraan atas pekerjaan tersebut sebesar <?php echo "Rp. ".number_format($total_nego, 0, ',', '.').",-";?> 
				(<?php echo ctw($total_nego,2);?>). 
				Melalui rekening <?php echo $u->rekanan; ?> pada <?php echo $u->bank; ?> 
				dengan Nomor Rekening : <?php echo $u->no_rek; ?>.</p>
				<p class="text-justify">
				Demikian surat permohonan ini kami buat atas perhatiannya saya sampaikan terima kasih.					
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
				Sidoarjo, <?php echo date("d",strtotime($row->tgl))." ".bulan($row->tgl)." ".date("Y",strtotime($row->tgl)); ?><br>
				<b><?php echo $u->rekanan; ?></b><br><br><br><br>
				<b><u><?php echo strtoupper($u->nama_pemilik1); ?></u></b><br>
				<?php echo strtoupper($u->jabatan1); ?>
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
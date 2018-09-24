<?php include 'ctw2.php';?>
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
			<h4><b><u>KWITANSI</u></b></h4>
			</div>
          </div><!-- /.col -->
        </div><!-- /.row -->
		
		<br>
					<?php
						$query = $this->db->query('select p.tgl_awal, p.mak, p.pengadaan, p.kegiatan, r.nama_pemilik1
													from pekerjaan p, pbj, rekanan r
													where p.id_pekerjaan = '.$idr.'
													and p.winner = r.id_rekanan;');
						foreach ($query->result() as $u){
					?>
		<div class="row">
			<div class="col-xs-7">
			</div><!-- /.col -->
			<div class="col-xs-4">
				<table class="table borderless table-condensed">
					<tr>
						<td width="115">Tahun Anggaran</td>
						<td>:</td>
						<td><?php echo date('Y',strtotime($u->tgl_awal)); ?></td>
					</tr>
					<tr>
						<td>No. Bukti</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>MAK</td>
						<td>:</td>
						<td><?php echo $u->mak; ?></td>
					</tr>
				</table>
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div>
		
		<br>
		
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-9 table-responsive">
				<table class="table borderless table-condensed">
					<tr>
						<td width="150">Sudah Terima Dari</td>
						<td>:</td>
						<td>Kuasa Pengguna Anggaran BPIPI Sidoarjo</td>
					</tr>
					<?php
						$query = $this->db->query('select * from harga where id_pekerjaan = '.$idr.';');
						$total_nego = 0;
						foreach ($query->result() as $row)	// untuk harga nego
						{
							$total_nego = $total_nego + ($row->harga_nego * $row->volume);
						}
					?>
					<tr>
						<td>Banyaknya Uang</td>
						<td>:</td>
						<td><b><i><?php echo ctw($total_nego,2);?></i></b></td>
					</tr>
					<tr>
						<td>Untuk Pembayaran</td>
						<td>:</td>
						<td><?php echo ucwords($u->pengadaan); ?> untuk kegiatan <?php echo ucwords($u->kegiatan); ?></td>
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
				<table class="table borderless table-condensed">
					<tr>
						<td width="70">Jumlah</td>
						<td width="10">:</td>
						<td><b><?php echo "Rp. ".number_format($total_nego, 0, ',', '.').",-";?></b></td>
					</tr>
				</table>
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<br><br>
		
		<div class="row">
			<div class="col-xs-7">
			</div><!-- /.col -->
			<div class="col-xs-4">
				<center>
				<table class="table borderless table-condensed">
					<tr>
						<td width="3">Sidoarjo,</td>
						<td width="105"></td>
						<td><b><?php echo date('Y',strtotime($u->tgl_awal)); ?></b></td>
					</tr>
					<tr>
						<td></td>
						<td>Yang menerima,</td>
						<td></td>
					</tr>
				</table>
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div>
		
		<br><br><br>
		
		<div class="row">
			<div class="col-xs-7">
			</div><!-- /.col -->
			<div class="col-xs-4">
				<center>
				<b><u><?php echo strtoupper($u->nama_pemilik1); ?></u></b><br>		
				DIREKTUR		
			</div><!-- /.col -->
			<div class="col-xs-1">
			</div><!-- /.col -->
		</div>
		<?php } ?>
		
		
      </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
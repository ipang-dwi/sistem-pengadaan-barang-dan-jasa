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
			<h4><b>KEMENTERIAN PERINDUSTRIAN</b></h4>
			<b>BALAI PENGEMBANGAN INDUSTRI PERSEPATUAN INDONESIA</b>
			</div>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
			<div class="col-xs-12">
				<div class="text-center">
				<br><br><br>
				<img src="<?php echo base_url(); ?>assets/dist/img/cover.png" width=7%>
				<br><br>
				</div>
			</div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
			<div class="col-xs-12">
				<div class="text-center">
				<br><br><br>
				<b>SURAT PERINTAH KERJA ( SPK )</b><br>
				<?php
					$query = $this->db->query('SELECT no, tgl FROM surat WHERE uraian = 14 AND id_pekerjaan = '.$idr.';');
					foreach ($query->result() as $u){
				?>
				Nomor : <?php echo $u->no; ?><br>
				Tanggal : <?php 
					echo date("d",strtotime($u->tgl)); 
					if(date("m",strtotime($u->tgl))==01) echo " Januari ";
					if(date("m",strtotime($u->tgl))==02) echo " Februari ";
					if(date("m",strtotime($u->tgl))==03) echo " Maret ";
					if(date("m",strtotime($u->tgl))==04) echo " April ";
					if(date("m",strtotime($u->tgl))==05) echo " Mei ";
					if(date("m",strtotime($u->tgl))==06) echo " Juni ";
					if(date("m",strtotime($u->tgl))==07) echo " Juli ";
					if(date("m",strtotime($u->tgl))==08) echo " Agustus ";
					if(date("m",strtotime($u->tgl))==09) echo " September ";
					if(date("m",strtotime($u->tgl))==10) echo " Oktober ";
					if(date("m",strtotime($u->tgl))==11) echo " November ";
					if(date("m",strtotime($u->tgl))==12) echo " Desember ";
					echo date("Y",strtotime($u->tgl));
				?>
				<?php } ?>
				</div>
				<br><br><br>
			</div><!-- /.col -->
        </div><!-- /.row -->
		
		<div class="row">
			<div class="col-xs-2">
			</div>
			<div class="col-xs-8">
				<table class="table borderless table-condensed">
					<?php
						$query = $this->db->query('select p.kegiatan, p.pengadaan, pbj.alamat, pbj.kodepos, pbj.sumber_dana, p.lmak, r.rekanan
													from pekerjaan p, pbj, rekanan r
													where p.id_pekerjaan = '.$idr.'
													and p.winner = r.id_rekanan;');
						foreach ($query->result() as $u){
					?>
					<tr>
					  <td>KEGIATAN</td>
					  <td>:</td>
					  <td><?php echo strtoupper($u->kegiatan); ?></td>
					</tr>
					<tr>
					  <td>PEKERJAAN</td>
					  <td>:</td>
					  <td><?php echo strtoupper($u->pengadaan); ?></td>
					</tr>
					<tr>
					  <td>LOKASI</td>
					  <td>:</td>
					  <td><?php echo strtoupper($u->alamat)." ".strtoupper($u->kodepos); ?></td>
					</tr>
					<tr>
					  <td width="100">SUMBER DANA</td>
					  <td>:</td>
					  <td><?php echo strtoupper($u->sumber_dana); ?></td>
					</tr>
					<tr>
					  <td>MAK</td>
					  <td>:</td>
					  <td><?php echo strtoupper($u->lmak); ?></td>
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
					  <td>NILAI</td>
					  <td>:</td>
					  <td><?php echo "Rp. ".number_format($total_nego, 0, ',', '.').",-";?></td>
					</tr>
				</table>
			</div><!-- /.col -->
			<div class="col-xs-2">
			</div>
        </div><!-- /.row -->
		
		 <div class="row">
			<div class="col-xs-12">
				<div class="text-center">
				<br>
				<b>PELAKSANA :<br>
				<?php
						echo strtoupper($u->rekanan);
					}
				?>
				</b>
				</div>
				<br><br><br>
			</div><!-- /.col -->
        </div><!-- /.row -->
		
      </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
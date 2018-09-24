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
						$query = $this->db->query('select s.no
													from pekerjaan p, surat s
													where p.id_pekerjaan = '.$idr.'
													and p.id_pekerjaan = s.id_pekerjaan
													and s.uraian = 16');
						foreach ($query->result() as $u){
						$query = $this->db->query('select s.no, s.tgl
																from surat s, pekerjaan p
																where p.id_pekerjaan = '.$idr.'
																and s.id_pekerjaan = p.id_pekerjaan
																and s.uraian = 14');
						foreach ($query->result() as $row)
						{
					?>
			</div>
          </div><!-- /.col -->
        </div><!-- /.row -->
		
		<br>
					
		<div class="row">
			<div class="col-xs-2">
			</div><!-- /.col -->
			<div class="col-xs-9 table-responsive">
						<?php //echo ctw($hari,3); //echo hari("2017-01-25"); echo bulan("2017-01-25");?>
				        Lampiran Berita Acara Penerimaan Fisik Barang No: <?php echo $u->no; ?>. 
						Sesuai Surat Perintah Kerja No. <?php echo $row->no; ?>, 
						tanggal <?php echo date("d",strtotime($row->tgl))." ".bulan($row->tgl)." ".date("Y",strtotime($row->tgl));?>
						<?php } ?>
						<br>
						<br>
						<table class="table table-bordered table-condensed">
						<tr>
							<td class="text-center">No.</td>
							<td class="text-center">Nama Barang / Jasa</td>
							<td class="text-center">Vol</td>
							<td class="text-center">Sat</td>
						</tr>
						<tr>
							<td class="text-center"><small>(1)</small></td>
							<td class="text-center"><small>(2)</small></td>
							<td class="text-center"><small>(3)</small></td>
							<td class="text-center"><small>(4)</small></td>
						</tr>
						<?php
							$query = $this->db->query('SELECT item, volume, satuan
														FROM harga
														WHERE id_pekerjaan = '.$idr.';');
							$no=1;
							foreach ($query->result() as $it)
							{
						?>
						<tr>
							<td class="text-center"><?php echo $no++;?>.</td>
							<td> <?php echo $it->item ;?></td>
							<td class="text-center"> <?php echo $it->volume ;?></td>
							<td class="text-center"><?php echo $it->satuan ;?></td>
						</tr>
						<?php } ?>
					</table>
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
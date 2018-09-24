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
  </head>
  <body onload="window.print();">
  <!--body-->
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> BPIPI
              <small class="pull-right"><?php echo date('d/m/Y'); ?></small>
            </h2>
          </div><!-- /.col -->
        </div>
		
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
			<?php foreach($kegiatan as $u){ ?>
            <table class="table table-striped table-bordered">
                <tr>
                  <td>ID</td>
                  <td><?php echo $u->id_pekerjaan; ?></td>
                </tr>
				<tr>
                  <td>Kegiatan</td>
                  <td><?php echo $u->kegiatan; ?></td>
                </tr>
                <tr>
                  <td>Pengadaan</td>
                  <td><?php echo $u->pengadaan; ?></td>
                </tr>
                <tr>
                  <td>Pelaksanaan</td>
                  <td><?php echo "Tanggal ".date("d/m/Y",strtotime($u->tgl_awal))." sampai ".date("d/m/Y",strtotime($u->tgl_akhir)); ?></td>
                </tr>
				<tr>
                  <td>MAK</td>
                  <td><?php echo $u->lmak; ?></td>
                </tr>
            </table>
			<?php } ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
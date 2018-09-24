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
    <!-- DATA TABLES -->
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	<!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/favicon.ico">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
<body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"><img src="<?php echo base_url(); ?>assets/dist/img/bia-pm.png" /></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/uploads/pics/<?php echo $this->session->userdata('pic'); ?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo ucwords($this->session->userdata('username')); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/uploads/pics/<?php echo $this->session->userdata('pic'); ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo ucwords($this->session->userdata('username')); ?> - <?php echo ucwords($this->session->userdata('jt')); ?>
                      <small>Member since, <?php 
					  $date = new DateTime($this->session->userdata('since'));
					  echo $date->format('d M Y');
					  ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>dashboard/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>front/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/uploads/pics/<?php echo $this->session->userdata('pic'); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo ucwords($this->session->userdata('username')); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php if($this->session->userdata('option')=='dashboard') echo 'class="active"';?> >
              <a href="<?php echo base_url();?>dashboard">
                <i class="fa fa-desktop"></i> <span>Data</span>
              </a>
            </li>
			<?php if($this->session->userdata('jt')=='admin'){ ?>
			<li class="<?php if($this->session->userdata('option')!='profile'&&$this->session->userdata('option')!='dashboard') //echo 'active';?> treeview">
              <a href="<?php echo base_url();?>dashboard">
                <i class="fa fa-windows"></i> <span>Admin</span>
              </a>
			  <ul class="treeview-menu">
                <li <?php if($this->session->userdata('option')=='pekerjaan') echo 'class="active"';?>><a href="<?php echo site_url('dashboard/pekerjaan')?>"><i class="fa fa-laptop"></i> Pekerjaan</a></li>
                <li <?php if($this->session->userdata('option')=='PBJ') echo 'class="active"';?>><a href="<?php echo site_url('dashboard/pbj')?>"><i class="fa fa-calendar"></i> PBJ</a></li>
				<li <?php if($this->session->userdata('option')=='surat') echo 'class="active"';?>><a href="<?php echo site_url('dashboard/surat')?>"><i class="fa fa-file-text-o"></i> Surat</a></li>
				<li <?php if($this->session->userdata('option')=='item') echo 'class="active"';?>><a href="<?php echo site_url('dashboard/item')?>"><i class="fa fa-ticket"></i> Item</a></li>
				<li <?php if($this->session->userdata('option')=='pejabat') echo 'class="active"';?>><a href="<?php echo site_url('dashboard/pejabat')?>"><i class="fa fa-users"></i> Pejabat</a></li>
				<li <?php if($this->session->userdata('option')=='rekanan') echo 'class="active"';?>><a href="<?php echo site_url('dashboard/rekanan')?>"><i class="fa fa-briefcase"></i> Rekanan</a></li>
				<li <?php if($this->session->userdata('option')=='user') echo 'class="active"';?>><a href="<?php echo site_url('dashboard/user')?>"><i class="fa fa-user"></i> User</a></li>
			  </ul>
            </li>
			<?php } ?>
            <li <?php if($this->session->userdata('option')=='report') echo 'class="active"';?> >
              <a href="<?php echo base_url();?>dashboard/report">
                <i class="fa fa-tasks"></i> <span>Report</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-desktop"></i> <a href="<?php echo base_url();?>dashboard">Data</a> </li>
			<li><?php echo ucfirst($this->session->userdata('option'));?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Report Pengadaan Barang Dan Jasa</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				  <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Kegiatan</th>
                        <th>Pengadaan</th>
						<th>Type</th>
                        <th>Tahun</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php 
							$no = 1;
							foreach($kegiatan as $u){ 
						?>
					  <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $u->kegiatan; ?></td>
                        <td><?php echo $u->pengadaan; ?></td>
						<td><?php echo ucfirst($u->type); ?></td>
                        <td><?php echo date("Y",strtotime($u->tgl_awal)); ?></td>
                        <td><a href="<?php echo base_url();?>dashboard/winner/<?php echo $u->id_pekerjaan ;?>">Report List</a></td>
                      </tr>
						<?php 
							} 
						?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Kegiatan</th>
                        <th>Pengadaan</th>
						<th>Type</th>
                        <th>Tahun</th>
                        <th>Option</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          Version 1.0.a
          </div>
          Copyright &copy; <?php echo date("Y");?> , Afriandri JW - <a href="http://www.firstplato.com" target=_blank>FP</a>. All right reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.tableTools.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <!--script src="<?php echo base_url(); ?>assets/dist/js/demo.js" type="text/javascript"></script-->
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
      });
    </script>

  </body>
</html>

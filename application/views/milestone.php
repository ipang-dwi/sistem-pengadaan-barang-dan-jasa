<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>assets/dist/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url(); ?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
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
            <li <?php if($this->session->userdata('option')=='') echo 'class="active"';?> >
              <a href="<?php echo base_url();?>dashboard">
                <i class="fa fa-desktop"></i> <span>Milestone</span>
              </a>
            </li>
            <li <?php if($this->session->userdata('option')=='task') echo 'class="active"';?> >
              <a href="<?php echo base_url();?>dashboard/task">
                <i class="fa fa-tasks"></i> <span>Task</span>
              </a>
            </li>
			<li <?php if($this->session->userdata('option')=='project') echo 'class="active"';?> >
              <a href="<?php echo base_url();?>dashboard/project">
                <i class="fa fa-book"></i> <span>Project</span>
              </a>
            </li>
			<li <?php if($this->session->userdata('option')=='part') echo 'class="active"';?> >
              <a href="<?php echo base_url();?>dashboard/part">
                <i class="fa fa-puzzle-piece"></i> <span>Part</span>
              </a>
            </li>
			<li <?php if($this->session->userdata('option')=='type') echo 'class="active"';?> >
              <a href="<?php echo base_url();?>dashboard/type">
                <i class="fa fa-bookmark"></i> <span>Type</span>
              </a>
            </li>
			<li <?php if($this->session->userdata('option')=='user') echo 'class="active"';?> >
              <a href="<?php echo base_url();?>dashboard/user">
                <i class="fa fa-user"></i> <span>User</span>
              </a>
            </li>
			<li <?php if($this->session->userdata('option')=='status') echo 'class="active"';?> >
              <a href="<?php echo base_url();?>dashboard/status">
                <i class="fa fa-edit"></i> <span>Status</span>
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
            <small>Milestone</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-desktop"></i> Milestone</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
           
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
              <!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-desktop text-light-blue"></i>
                  <h3 class="box-title">Project Milestone<?php echo ucfirst($this->session->userdata('option'));?></h3>
                 <div class="pull-right box-tools">
					<button class="btn btn-info btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
					<?php
					$project = $this->db->get_where('project');
					$task = $this->db->get_where('task');
					$taskc = $this->db->get_where('task',array('id_status' => 3));
					$ptask = round(($taskc->num_rows()/$task->num_rows())*100);
					if($project->num_rows()>0)
					{
						foreach($project->result() as $pr){
						$all = $this->db->get_where('task',array('id_project'=>$pr->id_project));
						$open = $this->db->get_where('task',array('id_status' => 1,'id_project'=>$pr->id_project));
						$pending = $this->db->get_where('task',array('id_status' => 2,'id_project'=>$pr->id_project));
						$close = $this->db->get_where('task',array('id_status' => 3,'id_project'=>$pr->id_project));
						$wi = round(($close->num_rows()/$all->num_rows())*100);
						?>
						<div class="progress">
						<div class="progress-bar progress-bar-primary progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $wi;?>%"><?php echo $wi."%";?>
						</div>
						</div>
						<?php
						echo "Project <a href='".base_url()."dashboard/project_task/".$pr->project."'>".$pr->project."</a>. All ".$all->num_rows()." tasks - ".$open->num_rows()." open - ".$pending->num_rows()." pending - ".$close->num_rows()." closed.<hr>";
						}
					}
					?>
                </div>
                <div class="box-footer clearfix">
                  
                </div>
              </div>

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
				<!-- quick email widget -->
			  <div class="box box-primary">
                <div class="box-header">
                  <i class="fa fa-laptop text-light-blue"></i>
                  <h3 class="box-title">Roadmap</h3>
                  <div class="pull-right box-tools">
					<button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
					<div class="row">
					<div class="col-lg-6 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-aqua">
						<div class="inner">
						  <h3><?php echo $project->num_rows();?></h3>
						  <p>Projects</p>
						</div>
						<div class="icon">
						  <i class="fa fa-desktop"></i>
						</div>
						<a href="#" class="small-box-footer"> All Projects</a>
					  </div>
					</div>
					<div class="col-lg-6 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-red">
						<div class="inner">
						  <h3><?php echo $task->num_rows();?></h3>
						  <p>Tasks</p>
						</div>
						<div class="icon">
						  <i class="fa fa-laptop"></i>
						</div>
						<a href="#" class="small-box-footer">All Tasks</a>
					  </div>
					</div>
					</div><!-- class row -->
					<div class="progress">
						<div class="progress-bar progress-bar-primary progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ptask;?>%"><?php echo $ptask."%";?>
						</div>
					</div>
					<?php echo "All ".$task->num_rows()." tasks  from ".$project->num_rows()." projects - ".$taskc->num_rows()." closed - ".(($task->num_rows())-($taskc->num_rows()))." on progress.";?>
                </div>
                <div class="box-footer clearfix">
                  
                </div>
              </div>
            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.a
          </div>
          <strong>Copyleft &copy; 2015 <a href="http://www.firstplato.com">Ip@ng Dwi</a>.</strong> All lefts reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <!--script src="<?php echo base_url(); ?>assets/dist/js/demo.js" type="text/javascript"></script-->
  </body>
</html>
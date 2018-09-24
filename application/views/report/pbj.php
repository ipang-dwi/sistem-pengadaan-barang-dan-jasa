<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Andre - Dashboard | Sistem Pengadaan Barang dan Jasa</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <!--link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!--link href="<?php echo base_url(); ?>assets/dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <!--link href="<?php echo base_url(); ?>assets/dist/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <!--link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

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
		
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12">
			<?php foreach($kegiatan as $u){ ?>
            <table>
				<tr>
                  <td><b>Panitia</b></td>
				  <td></td>
                  <td><font color="blue">www.BPIPI.Kemenperin.go.id</font></td>
                </tr>
				<tr>
                  <td>Kantor</td>
				  <td>:</td>
                  <td><?php echo $u->kantor; ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
				  <td>:</td>
                  <td><?php echo $u->alamat; ?></td>
                </tr>
                <tr>
                  <td>Alamat + Kodepos</td>
				  <td>: </td>
                  <td><?php echo $u->alamat.", ".$u->kodepos; ?></td>
                </tr>
				<?php 
					$query = $this->db->query("select * from pejabat where id_pejabat = ".$u->pejabat_komitmen.";");
					if ($query->num_rows() > 0)
					{
					   foreach ($query->result() as $row)
					   {
				?>
				<tr>
                  <td>Nama</td>
				  <td>:</td>
                  <td><?php echo $row->nama; ?></td>
                </tr>
				<tr>
                  <td>NIP</td>
				  <td>:</td>
                  <td><?php echo $row->nip; ?></td>
                </tr>
				<tr>
                  <td>Jabatan</td>
				  <td>:</td>
                  <td><?php echo $row->jabatan; ?></td>
                </tr>
				<?php 
						}
					}
				?>
				<?php 
					$query = $this->db->query("select * from pejabat where id_pejabat = ".$u->pejabat_pengadaan.";");
					if ($query->num_rows() > 0)
					{
					   foreach ($query->result() as $row)
					   {
				?>
				<tr>
                  <td>Nama</td>
				  <td>:</td>
                  <td><?php echo $row->nama; ?></td>
                </tr>
				<tr>
                  <td>NIP</td>
				  <td>:</td>
                  <td><?php echo $row->nip; ?></td>
                </tr>
				<tr>
                  <td>Jabatan</td>
				  <td>:</td>
                  <td><?php echo $row->jabatan; ?></td>
                </tr>
				<?php 
						}
					}
				?>
				<?php 
					$query = $this->db->query("select * from pejabat where id_pejabat = ".$u->pejabat_penerima.";");
					if ($query->num_rows() > 0)
					{
					   foreach ($query->result() as $row)
					   {
				?>
				<tr>
                  <td>Nama</td>
				  <td>:</td>
                  <td><?php echo $row->nama; ?></td>
                </tr>
				<tr>
                  <td>NIP</td>
				  <td>:</td>
                  <td><?php echo $row->nip; ?></td>
                </tr>
				<tr>
                  <td>Jabatan</td>
				  <td>:</td>
                  <td><?php echo $row->jabatan; ?></td>
                </tr>
				<?php 
						}
					}
				?>
				<?php 
					$query = $this->db->query("select * from pejabat where id_pejabat = ".$u->pejabat_penerima.";");
					if ($query->num_rows() > 0)
					{
					   foreach ($query->result() as $row)
					   {
				?>
				<tr>
                  <td>Nama</td>
				  <td>:</td>
                  <td><?php echo $row->nama; ?></td>
                </tr>
				<tr>
                  <td>NIP</td>
				  <td>:</td>
                  <td><?php echo $row->nip; ?></td>
                </tr>
				<tr>
                  <td>Jabatan</td>
				  <td>:</td>
                  <td>Panitia Penerima Hasil Pekerjaan</td>
                </tr>
				<?php 
						}
					}
				?>
				<tr>
                  <td><dd></td>
				  <td><dd></td>
                  <td><dd></td>
                </tr>
				<tr>
                  <td><dd></td>
				  <td><dd></td>
                  <td><dd></td>
                </tr>
				<tr>
                  <td><dd></td>
				  <td><dd></td>
                  <td><dd></td>
                </tr>
				<tr>
                  <td><b>Data Pendukung</b></td>
				  <td></td>
                  <td></td>
                </tr>
				<tr>
                  <td>Surat Keputusan Kuasa Pengguna Anggaran (pejabat)</td>
				  <td>:</td>
                  <td><?php echo $u->skkpa_pejabat; ?></td>
                </tr>
				<tr>
                  <td>Surat Keputusan Kuasa Pengguna Anggaran (panitia)</td>
				  <td>:</td>
                  <td><?php echo $u->skkpa_panitia; ?></td>
                </tr>
				<tr>
                  <td>Sumber Dana</td>
				  <td>:</td>
                  <td><?php echo $u->sumber_dana; ?></td>
                </tr>
				<tr>
                  <td>DIPA</td>
				  <td>:</td>
                  <td><?php echo $u->dipa; ?></td>
                </tr>
				<tr>
                  <td>Nomor DIPA</td>
				  <td>:</td>
                  <td><?php echo $u->nomer_dipa; ?></td>
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
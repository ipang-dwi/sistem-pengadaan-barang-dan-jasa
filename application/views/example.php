<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
	<div><center>
		<a href='<?php echo site_url('examples/pekerjaan')?>'>Pekerjaan</a> |
		<a href='<?php echo site_url('examples/pbj')?>'>PBJ</a> |
		<a href='<?php echo site_url('examples/surat')?>'>Surat</a> |
		<a href='<?php echo site_url('examples/pejabat')?>'>Pejabat</a> |
		<a href='<?php echo site_url('examples/rekanan')?>'>Rekanan</a> |
		<a href='<?php echo site_url('examples/item')?>'>Item</a> |
		<a href='<?php echo site_url('examples/uraian')?>'>Uraian</a> |
		<a href='<?php echo site_url('examples/user')?>'>User</a>
		</center>
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>

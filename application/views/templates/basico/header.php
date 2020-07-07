<?php
  $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
  $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
  $this->output->set_header('Pragma: no-cache');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SETAB</title>
	
	<link rel="stylesheet" href="<?php echo base_url();?>sources/bootstrap-4.3.1-dist/css/bootstrap.css">
	
	<link href="<?php echo base_url();?>sources/MaterialDesign-Webfont-master/css/materialdesignicons.css" media="all" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url();?>sources/css/style.css">
	
	<script src="<?php echo base_url();?>sources/jquery/jquery-3.4.1.js" type="text/javascript" ></script>
	
	<!-- <script src="<?php echo base_url();?>sources/popper/popper.js" type="text/javascript" ></script> -->

	<script src="<?php echo base_url();?>sources/bootstrap-4.3.1-dist/js/bootstrap.bundle.js" type="text/javascript" ></script>
	
	<!-- <script src="lib/lou-multi-select/js/jquery.multi-select.js" type="text/javascript"></script> -->

	

</head>
<body>
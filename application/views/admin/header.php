<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jquery-ui/jquery-ui.css'); ?>">
	<!--jquery ui + jquery-->
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery-ui/jquery-ui.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/custom.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<!-- header -->
		<div class="header">
			<a href="<?php echo base_url(); ?>" class="brand-text">Reloadshop</a>
			<div class="nav-right">
				<a href="#"><img src="<?php echo base_url('assets/images/user.png')?>">&nbsp;&nbsp;<?php echo $this->session->userdata('username'); ?></a>
				<a href="#"><img src="<?php echo base_url('assets/images/settings.png')?>">&nbsp;&nbsp;Settings</a>
				<a href="<?php echo site_url('admin/logout'); ?>"><img src="<?php echo base_url('assets/images/logout.png')?>">&nbsp;&nbsp;Logout</a>
			</div>
		</div>
		<!-- / header -->

		<!--Main-->
		<div class="main">
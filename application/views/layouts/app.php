
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kasus Covid-19 Kab. Purbalingga</title>
	<link href="<?= base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/admin/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/admin/css/datepicker3.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/admin/css/styles.css') ?>" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<script src="<?= base_url('assets/admin/js/jquery-3.4.1.min.js') ?>"></script>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="<?= site_url('/admin/dashboard') ?>"><span>COVIID</span>-19 PURBALINGGA</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li>
                <a href="<?= site_url('/admin/dashboard') ?>">
                    <em class="fa fa-dashboard">&nbsp;</em> Beranda
                </a>
            </li>
			<li>
                <a href="<?= site_url('/admin/odp') ?>">
                    <em class="fa fa-users">&nbsp;</em> Daftar ODP
                </a>
            </li>
			<li><a href="<?= base_url('/admin/logout') ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<?php $this->load->view($container); ?>
	</div>	<!--/.main-->
	
	<script src="<?= base_url('assets/admin/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/admin/js/bootstrap-datepicker.js') ?>"></script>
	<script src="<?= base_url('assets/admin/js/jquery.mask.min.js') ?>"></script>

	<script src="<?= base_url('assets/admin/js/custom.js') ?>"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
    <link href="<?= base_url('/assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('/assets/plugins/fontawesome/css/all.min.css') ?>" rel="stylesheet">
    
	<link href="<?= base_url('/assets/admin/css/styles.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading text-center">
                        HALAMAN LOGIN
                    </div>
                    <div class="panel-body">
                        <form action="<?= site_url('/login/auth') ?>" method="post" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus="" required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fa fa-sign-in-alt"></i>&nbsp; 
                                        Login
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->	
    </div>

    <script src="<?= base_url('/assets/admin/js/jquery-1.11.1.min.js') ?>"></script>
	<script src="<?= base_url('/assets/admin/js/bootstrap.min.js') ?>"></script>
</body>
</html>

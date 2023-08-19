<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="IT Helpdesk <?= $this->settings->info['perusahaan']; ?>">
	<meta name="author" content="<?= $this->settings->info['perusahaan']; ?>">
	<title><?= $this->settings->info['aplikasi']; ?> <?= $this->settings->info['perusahaan']; ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">

	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/icon.png">

	<!-- Related styles of various icon packs and plugins -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins.css">

	<!-- Modernizr (browser feature detection library) -->
	<script src="<?= base_url() ?>assets/js/vendor/modernizr-3.3.1.min.js"></script>

</head>

<body class="bg-primary">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="card o-hidden border-0 shadow-lg" style="margin: auto; margin-top: 15%">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div>
										<h2 class="h5 font-weight-bold text-center text-dark"><?= $this->settings->info['perusahaan']; ?></h2>
										<h1 class="h2 font-weight-bold text-center push-top-bottom animation-slideDown" style="color: black">
											<img src="<?= base_url() ?>assets/img/icon.png" width="50">
											<?= $this->settings->info['aplikasi']; ?>
										</h1>
										<br />

										<?php if ($this->session->flashdata('status')) : ?>
											<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>Error!</strong> Username atau Password <?= $this->session->flashdata('status'); ?>
											</div>
										<?php endif; ?>

										<?php if ($this->session->flashdata('status1')) : ?>
											<div class="alert alert-info alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												Sesi Anda telah <strong><?= $this->session->flashdata('status1'); ?></strong>! Silahkan login terlebih dahulu!
											</div>
										<?php endif; ?>

										<form action="<?= site_url('login/loginProses') ?>" method="post">
											<div class="form-group">
												<input type="text" name="username" class="form-control form-control-lg <?= (form_error('username') ? "is-invalid" : "") ?>" placeholder="Username" autofocus>
												<div class="invalid-feedback">
													<?= form_error('username'); ?>
												</div>
											</div>

											<div class="form-group">
												<input type="password" name="password" class="form-control form-control-lg <?= (form_error('password') ? "is-invalid" : "") ?>" placeholder="Password">
												<div class="invalid-feedback">
													<?= form_error('password'); ?>
												</div>
											</div>

											<button type="submit" class="btn btn-primary btn-lg btn-user btn-block">LOGIN</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
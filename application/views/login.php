<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Jurnalkarta | Home</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Custom fonts for this template-->
	<link href="<?= base_url() ?>/aset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<style>
		.brandjk{
			width: 45px;
		}
	</style>
	<!-- Custom styles for this template -->
	<link href="<?= base_url() ?>/aset/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?= base_url('aset/img/logo.png') ?>" />
	<!-- Custom styles for this page -->
	<link href="<?= base_url() ?>/aset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
	<div id="content-wrapper" class="d-flex flex-column">
		<div class="content">
			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">

				<!-- Sidebar Toggle (Topbar) -->
				<div class="sidebar-brand d-flex align-items-center justify-content-center">
					<img class="brandjk" src="<?= base_url('aset/img/logo.png') ?>" alt="">
					<div class="sidebar-brand-text mx-3 font-weight-bold h5 text-light">Jurnalkarta</div>
				</div>

				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">

					<!-- Nav Item - Search Dropdown (Visible Only XS) -->
					<li class="nav-item dropdown no-arrow d-sm-none">
						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search fa-fw"></i>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
							aria-labelledby="searchDropdown">
							<form class="form-inline mr-auto w-100 navbar-search">
								<div class="input-group">
									<input type="text" class="form-control bg-light border-0 small"
										placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button class="btn btn-primary" type="button">
											<i class="fas fa-search fa-sm"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</li>



					<div class="topbar-divider d-none d-sm-block"></div>

					<!-- Nav Item - User Information -->
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link text-light" data-toggle="modal" data-target="#logoutModal">Login  <i class="ml-1 text-light fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
						</a>
					</li>

				</ul>

			</nav>
			<!-- End of Topbar -->
			<div class="container">
				<?php if($this->session->flashdata('alert')){ ?>
					<div class="shadow mb-4 notif"><?= $this->session->flashdata('alert') ?></div>
				<?php } ?>
				<div class="row">
					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-4 col-md-6 mb-4">
						<div class="card border-left-primary shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
											Total semua pemasukan</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($pem_total) ?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-calendar fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-4 col-md-6 mb-4">
						<div class="card border-left-success shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
											total semua pengeluaran</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($pen_total) ?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Pending Requests Card Example -->
					<div class="col-xl-4 col-md-6 mb-4">
						<div class="card border-left-warning shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
											Total saldo</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= isset($saldo->saldo)? number_format($saldo->saldo) : '0' ?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-comments fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Pemasukan dan pengeluaran bulan ini</h6>
                    </div>
                    <div class="card-body row">
                        <div class="col text-center mb-4">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                pemasukan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($pem_bulanan) ?></div>
                        </div>
                        <div class="col text-center">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                pengeluaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($pen_bulanan) ?></div>
                        </div>
                         
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Pemasukan dan pengeluaran hari ini</h6>
                    </div>
                    <div class="card-body row">
                        <div class="col text-center mb-4">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                pemasukan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($pem_harian) ?></div>
                        </div>
                        <div class="col text-center">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                pengeluaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($pen_bulanan) ?></div>
                        </div>
                    </div>
                </div>
                <h5 class="font-weight-bold text-success text-center">Notulensi Terbaru</h5>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center"><?= $notulensi->judul ?></h6>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" rows="10" disabled><?= $notulensi->laporan ?></textarea>
                    </div>
                </div>

			</div>
		</div>
		<footer class="sticky-footer bg-white">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; 2023 Karang Taruna Putra Jaya</span>
				</div>
			</div>
		</footer>
	</div>
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="p-5">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Login</h1>
					</div>
					<form action="<?= base_url('Auth/log_in') ?>" method="POST" class="user pt-3">
						<div class="form-group">
							<input type="email" name="email"
								class="form-control form-control-user <?= $this->session->flashdata('email') != null?'is-invalid':'' ?>"
								id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Email..."
								value="<?= $this->session->flashdata('email_val') ?>">
							<div class="invalid-feedback"><?= $this->session->flashdata('email') ?></div>
						</div>
						<div class="form-group">
							<input type="password" name="password"
								class="form-control form-control-user <?= $this->session->flashdata('password') != null?'is-invalid':'' ?>"
								id="exampleInputPassword" placeholder="Password">
							<div class="invalid-feedback"><?= $this->session->flashdata('password') ?></div>
						</div>
						<button name="login" type="submit" class="btn btn-primary btn-user btn-block">
							Login
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>/aset/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>/aset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
        $('.notif').delay('slow').slideDown('slow').delay(3000).slideUp(600);
    </script>
</body>

</html>

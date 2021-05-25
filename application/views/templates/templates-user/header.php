<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/user/css/bootstrap.css'); ?>">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">Pustaka</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="<?= base_url(); ?>">Beranda <span class="sr-only">(current)</span></a>

                    <?php if (!empty($this->session->userdata('email'))) { ?>
                        <a class="nav-item nav-link" href="<?= base_url('booking') ?>">Booking <b><?= $this->ModelBooking->getDataWhere('temp', ['email_user' => $this->session->userdata('email')])->num_rows(); ?></b>  Buku</a>
                        <a class="nav-item nav-link" href="<?= base_url('member/myprofile'); ?>">Profil Saya</a>
                        <a class="nav-item nav-link" data-toggle="modal" data-target="#modalUserLogout" style="cursor: pointer;"><i class="fas fw fa-login"></i> Logout</a>
                    <?php } else { ?>
                        <a class="nav-item nav-link" data-toggle="modal" data-target="#daftarModal" href="#"><i class="fas fw fa-login"></i> Daftar</a>
                        <a class="nav-item nav-link" data-toggle="modal" data-target="#loginModal" href="#"><i class="fas fw fa-login"></i> Login</a>
                    <?php } ?>
                </div>
                <div class="navbar-nav ml-auto">
                    <span class="nav-item nav-link ml-auto" style="display: block;">
                        Selamat Datang <b><?= $user; ?></b>
                    </span>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
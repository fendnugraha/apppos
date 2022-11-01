<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App POS</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/mycss.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">AppPOS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('home'); ?> ">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('sales'); ?>">Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('purchase'); ?>">Pembelian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('report'); ?>">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('setting'); ?>">Setting</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BinWise - Masuk</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylelogin.css') ?>">
</head>
<body>
<div class="container">
    <div class="left">
        <div class="hero">
            <div class="hero-text">
                <h1>Selamat Datang di BinWise</h1>
                <h2>Platform pengelola data sampah dengan lebih mudah dan efisien</h2>
            </div>
            <div class="hero-image">
                <img src="<?= base_url('assets/img/tempatsampah.png') ?>" alt="BinWise">
            </div>
        </div>
    </div>

    <div class="right">
        <div class="card">
            <h2>Masuk</h2>
            <p>Pilih jenis akun</p>

            <a href="<?= site_url('auth/loginwarga') ?>" class="option">
                Masuk sebagai <span>Warga</span>
            </a>
            <a href="<?= site_url('auth/loginadmin') ?>" class="option">
                Masuk sebagai <span>Admin</span>
            </a>

            <div class="link">
                Belum punya akun? <a href="<?= site_url('auth/register') ?>">Daftar</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

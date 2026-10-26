<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BinWise - Login Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styleAW.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container">
    <div class="left">
        <div class="hero">
            <div class="hero-text">
                <h1>Selamat Datang di BinWise</h1>
                <h2>Kelola data sampah dengan lebih mudah dan efisien</h2>
            </div>
            <div class="hero-image">
                <img src="<?= base_url('assets/img/tempatsampah.png') ?>" alt="BinWise">
            </div>
        </div>
    </div>

    <div class="right">
        <div class="card">
            <h2>Masuk sebagai Admin</h2>
            <p>Silahkan masuk untuk melanjutkan</p>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert-error"><?= htmlspecialchars($this->session->flashdata('error')) ?></div>
            <?php endif; ?>

            <?php echo form_open('auth/loginadmin_post'); ?>
                <div class="input-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Masukkan nama lengkap"
                           value="<?= set_value('nama') ?>" required>
                </div>
                <div class="input-group">
                    <label>Kata Sandi</label>
                    <input type="password" name="password" placeholder="Masukkan kata sandi" required>
                </div>
                <a href="<?= site_url('auth/lupa') ?>" class="forgot">Lupa kata sandi?</a>
                <button type="submit" name="login" class="btn">Masuk</button>
            <?= form_close() ?>

            <div class="link">
                <a href="<?= site_url('auth') ?>">← Kembali ke pilih akun</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

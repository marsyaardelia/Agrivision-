<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BinWise - Lupa Password</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styleforget.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container">
    <div class="left">
        <div class="hero-text">
            <h1>Lupa Kata Sandi?</h1>
            <h2>Masukkan email yang terdaftar untuk mereset kata sandi</h2>
        </div>
        <div class="hero-image">
            <img src="<?= base_url('assets/img/tempatsampah.png') ?>" alt="">
        </div>
    </div>

    <div class="right">
        <div class="card">
            <div class="icon">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <h2>Lupa Kata Sandi</h2>
            <p>Masukkan email untuk mereset kata sandi</p>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert-error"><?= htmlspecialchars($this->session->flashdata('error')) ?></div>
            <?php endif; ?>

            <?php echo form_open('auth/lupa'); ?>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Masukkan Email"
                           value="<?= set_value('email') ?>" required>
                </div>
                <button type="submit" name="next" class="btn">Berikutnya</button>
            <?= form_close() ?>

            <div class="link">
                <a href="<?= site_url('auth') ?>">← Kembali ke Login</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

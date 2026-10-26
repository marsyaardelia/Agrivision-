<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BinWise - Reset Password</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styleforget.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container">
    <div class="left">
        <div class="hero-text">
            <h1>Reset Kata Sandi</h1>
            <h2>Masukkan kata sandi baru Anda</h2>
        </div>
        <div class="hero-image">
            <img src="<?= base_url('assets/img/tempatsampah.png') ?>" alt="">
        </div>
    </div>

    <div class="right">
        <div class="card">
            <div class="icon">
                <i class="fa-solid fa-lock"></i>
            </div>
            <h2>Ganti Kata Sandi</h2>
            <p>Masukkan kata sandi baru Anda</p>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert-error"><?= htmlspecialchars($this->session->flashdata('error')) ?></div>
            <?php endif; ?>

            <?php echo form_open('auth/reset?id=' . $id); ?>
                <div class="input-group">
                    <input type="password" name="password"
                           placeholder="Masukkan sandi baru (min. 6 karakter)" required>
                </div>
                <div class="input-group">
                    <input type="password" name="konfirmasi"
                           placeholder="Konfirmasi sandi baru" required>
                </div>
                <button type="submit" name="simpan" class="btn">Simpan Kata Sandi</button>
            <?= form_close() ?>
        </div>
    </div>
</div>
</body>
</html>

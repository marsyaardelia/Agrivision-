<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BinWise - Daftar</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styleregis.css') ?>">
</head>
<body>
<div class="container">
    <div class="left">
        <h1>Buat Akun Baru BinWise</h1>
        <h2>Lengkapi data diri Anda untuk membuat akun baru</h2>
        <div class="hero">
            <div class="hero-image">
                <img src="<?= base_url('assets/img/3r.png') ?>" alt="BinWise">
            </div>
        </div>
    </div>

    <div class="right">
        <div class="card">
            <h2>Daftar</h2>

            <?php if (!empty($error)): ?>
                <div class="alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="alert-success">
                    <?= htmlspecialchars($success) ?>
                    <a href="<?= site_url('auth') ?>">Klik di sini untuk masuk</a>
                </div>
            <?php endif; ?>

            <?php echo form_open('auth/register'); ?>
                <div class="input-group">
                    <input type="text" name="nama" placeholder="Nama Lengkap"
                           value="<?= set_value('nama') ?>" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email"
                           value="<?= set_value('email') ?>" required>
                </div>
                <div class="input-group">
                    <input type="text" name="nomorhp" placeholder="Nomor HP"
                           value="<?= set_value('nomorhp') ?>" required>
                </div>
                <div class="input-group">
                    <textarea name="alamat" placeholder="Alamat" required><?= set_value('alamat') ?></textarea>
                </div>
                <div class="input-group">
                    <input type="password" name="password"
                           placeholder="Kata Sandi (min. 6 karakter)" required>
                </div>
                <div class="input-group">
                    <input type="password" name="konfirmasi"
                           placeholder="Konfirmasi Kata Sandi" required>
                </div>
                <button class="btn" name="daftar">Daftar</button>
            <?= form_close() ?>

            <div class="link">
                Sudah punya akun? <a href="<?= site_url('auth') ?>">Masuk</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

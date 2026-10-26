<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="main-wrapper">
    <header class="top-navbar">
        <div class="navbar-title">Akun Saya</div>
        <div class="navbar-user-area">
            <button class="notif-btn"><i class="bi bi-bell"></i></button>
            <div class="user-profile">
                <div class="avatar-placeholder"></div>
                <span class="user-name"><?= htmlspecialchars($this->session->userdata('nama')) ?></span>
            </div>
        </div>
    </header>

    <main class="main-content">
        <h2>Profil Akun</h2>
        <h3>Kelola informasi pribadi Anda</h3>

        <?php if (!empty($error)): ?>
            <div class="alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <div class="form-card">
            <?php echo form_open('akun/simpan'); ?>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama"
                           value="<?= htmlspecialchars($user['nama']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"
                           value="<?= htmlspecialchars($user['email']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Nomor HP</label>
                    <input type="text" name="nomorhp"
                           value="<?= htmlspecialchars($user['nomorhp'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3"><?= htmlspecialchars($user['alamat'] ?? '') ?></textarea>
                </div>

                <hr style="margin: 24px 0; border-color: #eee;">
                <p style="font-size:13px;color:#888;margin-bottom:16px;">
                    Kosongkan kata sandi jika tidak ingin menggantinya.
                </p>

                <div class="form-group">
                    <label>Kata Sandi Baru</label>
                    <input type="password" name="password_baru"
                           placeholder="Kosongkan jika tidak ingin ganti">
                </div>

                <div class="form-group">
                    <label>Konfirmasi Kata Sandi Baru</label>
                    <input type="password" name="konfirmasi_password"
                           placeholder="Ulangi kata sandi baru">
                </div>

                <button type="submit" name="simpan" class="btn-submit">
                    <i class="bi bi-check-lg"></i> Simpan Perubahan
                </button>

            <?= form_close() ?>
        </div>
    </main>
</div>

<style>
.form-card { background:#fff; border-radius:12px; padding:36px; box-shadow:0 2px 8px rgba(0,0,0,.06); max-width:560px; }
.form-group { margin-bottom:18px; }
.form-group label { display:block; font-weight:600; margin-bottom:6px; font-size:14px; color:#333; }
.form-group input, .form-group textarea {
    width:100%; padding:11px 14px; border:1px solid #ddd; border-radius:8px;
    font-size:14px; font-family:inherit; box-sizing:border-box;
}
.form-group input:focus, .form-group textarea:focus {
    outline:none; border-color:#139E07; box-shadow:0 0 0 3px rgba(19,158,7,.1);
}
.btn-submit { background:#139E07; color:#fff; border:none; padding:12px 28px; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px; }
.btn-submit:hover { background:#0f8205; }
</style>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="main-wrapper">
    <header class="top-navbar">
        <div class="navbar-title">Edit Laporan</div>
        <div class="navbar-user-area">
            <div class="user-profile">
                <div class="avatar-placeholder"></div>
                <span class="user-name"><?= htmlspecialchars($this->session->userdata('nama')) ?></span>
            </div>
        </div>
    </header>

    <main class="main-content">
        <h2>Edit Laporan</h2>

        <div class="form-card">
            <?php echo form_open('laporan/update'); ?>
                <input type="hidden" name="id_laporan" value="<?= $laporan['id_laporan'] ?>">

                <div class="form-group">
                    <label>Alamat / Lokasi</label>
                    <input type="text" name="alamat"
                           value="<?= htmlspecialchars($laporan['alamat']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Jenis Laporan</label>
                    <select name="jenis_laporan" required>
                        <?php
                        $jenis = ['Fasilitas', 'Pengangkutan', 'Pengaduan Lingkungan', 'Penumpukan'];
                        foreach ($jenis as $j): ?>
                            <option value="<?= $j ?>" <?= $laporan['jenis_laporan'] === $j ? 'selected' : '' ?>>
                                <?= $j ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="4" required><?= htmlspecialchars($laporan['deskripsi']) ?></textarea>
                </div>

                <div class="form-action">
                    <a href="<?= site_url('laporan') ?>" class="btn-secondary">Batal</a>
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-lg"></i> Simpan Perubahan
                    </button>
                </div>

            <?= form_close() ?>
        </div>
    </main>
</div>

<style>
.form-card { background:#fff; border-radius:12px; padding:32px; box-shadow:0 2px 8px rgba(0,0,0,.06); max-width:600px; }
.form-group { margin-bottom:18px; }
.form-group label { display:block; font-weight:600; margin-bottom:6px; font-size:14px; color:#333; }
.form-group input, .form-group select, .form-group textarea {
    width:100%; padding:11px 14px; border:1px solid #ddd; border-radius:8px;
    font-size:14px; font-family:inherit; box-sizing:border-box;
}
.form-group input:focus, .form-group select:focus, .form-group textarea:focus {
    outline:none; border-color:#139E07; box-shadow:0 0 0 3px rgba(19,158,7,.1);
}
.form-action { display:flex; gap:12px; margin-top:24px; }
.btn-submit { background:#139E07; color:#fff; border:none; padding:12px 28px; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px; }
.btn-submit:hover { background:#0f8205; }
.btn-secondary { background:#f3f4f6; color:#333; padding:12px 28px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none; display:flex; align-items:center; }
</style>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="main-wrapper">
    <header class="top-navbar">
        <div class="navbar-title">Tambah Laporan</div>
        <div class="navbar-user-area">
            <div class="user-profile">
                <div class="avatar-placeholder"></div>
                <span class="user-name"><?= htmlspecialchars($this->session->userdata('nama')) ?></span>
            </div>
        </div>
    </header>

    <main class="main-content">
        <h2>Buat Laporan Sampah Baru</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-error"><?= htmlspecialchars($this->session->flashdata('error')) ?></div>
        <?php endif; ?>

        <div class="form-card">
            <?php echo form_open_multipart('laporan/simpan'); ?>

                <div class="form-group">
                    <label>Alamat / Lokasi <span class="required">*</span></label>
                    <input type="text" name="alamat" placeholder="Masukkan alamat lokasi sampah"
                           value="<?= set_value('alamat') ?>" required>
                </div>

                <div class="form-group">
                    <label>Jenis Laporan <span class="required">*</span></label>
                    <select name="jenis_laporan" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Fasilitas"             <?= set_select('jenis_laporan', 'Fasilitas') ?>>Fasilitas</option>
                        <option value="Pengangkutan"          <?= set_select('jenis_laporan', 'Pengangkutan') ?>>Pengangkutan</option>
                        <option value="Pengaduan Lingkungan"  <?= set_select('jenis_laporan', 'Pengaduan Lingkungan') ?>>Pengaduan Lingkungan</option>
                        <option value="Penumpukan"            <?= set_select('jenis_laporan', 'Penumpukan') ?>>Penumpukan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Deskripsi <span class="required">*</span></label>
                    <textarea name="deskripsi" rows="4"
                              placeholder="Deskripsikan permasalahan secara detail" required><?= set_value('deskripsi') ?></textarea>
                </div>

                <div class="form-group">
                    <label>Upload Foto (opsional)</label>
                    <input type="file" name="foto" accept="image/jpg,image/jpeg,image/png,image/gif">
                    <small>Format: JPG, PNG, GIF. Maks: 2MB</small>
                </div>

                <div class="form-action">
                    <a href="<?= site_url('dashboard') ?>" class="btn-secondary">Batal</a>
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-send"></i> Kirim Laporan
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
.form-group small { display:block; margin-top:4px; color:#888; font-size:12px; }
.required { color:#e53e3e; }
.form-action { display:flex; gap:12px; margin-top:24px; }
.btn-submit { background:#139E07; color:#fff; border:none; padding:12px 28px; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px; }
.btn-submit:hover { background:#0f8205; }
.btn-secondary { background:#f3f4f6; color:#333; padding:12px 28px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none; display:flex; align-items:center; }
.btn-secondary:hover { background:#e5e7eb; }
</style>

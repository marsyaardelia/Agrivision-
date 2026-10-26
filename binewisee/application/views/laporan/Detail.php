<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="main-wrapper">
    <header class="top-navbar">
        <div class="navbar-title">Detail Laporan</div>
        <div class="navbar-user-area">
            <div class="user-profile">
                <div class="avatar-placeholder"></div>
                <span class="user-name"><?= htmlspecialchars($this->session->userdata('nama')) ?></span>
            </div>
        </div>
    </header>

    <main class="main-content">
        <h2>Detail Laporan #<?= str_pad($laporan['id_laporan'], 3, '0', STR_PAD_LEFT) ?></h2>

        <div class="detail-card">
            <div class="detail-row">
                <span class="detail-label">ID Laporan</span>
                <span class="detail-value">#<?= str_pad($laporan['id_laporan'], 3, '0', STR_PAD_LEFT) ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Alamat / Lokasi</span>
                <span class="detail-value"><?= htmlspecialchars($laporan['alamat']) ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Jenis Laporan</span>
                <span class="detail-value"><?= htmlspecialchars($laporan['jenis_laporan']) ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Deskripsi</span>
                <span class="detail-value"><?= nl2br(htmlspecialchars($laporan['deskripsi'])) ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Status</span>
                <span class="detail-value">
                    <span class="badge badge-<?= $laporan['status'] === 'selesai' ? 'green' : ($laporan['status'] === 'diproses' ? 'blue' : 'orange') ?>">
                        <?= ucfirst($laporan['status']) ?>
                    </span>
                </span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Tanggal</span>
                <span class="detail-value"><?= date('d/m/Y H:i', strtotime($laporan['tanggal_laporan'])) ?></span>
            </div>

            <?php if (!empty($laporan['foto'])): ?>
            <div class="detail-row">
                <span class="detail-label">Foto</span>
                <span class="detail-value">
                    <img src="<?= base_url('uploads/' . htmlspecialchars($laporan['foto'])) ?>"
                         style="max-width:300px; border-radius:8px; margin-top:8px;">
                </span>
            </div>
            <?php endif; ?>
        </div>

        <div style="margin-top:24px; display:flex; gap:12px;">
            <a href="<?= site_url('laporan') ?>" class="btn-secondary">← Kembali</a>
            <a href="<?= site_url('laporan/edit/' . $laporan['id_laporan']) ?>" class="btn-edit-link">Edit Laporan</a>
        </div>
    </main>
</div>

<style>
.detail-card { background:#fff; border-radius:12px; padding:32px; box-shadow:0 2px 8px rgba(0,0,0,.06); max-width:600px; }
.detail-row { display:flex; padding:14px 0; border-bottom:1px solid #f0f0f0; }
.detail-row:last-child { border-bottom:none; }
.detail-label { width:160px; font-weight:600; color:#555; font-size:14px; flex-shrink:0; }
.detail-value { color:#333; font-size:14px; line-height:1.6; }
.btn-secondary { background:#f3f4f6; color:#333; padding:10px 22px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none; }
.btn-edit-link { background:#f59e0b; color:#fff; padding:10px 22px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none; }
</style>

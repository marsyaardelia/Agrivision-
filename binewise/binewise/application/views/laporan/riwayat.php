<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="main-wrapper">
    <header class="top-navbar">
        <div class="navbar-title">Riwayat Aktivitas</div>
        <div class="navbar-user-area">
            <div class="user-profile">
                <div class="avatar-placeholder"></div>
                <span class="user-name"><?= htmlspecialchars($this->session->userdata('nama')) ?></span>
            </div>
        </div>
    </header>

    <main class="main-content">
        <h2>Riwayat Laporan</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert-success"><?= htmlspecialchars($this->session->flashdata('success')) ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-error"><?= htmlspecialchars($this->session->flashdata('error')) ?></div>
        <?php endif; ?>

        <!-- Filter -->
        <div class="filter-container">
            <button class="filter-btn" onclick="toggleFilterMenu()">
                <i class="bi bi-funnel"></i> Filter
            </button>
            <div id="filterMenu" class="filter-menu" style="display:none;">
                <a href="<?= site_url('laporan?sort=desc') ?>">Terbaru</a>
                <a href="<?= site_url('laporan?sort=asc') ?>">Terlama</a>
            </div>
        </div>

        <?php if (empty($laporan)): ?>
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <p>Belum ada laporan. <a href="<?= site_url('laporan/tambah') ?>">Buat laporan</a></p>
            </div>
        <?php else: ?>
            <table class="monitor-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alamat</th>
                        <th>Jenis Laporan</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan as $i => $l): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($l['alamat']) ?></td>
                        <td><?= htmlspecialchars($l['jenis_laporan']) ?></td>
                        <td><?= htmlspecialchars(substr($l['deskripsi'], 0, 60)) . (strlen($l['deskripsi']) > 60 ? '...' : '') ?></td>
                        <td>
                            <?php if (!empty($l['foto'])): ?>
                                <img src="<?= base_url('uploads/' . htmlspecialchars($l['foto'])) ?>"
                                     width="60" style="border-radius:4px;">
                            <?php else: ?>
                                <span style="color:#aaa;">–</span>
                            <?php endif; ?>
                        </td>
                        <td><?= date('d/m/Y H:i', strtotime($l['tanggal_laporan'])) ?></td>
                        <td>
                            <span class="badge badge-<?= $l['status'] === 'selesai' ? 'green' : ($l['status'] === 'diproses' ? 'blue' : 'orange') ?>">
                                <?= ucfirst($l['status']) ?>
                            </span>
                        </td>
                        <td style="white-space:nowrap;">
                            <a href="<?= site_url('laporan/edit/' . $l['id_laporan']) ?>"
                               class="btn-action btn-edit">Edit</a>
                            <a href="<?= site_url('laporan/hapus/' . $l['id_laporan']) ?>"
                               onclick="return confirm('Yakin hapus laporan ini?')"
                               class="btn-action btn-hapus">Hapus</a>
                            <a href="<?= site_url('laporan/detail/' . $l['id_laporan']) ?>"
                               class="btn-action btn-detail">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</div>

<style>
.filter-container { position:relative; margin-bottom:16px; }
.filter-btn { background:#f3f4f6; border:1px solid #ddd; padding:8px 16px; border-radius:8px; cursor:pointer; font-size:13px; }
.filter-menu { position:absolute; top:40px; left:0; background:#fff; border:1px solid #ddd; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,.1); z-index:100; min-width:120px; }
.filter-menu a { display:block; padding:10px 16px; color:#333; text-decoration:none; font-size:13px; }
.filter-menu a:hover { background:#f3f4f6; }
.btn-action { padding:4px 10px; border-radius:5px; font-size:12px; font-weight:600; text-decoration:none; display:inline-block; margin:1px; }
.btn-edit { background:#f59e0b; color:#fff; }
.btn-hapus { background:#ef4444; color:#fff; }
.btn-detail { background:#139E07; color:#fff; }
</style>

<script>
function toggleFilterMenu() {
    const m = document.getElementById('filterMenu');
    m.style.display = m.style.display === 'none' ? 'block' : 'none';
}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.filter-container')) {
        document.getElementById('filterMenu').style.display = 'none';
    }
});
</script>

<?php defined('BASEPATH') OR exit('No direct script access allowed');

function badgeStatusAdmin($status) {
    $map = [
        'menunggu' => ['label' => 'Menunggu',   'class' => 'badge-orange'],
        'diproses' => ['label' => 'Di Proses',   'class' => 'badge-blue'],
        'selesai'  => ['label' => 'Selesai',     'class' => 'badge-green'],
    ];
    $s = $map[$status] ?? ['label' => ucfirst($status), 'class' => 'badge-gray'];
    return '<span class="badge ' . $s['class'] . '">' . $s['label'] . '</span>';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BinWise - Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<div class="dashboard-wrapper">

<aside class="sidebar">
    <div class="sidebar-brand">
        <i class="bi bi-trash3-fill brand-icon"></i>
        <h2>BinWise</h2>
    </div>
    <nav class="sidebar-menu">
        <a href="<?= site_url('dashboard/admin') ?>" class="menu-item active">
            <i class="bi bi-house-door menu-icon"></i> Dashboard Admin
        </a>
        <a href="<?= site_url('auth/logout') ?>" class="menu-item logout">
            <i class="bi bi-box-arrow-right menu-icon"></i> Keluar
        </a>
    </nav>
</aside>

<div class="main-wrapper">
    <header class="top-navbar">
        <div class="navbar-title">Dashboard Admin</div>
        <div class="navbar-user-area">
            <div class="user-profile">
                <div class="avatar-placeholder"></div>
                <span class="user-name"><?= htmlspecialchars($this->session->userdata('nama')) ?></span>
                <span class="badge badge-green" style="margin-left:4px">Admin</span>
            </div>
        </div>
    </header>

    <main class="main-content">

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert-success"><?= htmlspecialchars($this->session->flashdata('success')) ?></div>
        <?php endif; ?>

        <!-- Statistik -->
        <div class="Buttons">
            <div class="btn btn-green">
                <i class="bi bi-list-ul"></i>
                <div>
                    <span class="title">Total Laporan</span>
                    <span class="stat-num"><?= $stats['total'] ?></span>
                </div>
            </div>
            <div class="btn btn-orange">
                <i class="bi bi-hourglass-split"></i>
                <div>
                    <span class="title">Menunggu</span>
                    <span class="stat-num"><?= $stats['menunggu'] ?></span>
                </div>
            </div>
            <div class="btn btn-blue">
                <i class="bi bi-gear"></i>
                <div>
                    <span class="title">Di Proses</span>
                    <span class="stat-num"><?= $stats['diproses'] ?></span>
                </div>
            </div>
            <div class="btn btn-lightgreen">
                <i class="bi bi-check-circle"></i>
                <div>
                    <span class="title">Selesai</span>
                    <span class="stat-num"><?= $stats['selesai'] ?></span>
                </div>
            </div>
        </div>

        <h2>Manajemen Laporan</h2>
        <h3>Semua laporan dari warga</h3>

        <?php if (empty($laporan)): ?>
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <p>Belum ada laporan masuk.</p>
            </div>
        <?php else: ?>
            <table class="monitor-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Warga</th>
                        <th>Lokasi</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Ubah Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan as $l): ?>
                    <tr>
                        <td>#<?= str_pad($l['id_laporan'], 3, '0', STR_PAD_LEFT) ?></td>
                        <td><?= htmlspecialchars($l['nama_warga']) ?></td>
                        <td><?= htmlspecialchars($l['alamat']) ?></td>
                        <td><?= htmlspecialchars($l['jenis_laporan']) ?></td>
                        <td><?= date('d/m/Y', strtotime($l['tanggal_laporan'])) ?></td>
                        <td><?= badgeStatusAdmin($l['status']) ?></td>
                        <td>
                            <?php echo form_open('admin/update_status', 'style="display:flex;gap:6px;"'); ?>
                                <input type="hidden" name="id_laporan" value="<?= $l['id_laporan'] ?>">
                                <select name="status" class="select-status">
                                    <option value="menunggu" <?= $l['status'] === 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                                    <option value="diproses" <?= $l['status'] === 'diproses' ? 'selected' : '' ?>>Di Proses</option>
                                    <option value="selesai"  <?= $l['status'] === 'selesai'  ? 'selected' : '' ?>>Selesai</option>
                                </select>
                                <button type="submit" name="update_status" class="btn-update">Simpan</button>
                            <?= form_close() ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </main>
</div>

</div><!-- .dashboard-wrapper -->

<style>
.select-status {
    padding: 6px 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 13px;
}
.btn-update {
    background: #139E07;
    color: white;
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
}
.btn-update:hover { background: #0f8205; }
</style>
</body>
</html>

<?php defined('BASEPATH') OR exit('No direct script access allowed');

function badgeStatus($status) {
    $map = [
        'menunggu' => ['label' => 'Menunggu',   'class' => 'badge-orange'],
        'diproses' => ['label' => 'Di Proses',   'class' => 'badge-blue'],
        'selesai'  => ['label' => 'Selesai',     'class' => 'badge-green'],
    ];
    $s = $map[$status] ?? ['label' => ucfirst($status), 'class' => 'badge-gray'];
    return '<span class="badge ' . $s['class'] . '">' . $s['label'] . '</span>';
}
?>

<div class="main-wrapper">
    <header class="top-navbar">
        <div class="navbar-title">Dashboard Warga</div>
        <div class="navbar-user-area">
            <button class="notif-btn"><i class="bi bi-bell"></i></button>
            <div class="user-profile">
                <div class="avatar-placeholder"></div>
                <span class="user-name"><?= htmlspecialchars($this->session->userdata('nama')) ?></span>
                <i class="bi bi-chevron-down dropdown-icon"></i>
            </div>
        </div>
    </header>

    <main class="main-content">

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert-success"><?= htmlspecialchars($this->session->flashdata('success')) ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-error"><?= htmlspecialchars($this->session->flashdata('error')) ?></div>
        <?php endif; ?>

        <!-- Statistik -->
        <div class="Buttons">
            <div class="btn btn-green">
                <i class="bi bi-trash3"></i>
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
                    <span class="title">Sedang Di Proses</span>
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

        <h2>Selamat Datang, <?= htmlspecialchars($this->session->userdata('nama')) ?>!</h2>
        <h3>Tabel Monitoring Laporan</h3>

        <?php if (empty($laporan)): ?>
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <p>Belum ada laporan. <a href="<?= site_url('laporan/tambah') ?>">Buat laporan pertama</a></p>
            </div>
        <?php else: ?>
            <table class="monitor-table">
                <thead>
                    <tr>
                        <th>ID Laporan</th>
                        <th>Lokasi</th>
                        <th>Jenis Laporan</th>
                        <th>Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan as $lap): ?>
                    <tr>
                        <td>#<?= str_pad($lap['id_laporan'], 3, '0', STR_PAD_LEFT) ?></td>
                        <td><?= htmlspecialchars($lap['alamat']) ?></td>
                        <td><?= htmlspecialchars($lap['jenis_laporan']) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($lap['tanggal_laporan'])) ?></td>
                        <td><?= badgeStatus($lap['status']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </main>
</div>

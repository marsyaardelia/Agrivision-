<?php defined('BASEPATH') OR exit('No direct script access allowed');
$uri = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<aside class="sidebar">
    <div class="sidebar-brand">
        <i class="bi bi-trash3-fill brand-icon"></i>
        <h2>BinWise</h2>
    </div>

    <nav class="sidebar-menu">
        <a href="<?= site_url('dashboard') ?>"
           class="menu-item <?= ($this->uri->segment(1) === 'dashboard' && $this->uri->segment(2) !== 'admin') ? 'active' : '' ?>">
            <i class="bi bi-house-door menu-icon"></i> Beranda
        </a>
        <a href="<?= site_url('laporan/tambah') ?>"
           class="menu-item <?= ($uri === 'laporan/tambah') ? 'active' : '' ?>">
            <i class="bi bi-plus-square menu-icon"></i> Tambah Laporan
        </a>
        <a href="<?= site_url('laporan') ?>"
           class="menu-item <?= ($this->uri->segment(1) === 'laporan' && !$this->uri->segment(2)) ? 'active' : '' ?>">
            <i class="bi bi-clock-history menu-icon"></i> Riwayat Aktivitas
        </a>
        <a href="<?= site_url('akun/profil') ?>"
           class="menu-item <?= ($this->uri->segment(1) === 'akun') ? 'active' : '' ?>">
            <i class="bi bi-person menu-icon"></i> Akun
        </a>
        <a href="<?= site_url('edukasi') ?>"
           class="menu-item <?= ($this->uri->segment(1) === 'edukasi') ? 'active' : '' ?>">
            <i class="bi bi-book menu-icon"></i> Edukasi
        </a>
        <a href="<?= site_url('auth/logout') ?>" class="menu-item logout">
            <i class="bi bi-box-arrow-right menu-icon"></i> Keluar
        </a>
    </nav>
</aside>

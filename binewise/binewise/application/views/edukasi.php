<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="main-wrapper">
    <header class="top-navbar">
        <div class="navbar-title">Edukasi</div>
        <div class="navbar-user-area">
            <div class="user-profile">
                <div class="avatar-placeholder"></div>
                <span class="user-name"><?= htmlspecialchars($this->session->userdata('nama')) ?></span>
            </div>
        </div>
    </header>

    <main class="main-content">
        <h2>Edukasi Pengelolaan Sampah</h2>
        <h3>Pelajari cara mengelola sampah dengan baik</h3>

        <div class="edukasi-grid">

            <div class="edukasi-card">
                <div class="edukasi-icon" style="background:#e8f5e9;">
                    <i class="bi bi-recycle" style="color:#139E07;"></i>
                </div>
                <h4>Prinsip 3R</h4>
                <p><strong>Reduce</strong> – Kurangi penggunaan barang yang menghasilkan sampah.</p>
                <p><strong>Reuse</strong> – Gunakan kembali barang yang masih layak pakai.</p>
                <p><strong>Recycle</strong> – Daur ulang sampah menjadi produk baru yang berguna.</p>
            </div>

            <div class="edukasi-card">
                <div class="edukasi-icon" style="background:#fff3e0;">
                    <i class="bi bi-tags" style="color:#f59e0b;"></i>
                </div>
                <h4>Jenis-Jenis Sampah</h4>
                <p><strong>Organik</strong> – Sisa makanan, daun, kayu. Bisa dijadikan kompos.</p>
                <p><strong>Anorganik</strong> – Plastik, kaca, logam. Bisa didaur ulang.</p>
                <p><strong>B3</strong> – Baterai, cat, pestisida. Perlu penanganan khusus.</p>
            </div>

            <div class="edukasi-card">
                <div class="edukasi-icon" style="background:#e3f2fd;">
                    <i class="bi bi-lightbulb" style="color:#2196f3;"></i>
                </div>
                <h4>Tips Pengelolaan</h4>
                <p>Pisahkan sampah organik dan anorganik dari rumah.</p>
                <p>Buat kompos dari sisa makanan dan daun kering.</p>
                <p>Bawa tas sendiri saat belanja untuk mengurangi kantong plastik.</p>
            </div>

            <div class="edukasi-card">
                <div class="edukasi-icon" style="background:#fce4ec;">
                    <i class="bi bi-exclamation-triangle" style="color:#e53e3e;"></i>
                </div>
                <h4>Bahaya Sampah Sembarangan</h4>
                <p>Menyebabkan banjir akibat tersumbatnya saluran air.</p>
                <p>Menjadi sarang nyamuk penyebab DBD dan malaria.</p>
                <p>Mencemari tanah, air, dan udara di sekitar kita.</p>
            </div>

        </div>
    </main>
</div>

<style>
.edukasi-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:20px; margin-top:20px; }
.edukasi-card { background:#fff; border-radius:12px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,.06); }
.edukasi-icon { width:52px; height:52px; border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:16px; font-size:24px; }
.edukasi-card h4 { margin:0 0 12px; font-size:16px; color:#222; }
.edukasi-card p { margin:0 0 8px; font-size:13px; color:#555; line-height:1.6; }
</style>

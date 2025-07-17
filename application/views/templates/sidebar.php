<?php $level = $this->session->userdata('level'); ?>

<!-- Sidebar -->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Main Menu</li>

            <!-- Dashboard -->
            <li><a href="<?= site_url($level == 'admin' ? 'dashboard_admin' : 'dashboard_resepsionis') ?>">
                <i class="icon-speedometer"></i> Dashboard
            </a></li>

            <?php if ($level == 'admin') : ?>
              <li><a href="<?= site_url('kamar') ?>"><i class="icon-home"></i> Data Kamar</a></li>
              <li><a href="<?= site_url('tamu') ?>"><i class="icon-user"></i> Data Tamu</a></li>
              <li><a href="<?= site_url('reservasi') ?>"><i class="icon-notebook"></i> Reservasi</a></li>
              <li><a href="<?= site_url('pembayaran') ?>"><i class="icon-wallet"></i> Pembayaran</a></li>
              <li><a href="<?= site_url('laporan') ?>"><i class="icon-doc"></i> Laporan</a></li>
              <li><a href="<?= site_url('user') ?>"><i class="icon-people"></i> Manajemen User</a></li>

            <?php elseif ($level == 'resepsionis') : ?>
              <li><a href="<?= site_url('kamar') ?>"><i class="icon-home"></i> Data Kamar</a></li>
              <li><a href="<?= site_url('tamu') ?>"><i class="icon-user"></i> Data Tamu</a></li>
              <li><a href="<?= site_url('reservasi') ?>"><i class="icon-notebook"></i> Reservasi</a></li>
              <li><a href="<?= site_url('pembayaran') ?>"><i class="icon-wallet"></i> Pembayaran</a></li>
            <?php endif; ?>
            
            <!-- Logout -->
            <li><a href="<?= site_url('auth/logout') ?>"><i class="icon-logout"></i> Logout</a></li>
        </ul>
    </div>
</div>

<!-- Content Start -->
<div class="content-body">
    <div class="container-fluid px-0 mt-3"> <!-- Hapus padding kiri-kanan -->

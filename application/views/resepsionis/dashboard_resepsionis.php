<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<style>
  .content-body {
    margin-left: 0 !important;
    padding-left: 0 !important;
  }

  .container-fluid {
    padding-left: 8rem !important;
    padding-right: 1.5rem !important;
  }

  .card h6 {
    font-weight: 600;
  }

  .card-body i {
    opacity: 0.7;
  }

  .title-kiri {
    text-align: left;
  }
</style>

<!-- Konten Utama -->
<div class="content-body">
  <div class="container-fluid px-4 py-4">

    <!-- Judul -->
    <h3 class="mb-4 fw-semibold text-primary">Dashboard Resepsionis</h3>

    <!-- Ringkasan -->
    <div class="row g-4">
      <!-- Total Tamu -->
      <div class="col-md-6 col-xl-3">
        <div class="card shadow border-0 rounded-4">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div>
              <h6>Total Tamu Hari Ini</h6>
              <h3 class="fw-bold"><?= $total_tamu ?></h3>
            </div>
            <i class="fa fa-users fa-2x text-primary"></i>
          </div>
        </div>
      </div>

      <!-- Total Check-in -->
      <div class="col-md-6 col-xl-3">
        <div class="card shadow border-0 rounded-4">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div>
              <h6>Total Check-in Hari Ini</h6>
              <h3 class="fw-bold text-success"><?= $total_checkin ?></h3>
            </div>
            <i class="fa fa-sign-in-alt fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabel Tamu Hari Ini -->
    <div class="card mt-4 shadow border-0 rounded-4">
      <div class="card-body">
        <h5 class="mb-3">Daftar Tamu Hari Ini</h5>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-primary">
              <tr>
                <th>Nama</th>
                <th>No Kamar</th>
                <th>Check-In</th>
                <th>Check-Out</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($tamu_hari_ini)): ?>
                <?php foreach ($tamu_hari_ini as $t): ?>
                  <tr>
                    <td><?= $t->nama_tamu ?></td>
                    <td><?= $t->nomor_kamar ?></td>
                    <td><?= date('d/m/Y', strtotime($t->tgl_checkin)) ?></td>
                    <td><?= date('d/m/Y', strtotime($t->tgl_checkout)) ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4" class="text-center">Tidak ada tamu yang check-in hari ini.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<?php $this->load->view('templates/footer'); ?>

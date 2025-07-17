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

<div class="content-body">
  <div class="container-fluid px-4 py-4">
    <h3 class="mb-4 fw-semibold text-primary title-kiri">Dashboard Admin</h3>

    <!-- Ringkasan -->
    <div class="row g-4">
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

      <div class="col-md-6 col-xl-3">
        <div class="card shadow border-0 rounded-4">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div>
              <h6>Total Pendapatan Hari Ini</h6>
              <h3 class="fw-bold text-success">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></h3>
            </div>
            <i class="fa fa-money-bill-wave fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Grafik dan Reservasi -->
    <div class="row g-4">
      <!-- Grafik -->
      <div class="col-lg-8 mb-4">
        <div class="card shadow border-0 rounded-4 h-100">
          <div class="card-body">
            <h6 class="mb-4 fw-bold">Grafik Pendapatan 7 Hari Terakhir</h6>
            <div style="height: 300px;">
              <canvas id="grafikPendapatan"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Reservasi Terbaru -->
      <div class="col-lg-4">
        <div class="card shadow border-0 rounded-4 h-100">
          <div class="card-body">
            <h6 class="mb-3">Reservasi Terbaru</h6>
            <ul class="list-group list-group-flush">
              <?php foreach ($reservasi as $r): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <?= $r->nama_tamu ?? 'Reservasi #' . $r->id_reservasi ?>
                  <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">
                    <?= date('d/m/Y', strtotime($r->tgl_checkin)) ?>
                  </span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php $this->load->view('templates/footer'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('grafikPendapatan').getContext('2d');
  const grafik = new Chart(ctx, {
    type: 'line',
    data: {
      labels: <?= json_encode(array_column($grafik, 'tanggal')) ?>,
      datasets: [{
        label: 'Pendapatan (Rp)',
        data: <?= json_encode(array_column($grafik, 'jumlah')) ?>,
        backgroundColor: 'rgba(123, 97, 255, 0.1)',
        borderColor: '#7b61ff',
        borderWidth: 2,
        fill: true,
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: function(value) {
              return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
            }
          }
        }
      }
    }
  });
</script>

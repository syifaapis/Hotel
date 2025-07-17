<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      color: #000;
    }
    h2, h4 {
      text-align: center;
      margin: 0;
    }
    .table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    .table th, .table td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }
    .table th {
      background-color: #f2f2f2;
    }
    .text-left {
      text-align: left;
    }
    .mt-5 {
      margin-top: 50px;
    }
  </style>
</head>
<body>

  <h2>LAPORAN PEMBAYARAN</h2>
  <?php if (!empty($this->input->get('tanggal_mulai')) && !empty($this->input->get('tanggal_selesai'))) : ?>
    <h4>Periode: <?= date('d-m-Y', strtotime($this->input->get('tanggal_mulai'))) ?> s/d <?= date('d-m-Y', strtotime($this->input->get('tanggal_selesai'))) ?></h4>
  <?php endif; ?>

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Tamu</th>
        <th>Kode Reservasi</th>
        <th>Tanggal Bayar</th>
        <th>Jumlah Bayar</th>
        <th>Metode</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($pembayaran)) : ?>
        <?php $no = 1; foreach ($pembayaran as $p) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td class="text-left"><?= html_escape($p->nama_tamu) ?></td>
          <td><?= html_escape($p->kode_reservasi) ?></td>
          <td><?= date('d-m-Y', strtotime($p->tgl_bayar)) ?></td>
          <td>Rp <?= number_format($p->jumlah_bayar, 0, ',', '.') ?></td>
          <td><?= html_escape($p->metode) ?></td>
        </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="6">Tidak ada data pembayaran untuk periode ini.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <div class="mt-5" style="text-align:right; margin-right:50px;">
    <p>Dicetak pada: <?= date('d-m-Y') ?></p>
  </div>

  <script>
    window.print();
  </script>

</body>
</html>

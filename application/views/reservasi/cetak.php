<!DOCTYPE html>
<html>
<head>
  <title><?= $title ?></title>
  <style>
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 6px; text-align: left; }
  </style>
</head>
<body>
  <h2><?= $title ?></h2>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Tamu</th>
        <th>No Kamar</th>
        <th>Tipe</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($reservasi as $r): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $r->nama_tamu ?></td>
        <td><?= $r->nomor_kamar ?></td>
        <td><?= $r->tipe_kamar ?></td>
        <td><?= $r->tgl_checkin ?></td>
        <td><?= $r->tgl_checkout ?></td>
        <td><?= ucfirst($r->status) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <script>
    window.print();
  </script>
</body>
</html>

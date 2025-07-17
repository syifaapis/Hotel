<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        h4 { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body onload="window.print()">

<h4><?= $title ?></h4>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tamu</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Metode</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; $total = 0; foreach($laporan as $l): $total += $l->jumlah_bayar; ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $l->nama_tamu ?></td>
            <td><?= $l->tgl_bayar ?></td>
            <td>Rp <?= number_format($l->jumlah_bayar, 0, ',', '.') ?></td>
            <td><?= $l->metode ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="3">Total</th>
            <th colspan="2">Rp <?= number_format($total, 0, ',', '.') ?></th>
        </tr>
    </tbody>
</table>

</body>
</html>

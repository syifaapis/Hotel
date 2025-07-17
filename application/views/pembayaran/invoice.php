<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Hotel XYZ - Bukti Pembayaran</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      color: #333;
    }
    .header {
      text-align: center;
      border-bottom: 2px solid #004080;
      margin-bottom: 30px;
    }
    .header h1 {
      margin: 0;
      color: #004080;
    }
    .header p {
      margin: 5px 0;
    }
    .receipt-title {
      float: right;
      color: #004080;
      font-weight: bold;
      font-size: 20px;
    }
    .info-table, .item-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    .info-table td {
      padding: 5px 10px;
    }
    .item-table th, .item-table td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: right;
    }
    .item-table th {
      background-color: #f2f2f2;
    }
    .item-table td.left {
      text-align: left;
    }
    .footer-note {
      margin-top: 40px;
      text-align: center;
    }
  </style>
</head>
<body onload="window.print()">

  <div class="header">
    <h1>Hotel Amanah</h1>
    <p>Jl. Genjahan Jirapan No.123, Sragen</p>
    <p>📞 +62 857-1817-6795 | ✉️ hotelamanah@example.com</p>
    <p>🌐 www.hotelxyz.com</p>
  </div>

  <div class="receipt-title">RECEIPT</div>

  <table class="info-table">
    <tr>
      <td><strong>Nama Tamu:</strong></td>
      <td><?= $data->nama_tamu ?></td>
    </tr>
    <tr>
      <td><strong>Nomor Kamar:</strong></td>
      <td><?= $data->nomor_kamar ?> (<?= $data->tipe_kamar ?>)</td>
    </tr>
    <tr>
      <td><strong>Check-in:</strong></td>
      <td><?= $data->tgl_checkin ?></td>
    </tr>
    <tr>
      <td><strong>Check-out:</strong></td>
      <td><?= $data->tgl_checkout ?></td>
    </tr>
    <tr>
      <td><strong>Jumlah Tamu:</strong></td>
      <td><?= $data->jumlah_tamu ?></td>
    </tr>
    <tr>
      <td><strong>Tanggal Pembayaran:</strong></td>
      <td><?= $data->tgl_bayar ?></td>
    </tr>
    <tr>
      <td><strong>Metode Pembayaran:</strong></td>
      <td><?= $data->metode ?></td>
    </tr>
  </table>

  <table class="item-table">
    <thead>
      <tr>
        <th>Deskripsi</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="left">Biaya Menginap</td>
        <td>Rp <?= number_format($data->jumlah_bayar, 0, ',', '.') ?></td>
      </tr>
      <tr>
        <td class="left">Pajak (10%)</td>
        <td>Rp <?= number_format($data->jumlah_bayar * 0.10, 0, ',', '.') ?></td>
      </tr>
      <tr>
        <td class="left"><strong>Total</strong></td>
        <td><strong>Rp <?= number_format($data->jumlah_bayar * 1.10, 0, ',', '.') ?></strong></td>
      </tr>
    </tbody>
  </table>

  <p class="footer-note">Terima kasih telah menginap di Hotel XYZ. Kami menantikan kunjungan And

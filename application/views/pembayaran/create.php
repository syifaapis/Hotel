<h4><?= $title ?></h4>
<form method="post">
  <div class="form-group">
    <label>Reservasi</label>
    <select name="id_reservasi" class="form-control" id="reservasiSelect" required>
      <option value="">-- Pilih --</option>
      <?php foreach ($reservasi as $r): ?>
        <option value="<?= $r->id_reservasi ?>"
          data-checkin="<?= $r->tgl_checkin ?>"
          data-checkout="<?= $r->tgl_checkout ?>"
          data-harga="<?= $r->harga ?>">
          ID <?= $r->id_reservasi ?> - <?= $r->tgl_checkin ?> s/d <?= $r->tgl_checkout ?> - Harga: Rp<?= number_format($r->harga) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Tanggal Bayar</label>
    <input type="date" name="tanggal" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Jumlah Bayar</label>
    <input type="number" name="jumlah" class="form-control" id="jumlahBayar" readonly required>
  </div>

  <div class="form-group">
    <label>Metode</label>
    <select name="metode" class="form-control">
      <option>Cash</option>
      <option>Transfer</option>
      <option>QRIS</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="<?= base_url('pembayaran') ?>" class="btn btn-secondary">Kembali</a>
</form>

<script>
  document.getElementById('reservasiSelect').addEventListener('change', function () {
    const selected = this.options[this.selectedIndex];
    const checkin = new Date(selected.getAttribute('data-checkin'));
    const checkout = new Date(selected.getAttribute('data-checkout'));
    const harga = parseInt(selected.getAttribute('data-harga'));

    if (checkin && checkout && !isNaN(harga)) {
      const selisihHari = Math.floor((checkout - checkin) / (1000 * 60 * 60 * 24));
      const total = selisihHari * harga;
      document.getElementById('jumlahBayar').value = total;
    } else {
      document.getElementById('jumlahBayar').value = '';
    }
  });
</script>

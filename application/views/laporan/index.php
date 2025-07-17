<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 pl-4 pr-4">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?= $title ?></h4>

          <form method="get" class="form-inline mb-3">
            <input type="date" name="dari" class="form-control mr-2" value="<?= $this->input->get('dari') ?>" required>
            <input type="date" name="sampai" class="form-control mr-2" value="<?= $this->input->get('sampai') ?>" required>
            <button type="submit" class="btn btn-primary mr-2">Filter</button>
            <button type="button" onclick="cetakLaporan()" class="btn btn-success">Cetak</button>
          </form>

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-light">
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
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
function cetakLaporan() {
  const dari = document.querySelector('[name="dari"]').value;
  const sampai = document.querySelector('[name="sampai"]').value;
  if (dari && sampai) {
    const url = `<?= base_url('laporan/print') ?>?dari=${dari}&sampai=${sampai}`;
    window.open(url, '_blank');
  } else {
    alert('Silakan isi tanggal terlebih dahulu.');
  }
}
</script>

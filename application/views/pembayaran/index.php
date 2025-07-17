<div class="row ml-3">
  <div class="col-md-12">
    <h4><?= html_escape($title) ?></h4>

    <a href="<?= base_url('pembayaran/create') ?>" class="btn btn-primary mb-3">+ Tambah Pembayaran</a>

    <!-- Form Filter dan Cetak -->
    <form class="form-inline mb-3" method="get" action="">
      <div class="form-group mr-2">
        <label for="tanggal_mulai" class="mr-2">Dari:</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
          value="<?= html_escape($this->input->get('tanggal_mulai')) ?>">
      </div>
      <div class="form-group mr-2">
        <label for="tanggal_selesai" class="mr-2">Sampai:</label>
        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
          value="<?= html_escape($this->input->get('tanggal_selesai')) ?>">
      </div>
      <button type="submit" class="btn btn-warning mr-2">Filter</button>
      <a href="<?= base_url('pembayaran') ?>" class="btn btn-secondary mr-2">Reset</a>
    </form>

    <!-- Tabel Data -->
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Nama Tamu</th>
            <th>Kode Reservasi</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Metode</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($pembayaran)) : ?>
            <?php $no = 1; foreach ($pembayaran as $p) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= html_escape($p->nama_tamu) ?></td>
                <td><?= html_escape($p->kode_reservasi) ?></td>
                <td><?= date('d-m-Y', strtotime($p->tgl_bayar)) ?></td>
                <td>Rp <?= number_format($p->jumlah_bayar, 0, ',', '.') ?></td>
                <td><?= html_escape($p->metode) ?></td>
                <td>
                  <a href="<?= base_url('pembayaran/invoice/' . $p->id_pembayaran) ?>" class="btn btn-info btn-sm" target="_blank">
                    <i class="mdi mdi-printer"></i> Cetak
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="7" class="text-center">Data pembayaran belum tersedia.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

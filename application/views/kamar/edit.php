<div class="row ml-4">
  <div class="col-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?= $title ?></h4>

        <form action="<?= base_url('kamar/edit/' . $kamar->id_kamar) ?>" method="post">
          <div class="form-group">
            <label>Nomor Kamar</label>
            <input type="text" name="nomor_kamar" value="<?= set_value('nomor_kamar', $kamar->nomor_kamar) ?>" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Jenis Kamar</label>
            <input type="text" name="tipe_kamar" value="<?= set_value('tipe_kamar', $kamar->tipe_kamar) ?>" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" value="<?= set_value('harga', $kamar->harga) ?>" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
              <option value="Tersedia" <?= $kamar->status == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
              <option value="Terisi" <?= $kamar->status == 'Terisi' ? 'selected' : '' ?>>Terisi</option>
              <option value="Perbaikan" <?= $kamar->status == 'Perbaikan' ? 'selected' : '' ?>>Perbaikan</option>
            </select>
          </div>

          <button type="submit" class="btn btn-warning">Edit</button>
          <a href="<?= base_url('kamar') ?>" class="btn btn-light">Batal</a>
        </form>

      </div>
    </div>
  </div>
</div>

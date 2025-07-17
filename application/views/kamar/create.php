<div class="row ml-4">
  <div class="col-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?= $title ?></h4>
        <form action="" method="post">
          <div class="form-group">
            <label>Nomor Kamar</label>
            <input type="text" name="nomor_kamar" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Jenis Kamar</label>
            <input type="text" name="tipe_kamar" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
              <option value="Tersedia">Tersedia</option>
              <option value="Terisi">Terisi</option>
              <option value="Perbaikan">Perbaikan</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('kamar') ?>" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>

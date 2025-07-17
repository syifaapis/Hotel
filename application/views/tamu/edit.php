<div class="row ml-4">
  <div class="col-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?= $title ?></h4>
        <form action="" method="post">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_tamu" value="<?= $tamu->nama_tamu ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= $tamu->alamat ?></textarea>
          </div>
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="no_hp" value="<?= $tamu->no_hp ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>No KTP</label>
            <input type="text" name="no_ktp" value="<?= $tamu->no_ktp ?>" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-warning">Update</button>
          <a href="<?= base_url('tamu') ?>" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>

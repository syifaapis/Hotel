<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <div class="card mt-4" style="margin-left: 20px;">
        <div class="card-body">
          <h4 class="card-title mb-4"><?= $title ?></h4>

          <form method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" value="<?= $user->username ?>" required>
            </div>

            <div class="form-group">
              <label>Password <small class="text-muted">(Biarkan kosong jika tidak diganti)</small></label>
              <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" value="<?= $user->nama_lengkap ?>" required>
            </div>

            <div class="form-group">
              <label>Level</label>
              <select name="level" class="form-control" required>
                <option value="">-- Pilih Level --</option>
                <option value="admin" <?= $user->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="resepsionis" <?= $user->level == 'resepsionis' ? 'selected' : '' ?>>Resepsionis</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

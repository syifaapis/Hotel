<div class="container-fluid mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow-sm p-4">
        <h4 class="mb-3"><?= $title ?></h4>

        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <a href="<?= base_url('user/create') ?>" class="btn btn-primary mb-3">+ Tambah User</a>

        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($users)): ?>
                <?php foreach ($users as $i => $u): ?>
                  <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $u->username ?></td>
                    <td><?= $u->nama_lengkap ?></td>
                    <td><?= ucfirst($u->level) ?></td>
                    <td>
                      <a href="<?= base_url('user/edit/' . $u->id_user) ?>" class="btn btn-warning btn-sm">Edit</a>
                      <a href="<?= base_url('user/delete/' . $u->id_user) ?>" onclick="return confirm('Yakin ingin menghapus akun ini?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">Belum ada data user.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

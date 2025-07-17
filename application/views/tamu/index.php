<div class="row ml-2">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?= $title ?></h4>
        <a href="<?= base_url('tamu/create') ?>" class="btn btn-primary btn-sm mb-3">+ Tambah Tamu</a>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>No KTP</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach($tamu as $tm): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $tm->nama_tamu ?></td>
                  <td><?= $tm->alamat ?></td>
                  <td><?= $tm->no_ktp ?></td>
                  <td><?= $tm->no_ktp ?></td>
                  <td>
                    <a href="<?= base_url('tamu/edit/'.$tm->id_tamu) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('tamu/delete/'.$tm->id_tamu) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row ml-2">
	<div class="col-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title"><?= $title ?></h4>
				<a href="<?= base_url('reservasi/create') ?>" class="btn btn-primary btn-sm mb-3">+ Tambah Reservasi</a>
				<form method="get" class="mb-3">
					<div class="row">
						<div class="col-md-3">
							<input type="date" name="tanggal_mulai" class="form-control"
								value="<?= set_value('tanggal_mulai', $this->input->get('tanggal_mulai')) ?>">
						</div>
						<div class="col-md-3">
							<input type="date" name="tanggal_selesai" class="form-control"
								value="<?= set_value('tanggal_selesai', $this->input->get('tanggal_selesai')) ?>">
						</div>
						<div class="col-md-2">
							<select name="status" class="form-control">
								<option value="">Semua Status</option>
								<option value="booking" <?= $this->input->get('status') == 'booking' ? 'selected' : '' ?>>Booking</option>
								<option value="checkin" <?= $this->input->get('status') == 'checkin' ? 'selected' : '' ?>>Check-in
								</option>
								<option value="checkout" <?= $this->input->get('status') == 'checkout' ? 'selected' : '' ?>>Check-out
								</option>
							</select>
						</div>
						<div class="col-md-2">
							<button type="submit" class="btn btn-primary">Filter</button>
						</div>
						<?php if ($this->session->userdata('level') == 'admin'): ?>
  <div class="col-md-2 text-end">
    <a href="<?= base_url('reservasi/cetak?' . http_build_query($this->input->get())) ?>"
       class="btn btn-success" target="_blank">
       <i class="fa fa-print me-1"></i> Cetak
    </a>
  </div>
<?php endif; ?>

					</div>
				</form>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Tamu</th>
								<th>Nomor Kamar</th>
								<th>Check In</th>
								<th>Check Out</th>
								<th>Jumlah Tamu</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($reservasi as $r): ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $r->nama_tamu ?></td>
								<td><?= $r->nomor_kamar ?></td>
								<td><?= $r->tgl_checkin ?></td>
								<td><?= $r->tgl_checkout ?></td>
								<td><?= $r->jumlah_tamu ?></td>
								<td><?= $r->status ?></td>
								<td>
									<a href="<?= base_url('reservasi/edit/'.$r->id_reservasi) ?>" class="btn btn-warning btn-sm">Edit</a>
									<a href="<?= base_url('reservasi/delete/'.$r->id_reservasi) ?>"
										onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</a>
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

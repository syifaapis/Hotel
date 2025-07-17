<div class="row">
	<div class="col-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title"><?= $title ?></h4>
				<form action="" method="post">

					<div class="form-group">
						<label for="id_tamu">Nama Tamu</label>
						<select name="id_tamu" class="form-control" required>
							<option value="">-- Pilih Tamu --</option>
							<?php foreach($tamu as $tm): ?>
							<option value="<?= $tm->id_tamu ?>"
								<?= $reservasi->id_tamu == $tm->id_tamu ? 'selected' : '' ?>>
								<?= $tm->nama_tamu ?>
							</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="id_kamar">Nomor Kamar</label>
						<select name="id_kamar" class="form-control" required>
							<option value="">-- Pilih Kamar --</option>
							<?php foreach($kamar as $kmr): ?>
							<option value="<?= $kmr->id_kamar ?>"
								<?= $reservasi->id_kamar == $kmr->id_kamar ? 'selected' : '' ?>>
								<?= $kmr->nomor_kamar ?> - <?= $kmr->tipe_kamar ?>
							</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="tgl_checkin">Check In</label>
						<input type="date" name="tgl_checkin" class="form-control"
							value="<?= $reservasi->tgl_checkin ?>" required>
					</div>

					<div class="form-group">
						<label for="tgl_checkout">Check Out</label>
						<input type="date" name="tgl_checkout" class="form-control"
							value="<?= $reservasi->tgl_checkout ?>" required>
					</div>

					<div class="form-group">
						<label for="jumlah_tamu">Jumlah Tamu</label>
						<input type="number" name="jumlah_tamu" class="form-control" min="1"
							value="<?= $reservasi->jumlah_tamu ?>" required>
					</div>

                    <select name="status" class="form-control" required>
                        <option value="booking" <?= $reservasi->status == 'booking' ? 'selected' : '' ?>>Booked</option>
                        <option value="checkin" <?= $reservasi->status == 'checkin' ? 'selected' : '' ?>>Check-in</option>
                        <option value="checkout" <?= $reservasi->status == 'checkout' ? 'selected' : '' ?>>Check-out</option>
                    </select>



					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="<?= base_url('reservasi') ?>" class="btn btn-light">Batal</a>

				</form>
			</div>
		</div>
	</div>
</div>

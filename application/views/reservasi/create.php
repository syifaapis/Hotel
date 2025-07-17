<div class="row">
  <div class="col-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?= $title ?></h4>

        <form action="" method="post">
          
          <!-- Pilih Tamu -->
          <div class="form-group">
            <label for="tamu_id">Nama Tamu</label>
            <select name="id_tamu" class="form-control" required>
              <option value="">-- Pilih Tamu --</option>
              <?php foreach($tamu as $tm): ?>
                <option value="<?= $tm->id_tamu ?>"><?= $tm->nama_tamu ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Pilih Kamar -->
          <div class="form-group">
            <label for="kamar_id">Nomor Kamar</label>
            <select name="id_kamar" class="form-control" required>
              <option value="">-- Pilih Kamar Tersedia --</option>
              <?php foreach($kamar as $kmr): ?>
                <option value="<?= $kmr->id_kamar ?>">
                  <?= $kmr->nomor_kamar ?> - <?= $kmr->tipe_kamar ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Tanggal Check-in -->
          <div class="form-group">
            <label for="tgl_checkin">Check In</label>
            <input type="date" name="tgl_checkin" class="form-control" required>
          </div>

          <!-- Tanggal Check-out -->
          <div class="form-group">
            <label for="tgl_checkout">Check Out</label>
            <input type="date" name="tgl_checkout" class="form-control" required>
          </div>

          <!-- Jumlah Tamu -->
          <div class="form-group">
            <label for="jumlah_tamu">Jumlah Tamu</label>
            <input type="number" name="jumlah_tamu" class="form-control" required min="1">
          </div>

          <!-- Status -->
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
              <option value="">-- Pilih Status --</option>
              <option value="booking">Booking</option>
              <option value="checkin">Check-In</option>
              <option value="checkout">Check-Out</option>
              <option value="batal">Batal</option>
            </select>
          </div>

          <!-- Tombol Submit -->
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('reservasi') ?>" class="btn btn-light">Batal</a>

        </form>
      </div>
    </div>
  </div>
</div>

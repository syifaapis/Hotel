<div class="row konten-kamar ">
	<div class="col-12">
		<h4 class="mb-3"><?= $title ?></h4>

		<?php if ($this->session->userdata('level') == 'admin'): ?>
			<a href="<?= base_url('kamar/create') ?>" class="btn btn-primary btn-sm mb-4">+ Tambah Kamar</a>
		<?php endif; ?>
		<style>
			.konten-kamar {
  padding-left: 20px;
  padding-right: 20px;
}

		</style>

		<div class="row konten-kamar">
			<?php foreach ($kamar as $kmr): ?>
				<div class="col-md-3 mb-4">
					<div class="card text-white 
						<?php
							if (strtolower($kmr->status) == 'tersedia') echo 'bg-success';
							elseif (strtolower($kmr->status) == 'terisi') echo 'bg-danger';
							elseif (strtolower($kmr->status) == 'perbaikan') echo 'bg-warning text-dark';
							else echo 'bg-secondary';
						?>"
					>
						<div class="card-body text-center">
							<h3><?= $kmr->nomor_kamar ?></h3>
							<p class="mb-2"><?= strtoupper($kmr->tipe_kamar) ?></p>
							<p class="mb-2">Rp <?= number_format($kmr->harga, 0, ',', '.') ?></p>
							<span class="badge bg-light text-dark"><?= ucfirst($kmr->status) ?></span>

							<?php if ($this->session->userdata('level') == 'admin'): ?>
								<div class="mt-3">
									<a href="<?= base_url('kamar/edit/'.$kmr->id_kamar) ?>" class="btn btn-warning btn-sm">Edit</a>
									<a href="<?= base_url('kamar/delete/'.$kmr->id_kamar) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

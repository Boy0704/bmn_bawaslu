<form action="" method="POST">
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" name="tanggal_pengajuan" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly="">
	</div>
	<div class="form-group">
		<label>Kategori Dokumen</label>
		<select class="form-control" name="kategori">
			<?php foreach ($this->db->get('kategori_dokumen')->result() as $rw): ?>
				<option value="<?php echo $rw->id_dokumen ?>"><?php echo $rw->kode_dokumen.' - '.$rw->kategori_dokumen ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
	</div>
</form>
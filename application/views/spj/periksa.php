<form action="" method="POST">
	<?php 
	$data = $this->db->get_where('pengajuan', ['id_pengajuan'=>$this->uri->segment(3)])->row();
	 ?>
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" name="tanggal_periksa" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly="">
	</div>
	<div class="form-group">
		<label>Kategori Dokumen</label>
		<select class="form-control" name="kategori">
			<option value="<?php echo $data->kategori ?>"><?php echo get_data('kategori_dokumen','id_dokumen',$data->kategori,'kategori_dokumen') ?></option>
			<?php foreach ($this->db->get('kategori_dokumen')->result() as $rw): ?>
				<option value="<?php echo $rw->id_dokumen ?>"><?php echo $rw->kode_dokumen.' - '.$rw->kategori_dokumen ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nominal</label>
		<input type="number" name="nominal" class="form-control">
	</div>
	<div class="form-group">
		<label class="radio-inline">
	      <input type="radio" name="status" value="lengkap">LENGKAP
	    </label>
	    <label class="radio-inline">
	      <input type="radio" name="status" value="revisi">TIDAK LENGKAP
	    </label>
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea class="form-control" name="keterangan"></textarea>
	</div>
	<div class="form-group">
		<button class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
	</div>
</form>
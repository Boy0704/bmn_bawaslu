<div class="row">
	<?php if ($this->session->userdata('level') !='admin'): ?>
		<div class="col-md-3">

			<a href="app/tambah_pengajuan" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Dokumen SPJ</a>
			<a href="" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
		</div>	
	<?php endif ?>
	
	<div class="col-md-6">
		<form action="" method="GET">
			<!-- <select class="form-control" name="filter_pum">
				<option value="semua PUM">SEMUA PUM</option>
				<?php 
				$sql = "SELECT jabatan FROM a_user where jabatan LIKE '%pum%' GROUP BY jabatan";
				foreach ($this->db->query($sql)->result() as $rw): ?>
				<option value="<?php echo $rw->jabatan ?>"><?php echo $rw->jabatan ?></option>
				<?php endforeach ?>
			</select>
			<br> -->
			<select class="form-control" name="filter_status">
				<option value="semua">SEMUA STATUS</option>
				<option value="pengajuan baru">Pengajuan Baru</option>
				<option value="revisi">Revisi</option>
				<option value="sudah revisi">Sudah Revisi</option>
				<option value="lengkap">Lengkap</option>
			</select>
			<br>
			<button type="submit" class="btn btn-info">FILTER</button>
		</form>
	</div>
	<div class="col-md-12">
		<div class="table-responsive">
		<table class="table table-bordered" id="example2">
			<thead>
				<tr>
					<th>No.</th>
					<th>PUM</th>
					<th>Tanggal Pengajuan</th>
					<th>Tanggal Periksa</th>
					<th>Kategori</th>
					<th>Nama Dokumen</th>
					<th>Nominal</th>
					<th>Keterangan Verifikator</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				if (isset($_GET['filter_status'])) {
					if ($this->input->get('filter_status') != 'semua') {
						$status = $this->input->get('filter_status');
						$this->db->where('status', $status);
					}
					
				}
				if ($this->session->userdata('level') != 'admin') {
					$this->db->where('id_user', $this->session->userdata('id_user'));
				}
				foreach ($this->db->get('pengajuan')->result() as $rw): ?>
				
				
				<tr>
					<td><?php echo $no ?></td>
					<td><?php echo get_data('a_user','id_user',$rw->id_user,'jabatan') ?></td>
					<td><?php echo $rw->tanggal_pengajuan ?></td>
					<td><?php echo $rw->tanggal_periksa ?></td>
					<td><?php echo get_data('kategori_dokumen','id_dokumen',$rw->kategori,'kode_dokumen') ?></td>
					<td><?php echo get_data('kategori_dokumen','id_dokumen',$rw->kategori,'kategori_dokumen') ?></td>
					<td><?php echo number_format($rw->nominal) ?></td>
					<td><?php echo $rw->keterangan_verifikator ?></td>
					<td>
						<?php if ($rw->status=='pengajuan baru'): ?>
							<?php if ($this->session->userdata('level') == 'admin'): ?>
								<a href="app/periksa_pengajuan/<?php echo $rw->id_pengajuan ?>" class="label label-info">PENGAJUAN BARU</a>
							<?php else: ?>
								<label class="label label-info">PENGAJUAN BARU</label>
							<?php endif ?>
							
						<?php endif ?>

						<?php if ($rw->status == 'revisi'): ?>
							<a href="app/revisi_pengajuan/<?php echo $rw->id_pengajuan ?>" class="label label-warning">REVISI</a>
						<?php endif ?>

						<?php if ($rw->status == 'sudah revisi'): ?>
							<?php if ($this->session->userdata('level') == 'admin'): ?>
								<a href="app/periksa_pengajuan/<?php echo $rw->id_pengajuan ?>" class="label label-default">SUDAH REVISI</a>
							<?php else: ?>
								<label class="label label-default">SUDAH REVISI</label>
							<?php endif ?>
						<?php endif ?>

						<?php if ($rw->status == 'lengkap'): ?>
							<label class="label label-success">LENGKAP</label>
						<?php endif ?>
					</td>
					<td>
						<a href="app/revisi_pengajuan/<?php echo $rw->id_pengajuan ?>" class="btn btn-xs btn-info">Edit</a>
						<?php if ($this->session->userdata('level') !='admin'): ?>
							<a href="app/hapus_pengajuan/<?php echo $rw->id_pengajuan ?>" class="btn btn-xs btn-danger">Hapus</a>
						<?php endif ?>
						
					</td>
				</tr>
				<?php $no++; endforeach ?>
			</tbody>
		</table>
		</div>
	</div>
</div>
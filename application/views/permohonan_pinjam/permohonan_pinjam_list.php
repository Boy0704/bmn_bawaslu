
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('permohonan_pinjam/create'),'Create', 'class="btn btn-primary"'); ?>
                <a href="app/cetak/cetak_peminjaman_barang" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px" id="example2">
            <thead>
            <tr>
                <th>No</th>
		<th>Masa Pinjam</th>
		<th>Nama</th>
		<th>Barang</th>
		<th>Qty</th>
		<th>Keterangan</th>
		<th>Disetujui</th>
		<th>Action</th>
            </tr>
            </thead>
            <tbody><?php
            $start = 1;
            if ($this->session->userdata('level') == 'user') {
                $this->db->where('id_user', $this->session->userdata('id_user'));
            }
            $permohonan_pinjam_data = $this->db->get('permohonan_pinjam');
            foreach ($permohonan_pinjam_data->result() as $permohonan_pinjam)
            {
                ?>
                <tr>
			<td width="80px"><?php echo $start ?></td>
			<td><?php echo $permohonan_pinjam->nip ?></td>
			<td><?php echo $permohonan_pinjam->nama ?></td>
			<td><?php echo get_data('barang','id_barang',$permohonan_pinjam->id_barang,'nama_barang') ?></td>
			<td><?php echo $permohonan_pinjam->qty ?></td>
			<td><?php echo $permohonan_pinjam->keterangan ?></td>
			<td>
                <?php 
                if ($permohonan_pinjam->disetujui == 'i') {
                    echo "<span class=\"bg-info\">Menunggu</span>";
                } elseif ($permohonan_pinjam->disetujui == 't') {
                    echo "<span class=\"bg-danger\">Di Tolak</span>";
                } else {
                    echo "<span class=\"bg-success\">Di Setujui</span>";
                }

                 ?>         
            </td>
			<td style="text-align:center" width="200px">
                <?php if ($this->session->userdata('level') == 'admin'): ?>
                    <?php if ($permohonan_pinjam->disetujui == 'i' || $permohonan_pinjam->disetujui == 't'): ?>
                        <a href="permohonan_pinjam/setuju/y/<?php echo $permohonan_pinjam->id_pinjam ?>" class="label label-primary">Setujui</a>
                        <a href="permohonan_pinjam/setuju/t/<?php echo $permohonan_pinjam->id_pinjam ?>" class="label label-warning">Tolak</a>
                    <?php else: ?>
                        <a href="permohonan_pinjam/setuju/t/<?php echo $permohonan_pinjam->id_pinjam ?>" class="label label-warning">Tolak</a>
                    <?php endif ?>
                    
                <?php endif ?>
				<?php 
				echo anchor(site_url('permohonan_pinjam/update/'.$permohonan_pinjam->id_pinjam),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('permohonan_pinjam/delete/'.$permohonan_pinjam->id_pinjam),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
                $start++;
            }
            ?>
            </tbody>
        </table>
        </div>
        
    
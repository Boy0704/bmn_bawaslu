
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pemeliharaan_kendaraan/create'),'Create', 'class="btn btn-primary"'); ?>
                <a href="app/cetak/cetak_pemeliharaan" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pemeliharaan_kendaraan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pemeliharaan_kendaraan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Jenis Kendaraan</th>
		<th>Merk</th>
		<th>No Plat</th>
		<th>Jenis Servis</th>
		<th>Tanggal Servis</th>
		<th>Penanggung Jawab</th>
		<th>Action</th>
            </tr><?php
            foreach ($pemeliharaan_kendaraan_data as $pemeliharaan_kendaraan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pemeliharaan_kendaraan->jenis_kendaraan ?></td>
			<td><?php echo $pemeliharaan_kendaraan->merk ?></td>
			<td><?php echo $pemeliharaan_kendaraan->no_plat ?></td>
			<td><?php echo $pemeliharaan_kendaraan->jenis_servis ?></td>
			<td><?php echo $pemeliharaan_kendaraan->tanggal_servis ?></td>
			<td><?php echo $pemeliharaan_kendaraan->penanggung_jawab ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pemeliharaan_kendaraan/update/'.$pemeliharaan_kendaraan->id_pemeliharaan),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('pemeliharaan_kendaraan/delete/'.$pemeliharaan_kendaraan->id_pemeliharaan),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    
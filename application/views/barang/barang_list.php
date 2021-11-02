
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('barang/create'),'Create', 'class="btn btn-primary"'); ?>
                <a href="app/cetak/cetak_barang" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('barang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('barang'); ?>" class="btn btn-default">Reset</a>
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
                <th rowspan="2">No</th>
                <th colspan="5" style="text-align: center;">Identitas Barang</th>
		          <th rowspan="2">Qty</th>
                <th rowspan="2">Satuan</th>
                <th colspan="2" style="text-align: center;">Harga</th>
                <th rowspan="2">Kondisi Barang</th>
                <th rowspan="2">Action</th>
            </tr>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Tahun Perolehan</th>
                <th>Nup</th>
                <th>Merk / Type</th>
                
                <th rowspan="">Harga Satuan</th>
                <th>Harga Barang</th>
                
            </tr>
            <?php
            foreach ($barang_data as $barang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $barang->kode_barang ?></td>
			<td><?php echo $barang->nama_barang ?></td>
			<td><?php echo $barang->tahun_perolehan ?></td>
			<td><?php echo $barang->nup ?></td>
			<td><?php echo $barang->merk ?></td>
			<td><?php echo $barang->qty ?></td>
			<td><?php echo $barang->satuan ?></td>
			<td><?php echo $barang->harga_satuan ?></td>
			<td><?php echo $barang->harga_barang ?></td>
			<td><?php echo $barang->kondisi_barang ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('barang/update/'.$barang->id_barang),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('barang/delete/'.$barang->id_barang),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    
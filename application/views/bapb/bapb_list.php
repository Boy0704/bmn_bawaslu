
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('bapb/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('bapb/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('bapb'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama P1</th>
		<th>Nip P1</th>
		<th>Jabatan P1</th>
		<th>Nama P2</th>
		<th>Nip P2</th>
		<th>Jabatan P2</th>
        <th>Barang</th>
		<th>File</th>
		<th>Action</th>
            </tr><?php
            if ($this->session->userdata('level') == 'user') {
                $this->db->where('id_user', $this->session->userdata('id_user'));
            }
            foreach ($bapb_data as $bapb)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $bapb->nama1 ?></td>
			<td><?php echo $bapb->nip1 ?></td>
			<td><?php echo $bapb->jabatan1 ?></td>
			<td><?php echo $bapb->nama2 ?></td>
			<td><?php echo $bapb->nip2 ?></td>
			<td><?php echo $bapb->jabatan2 ?></td>
            <td>
                <table class="table">
                    <tr>
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td><?php echo get_data('barang','id_barang',$bapb->id_barang,'nama_barang') ?></td>
                    </tr>
                    <tr>
                        <td>Merk</td>
                        <td>:</td>
                        <td><?php echo get_data('barang','id_barang',$bapb->id_barang,'merk') ?></td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td><?php echo get_data('barang','id_barang',$bapb->id_barang,'tahun_perolehan') ?></td>
                    </tr>
                    <tr>
                        <td>Unit</td>
                        <td>:</td>
                        <td><?php echo get_data('barang','id_barang',$bapb->id_barang,'satuan') ?></td>
                    </tr>
                    <tr>
                        <td>Kondisi</td>
                        <td>:</td>
                        <td><?php echo get_data('barang','id_barang',$bapb->id_barang,'kondisi_barang') ?></td>
                    </tr>
                </table>
            </td>
			<td><a href="image/file/<?php echo $bapb->file ?>" target="_blank"><?php echo $bapb->file ?></a></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('bapb/update/'.$bapb->id_bapb),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('bapb/delete/'.$bapb->id_bapb),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    
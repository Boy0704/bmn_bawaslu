
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Barang <?php echo form_error('kode_barang') ?></label>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tahun Perolehan <?php echo form_error('tahun_perolehan') ?></label>
            <input type="text" class="form-control" name="tahun_perolehan" id="tahun_perolehan" placeholder="Tahun Perolehan" value="<?php echo $tahun_perolehan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nup <?php echo form_error('nup') ?></label>
            <input type="text" class="form-control" name="nup" id="nup" placeholder="Nup" value="<?php echo $nup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Merk <?php echo form_error('merk') ?></label>
            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?php echo $merk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Qty <?php echo form_error('qty') ?></label>
            <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Satuan <?php echo form_error('satuan') ?></label>
            <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Harga Satuan <?php echo form_error('harga_satuan') ?></label>
            <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Harga Barang <?php echo form_error('harga_barang') ?></label>
            <input type="text" class="form-control" name="harga_barang" id="harga_barang" placeholder="Harga Barang" value="<?php echo $harga_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kondisi Barang <?php echo form_error('kondisi_barang') ?></label>
            <select class="form-control" name="kondisi_barang">
                <option value="<?php echo $kondisi_barang ?>"><?php echo $kondisi_barang ?></option>
                <option value="Barang Rusak Berat">Barang Rusak Berat</option>
                <option value="Barang Rusak Ringan">Barang Rusak Ringan</option>
                <option value="Barang Baik">Barang Baik</option>
            </select>
        </div>
        <div class="form-group">
            <label for="int">Pemilik <?php echo form_error('pemilik') ?></label>
            <input type="text" class="form-control" name="pemilik" id="pemilik" placeholder="Pemilik Barang" value="<?php echo $pemilik; ?>" />
        </div>
	    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
	</form>
   
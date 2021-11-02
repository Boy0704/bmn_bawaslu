
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jenis Kendaraan <?php echo form_error('jenis_kendaraan') ?></label>
            <input type="text" class="form-control" name="jenis_kendaraan" id="jenis_kendaraan" placeholder="Jenis Kendaraan" value="<?php echo $jenis_kendaraan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Merk <?php echo form_error('merk') ?></label>
            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?php echo $merk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Plat <?php echo form_error('no_plat') ?></label>
            <input type="text" class="form-control" name="no_plat" id="no_plat" placeholder="No Plat" value="<?php echo $no_plat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Servis <?php echo form_error('jenis_servis') ?></label>
            <input type="text" class="form-control" name="jenis_servis" id="jenis_servis" placeholder="Jenis Servis" value="<?php echo $jenis_servis; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Servis <?php echo form_error('tanggal_servis') ?></label>
            <input type="text" class="form-control" name="tanggal_servis" id="tanggal_servis" placeholder="Tanggal Servis" value="<?php echo $tanggal_servis; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Penanggung Jawab <?php echo form_error('penanggung_jawab') ?></label>
            <input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab" placeholder="Penanggung Jawab" value="<?php echo $penanggung_jawab; ?>" />
        </div>
	    <input type="hidden" name="id_pemeliharaan" value="<?php echo $id_pemeliharaan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pemeliharaan_kendaraan') ?>" class="btn btn-default">Cancel</a>
	</form>
   

        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama1 <?php echo form_error('nama1') ?></label>
            <input type="text" class="form-control" name="nama1" id="nama1" placeholder="Nama1" value="<?php echo $nama1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nip1 <?php echo form_error('nip1') ?></label>
            <input type="text" class="form-control" name="nip1" id="nip1" placeholder="Nip1" value="<?php echo $nip1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan1 <?php echo form_error('jabatan1') ?></label>
            <input type="text" class="form-control" name="jabatan1" id="jabatan1" placeholder="Jabatan1" value="<?php echo $jabatan1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama2 <?php echo form_error('nama2') ?></label>
            <input type="text" class="form-control" name="nama2" id="nama2" placeholder="Nama2" value="<?php echo $nama2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nip2 <?php echo form_error('nip2') ?></label>
            <input type="text" class="form-control" name="nip2" id="nip2" placeholder="Nip2" value="<?php echo $nip2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan2 <?php echo form_error('jabatan2') ?></label>
            <input type="text" class="form-control" name="jabatan2" id="jabatan2" placeholder="Jabatan2" value="<?php echo $jabatan2; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Barang <?php echo form_error('id_barang') ?></label>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
	    <input type="hidden" name="id_bapb" value="<?php echo $id_bapb; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bapb') ?>" class="btn btn-default">Cancel</a>
	</form>
   
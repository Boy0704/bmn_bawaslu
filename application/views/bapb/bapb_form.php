
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="alert alert-info">Pihak Pertama</div>
	    <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama1') ?></label>
            <input type="text" class="form-control" name="nama1" id="nama1" placeholder="Nama1" value="<?php echo $nama1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nip <?php echo form_error('nip1') ?></label>
            <input type="text" class="form-control" name="nip1" id="nip1" placeholder="Nip1" value="<?php echo $nip1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan1') ?></label>
            <input type="text" class="form-control" name="jabatan1" id="jabatan1" placeholder="Jabatan1" value="<?php echo $jabatan1; ?>" />
        </div>
        <div class="alert alert-info">Pihak Kedua</div>
	    <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama2') ?></label>
            <input type="text" class="form-control" name="nama2" id="nama2" placeholder="Nama2" value="<?php echo $nama2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nip <?php echo form_error('nip2') ?></label>
            <input type="text" class="form-control" name="nip2" id="nip2" placeholder="Nip2" value="<?php echo $nip2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan2') ?></label>
            <input type="text" class="form-control" name="jabatan2" id="jabatan2" placeholder="Jabatan2" value="<?php echo $jabatan2; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Barang <?php echo form_error('id_barang') ?></label>
            <select class="form-control select2" name="id_barang">
                <option value="<?php echo $id_barang ?>"><?php echo get_data('barang','id_barang',$id_barang,'nama_barang') ?></option>
                <?php foreach ($this->db->get('barang')->result() as $key => $value): ?>
                    <option value="<?php echo $value->id_barang ?>"><?php echo $value->nama_barang ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <label for="varchar">Upload File</label>
            <input type="file" class="form-control" name="file" id="file" required/>
            <p style="color: red;">File yang bsa di upload extention .pdf</p>
            <div>
                <?php if ($file != ''): ?>
                    <b>*) File Sebelumnya : </b><br>
                    <img src="image/user/<?php echo $file ?>" style="width: 100px;">
                <?php endif ?>
            </div>
        </div>

	    <input type="hidden" name="id_bapb" value="<?php echo $id_bapb; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bapb') ?>" class="btn btn-default">Cancel</a>
	</form>
   
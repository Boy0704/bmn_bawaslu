
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo ($this->uri->segment(2) == 'create') ? $this->session->userdata('nama') : $nama; ?>" />
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
            <label for="int">Qty <?php echo form_error('qty') ?></label>
            <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="id_pinjam" value="<?php echo $id_pinjam; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('permohonan_pinjam') ?>" class="btn btn-default">Cancel</a>
	</form>
   
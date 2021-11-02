<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Barang.xls");
?>

<h2>Data Barang</h2>

<table class="table table-bordered" style="margin-bottom: 10px" border="1">
            <tr>
                <th rowspan="2">No</th>
                <th colspan="5" style="text-align: center;">Identitas Barang</th>
		          <th rowspan="2">Qty</th>
                <th rowspan="2">Satuan</th>
                <th colspan="2" style="text-align: center;">Harga</th>
                <th rowspan="2">Kondisi Barang</th>
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
            $start = 1;
            $barang_data = $this->db->get('barang')->result();
            foreach ($barang_data as $barang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo $start ?></td>
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
		</tr>
                <?php
                $start++;
            }
            ?>
        </table>
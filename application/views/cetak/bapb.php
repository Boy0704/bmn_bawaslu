<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data BAPB.xls");
?>

<h2>Data Berita Acara Penerimaan Barang</h2>

<table class="table table-bordered" style="margin-bottom: 10px" border="1">
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
        
            </tr><?php
            $start = 1;
            $bapb_data = $this->db->get('bapb')->result();
            foreach ($bapb_data as $bapb)
            {
                ?>
                <tr>
            <td width="80px"><?php echo $start ?></td>
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
            
        </tr>
                <?php
                $start++;
            }
            ?>
        </table>
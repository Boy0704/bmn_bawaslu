<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Permohonan Pinjaman.xls");
?>

<h2>Data Berita Acara Penerimaan Barang</h2>

<table class="table table-bordered" style="margin-bottom: 10px" border="1">
            <thead>
            <tr>
                <th>No</th>
        <th>Nip</th>
        <th>Nama</th>
        <th>Barang</th>
        <th>Qty</th>
        <th>Keterangan</th>
        <th>Disetujui</th>
            </tr>
            </thead>
            <tbody><?php
            $start = 1;
            
            $permohonan_pinjam_data = $this->db->get('permohonan_pinjam');
            foreach ($permohonan_pinjam_data->result() as $permohonan_pinjam)
            {
                ?>
                <tr>
            <td width="80px"><?php echo $start ?></td>
            <td><?php echo $permohonan_pinjam->nip ?></td>
            <td><?php echo $permohonan_pinjam->nama ?></td>
            <td><?php echo get_data('barang','id_barang',$permohonan_pinjam->id_barang,'nama_barang') ?></td>
            <td><?php echo $permohonan_pinjam->qty ?></td>
            <td><?php echo $permohonan_pinjam->keterangan ?></td>
            <td>
                <?php 
                if ($permohonan_pinjam->disetujui == 'i') {
                    echo "<span class=\"bg-info\">Menunggu</span>";
                } elseif ($permohonan_pinjam->disetujui == 't') {
                    echo "<span class=\"bg-danger\">Di Tolak</span>";
                } else {
                    echo "<span class=\"bg-success\">Di Setujui</span>";
                }

                 ?>         
            </td>
            
        </tr>
                <?php
                $start++;
            }
            ?>
            </tbody>
        </table>
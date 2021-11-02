<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data pemeliharaan_kendaraan.xls");
?>

<h2>Data Riwayat Pemeliharaan Kendaraan</h2>

<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>Jenis Kendaraan</th>
        <th>Merk</th>
        <th>No Plat</th>
        <th>Jenis Servis</th>
        <th>Tanggal Servis</th>
        <th>Penanggung Jawab</th>
            </tr><?php
            $start = 1;
            $pemeliharaan_kendaraan_data = $this->db->get('pemeliharaan_kendaraan')->results();
            foreach ($pemeliharaan_kendaraan_data as $pemeliharaan_kendaraan)
            {
                ?>
                <tr>
            <td width="80px"><?php echo $start ?></td>
            <td><?php echo $pemeliharaan_kendaraan->jenis_kendaraan ?></td>
            <td><?php echo $pemeliharaan_kendaraan->merk ?></td>
            <td><?php echo $pemeliharaan_kendaraan->no_plat ?></td>
            <td><?php echo $pemeliharaan_kendaraan->jenis_servis ?></td>
            <td><?php echo $pemeliharaan_kendaraan->tanggal_servis ?></td>
            <td><?php echo $pemeliharaan_kendaraan->penanggung_jawab ?></td>
            
        </tr>
                <?php
                $start++;
            }
            ?>
        </table>
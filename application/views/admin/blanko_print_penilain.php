<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
<style>
    @page {
        size: A4
    }

    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
    }

    .table {
        width: 100%;

    }



    .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border: 1px solid #000000;

    }

    .text-center {
        text-align: center;
    }
</style>

<body class="A4">
    <section class="sheet padding-10mm">
        <h1>Laporan Penilaian</h1>

        <table>
            <tr>
                <td>No. Induk Pegawai </td>
                <td>&nbsp; : &nbsp;</td>
                <td><?= $pegawai['nip'] ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap </td>
                <td>&nbsp; : &nbsp;</td>
                <td><?= $pegawai['nama'] ?></td>
            </tr>
            <tr>
                <td>Jabatan </td>
                <td>&nbsp; : &nbsp;</td>
                <td><?= $pegawai['nama_jabatan'] ?></td>
            </tr>
            <tr>
                <td>Periode </td>
                <td>&nbsp; : &nbsp;</td>
                <td>Januari - Desember</td>
            </tr>

        </table>
        <br>


        <table class="table">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>KRITERIA</th>
                    <th>NILAI</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($nilai as $_nilai) {
                ?>
                    <tr>
                        <td class="text-center" width="20"><?= $i++ ?></td>
                        <td><?= $_nilai['nama_kriteria'] ?></td>
                        <td class="text-center"><?= $_nilai['nilai'] ?></td>
                        <td><?php
                            foreach ($_nilai['keterangan'] as $nilai_ket) {
                                if ($_nilai['nilai'] >= $nilai_ket['min'] && $_nilai['nilai'] <= $nilai_ket['max']) {
                                    echo  $nilai_ket['keterangan'];
                                }
                            }
                            ?>
                        </td>

                    </tr>
                <?php

                }
                ?>
                <tr>
                    <th colspan="2">Jumlah Nilai</th>
                    <th><?= $jumlah ?></th>
                    <th style="background-color: #000000;"></th>
                </tr>
                <tr>
                    <th colspan="2">Rata-rata Nilai</th>
                    <th><?= round($rata_rata)  ?></th>
                    <th><?= $predikat ?></th>
                </tr>
                <tr>
                    <td colspan="5">
                        Catatan : <?= $catatan ?>
                    </td>
                </tr>

            </tbody>
        </table>

    </section>
    <script>
        window.print()
    </script>
</body>

</html>
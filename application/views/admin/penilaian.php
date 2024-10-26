<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <a class="btn btn-primary" href="<?= base_url('tambah-pegawai') ?>">Tambah pegawai</a> -->
    <?php
    if ($this->session->flashdata('success')) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    ?>

    <?php
    if ($this->session->flashdata('failed')) {

    ?>
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <?php
            echo $this->session->flashdata('failed');
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
    }
    ?>
    <div class="card mt-2">
        <div class="card-header">
            Penilain Pegawai
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Satatus penilaian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <pre>
                        <?php
                        // var_dump($pegawai);
                        ?>
                    </pre>
                    <?php
                    $i = 1;
                    foreach ($pegawai as $pgw) {
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $pgw['nip'] ?></td>
                            <td><?= $pgw['nama'] ?></td>
                            <td><?= $pgw['nama_jabatan'] ?></td>
                            <td>
                                <?php
                                if ($pgw['nilai'] != null) {
                                ?>
                                    <span class="badge badge-success">Sudah di nilai</span>
                                <?php
                                } else {
                                ?>
                                    <span class="badge badge-warning">Belum di nilai</span>


                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?= base_url('penilaian-pegawai/' . $pgw['id_pegawai']) ?>" class="btn btn-primary">Nilai</a>
                                <?php
                                if ($pgw['nilai'] != null) {
                                ?>
                                    <a href="<?= base_url('penilaian-detail/' . $pgw['id_pegawai']) ?>" class="btn btn-info">Hasil</a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<script>
    // function hapus(id) {
    //     if (confirm("apakah kamu yakin ingin menghapus data dengan id = " + id)) {
    //         $.ajax({
    //             url: "<?= base_url('api-hapus-pegawai/') ?>" + id,
    //             type: 'GET',
    //             dataType: 'json',
    //             success: function(response) {
    //                 alert(response.message)
    //                 location.reload();
    //             },
    //         })
    //     } else {
    //         alert("data batal di hapus")

    //     }


    // }
</script>
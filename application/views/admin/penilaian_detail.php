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
            Detail Penilain
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url("assets/uploads/" . $pegawai['img']) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5><?= $pegawai['nama'] ?></h5>
                            <p class="card-text"><?= $pegawai['nip'] ?> | <?= $pegawai['nama_jabatan'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <?php
                    foreach ($nilai as $_nilai) {
                    ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <?= $_nilai['nama_kriteria'] ?>
                            </div>
                            <div class="card-body">
                                <h1>Nilai : <?= $_nilai['nilai'] ?></h1>
                                <p>Ket : - </p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <pre>
                <?php
                // var_dump($pegawai);
                var_dump($nilai);
                ?>
                
            </pre>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- Begin Page Content -->

<style>
    @media print {
        .not-print {
            display: none;
        }
    }
</style>
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
    <div class="card mt-2" id="print-area">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>Detail Penilaian</h5>
                <a class="btn btn-primary btn-sm" target="_blank" href="<?= base_url('admin/penilaian/print/' . $pegawai['id']) ?>">Cetak</a>

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
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
                                <p>Ket :
                                    <?php
                                    foreach ($_nilai['keterangan'] as $nilai_ket) {
                                        if ($_nilai['nilai'] >= $nilai_ket['min'] && $_nilai['nilai'] <= $nilai_ket['max']) {
                                            echo  $nilai_ket['keterangan'];
                                        }
                                    }
                                    ?>


                                </p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    Jumlah : <?= $jumlah ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    Rata-rata : <?= round($rata_rata)  ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    Predikat : <?= $predikat ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p>Catatan : <?= $catatan ?></p>

                    </div>
                </div>
            </div>

            <pre>

                <?php
                // var_dump($nilai)

                ?>
                
            </pre>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
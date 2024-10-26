<!-- Begin Page Content -->
<div class="container-fluid">
    <a class="btn btn-primary" href="<?= base_url('tambah-jabatan') ?>">Tambah jabatan</a>
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
    <div class="card mt-2">
        <div class="card-header">
            Daftar Jabatan
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Jabatan</th>
                        <th scope="col">Nama Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($jabatan as $jb) {
                    ?>
                        <tr>
                            <td scope="col">#</td>
                            <td scope="col"><?= $jb['kode'] ?></td>
                            <td scope="col"><?= $jb['nama_jabatan'] ?></td>
                            <td scope="col">
                                <a href="<?= base_url('edit-jabatan/') . $jb['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
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
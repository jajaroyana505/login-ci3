<!-- Begin Page Content -->
<div class="container-fluid">
    <a class="btn btn-primary" href="<?= base_url('tambah-user') ?>">Tambah user</a>
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
            Daftar User
        </div>
        <div class="card-body">
            <table class="table" id="data-user">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($users as $user) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $user['nama'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td>
                                <a href="#" class="btn btn-info">detail</a>
                                <a href="#" class="btn btn-danger">hapus</a>
                                <a href="#" class="btn btn-warning">edit</a>
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
<!-- Page level plugins -->
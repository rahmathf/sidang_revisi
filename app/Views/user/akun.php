<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Daftar Akun</h5>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="col">
                <div class="row my-3">
                    <div class="col-sm-6">
                        <a href="/register" class="btn btn-primary">Tambah Data Akun</a>
                    </div>
                    <div class="col-sm-6">
                        <form action="" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Masukkan keyword pencarian.." name="keyword">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                            </div>
                        </form>
                    </div>

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Saldo(Rp)</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach ($auth as $au) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $au['nama']; ?></td>
                                <td><?= $au['username']; ?></td>
                                <td><?= $au['saldo']; ?></td>
                                <td><a href="/akun/<?= $au['nama']; ?>" class="btn btn-success">Detail</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('users', 'auth_pagination'); ?>
            </div>
            <hr>
            <!-- Styling for the area chart can be found in the
            <code>/js/demo/chart-area-demo.js</code> file. -->
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
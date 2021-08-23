<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="mb-4 text-gray-800 h3">Blank Page</h1> -->

    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h5 class="m-0 font-weight-bold text-primary">My Profile</h5>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="mb-3 card border-left-primary" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="container">
                            <h3 class="ml-3 card-title"><?= session()->get('username'); ?></h3>
                            <img src="/img/<?= session()->get('sampul'); ?>" alt="..." class="ml-3 detail img-fluid" style="max-width: 250px;">
                            <br><br>
                            <h6 class="card-text"><i class='ml-3 fas fa-user-alt' style='font-size:24px;'></i> Nama : <?= session()->get('nama'); ?></h6>
                            <h6 class="card-text"><i class='ml-3 fas fa-id-badge' style='font-size:24px;'></i> Level : <?= session()->get('level'); ?></h6>
                            <h6 class="card-text"><i class='ml-3 fas fa-home' style='font-size:24px;'></i> Sempor Lor RT <?= session()->get('rt'); ?> RW <?= session()->get('rw'); ?></h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <h6 class="ml-3 card-text"><i class='mt-3 fas fa-coins' style='font-size:24px;color: gold;'></i> Saldo : <?= session()->get('saldo'); ?></h6>
                        </div>
                    </div>

                    <!-- <div class="col-md-4">
                        <div class="container">
                            <img src="/img/<?= session()->get('sampul'); ?>" alt="..." class="detail img-fluid">
                        </div>
                    </div> -->
                    <!-- <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title"><?= session()->get('username'); ?></h3>
                            <h6 class="card-text">Nama : <?= session()->get('nama'); ?></h6>
                            <h6 class="card-text">Level : <div class="badge badge-primary"><?= session()->get('level'); ?></div>
                            </h6>
                            <h6 class="card-text">Saldo : <?= session()->get('saldo'); ?></h6>
                            <a href="/user/edit" class="btn btn-success">Edit Profile</a>
                            <a href="/user/reset" class="btn btn-danger">Ubah Sandi</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
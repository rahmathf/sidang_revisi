<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="mb-4 text-gray-800 h3">Blank Page</h1> -->

    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h5 class="m-0 font-weight-bold text-primary">Detail Sampah</h5>
        </div>
        <div class="col">
            <div class="my-3 mb-3 card" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $sampah['sampul']; ?>" alt="..." class="detail">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $sampah['jenis']; ?></h5>
                            <p class="card-text">Harga(Rp/Kg.) : <?= $sampah['harga']; ?></p>
                            <p class="card-text">Deskripsi : <?= $sampah['des']; ?></p>

                            <a href="/sampah/edit/<?= $sampah['id']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/sampah/<?= $sampah['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
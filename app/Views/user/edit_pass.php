<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Ubah Kata Sandi</h5>
        </div>
        <div class="card-body">
            <form class="#" action="/User/reset_pass/<?= $auth['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password Baru" value="">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-9">

                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary btn-user btn-block center-block">
                            Ubah Data
                        </button>
                    </div>
                </div>
                <hr>
            </form>

            <!-- Styling for the area chart can be found in the
            <code>/js/demo/chart-area-demo.js</code> file. -->
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="mb-4 text-gray-800 h3">Blank Page</h1> -->

    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h5 class="m-0 font-weight-bold text-primary">Dashboard</h5>
        </div>
        <div class="card-body">

            <div class="row">

                <!-- Transaksi Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <h6 class="ml-2">Transaksi</h6>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <h3 class="ml-2"><?php echo $total_transaction; ?></h3>
                                    </div>
                                    <a href="/transaksi" class="ml-2">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="mr-3 fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <h6 class="ml-2">Sampah</h6>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <h3 class="ml-2"><?php echo $total_product; ?></h3>
                                    </div>
                                    <a href="/sampah" class="ml-2">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="mr-3 fas fa-trash-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->


                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        <h6 class="ml-2">Akun</h6>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <h3 class="ml-2"><?php echo $total_user; ?></h3>
                                    </div>
                                    <a href="/akun" class="ml-2">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="mr-3 fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <hr>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
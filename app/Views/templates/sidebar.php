<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-recycle"></i>
        </div>
        <div class="mx-3 sidebar-brand-text">SemangatePoor</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if (allow('admin')) : ?>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider
    <hr class="sidebar-divider">
<?php endif; ?> -->
        <!-- Heading -->
        <div class="sidebar-heading">
            User Profile
        </div>

        <!-- Nav Item - My Profile -->
        <li class="nav-item">
            <a class="nav-link" href="/user">
                <i class="far fa-address-card"></i>
                <span>My Profile</span></a>
        </li>

        <!-- Nav Item - Edit Profile
    <li class="nav-item">
        <a class="nav-link" href="/edit_user">
            <i class="fas fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li> -->
        <?php if (allow('admin')) : ?>
            <!-- Nav Item - Edit Profile -->
            <li class="nav-item">
                <a class="nav-link" href="/akun">
                    <i class="fas fa-user-edit"></i>
                    <span>Akun</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
        <?php endif; ?>
        <?php if (allow('admin')) : ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Manajement Transaksi
            </div>
        <?php endif; ?>
        <?php if (allow('admin')) : ?>
            <!-- Nav Item - Edit Profile -->
            <li class="nav-item">
                <a class="nav-link" href="/transaksi">
                    <i class="fas fa-money-check"></i>
                    <span>Transaksi</span></a>
            </li>
        <?php endif; ?>

        <?php if (allow('admin')) : ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master
            </div>
        <?php endif; ?>
        <?php if (allow('admin')) : ?>
            <!-- Nav Item - Edit Profile -->
            <li class="nav-item">
                <a class="nav-link" href="/sampah">
                    <i class="fas fa-trash-alt"></i>
                    <span>Sampah</span></a>
            </li>
        <?php endif; ?>


        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="border-0 rounded-circle" id="sidebarToggle"></button>
        </div>

</ul>
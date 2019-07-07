<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0">
            <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> Smart Count Bussiness </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <!----- menu ----->
    <div class="sidebar-heading">
        User
    </div>

        <!---submenu--->
        <li class="nav-item <?php if($tittle == "Profil Saya"){echo 'active';} ?>">
            <a class="nav-link" href="<?= base_url('user'); ?>"><i class="fas fa-user"></i>
                <span>Profil</span>
            </a>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <!----- menu ----->
    <div class="sidebar-heading">
        Topsis
    </div>

        <!---submenu--->
        <li class="nav-item <?php if($tittle == "Kriteria"){echo 'active';} ?>">
            <a class="nav-link" href="<?= base_url('kriteria') ?>"><i class="fas fa-edit"></i>
                <span>Kriteria</span>
            </a>
        </li>
        <!---submenu--->
        <li class="nav-item <?php if($tittle == "Alternatif"){echo 'active';} ?>">
            <a class="nav-link" href="<?= base_url('alternatif') ?>"><i class="fas fa-check-square"></i>
                <span>Alternatif</span>
            </a>
        </li>
        <!---submenu--->
        <li class="nav-item <?php if($tittle == "Nilai Matriks"){echo 'active';} ?>">
            <a class="nav-link" href="<?= base_url('matriks'); ?>"><i class="far fa-list-alt"></i>
                <span>Nilai Matriks</span>
            </a>
        </li>
        <!---submenu--->
        <li class="nav-item <?php if($tittle == "Hasil Topsis"){echo 'active';} ?>">
            <a class="nav-link" href="<?= base_url('hasil'); ?>"><i class="far fa-file"></i>
                <span>Hasil Topsis</span>
            </a>
        </li>
    <hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->
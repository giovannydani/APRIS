<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <center>
        <span class="brand-text font-weight-light">APRIS</span>
        </center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            
        </div>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?= base_url() ?>dashboard/home" class="nav-link <?php if ($judul=='Dashboard') {echo"active";}?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <?php if ($session['level']=='admin'||$session['level']=='root'):?>
            <li class="nav-item has-treeview <?php if ($sidebar=='hakcipta') {echo"menu-open";}?>">
                <a href="#" class="nav-link <?php if ($sidebar=='hakcipta') {echo"active";}?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Hak Cipta
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin/hakcipta/tablevalidasi" class="nav-link <?php if ($judul=='Tabel Validasi Hak Cipta') {echo"active";}?>">
                            <i class="fa fa-table nav-icon"></i>
                            <p>Validasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin/hakcipta/tableselesai" class="nav-link <?php if ($judul=='Tabel Selesai Hak Cipta') {echo"active";}?>">
                            <i class="fa fa-table nav-icon"></i>
                            <p>Selesai</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php endif ?>
            <?php if ($session['level']=='user'):?>
            <li class="nav-item has-treeview <?php if ($sidebar=='hakcipta') {echo"menu-open";}?>">
                <a href="#" class="nav-link <?php if ($sidebar=='hakcipta') {echo"active";}?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Hak Cipta
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url() ?>user/hakcipta/table" class="nav-link <?php if ($judul=='Tabel Hak Cipta') {echo"active";}?>">
                            <i class="fa fa-table nav-icon"></i>
                            <p>Tabel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>user/hakcipta/add" class="nav-link <?php if ($judul=='Tambah Hak Cipta') {echo"active";}?>">
                            <i class="fa fa-plus-circle nav-icon"></i>
                            <p>Tambah</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php endif ?>
            <!-- <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Starter Pages
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Active Page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inactive Page</p>
                        </a>
                    </li>
                </ul>
            </li> -->
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
<!-- /.sidebar -->
</aside>
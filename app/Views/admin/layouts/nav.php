<!-- Sidebar Menu -->
<nav class="mt-2" id="navSection">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?= base_url(ADMIN_PATH . '/dashboard'); ?>"
                class="nav-link menu-item <?php echo ($menu ?? '') == 'dashboard' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <?php if (session('level') == '2') :  ?>
        <li class="nav-item <?= (($menu ?? '') == 'master') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>
                    Master Data
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url(ADMIN_PATH . '/unit-kerja'); ?>"
                        class="nav-link menu-item <?= ($subMenu ?? '') == 'unit-kerja' ? 'active' : ''; ?>">
                        <i class="fas fa-building nav-icon"></i>
                        <p>Unit Kerja</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(ADMIN_PATH . '/jabatan'); ?>"
                        class="nav-link menu-item <?= ($subMenu ?? '') == 'jabatan' ? 'active' : ''; ?>">
                        <i class="fas fa-tag nav-icon"></i>
                        <p>Jabatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(ADMIN_PATH . '/karyawan'); ?>"
                        class="nav-link menu-item <?= ($subMenu ?? '') == 'karyawan' ? 'active' : ''; ?>">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Karyawan</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item <?= (($menu ?? '') == 'cuti') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-paper-plane"></i>
                <p>
                    Cuti
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url(ADMIN_PATH . '/pengajuan-cuti'); ?>"
                        class="nav-link menu-item <?= ($subMenu ?? '') == 'pengajuan' ? 'active' : ''; ?>">
                        <i class="fas fa-copy nav-icon"></i>
                        <p>Pengajuan Cuti</p>
                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (session('level') != '2') : ?>
        <li class="nav-item <?= (($menu ?? '') == 'cuti') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-paper-plane"></i>
                <p>
                    Cuti
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php if (session('level') == '1') :  ?>
                <li class="nav-item">
                    <a href="<?= base_url(ADMIN_PATH . '/pengajuan-cuti/approval'); ?>"
                        class="nav-link menu-item <?= ($subMenu ?? '') == 'approval' ? 'active' : ''; ?>">
                        <i class="fas fa-check nav-icon"></i>
                        <p>Approval Pengajuan </p>
                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?= base_url(ADMIN_PATH . '/pengajuan-cuti'); ?>"
                        class="nav-link menu-item <?= ($subMenu ?? '') == 'pengajuan' ? 'active' : ''; ?>">
                        <i class="fas fa-copy nav-icon"></i>
                        <p>Pengajuan Cuti</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(ADMIN_PATH . '/pengajuan-cuti/buat'); ?>"
                        class="nav-link menu-item <?= ($subMenu ?? '') == 'buat-pengajuan' ? 'active' : ''; ?>">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Buat Pengajuan</p>
                    </a>
                </li>
            </ul>
        </li>
        <?php endif ?>
        <li class="nav-header">Profile</li>
        <li class="nav-item">
            <a href="<?= base_url(ADMIN_PATH . '/profile'); ?>"
                class="nav-link menu-item <?= ($menu ?? '') == 'profile' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                    Pengaturan Profile
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a target="_blank" href="<?= base_url('/assets/Panduan_e-Cuti.pdf'); ?>" class="nav-link menu-item">
                <i class="nav-icon fas fa-clipboard-check"></i>
                <p>
                    Panduan
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
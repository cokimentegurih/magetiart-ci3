<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Overview</li>
        <li class="nav-item">
            <a <?php if ($title == 'Dashboard - MagetiArt') { ?> class="nav-link" <?php } else { ?> class="nav-link collapsed" <?php } ?> href="<?= base_url('Admin'); ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <!-- QUERY MENU -->
        <?php
        $role_id = $this->session->userdata('role_id');
        // $queryMenu = "SELECT `submenu`.`id` FROM `submenu` JOIN `user_access_submenu` ON `submenu`.`id` = `user_access_submenu`.`submenu_id` WHERE `user_access_submenu`.`role_id` = $role_id ";
        $queryMenu = "SELECT `user_access_submenu`.`submenu_id` FROM `user_access_submenu` WHERE `user_access_submenu`.`role_id` = $role_id ";

        $submenu = $this->db->query($queryMenu)->result_array();
        ?>

        <?php
        foreach ($submenu as $menu) {
            if ($menu['submenu_id'] == 1 || $menu['submenu_id'] == 2 || $menu['submenu_id'] == 5 || $menu['submenu_id'] == 6) {
                $menuTables[] = $menu['submenu_id'];
            }
            if ($menu['submenu_id'] == 7) {
                $menuDecors = $menu['submenu_id'];
            }
            if ($menu['submenu_id'] == 8) {
                $menuUsers = $menu['submenu_id'];
            }
        }
        ?>

        <?php if (isset($menuTables)) : ?>
            <li class="nav-item">
                <a <?php if (isset($sidenav) && $sidenav == 'Tabel') { ?> class="nav-link" <?php } else { ?> class="nav-link collapsed" <?php } ?> data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tabel</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" <?php if (isset($sidenav) && $sidenav == 'Tabel') { ?> class="nav-content collapse show" <?php } else { ?> class="nav-content collapse" <?php } ?> data-bs-parent="#sidebar-nav">
                    <?php if (in_array(1, $menuTables)) : ?>
                        <li>
                            <a <?php if ($title == 'Seniman - MagetiArt') { ?> class="active" <?php } else { ?> class="" <?php } ?> href="<?= base_url('Seniman'); ?>">
                                <i class="bi bi-circle"></i><span>Seniman</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array(2, $menuTables)) : ?>

                        <li>
                            <a <?php if ($title == 'Karya - MagetiArt') { ?> class="active" <?php } else { ?> class="" <?php } ?> href="<?= base_url('Karya'); ?>">
                                <i class="bi bi-circle"></i><span>Karya</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array(5, $menuTables)) : ?>
                        <li>
                            <a <?php if ($title == 'Berita - MagetiArt') { ?> class="active" <?php } else { ?> class="" <?php } ?> href="<?= base_url('Berita'); ?>">
                                <i class="bi bi-circle"></i><span>Berita</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array(6, $menuTables)) : ?>
                        <li>
                            <a <?php if ($title == 'Kategori - MagetiArt') { ?> class="active" <?php } else { ?> class="" <?php } ?> href="<?= base_url('Kategori'); ?>">
                                <i class="bi bi-circle"></i><span>Kategori</span>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </li><!-- End Tables Nav -->
        <?php endif; ?>

        <?php if (isset($menuDecors)) : ?>
            <li class="nav-item">
                <a <?php if (isset($sidenav) && $sidenav == 'Dekorasi') { ?> class="nav-link" <?php } else { ?> class="nav-link collapsed" <?php } ?> data-bs-target="#decoration-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-lamp"></i>
                    <span>Dekorasi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="decoration-nav" <?php if (isset($sidenav) && $sidenav == 'Dekorasi') { ?> class="nav-content collapse show" <?php } else { ?> class="nav-content collapse" <?php } ?> data-bs-parent="#sidebar-nav">
                    <li>
                        <a <?php if ($title == 'Dekorasi - MagetiArt') { ?> class="active" <?php } else { ?> class="" <?php } ?> href="<?= base_url('Dekorasi'); ?>">
                            <i class="bi bi-circle"></i><span>Home</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <li class="nav-item">
            <a <?php if (isset($sidenav) && $sidenav == 'User') { ?> class="nav-link" <?php } else { ?> class="nav-link collapsed" <?php } ?> data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i>
                <span>User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" <?php if (isset($sidenav) && $sidenav == 'User') { ?> class="nav-content collapse show" <?php } else { ?> class="nav-content collapse" <?php } ?> data-bs-parent="#sidebar-nav">
                <li>
                    <a <?php if ($title == 'Profil - MagetiArt') { ?> class="active" <?php } else { ?> class="" <?php } ?> href="<?= base_url('User'); ?>">
                        <i class="bi bi-circle"></i><span>Profil</span>
                    </a>
                </li>
                <?php if (isset($menuUsers)) : ?>
                    <li>
                        <a <?php if ($title == 'Akun - MagetiArt') { ?> class="active" <?php } else { ?> class="" <?php } ?> href="<?= base_url('User/account'); ?>">
                            <i class="bi bi-circle"></i><span>Akun</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($role_id == 1) : ?>
                    <li>
                        <a <?php if ($title == 'Role - MagetiArt') { ?> class="active" <?php } else { ?> class="" <?php } ?> href="<?= base_url('Role'); ?>">
                            <i class="bi bi-circle"></i><span>Role</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>

        <!-- End Profile Page Nav -->

        <li class="nav-heading">Keluar</li>
        <li class="nav-item">
            <a class="nav-link collapsed tombol-logout" href="<?= base_url('Auth/logout'); ?>">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->
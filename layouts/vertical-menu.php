<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.svg" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Aulia</span>
                    </span>
                </a>

                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.svg" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Aulia</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>


        </div>

        <div class="d-flex">



            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>




            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $_SESSION["nama"]; ?>.</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="logout.php"><i
                            class="mdi mdi-logout font-size-16 align-middle me-1"></i>
                        <?php echo $language["Logout"]; ?></a>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?php echo $language["Menu"]; ?></li>

                <li>
                    <a href="index.php">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard"><?php echo $language["Dashboard"]; ?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Master Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="?page=pengguna">
                                <span data-key="t-calendar">Pengguna</span>
                            </a>
                        </li>

                        <li>
                            <a href="apps-chat.php">
                                <span data-key="t-chat">Barang</span>
                            </a>
                        </li>

                        <li>
                            <a href="?page=supplier">
                                <span data-key="t-email">Supplier</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title mt-2" data-key="t-components">Transaksi</li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Barang Masuk</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="gift"></i>
                        <span data-key="t-ui-elements">Barang Keluar</span>
                    </a>

                </li>

                <li class="menu-title mt-2" data-key="t-components">Laporan</li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Laporan Barang Masuk</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="gift"></i>
                        <span data-key="t-ui-elements">Laporan Barang Keluar</span>
                    </a>

                </li>
            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
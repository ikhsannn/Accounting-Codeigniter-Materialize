<?php
$daftar_akun = '';
$dashboard = '';
$jurnal = '';
$lainnya = '';
switch ($title) {
    case 'Dashboard':
        $dashboard = "class='bold active'";
        break;

    case 'Jurnal Umum':
        $jurnal = "class='bold active'";
        break;

    case 'Akun':
        $daftar_akun = "class='bold active'";
        break;

    default:
        $lainnya = "class='bold active'";
        break;
}
?>

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <!-- <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?= base_url() ?>assets/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Administrator</p>
                            </div>
                        </div>
                    </li> -->
                    <li <?= $dashboard ?> style="margin-top: 1rem">
                        <a href="<?= base_url(); ?>" class="waves-effect waves-blue darken-3"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li>
                    <hr>
                    <li <?= $lainnya ?>>
                        <a href="<?= base_url('laporan'); ?>"><i class="mdi-action-info"></i>Laporan</a>
                    </li>
                    <li <?= $jurnal ?>>
                        <a href="<?= base_url('jurnal'); ?>"><i class="mdi-action-book"></i> Jurnal Umum</a>
                    </li>
                    <li <?= $daftar_akun ?>>
                        <a href="<?= base_url('akun'); ?>"><i class="mdi-action-list"></i>Daftar Akun</a>
                    </li>
                    <hr>
                    <li>
                        <a href="<?= base_url('auth/logout'); ?>"><i class="mdi-hardware-keyboard-tab"></i>Logout</a>
                    </li>


                </ul>
                <div class="row" hidden>
                    <div class="col s12 m12 l12">
                        <div class="sample-chart-wrapper">
                            <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                        </div>
                    </div>
                </div>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
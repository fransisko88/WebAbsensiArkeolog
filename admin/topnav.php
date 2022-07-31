<?
require_once 'session.php';
require_once '../koneksi.php';
require_once 'functions.php';


?>
<ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">

        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['auth']['nama'] ?> <br>
                <?php echo $_SESSION['auth']['role_user'] ?></span>
            <img src="../img/User-icon.png" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?php echo base_url('logout.php') ?>" onclick="return confirm('apakah anda yakin?')">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
            </a>
        </div>
    </li>
</ul>
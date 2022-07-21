<?php
$company = $this->db->get('perusahaan')->row_array();
?>
<!-- partial:<?= base_url('assets/'); ?>partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo ml-2" href="<?= base_url('user'); ?>">
      <h4><?= $company['perusahaan']; ?></h4>
    </a>
    <a class="navbar-brand brand-logo-mini" href="<?= base_url('user'); ?>"><img src="<?= base_url('assets/images/logo/') . $company['logo']; ?>" class="" alt=""></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <?php if ($jabatan['id'] == 1) : ?>
          <div class="badge badge-info"><?= $jabatan['role']; ?></div>
        <?php elseif ($jabatan['id'] == 2) : ?>
          <div class="badge badge-primary"><?= $jabatan['role']; ?></div>
        <?php elseif ($jabatan['id'] == 3) : ?>
          <div class="badge badge-success"><?= $jabatan['role']; ?></div>
        <?php else : ?>
          <div class="badge badge-warning"><?= $jabatan['role']; ?></div>
        <?php endif; ?>

      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <div class="row">
            <img src="<?= base_url('assets/images/avatar/') . $user['image']; ?>" alt="profile" />
            <h5 class="text-primary py-2 ml-2">
              <?= $user['name']; ?>
              <i class="mdi mdi-chevron-down"></i>
            </h5>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="<?= base_url('user'); ?>">
            <i class="ti-settings text-primary"></i>
            Settings
          </a>
          <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="ti-power-off text-primary"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
<?php $company = $this->db->get('perusahaan')->row_array(); ?>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
              <div class="row">
                <img class="mb-3 w-25" src="<?= base_url('assets/images/logo/') . $company['logo']; ?>">
                <h3 class="mt-2 ml-2 py-4"><?= $company['perusahaan']; ?></h3>
              </div>
              <div class="flash-data-logout" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
              <div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('message-error'); ?>"></div>
            </div>
            <h4>Hello! let's get started</h4>
            <h6 class="font-weight-light">Sign in to continue.</h6>
            <form class="pt-3" method="POST" action="<?= base_url('auth'); ?>">
              <div class="form-group">
                <input type="text" name="nip" class="form-control form-control-lg" id="nip" placeholder="NIP" value="<?php echo ($nip == "") ? set_value('nip') : $nip; ?>">
                <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
              </div>
              <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Keep me signed in
                  </label>
                </div>
                <a href="#" class="auth-link text-black">Forgot password?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
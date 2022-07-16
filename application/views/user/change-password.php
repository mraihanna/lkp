<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>
        <div class="row">
          <div class="col-lg-12"><?= $this->session->flashdata('message'); ?></div>
        </div>
      </div>

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Change Password</h4>
            <p class="card-description">
              Be carefull in edit profile
            </p>
            <form action="<?= base_url('user/changepassword'); ?>" method="POST">
              <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" id="current_password">
                <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="new_password1">New Password</label>
                <input type="password" class="form-control" id="new_password1" name="new_password1" id="new_password1">
                <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="new_password2">Confirm Password</label>
                <input type="password" class="form-control" id="new_password2" name="new_password2" id="new_password2">
                <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
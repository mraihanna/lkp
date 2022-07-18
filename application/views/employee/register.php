<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>
        <div class="flash-data-register" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Register Employee</h4>
            <p class="card-description">
              Be carefull in register employee
            </p>
            <form action="<?= base_url('employee/register'); ?>" method="POST">
              <div class="form-group">
                <label for="role">Role</label>
                <select class="js-example-basic-single w-100" name="role" id="role" class="form-control">
                  <option disabled selected>Select Role</option>
                  <?php foreach ($allRole as $r) : ?>
                    <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="unit_kerja">Unit Kerja</label>
                <select class="js-example-basic-single w-100" name="unit_kerja" id="unit_kerja" class="form-control">
                  <option disabled hidden selected>Select Unit Kerja</option>
                  <?php foreach ($allUnitKerja as $u) : ?>
                    <option value="<?= $u['id']; ?>"><?= $u['unit_kerja']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('unit_kerja', '<small class="text-danger">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Next</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
<?php if ($role == 2) : ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 mb-3">
          <h2><?= $title; ?></h2>
          <a href="<?= base_url('employee/register'); ?>" class="btn btn-primary my-2">
            < Back </a>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit Profile</h4>
              <p class="card-description">
                Be carefull in edit profile
              </p>
              <form action="<?= base_url('employee/registerNext/') . $role . '/' . $unitKerja; ?>" method="POST" onsubmit="return submitForm(this);">
                <input type="hidden" name="role" value="<?= $role; ?>">
                <input type="hidden" name="unit_kerja" value="<?= $unitKerja; ?>">
                <div class="form-group row">
                  <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nip" name="nip" id="nip" value="<?= set_value('nip'); ?>" placeholder="NIP">
                    <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="email">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" id="name" value="<?= set_value('name'); ?>" placeholder="Full Name">
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jabatan" class="col-sm-3 col-form-label">Jabatan Functional</label>
                  <div class="col-sm-9">
                    <select class="js-example-basic-single w-100" name="jabatan" id="jabatan" class="form-control">
                      <option disabled selected hidden>Select Jabatan</option>
                      <?php foreach ($jabatanFunc as $j) : ?>
                        <option value="<?= $j['id']; ?>"><?= $j['jabatan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  <?php elseif ($role == 3) : ?>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 mb-3">
            <h2><?= $title; ?></h2>
            <a href="<?= base_url('employee/register'); ?>" class="btn btn-primary my-2">
              < Back </a>
          </div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-description">
                  Be carefull in edit profile
                </p>
                <form action="<?= base_url('employee/registerNext/') . $role . '/' . $unitKerja; ?>" method="POST" onsubmit="return submitForm(this);">
                  <input type="hidden" name="role" value="<?= $role; ?>">
                  <input type="hidden" name="unit_kerja" value="<?= $unitKerja; ?>">
                  <div class="form-group row">
                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nip" name="nip" id="nip" value="<?= set_value('nip'); ?>" placeholder="NIP">
                      <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="email">
                      <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="name" name="name" id="name" value="<?= set_value('name'); ?>" placeholder="Full Name">
                      <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan Functional</label>
                    <div class="col-sm-9">
                      <select class="js-example-basic-single w-100" name="jabatan" id="jabatan" class="form-control">
                        <option disabled selected hidden>Select Jabatan</option>
                        <?php foreach ($jabatanFunc as $j) : ?>
                          <option value="<?= $j['id']; ?>"><?= $j['jabatan']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="atasan" class="col-sm-3 col-form-label">Data Atasan</label>
                    <div class="col-sm-9">
                      <select class="js-example-basic-single w-100" name="atasan" id="atasan" class="form-control">
                        <option disabled selected hidden>Select Atasan</option>
                        <?php foreach ($allUnitKerja as $a) : ?>
                          <option value="<?= $a['id']; ?>"><?= $a['name']; ?> - </option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Add</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    <?php else : ?>
      <?php base_url('errors/404'); ?>
    <?php endif; ?>
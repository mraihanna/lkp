<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>
        <div class="flash-data-perusahaan" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('message-error'); ?>"></div>
      </div>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Company Profile</h4>
            <p class="card-description">
              Be carefull in edit company profile
            </p>
            <?= form_open_multipart('company/settings'); ?>
            <div class="form-group row">
              <label for="perusahaan" class="col-sm-3 col-form-label">Company Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="perusahaan" name="perusahaan" id="perusahaan" value="<?= $company['perusahaan']; ?>">
                <?= form_error('perusahaan', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="alamat" name="alamat" id="alamat" value="<?= $company['alamat']; ?>">
                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="tlp" class="col-sm-3 col-form-label">Telephone</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="tlp" name="tlp" id="tlp" value="<?= $company['tlp']; ?>">
                <?= form_error('tlp', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3">Logo</div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/images/logo/') . $company['logo']; ?>" alt="logo" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="logo" name="logo">
                      <label class="custom-file-label" for="logo">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
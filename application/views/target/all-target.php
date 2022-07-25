<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <div class="flash-data-all-target" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <a href="<?= base_url('target/list'); ?>" class="btn btn-info my-2">
          < BACK </a>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add All Employee</h4>
            <p class="card-description">
              Be carefull in Add Target
            </p>
            <form action="<?= base_url('target/allEmployee'); ?>" method="POST" onsubmit="return submitFormTarget(this);">
              <div class="form-group row">
                <label for="detail_kegiatan" class="col-sm-3 col-form-label">Detail Kegiatan</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="detail_kegiatan" placeholder="Detail Kegiatan" name="detail_kegiatan" id="detail_kegiatan">
                  <?= form_error('detail_kegiatan', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="start_date" name="start_date" id="start_date">
                  <?= form_error('start_date', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="end_date" class="col-sm-3 col-form-label">End Date</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="end_date" name="end_date" id="end_date">
                  <?= form_error('end_date', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
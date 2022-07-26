<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>
        <div class="flash-data-report" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="col-lg-12"><?= $this->session->flashdata('message-file'); ?></div>
      </div>
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Report</h4>
            <p class="card-description">
              Your Report
            </p>
            <?= form_open_multipart('report'); ?>
            <div class="form-group">
              <label>Kegiatan</label>
              <select class="js-example-basic-single w-100" name="target">
                <?php if (validation_errors()) : ?>
                  <?php if (set_value('target') != NULL) : ?>
                    <?php $targetId = $this->db->get_where('data_target', ['id' => set_value('target')])->row_array(); ?>
                    <option value="<?= set_value('target'); ?>"><?= $targetId['detail_kegiatan']; ?> - Date Line: <?= date('d F Y', strtotime($targetId['end_date'])); ?></option>
                  <?php else : ?>
                    <option disabled hidden selected>Select Kegiatan</option>
                  <?php endif; ?>
                <?php else : ?>
                  <option disabled hidden selected>Select Kegiatan</option>
                <?php endif; ?>
                <?php foreach ($target as $t) : ?>
                  <option value="<?= $t['id']; ?>"><?= $t['detail_kegiatan']; ?> - Date Line: <?= date('d F Y', strtotime($t['end_date'])); ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('target', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= date('Y-m-d'); ?>">
                  <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-sm-4">
                  <label for="jam_mulai">Jam Mulai</label>
                  <input type="time" class="form-control" name="jam_mulai" id="jam_mulai">
                  <?= form_error('jam_mulai', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-sm-4">
                  <label for="jam_selesai">Jam Selesai</label>
                  <input type="time" class="form-control" name="jam_selesai" id="jam_selesai">
                  <?= form_error('jam_selesai', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label for="jumlah">Jumlah Satuan</label>
                  <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Satuan Kerja">
                  <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-sm-8">
                  <label>Satuan Kerja</label>
                  <select class="js-example-basic-single w-100" name="satuan_kerja">
                    <?php if (validation_errors()) : ?>
                      <?php if (set_value('satuan_kerja') != NULL) : ?>
                        <?php $satuanKerjaId = $this->db->get_where('data_satuan_kerja', ['id' => set_value('satuan_kerja')])->row_array(); ?>
                        <option value="<?= set_value('satuan_kerja'); ?>"><?= $satuanKerjaId['satuan_kerja']; ?></option>
                      <?php else : ?>
                        <option disabled hidden selected>Select</option>
                      <?php endif; ?>
                    <?php else : ?>
                      <option disabled hidden selected>Select</option>
                    <?php endif; ?>
                    <?php foreach ($satuan as $s) : ?>
                      <option value="<?= $s['id']; ?>"><?= $s['satuan_kerja']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('satuan_kerja', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="tempat">Tempat Kegiatan</label>
              <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Kegiatan">
              <?= form_error('tempat', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea class="form-control" name="keterangan" id="keterangan" rows="4" placeholder="Penjelesan mengenai kegiatan"></textarea>
              <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Dokumen Pendukung</label>
              <input type="file" name="dok_pend" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
              </div>
              <?= form_error('dok_pend', '<small class="text-danger">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
            <?= form_close(); ?>
          </div>
        </div>
      </div>

    </div>
  </div>
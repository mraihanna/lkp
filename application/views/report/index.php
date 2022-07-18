<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>
      </div>
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Report</h4>
            <p class="card-description">
              Your Report
            </p>
            <form class="forms-sample" method="POST" action="<?= base_url('errors/nyoba'); ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="kegiatan">Kegiatan</label>
                <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Name Kegiatan">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= date('Y-m-d'); ?>">
                  </div>
                  <div class="col-sm-4">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control" name="jam_mulai" id="jam_mulai">
                  </div>
                  <div class="col-sm-4">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" class="form-control" name="jam_selesai" id="jam_selesai">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="jumlah">Jumlah Satuan</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Satuan Kerja">
                  </div>
                  <div class="col-sm-8">
                    <label>Satuan Kerja</label>
                    <select class="js-example-basic-single w-100" name="satuan_kerja">
                      <option>Select</option>
                      <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="tempat">Tempat Kegiatan</label>
                <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Kegiatan">
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" rows="4"></textarea>
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
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
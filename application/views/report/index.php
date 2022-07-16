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
            <form class="forms-sample" method="POST">
              <div class="form-group">
                <label for="exampleInputName1">Kegiatan</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="exampleInputEmail3">Tanggal</label>
                    <input type="date" class="form-control" id="exampleInputEmail3" placeholder="Email">
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleInputPassword4">Jam Mulai</label>
                    <input type="time" class="form-control" id="exampleInputPassword4" placeholder="Password">
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleInputPassword4">Jam Selesai</label>
                    <input type="time" class="form-control" id="exampleInputPassword4" placeholder="Password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="exampleInputPassword4">Jam Selesai</label>
                    <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Password">
                  </div>
                  <div class="col-sm-8">
                    <label>Satuan Kerja</label>
                    <select class="js-example-basic-multiple w-100" multiple="multiple" name="role[]">
                      <option>Select</option>
                      <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Tempat Kegiatan</label>
                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Tempat Kegiatan">
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Keterangan</label>
                <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label>Dokumen Pendukung</label>
                <input type="file" name="img" class="file-upload-default">
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
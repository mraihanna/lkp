<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <?= form_error('satuan_kerja', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        ', '</div>'); ?>

        <div class="flash-data-satuan-kerja" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


        <a href="" class="btn btn-primary my-2" data-toggle="modal" data-target="#newSatuanKerjaModal">+ Add New Satuan Kerja</a>
      </div>
      <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Satuan Kerja Table</h4>
            <p class="card-description">
              Be Carefull Edit or Delete <code> table satuan kerja!</code>
            </p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th width="100px">Satuan Kerja</th>
                    <th width="10px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($satuanKerja as $s) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td> <?= htmlentities($s['satuan_kerja']); ?> </td>
                      <td>
                        <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editSatuanKerjaModal<?= $s['id']; ?>"><i class="mdi mdi-tooltip-edit" title="EDIT"></i></a>
                        <a href="<?= base_url('activity/deleteSatuanKerja/') . $s['id']; ?>" class="badge badge-danger tombol-hapus-menu" title="DELETE"><i class="mdi mdi-delete" title="DELETE"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="newSatuanKerjaModal" tabindex="-1" role="dialog" aria-labelledby="newSatuanKerjaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newSatuanKerjaModalLabel">Add New Satuan Kerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('activity/satuanKerja'); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="satuan_kerja">Satuan Kerja Name</label>
              <input type="text" name="satuan_kerja" class="form-control" id="satuan_kerja" placeholder="Satuan kerja Name">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit -->
  <?php foreach ($satuanKerja as $s) : ?>
    <div class="modal fade" id="editSatuanKerjaModal<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSatuanKerjaModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editSatuanKerjaModalLabel">Edit Satuan Kerja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('activity/editSatuanKerja/') . $s['id']; ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="satuan_kerja">Satuan Kerja Name</label>
                <input type="text" name="satuan_kerja" class="form-control" id="satuan_kerja" value="<?= $s['satuan_kerja']; ?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
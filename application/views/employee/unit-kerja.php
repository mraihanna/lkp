<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <?= form_error('unit_kerja', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        ', '</div>'); ?>

        <div class="flash-data-unit-kerja" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


        <a href="" class="btn btn-primary my-2" data-toggle="modal" data-target="#newUnitKerjaModal">+ Add New Unit Kerja</a>
      </div>
      <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Unit Kerja Table</h4>
            <p class="card-description">
              Be Carefull Edit or Delete <code> table unit kerja!</code>
            </p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th width="100px">Unit Kerja</th>
                    <th width="100px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($unitKerja as $u) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td> <?= htmlentities($u['unit_kerja']); ?> </td>
                      <td>
                        <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editUnitKerjaModal<?= $u['id']; ?>"><i class="mdi mdi-tooltip-edit" title="EDIT"></i></a>
                        <a href="<?= base_url('employee/deleteunitkerja/') . $u['id']; ?>" class="badge badge-danger tombol-hapus-unit-kerja" title="DELETE"><i class="mdi mdi-delete" title="DELETE"></i></a>
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
  <div class="modal fade" id="newUnitKerjaModal" tabindex="-1" role="dialog" aria-labelledby="newUnitKerjaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newUnitKerjaModalLabel">Add New Unit Kerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('employee/unitkerja'); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="unit_kerja">Unit Kerja</label>
              <input type="text" name="unit_kerja" class="form-control" id="unit_kerja" placeholder="Unit Kerja Name">
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
  <?php foreach ($unitKerja as $u) : ?>
    <div class="modal fade" id="editUnitKerjaModal<?= $u['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUnitKerjaModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editUnitKerjaModalLabel">Edit Unit Kerja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('employee/editUnitKerja/') . $u['id']; ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="unit_kerja">Unit Kerja Name</label>
                <input type="text" name="unit_kerja" class="form-control" id="unit_kerja" value="<?= $u['unit_kerja']; ?>">
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
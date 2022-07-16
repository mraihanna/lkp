<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <?= form_error('jabatan', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        ', '</div>'); ?>

        <div class="flash-data-jabatan" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


        <a href="" class="btn btn-primary my-2" data-toggle="modal" data-target="#newJabatanModal">+ Add New Jabatan</a>
      </div>
      <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Jabatan Table</h4>
            <p class="card-description">
              Be Carefull Edit or Delete <code> table jabatan!</code>
            </p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th width="100px">Jabatan</th>
                    <th width="100px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($jabatanReal as $j) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td> <?= htmlentities($j['jabatan']); ?> </td>
                      <td>
                        <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editJabatanModal<?= $j['id']; ?>"><i class="mdi mdi-tooltip-edit" title="EDIT"></i></a>
                        <a href="<?= base_url('employee/deletejabatan/') . $j['id']; ?>" class="badge badge-danger tombol-hapus-jabatan" title="DELETE"><i class="mdi mdi-delete" title="DELETE"></i></a>
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
  <div class="modal fade" id="newJabatanModal" tabindex="-1" role="dialog" aria-labelledby="newJabatanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newJabatanModalLabel">Add New Jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('employee/jabatan'); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan Name">
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
  <?php foreach ($jabatanReal as $j) : ?>
    <div class="modal fade" id="editJabatanModal<?= $j['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editJabatanModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editJabatanModalLabel">Jabatan Kerja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('employee/editjabatan/') . $j['id']; ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="jabatan">Jabatan Name</label>
                <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $j['jabatan']; ?>">
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
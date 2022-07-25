<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <?php if (validation_errors()) : ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= validation_errors(); ?>
          </div>
        <?php endif; ?>

        <div class="flash-data-target-user" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


        <a href="<?= base_url('target/list'); ?>" class="btn btn-info my-2">
          < BACK </a>
            <a href="" class="btn btn-primary my-2" data-toggle="modal" data-target="#newTargetModal">+ Add New Target</a>
      </div>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Target Table</h4>
            <p class="card-description">
              Be Carefull Edit or Delete <code> table role!</code>
            </p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th width="100px">Detail Kegiatan</th>
                    <th width="10px">Start Date</th>
                    <th width="10px">End Date</th>
                    <th width="10px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($targetUser as $t) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td> <?= $t['detail_kegiatan']; ?> </td>
                      <td> <?= $t['start_date']; ?> </td>
                      <td> <?= $t['end_date']; ?> </td>
                      <td>
                        <a href="<?= base_url('target/editTargetUser/') . $t['id']; ?>" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editTargetModal<?= $t['id']; ?>"><i class="mdi mdi-tooltip-edit" title="EDIT"></i></a>
                        <a href="<?= base_url('target/deleteTargetUser/') . $id . '/' . $t['id']; ?>" class="badge badge-danger tombol-hapus-target-user" title="DELETE"><i class="mdi mdi-delete" title="DELETE"></i></a>
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
  <div class="modal fade" id="newTargetModal" tabindex="-1" role="dialog" aria-labelledby="newTargetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newTargetModalLabel">Add Target Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('target/addTargetUser/') . $id; ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="detail_kegiatan">Detail Kegaitan</label>
              <input type="text" name="detail_kegiatan" class="form-control" id="detail_kegiatan" placeholder="Detail Kegaitan">
            </div>
            <div class="form-group">
              <label for="start_date">Start Date</label>
              <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Start Date">
            </div>
            <div class="form-group">
              <label for="end_date">End Date</label>
              <input type="date" name="end_date" class="form-control" id="end_date" placeholder="End Date">
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
  <?php foreach ($targetUser as $t) : ?>
    <div class="modal fade" id="editTargetModal<?= $t['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editTargetModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editTargetModalLabel">Edit Target</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('target/editTargetUser/') . '/' . $id . '/' . $t['id']; ?>" method="POST">

            <div class="modal-body">
              <div class="form-group">
                <label for="detail_kegiatan">Detail Kegaitan</label>
                <input type="text" name="detail_kegiatan" class="form-control" id="detail_kegiatan" value="<?= $t['detail_kegiatan']; ?>" placeholder="Detail Kegaitan">
              </div>
              <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="start_date" value="<?= $t['start_date']; ?>" placeholder="Start Date">
              </div>
              <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" id="end_date" value="<?= $t['end_date']; ?>" placeholder="End Date">
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
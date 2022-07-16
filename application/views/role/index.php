<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <?= form_error('role', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        ', '</div>'); ?>

        <div class="flash-data-role" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


        <a href="" class="btn btn-primary my-2" data-toggle="modal" data-target="#newRoleModal">+ Add New Role</a>
      </div>
      <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Role Table</h4>
            <p class="card-description">
              Be Carefull Edit or Delete <code> table role!</code>
            </p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th width="100px">Role</th>
                    <th width="10px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($role as $r) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td> <?= $r['role']; ?> </td>
                      <td>
                        <a href="<?= base_url('role/access/') . $r['id']; ?>" class="badge badge-info" title="ACCESS"><i class="mdi mdi-account-convert" title="ACCESS"></i></a>
                        <a href="<?= base_url('role/editRole/') . $r['id']; ?>" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editRoleModal<?= $r['id']; ?>"><i class="mdi mdi-tooltip-edit" title="EDIT"></i></a>
                        <a href="<?= base_url('role/deleteRole/') . $r['id']; ?>" class="badge badge-danger tombol-hapus-role" title="DELETE"><i class="mdi mdi-delete" title="DELETE"></i></a>
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
  <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('role'); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="role">Role Name</label>
              <input type="text" name="role" class="form-control" id="role" placeholder="Role Name">
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
  <?php foreach ($role as $r) : ?>
    <div class="modal fade" id="editRoleModal<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editRoleModalLabel">Edit New Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('role/editrole/') . $r['id']; ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="role">Role Name</label>
                <input type="text" name="role" class="form-control" id="role" placeholder="Role Name" value="<?= $r['role']; ?>">
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
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <?= form_error('menu', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        ', '</div>'); ?>

        <div class="flash-data-menu" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


        <a href="" class="btn btn-primary my-2" data-toggle="modal" data-target="#newMenuModal">+ Add New Menu</a>
      </div>
      <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Menu Table</h4>
            <p class="card-description">
              Be Carefull Edit or Delete <code> table menu!</code>
            </p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th width="100px">Menu</th>
                    <th width="100px">Icon</th>
                    <th width="10px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($menu as $m) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td> <?= htmlentities($m['menu']); ?> </td>
                      <td> <code><?= htmlentities($m['icon']); ?></code> </td>
                      <td>
                        <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editMenuModal<?= $m['id']; ?>"><i class="mdi mdi-tooltip-edit" title="EDIT"></i></a>
                        <a href="<?= base_url('menu/deleteMenu/') . $m['id']; ?>" class="badge badge-danger tombol-hapus-menu" title="DELETE"><i class="mdi mdi-delete" title="DELETE"></i></a>
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
  <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('menu'); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="menu">Menu Name</label>
              <input type="text" name="menu" class="form-control" id="menu" placeholder="Menu Name">
            </div>
            <div class="form-group">
              <label for="icon">Icon Name</label>
              <input type="text" name="icon" class="form-control" id="icon" placeholder="Icon Name">
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
  <?php foreach ($menu as $m) : ?>
    <div class="modal fade" id="editMenuModal<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('menu/editMenu/') . $m['id']; ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="menu">Menu Name</label>
                <input type="text" name="menu" class="form-control" id="menu" value="<?= $m['menu']; ?>">
              </div>
              <div class="form-group">
                <label for="icon">Icon Name</label>
                <input type="text" name="icon" class="form-control" id="icon" value="<?= $m['icon']; ?>">
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
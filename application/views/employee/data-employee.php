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
        <div class="flash-data-employee" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
      </div>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Employee Table</h4>
            <p class="card-description">
              Be Carefull for Edit <code> table Employee!</code>
            </p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th width="10px">Employee</th>
                    <th width="100px">NIP</th>
                    <th width="100px">Name</th>
                    <th width="100px">Jabatan</th>
                    <th width="100px">Active</th>
                    <th width="10px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($employee as $e) : ?>
                    <tr>
                      <td class="py-1">
                        <img src="<?= base_url('assets/images/avatar/') . $e['image']; ?>" alt="Profile Picture">
                      </td>
                      <td> <?= htmlentities($e['nip']); ?> </td>
                      <td> <?= htmlentities($e['name']); ?> </td>
                      <td> <?= htmlentities($e['jabatan']); ?> </td>
                      <td> <?= htmlentities($e['is_active']) == 1 ? "<div class = 'badge badge-success'> Active </div>" : "<div class = 'badge badge-danger'> Not Active </div>"; ?> </td>
                      <td>
                        <a href="<?= base_url('menu/editSubMenu/') . $e['id']; ?>" title="EDIT" class="badge badge-warning" data-toggle="modal" data-target="#editEmployeeModal<?= $e['id']; ?>"><i class="mdi mdi-tooltip-edit" title="EDIT"></i> </a>
                        <a href="<?= base_url('menu/editSubMenu/') . $e['id']; ?>" title="DETAIL" class="badge badge-info" data-toggle="modal" data-target="#detailEmployeeModal<?= $e['id']; ?>"><i class="mdi mdi-information-outline" title="DETAIL"></i> </a>
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
  <!-- Modal Edit -->
  <?php foreach ($employee as $e) : ?>
    <div class="modal fade" id="editEmployeeModal<?= $e['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('menu/editsubmenu/') . $e['id']; ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="title">Sub Menu Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Sub Menu Title" value="<?= $e['title']; ?>">
              </div>
              <div class="form-group">
                <label for="menu_id">Menu Name</label>
                <select name="menu_id" id="menu_id" class="form-control">
                  <option value="<?= $e['menu_id']; ?>"><?= $e['menu']; ?></option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="URL">URL</label>
                <input type="text" name="url" class="form-control" id="URL" placeholder="URL" value="<?= $e['url']; ?>">
              </div>
              <div class="form-group">
                <div class="form-check mx-sm-2">
                  <input type="hidden" value="0" name="is_active" id="is_active">
                  <label class="form-check-label" for="is_active">
                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" <?= $e['is_active'] == 1 ? "checked" : ""; ?>>
                    Active?
                  </label>
                </div>
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

  <!-- Modal Detail -->
  <?php foreach ($employee as $e) : ?>
    <div class="modal fade" id="detailEmployeeModal<?= $e['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailEmployeeModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailEmployeeModalLabel">Add New Sub Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('menu/editsubmenu/') . $e['id']; ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="title">Sub Menu Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Sub Menu Title" value="<?= $e['title']; ?>">
              </div>
              <div class="form-group">
                <label for="menu_id">Menu Name</label>
                <select name="menu_id" id="menu_id" class="form-control">
                  <option value="<?= $e['menu_id']; ?>"><?= $e['menu']; ?></option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="URL">URL</label>
                <input type="text" name="url" class="form-control" id="URL" placeholder="URL" value="<?= $e['url']; ?>">
              </div>
              <div class="form-group">
                <div class="form-check mx-sm-2">
                  <input type="hidden" value="0" name="is_active" id="is_active">
                  <label class="form-check-label" for="is_active">
                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" <?= $e['is_active'] == 1 ? "checked" : ""; ?>>
                    Active?
                  </label>
                </div>
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
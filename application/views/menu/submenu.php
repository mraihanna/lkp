<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <!-- <? form_error('title', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        ', '</div>'); ?> -->

        <?php if (validation_errors()) : ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= validation_errors(); ?>
          </div>
        <?php endif; ?>

        <div class="flash-data-submenu" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


        <a href="" class="btn btn-primary my-2" data-toggle="modal" data-target="#newSubMenuModal">+ Add New Sub Menu</a>
      </div>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sub Menu Table</h4>
            <p class="card-description">
              Be Carefull for Edit or Delete <code> table sub menu!</code>
            </p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th width="100px">Title</th>
                    <th width="100px">Menu</th>
                    <th width="100px">URL</th>
                    <th width="100px">Active</th>
                    <th width="10px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($subMenu as $sm) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td> <?= htmlentities($sm['title']); ?> </td>
                      <td> <?= htmlentities($sm['menu']); ?> </td>
                      <td> <?= htmlentities($sm['url']); ?> </td>
                      <td> <?= htmlentities($sm['is_active']) == 1 ? "<div class = 'badge badge-success'> Active </div>" : "<div class = 'badge badge-danger'> Not Active </div>"; ?> </td>
                      <td>
                        <a href="<?= base_url('menu/editSubMenu/') . $sm['id']; ?>" title="EDIT" class="badge badge-warning" data-toggle="modal" data-target="#editSubMenuModal<?= $sm['id']; ?>"><i class="mdi mdi-tooltip-edit" title="EDIT"></i> </a>
                        <a href="<?= base_url('menu/deleteSubMenu/') . $sm['id']; ?>" class="badge badge-danger tombol-hapus-submenu" title="DELETE"><i class="mdi mdi-delete" title="DELETE"></i></a>
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
  <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('menu/submenu'); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="title">Sub Menu Title</label>
              <input type="text" name="title" class="form-control" id="title" placeholder="Sub Menu Title">
            </div>
            <div class="form-group">
              <label for="menu_id">Menu Name</label>
              <select name="menu_id" id="menu_id" class="form-control">
                <option value="">Select Menu</option>
                <?php foreach ($menu as $m) : ?>
                  <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="URL">URL</label>
              <input type="text" name="url" class="form-control" id="URL" placeholder="URL" value="errors/maintenance">
            </div>
            <div class="form-group">
              <div class="form-check mx-sm-2">
                <input type="hidden" value="0" name="is_active" id="is_active">
                <label class="form-check-label" for="is_active">
                  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                  Active?
                </label>
              </div>
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
  <?php foreach ($subMenu as $sm) : ?>
    <div class="modal fade" id="editSubMenuModal<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubMenuModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editSubMenuModalLabel">Add New Sub Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('menu/editsubmenu/') . $sm['id']; ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="title">Sub Menu Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Sub Menu Title" value="<?= $sm['title']; ?>">
              </div>
              <div class="form-group">
                <label for="menu_id">Menu Name</label>
                <select name="menu_id" id="menu_id" class="form-control">
                  <option value="<?= $sm['menu_id']; ?>"><?= $sm['menu']; ?></option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="URL">URL</label>
                <input type="text" name="url" class="form-control" id="URL" placeholder="URL" value="<?= $sm['url']; ?>">
              </div>
              <div class="form-group">
                <div class="form-check mx-sm-2">
                  <input type="hidden" value="0" name="is_active" id="is_active">
                  <label class="form-check-label" for="is_active">
                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" <?= $sm['is_active'] == 1 ? "checked" : ""; ?>>
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
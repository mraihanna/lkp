<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <?= $this->session->flashdata('message'); ?>
        <a href="<?= base_url('role'); ?>" class="btn btn-primary my-2">
          < Back </a>

      </div>
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Role Access Table : <div class="badge badge-info"><?= $role['role']; ?></div>
            </h4>
            <p class="card-description">
              Be Carefull change access <code> table role acccess!</code>
            </p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th width="100px">Menu</th>
                    <th width="10px">Access</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($menu as $m) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td> <?= $m['menu']; ?> </td>
                      <td>
                        <div class="form-check pb-2">
                          <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">

                        </div>
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
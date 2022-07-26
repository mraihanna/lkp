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
        <div class="flash-data-active-employee" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
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
                      <td> <a class="tombol-sure-active" href="<?= base_url('employee/deactive/') . $e['id']; ?>"> <?= htmlentities($e['is_active']) == 1 ? "<div class = 'badge badge-success tombol-sure-active'> Active </div>" : "<div class = 'badge badge-danger tombol-sure-active'> Not Active </div>"; ?> </a></td>
                      <td>
                        <a href="<?= base_url('employee/detailEmployee/') . $e['id']; ?>" title="DETAIL" class="badge badge-info"><i class="mdi mdi-information-outline" title="DETAIL"></i> </a>
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
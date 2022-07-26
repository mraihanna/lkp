<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <a href="<?= base_url('employee/dataemployee'); ?>" class="btn btn-info my-2">
          < BACK </a>
            <div class="row">
              <div class="col-lg-12"><?= $this->session->flashdata('message'); ?></div>
            </div>
      </div>
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Profile - <?= $employee['name']; ?></h4>
            <div class="row">
              <div class="col-3">
                <img src="<?= base_url('assets/images/avatar/') . $employee['image']; ?>" class="card-img" alt="Profile picture">
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h5 class="card-title"><?= $employee['role'] ?> - <?= $employee['jabatan']; ?></h5>
                  <p class="card-text"><?= $employee['email']; ?></p>
                  <p class="card-text"><?= $employee['nip']; ?></p>
                  <p class="card-text">Alamat: <?= htmlentities($employee['alamat']) == NULL ? "Not Entered" : $employee['alamat']; ?></p>
                  <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>
        <div class="row">
          <div class="col-lg-12"><?= $this->session->flashdata('message'); ?></div>
        </div>
      </div>
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Profile</h4>
            <div class="row">
              <div class="col-3">
                <img src="<?= base_url('assets/images/avatar/') . $user['image']; ?>" class="card-img" alt="Profile picture">
              </div>
              <div class="col-9">
                <div class="card-body">
                  <h5 class="card-title"><?= $jabatan['role'] ?></h5>
                  <p class="card-text"><?= $user['name']; ?></p>
                  <p class="card-text"><?= $user['nip']; ?></p>
                  <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
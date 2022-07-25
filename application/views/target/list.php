<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>
        <form action="<?= base_url('target/list'); ?>" method="post">
          <div class="row">
            <input class="col-3 form-control mr-5 ml-3" type="hidden" name="sum" value="1" placeholder="Jumlah Form">
            <button type="submit" name="add" class="btn btn-primary ml-2">+ Add Form List</button>
          </div>
        </form>
      </div>
      <div class="col-md grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-description">
              Be carefull in edit profile
            </p>
            <form action="" method="post">
              <div class="form-group row">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="email" readonly name="email" id="email" value="<?= $user['email']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="name" name="name" id="name" value="<?= $user['name']; ?>">
                  <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary">Edit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
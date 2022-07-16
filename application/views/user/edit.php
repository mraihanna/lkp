<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-description">
              Be carefull in edit profile
            </p>
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="email" readonly name="email" id="email" value="<?= $user['email']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Full Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" id="name" value="<?= $user['name']; ?>">
                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3">Picture</div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/images/avatar/') . $user['image']; ?>" alt="" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
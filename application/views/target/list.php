<style>
  .card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
  }
</style>
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">

      <div class="col-12 mb-3">
        <h2><?= $title; ?></h2>

        <?= form_error('role', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        ', '</div>'); ?>

        <div class="flash-data-role" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


      </div>

      <div class="col-12">
        <div class="card card-primary">
          <div class="card-body">
            <div class="form-group mb-0">
              <h6><i class="mdi mdi-account-search" style="font-size: 20px;"></i>&nbsp;Find Employee</h6>
              <input type="text" placeholder="Search. . . " name="search" id="search" class="col-lg-12 col-form-label" style="font-size: 20px;"></input>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 my-2" onclick="location.href='<?= base_url('program/'); ?>';" style="cursor: pointer;">
        <div class="card card-primary">
          <div class="card-body">
            <div class="form-group mb-0">
              <center>
                <h6><i class="fas fa-fw fa-university" style="font-size: 20px;"></i>&nbsp;All Employee<b></b></h6>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" id="univ">
      <?php foreach ($allUser as $u) : ?>
        <?php $id = $u['id']; ?>
        <div class="col-lg-3 col-md-6 grid-margin stretch-card" onclick="location.href='<?= base_url('target/userAdd/') . $id ?>';" style="cursor: pointer;">
          <div class="card mb-5 " style="height: 90%;">
            <!-- <div class="card-wrap"> -->
            <div class="card-body p-3" style="height: 250px;">
              <center>
                <table>
                  <tr>
                    <th style="height: 250px; vertical-align : middle;">
                      <img src="<?= base_url('assets/images/avatar/') . $u['image']; ?>" class="card-img my-3 px-3">
                    </th>
                  </tr>
                </table>
              </center>
            </div>
            <div class="card-body">
              <center>
                <h6><?= $u['name']; ?></h6>
                <h6><?= $u['jabatan_id']; ?></>
              </center>
            </div>
            <!-- </div> -->
          </div>
        </div>
      <?php endforeach; ?>
    </div>
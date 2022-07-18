<?php if ($this->session->userdata('role_id') == 1) : ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 mb-3">
          <h2><?= $title; ?> - <?= $jabatan['role']; ?> </h2>
        </div>
        <div class="flash-data-login" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


      </div>
    </div>
  <?php elseif ($this->session->userdata('role_id') == 2) : ?>

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 mb-3">
            <h2><?= $title; ?> - <?= $jabatan['role']; ?> </h2>
          </div>
          <div class="flash-data-login" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


        </div>
      </div>
    <?php else : ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 mb-3">
              <h2><?= $title; ?> - <?= $jabatan['role']; ?> </h2>
            </div>
            <div class="flash-data-login" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>


          </div>
        </div>
      <?php endif; ?>
  <?php $company = $this->db->get('perusahaan')->row_array(); ?>
  <!-- content-wrapper ends -->
  <!-- partial:<?= base_url('assets/'); ?>partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y'); ?>. LKP <b> <?= $company['perusahaan']; ?></b>, address <?= $company['alamat']; ?>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><i class="mdi mdi-cellphone"></i> Telp <?= $company['tlp']; ?> </span>
    </div>
  </footer>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout/'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/'); ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('assets/'); ?>vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/select2/select2.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/off-canvas.js"></script>
  <script src="<?= base_url('assets/'); ?>js/hoverable-collapse.js"></script>
  <script src="<?= base_url('assets/'); ?>js/template.js"></script>
  <script src="<?= base_url('assets/'); ?>js/settings.js"></script>
  <script src="<?= base_url('assets/'); ?>js/todolist.js"></script>
  <script src="<?= base_url('assets/'); ?>js/file-upload.js"></script>
  <script src="<?= base_url('assets/'); ?>js/typeahead.js"></script>
  <script src="<?= base_url('assets/'); ?>js/select2.js"></script>
  <script src="<?= base_url('assets/'); ?>sweetalert/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('assets/'); ?>sweetalert/mySweetAlert.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({
        url: "<?= base_url('role/changeaccess'); ?>",
        type: 'post',
        data: {
          menuId: menuId,
          roleId: roleId
        },
        success: function() {
          document.location.href = "<?= base_url('role/access/'); ?>" + roleId;
        }
      });
    })

    $(document).ready(function() {
      $('#table').DataTable();
    });

    $(document).ready(function() {
      $('#search').keyup(function() {
        search_table($(this).val());
      });

      function search_table(value) {
        $('#univ div.col-lg-3').each(function() {
          var found = 'false';
          $(this).each(function() {
            if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
              found = 'true';
            }
          });
          if (found == 'true') {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      }
    });
  </script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  </body>

  </html>
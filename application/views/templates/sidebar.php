<!-- partial:<?= base_url('assets/'); ?>partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">


    <!-- QUERY MENU -->
    <?php
    $role_id        = $this->session->userdata('role_id');
    $queryMenu      = "SELECT user_menu.*
                  FROM user_menu JOIN user_access_menu
                  ON user_menu.id = user_access_menu.menu_id
                  WHERE user_access_menu.role_id = $role_id
                  AND is_active = 1
                  ORDER BY user_menu.urutan ASC
                ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>
    <!-- END QUERY  -->

    <!-- Loop -->
    <?php foreach ($menu as $m) :
      $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $m['menu']))); ?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#<?= $slug; ?>" aria-expanded="false" aria-controls="<?= $slug; ?>">
          <i class="<?= $m['icon']; ?> menu-icon"></i>
          <span class="menu-title"><?= $m['menu']; ?></span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="<?= $slug; ?>">
          <ul class="nav flex-column sub-menu">
            <?php
            $menuId         = $m['id'];
            $querySubMenu   = "SELECT * FROM user_sub_menu 
                            WHERE menu_id = $menuId 
                            AND is_active = 1
                            ORDER BY urutan ASC
                          ";
            $subMenu        = $this->db->query($querySubMenu)->result_array();
            ?>
            <?php foreach ($subMenu as $sm) : ?>
              <li class="nav-item"> <a class="nav-link" href="<?= base_url($sm['url']); ?>"> <?= $sm['title']; ?> </a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </li>
    <?php endforeach; ?>

    <!-- End Loop -->

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
        <!--sweet allert kalau bisa-->
        <i class="ti-power-off menu-icon"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>
  </ul>
</nav>
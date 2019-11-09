<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('dashboard') ?>">Sesepuh ID</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?= base_url('dashboard') ?>">SSI</a>
    </div>

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `M`.`id`, `menu` 
                      FROM `tbl_user_menu` AS M JOIN `tbl_user_access_menu` AS AM
                      ON `M`.`id` = `AM`.`menu_id`
                      WHERE `AM`.`role_id` = $role_id AND `M`.`id` != 2 
                      ORDER BY `AM`.`menu_id` ASC
                    ";
    $menu = $this->db->query($queryMenu)->result_array();

    ?>
    <?php foreach ($menu as $m) { ?>
      <ul class="sidebar-menu">
        <li class="menu-header"> <?= $m['menu']; ?></li>
        <?php
          $menu_ = $this->uri->segment(1);
          // print_r($menu_);
          // die;
          if (strtoupper($menu_) == strtoupper($m['menu'])) { ?>
          <li class="nav-item dropdown active">
          <?php } else { ?>
          <li class="nav-item dropdown">
          <?php } ?>
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-fire"></i><span><?= $m['menu']; ?></span></a>
          <ul class="dropdown-menu">
            <?php
              $menuId = $m['id'];
              $querySubMenu = "SELECT * 
                                FROM `tbl_user_sub_menu`AS SB JOIN `tbl_user_menu` AS UM
                                ON `SB`.menu_id = `UM`.`id`
                                WHERE `SB`.`menu_id` = $menuId
                                AND `SB`.`is_active` = 1
                            ";
              $submenu = $this->db->query($querySubMenu)->result_array();
              ?>
            <?php foreach ($submenu as $sm) { ?>

              <?php if ($title == $sm['title']) { ?>
                <li class="active">
                <?php } else { ?>
                <li>
                <?php } ?>
                <a class="nav-link" href="<?= base_url($sm['url']) ?>"><?= $sm['title'] ?></a>
                </li>
              <?php } ?>
          </ul>
          </li>
      </ul>
    <?php } ?>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-lg btn-block btn-icon-split">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </aside>
</div>
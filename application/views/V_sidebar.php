<body class="app sidebar-mini rtl">

    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">Test Online~EDI</a>

      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button">
            <i class="fa fa-search"></i>
          </button>
        </li> -->

        <!--Notification Menu-->
        <!-- <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
            <i class="fa fa-bell-o fa-lg"></i>
          </a>
        </li> -->

        <!-- User Menu-->
        <li class="dropdown">
          <a style="text-align: center;" class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
          <img class="app-sidebar__user-avatar" src="http://localhost/test_edi/assets/uploads/profile/post-05.JPG" alt="User Image" style="width: 30px; height: 27px;">
        </a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li>
              <a class="dropdown-item" href="<?php echo base_url('Login/doLogout'); ?>">
                <i class="fa fa-sign-out fa-lg"></i> 
                Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </header>

<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <?php
          if ($this->session->userdata('level') == 2) {
        ?>
          <li>
            <a class="app-menu__item active" href="<?php echo base_url('Profile') ?>">
              <!-- <i class="app-menu__icon fa fa-home"></i> -->
              <span class="app-menu__label">Profile</span>
            </a>
          </li>
        <?php
          }

          if ($this->session->userdata('level') == 1) {
        ?>
        <li>
          <a class="app-menu__item active" href="<?php echo base_url('Admin') ?>">
            <!-- <i class="app-menu__icon fa fa-home"></i> -->
            <span class="app-menu__label">Data User</span>
          </a>
        </li>
        <?php
          }
        ?>
      </ul>
    </aside>
    
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Smart BP Monitoring</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo getBaseUrl() ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <?php if (!$_SESSION['user']['patient_id']) { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Patients">
          <a class="nav-link" href="<?php echo getBaseUrl() ?>/manage-patients/">
            <i class="fa fa-fw fa-group"></i>
            <span class="nav-link-text">Manage Patients</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Patients">
          <a class="nav-link" href="<?php echo getBaseUrl() ?>/manage-user/">
            <i class="fa fa-fw fa-group"></i>
            <span class="nav-link-text">Manage Users</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Records">
          <a class="nav-link" href="<?php echo getBaseUrl() ?>/user-profile/records.php">
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Records</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Profile">
          <a class="nav-link" href="<?php echo getBaseUrl() ?>/user-profile/change-password-admin.php">
            <i class="fa fa-fw fa-key"></i>
            <span class="nav-link-text">Change Password</span>
          </a>
        </li>
        <?php } ?>
        <?php if ($_SESSION['user']['patient_id']) { ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Profile">
          <a class="nav-link" href="<?php echo getBaseUrl() ?>/user-profile/profile.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My Profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Records">
          <a class="nav-link" href="<?php echo getBaseUrl() ?>/user-profile/records.php">
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Records</span>
          </a>
        </li>
        <?php } ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
       <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
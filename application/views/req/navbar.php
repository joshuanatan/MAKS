<nav class="site-navbar navbar navbar-default navbar-inverse navbar-fixed-top navbar-mega" role="navigation" style="background-color:#3B464C">

  <div class="navbar-header">
    <button type="butwhitesmoketon" style="color:white" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-bar"></span>
    </button>
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
      <i class="icon wb-more-horizontal" aria-hidden="true" style="color:white"></i>
    </button>
    <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
      <img class="navbar-brand-logo" src="<?php echo base_url(); ?>assets/images/logo.png" title="Remark">
    </div>
  </div>

  <div class="navbar-container container-fluid">
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
      <ul class="nav navbar-toolbar">

        <li class="nav-item hidden-float" id="toggleMenubar">
          <a style="color:white" class="nav-link" data-toggle="menubar" href="#" role="button">
            <i class="icon hamburger hamburger-arrow-left">
              <span class="sr-only">Toggle menubar</span>
              <span class="hamburger-bar"></span>
            </i>
          </a>
        </li>

        <li class="nav-item hidden-sm-down" id="toggleFullscreen">
          <a class="nav-link icon icon-fullscreen" style="color:white" data-toggle="fullscreen" href="#" role="button">
            <span class="sr-only">Toggle fullscreen</span>
          </a>
        </li>

      </ul>
      <!-- End Navbar Toolbar -->

      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

        <li class="nav-item dropdown">
          <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
            <span class="avatar avatar-online">
              <img src="<?php echo base_url(); ?>assets/images/default.jpg" alt="...">
              <i></i>
            </span>
          </a>
          <div class="dropdown-menu" role="menu">
            <button data-toggle="modal" data-target="#changePassword" class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Change Password</button>


            <a class="dropdown-item" href="<?php echo base_url(); ?>admin/welcome/logout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
          </div>
        </li>
      </ul>
      <!-- End Navbar Toolbar Right -->

      <div class="navbar-brand navbar-brand-center">
        <a href="<?php echo base_url(); ?>">
          <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?php echo base_url(); ?>assets/images/logo.png" title="Remark">
          <img class="navbar-brand-logo navbar-brand-logo-special" src="<?php echo base_url(); ?>assets/images/logo.png" title="Remark">
        </a>
      </div>
    </div>
  </div>
</nav>
<div class="modal fade" id="changePassword">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">CHANGE PASSWORD</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url();?>admin/welcome/change_password" method="POST">
          <div class="form-group">
            <h5 style="opacity:0.5">Current Password</h5>
            <input type="password" name="old_password" class="form-control">
          </div>
          <div class="form-group">
            <h5 style="opacity:0.5">New Password</h5>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-sm btn-primary btn-outline">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="site-menubar">
  <div class="site-menubar-header">
    <div class="cover overlay">
      <div class="overlay-panel vertical-align overlay-background" style = "background-color:#6c303c">
        <div class="vertical-align-middle">
          <a class="avatar avatar-lg" href="javascript:void(0)">
            <img src="<?php echo base_url(); ?>assets/images/default.jpg" alt="...">
          </a>
          <div class="site-menubar-info">
            <h5 class="site-menubar-user"><?php echo $this->session->nama_user; ?></h5>
            <p class="site-menubar-email"><?php echo $this->session->email_user; ?> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="site-menubar-body">
    <div>
      <div>
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-item">
            <a href="<?php echo base_url(); ?>admin/user">
              <i class="site-menu-icon wb-memory" aria-hidden="true"></i>
              <span class="site-menu-title">User Administrator</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a href="<?php echo base_url(); ?>admin/nlp-function/setup">
              <i class="site-menu-icon wb-arrow-expand" aria-hidden="true"></i>
              <span class="site-menu-title">Wit.ai Configuration</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a href="<?php echo base_url(); ?>admin/nlp-function/intent">
              <i class="site-menu-icon wb-quote-right" aria-hidden="true"></i>
              <span class="site-menu-title">Intent Management</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a href="<?php echo base_url(); ?>admin/nlp-function/entity">
              <i class="site-menu-icon wb-copy" aria-hidden="true"></i>
              <span class="site-menu-title">Entity Management</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a href="<?php echo base_url(); ?>admin/km-function/database">
              <i class="site-menu-icon wb-code-working" aria-hidden="true"></i>
              <span class="site-menu-title">Data Source Connection</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a href="<?php echo base_url(); ?>admin/rb-function/result_type">
              <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
              <span class="site-menu-title">Result Type</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a href="<?php echo base_url(); ?>admin/km-function/dataset">
              <i class="site-menu-icon wb-stats-bars" aria-hidden="true"></i>
              <span class="site-menu-title">Query Builder</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
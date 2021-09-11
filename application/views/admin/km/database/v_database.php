<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="ADVANCE SUPPORT SYSTEM FOR DATA PROCESSING">
  <meta name="author" content="Joshua Natan W">

  <title>ADVANCED SUPPORT FOR DATA PROCESSING SYSTEM</title>

  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/site.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/flag-icon-css/flag-icon.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/font-awesome/font-awesome.css">

  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>assets/global/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
</head>

<body class="animsition dashboard site-menubar-hide site-menubar-unfold">
  <?php $this->load->view("req/navbar"); ?>
  <div class="page">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="page-header">
          <h1 class="page-title">MASTER DATABASE CONNECTION</h1>
          <br />
          <ol class="breadcrumb breadcrumb-arrow">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Database Connection</li>
          </ol>
        </div>
        <br />
        <?php if ($this->session->status_db == "success") : ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->msg_db; ?>
          </div>
        <?php elseif ($this->session->status_db == "error") : ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->msg_db; ?>
          </div>
        <?php endif; ?>
        <div class="page-body">
          <div class="col-lg-12">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDatabase">+ ADD DATABASE CONNECTION</button>
            <a href="<?php echo base_url(); ?>admin/km-function/database/recycle_bin" class="btn btn-light btn-sm"><i class="icon wb-trash"></i></a>
            <br /><br />
            <table class="table table-striped table-hover table-bordered" id="table_driver" data-plugin="dataTable" style="table-layout:fixed">
              <thead>
                <th>#</th>
                <th>Database Name</th>
                <th>Database Hostname</th>
                <th>Database User</th>
                <th>Last Modified</th>
                <th>Status Connection</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php for ($a = 0; $a < count($database); $a++) : ?>
                  <tr>
                    <td style="overflow-wrap:break-word"><?php echo $a + 1; ?></td>
                    <td style="overflow-wrap:break-word"><?php echo $database[$a]["db_name"]; ?></td>
                    <td style="overflow-wrap:break-word"><?php echo $database[$a]["db_hostname"]; ?></td>
                    <td style="overflow-wrap:break-word"><?php echo $database[$a]["db_username"]; ?></td>
                    <td style="overflow-wrap:break-word"><?php echo $database[$a]["tgl_db_connection_last_modified"]; ?></td>
                    <td style="overflow-wrap:break-word">
                      <?php if ($database[$a]["status_aktif_db_connection"] == 1) : ?>
                        <button type="button" class="btn btn-primary btn-sm col-lg-12">IN USE</button>
                      <?php else : ?>
                        <button type="button" class="btn btn-danger btn-sm col-lg-12">NOT IN USE</button>
                      <?php endif; ?>
                    </td>
                    <td style="overflow-wrap:break-word">
                      <?php if ($database[$a]["status_aktif_db_connection"] == 1) : ?>
                        <a href="<?php echo base_url(); ?>admin/km-function/database/deactive/<?php echo $database[$a]["id_submit_db_connection"]; ?>" class="btn btn-danger btn-sm col-lg-12">DEACTIVE</a>
                      <?php else : ?>
                        <a href="<?php echo base_url(); ?>admin/km-function/database/activate/<?php echo $database[$a]["id_submit_db_connection"]; ?>" class="btn btn-light btn-sm col-lg-12">ACTIVATE</a>
                      <?php endif; ?>
                      <a href="<?php echo base_url(); ?>admin/km-function/database/delete/<?php echo $database[$a]["id_submit_db_connection"]; ?>" class="btn btn-dark btn-sm col-lg-12">DELETE</a>
                      <button type="button" class="btn btn-primary btn-sm col-lg-12" data-toggle="modal" data-target="#editDatabase<?php echo $a; ?>">EDIT DATABASE</button>
                      <button type="button" class="btn btn-light btn-sm col-lg-12" data-toggle="modal" data-target="#editPassword<?php echo $a; ?>">UPDATE PASSWORD</button>
                    </td>
                  </tr>
                <?php endfor; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal fade" id="tambahDatabase">
          <div class="modal-dialog modal-center">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Add Database Connection</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url(); ?>admin/km-function/database/insert" method="POST">
                  <div class="form-group">
                    <h5>Database Hostname</h5>
                    <input required type="text" class="form-control" name="db_hostname">
                  </div>
                  <div class="form-group">
                    <h5>Database Name</h5>
                    <input required type="text" class="form-control" name="db_name">
                  </div>
                  <div class="form-group">
                    <h5>Database Username</h5>
                    <input required type="text" class="form-control" name="db_username">
                  </div>
                  <div class="form-group">
                    <h5>Database Password</h5>
                    <input type="password" class="form-control" name="db_password">
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php for ($a = 0; $a < count($database); $a++) : ?>
          <div class="modal fade" id="editDatabase<?php echo $a; ?>">
            <div class="modal-dialog modal-center">
              <div class="modal-content">
                <div class="modal-header">
                  <h4>Edit Database Connection</h4>
                </div>
                <div class="modal-body">
                  <form action="<?php echo base_url(); ?>admin/km-function/database/update" method="POST">
                    <input type="hidden" name="id_submit_db_connection" value="<?php echo $database[$a]["id_submit_db_connection"]; ?>">
                    <div class="form-group">
                      <h5>Database Hostname</h5>
                      <input required type="text" class="form-control" name="db_hostname" value="<?php echo $database[$a]["db_hostname"]; ?>">
                    </div>
                    <div class="form-group">
                      <h5>Database Name</h5>
                      <input required type="text" class="form-control" name="db_name" value="<?php echo $database[$a]["db_name"]; ?>">
                    </div>
                    <div class="form-group">
                      <h5>Database Username</h5>
                      <input required type="text" class="form-control" name="db_username" value="<?php echo $database[$a]["db_username"]; ?>">
                    </div>
                    <button type="button" data-toggle="modal" data-target="#confirmPassword<?php echo $a; ?>" class="btn btn-primary btn-sm">DONE</button>

                    <div class="modal fade" id="confirmPassword<?php echo $a; ?>">
                      <div class="modal-dialog modal-center">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4>Password Confirmation</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <h5>Database Password</h5>
                              <input type="password" class="form-control" name="current_password">
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="editPassword<?php echo $a; ?>">
            <div class="modal-dialog modal-center">
              <div class="modal-content">
                <div class="modal-header">
                  <h4>Edit Database Password</h4>
                </div>
                <div class="modal-body">
                  <form action="<?php echo base_url(); ?>admin/km-function/database/update_password" method="POST">
                    <input type="hidden" name="id_submit_db_connection" value="<?php echo $database[$a]["id_submit_db_connection"]; ?>">
                    <div class="form-group">
                      <h5>Current Database Password</h5>
                      <input type="password" class="form-control" name="current_password">
                    </div>
                    <div class="form-group">
                      <h5>New Database Password</h5>
                      <input type="password" class="form-control" name="new_password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</body>

</html>
<script src="<?php echo base_url(); ?>assets/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/popper-js/umd/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/bootstrap/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/animsition/animsition.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/asscrollable/jquery-asScrollable.js"></script>

<!-- Plugins -->
<script src="<?php echo base_url(); ?>assets/global/vendor/switchery/switchery.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/intro-js/intro.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/screenfull/screenfull.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/slidepanel/jquery-slidePanel.js"></script>

<!-- Scripts -->
<script src="<?php echo base_url(); ?>assets/global/js/Component.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Plugin.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Base.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Config.js"></script>

<script src="<?php echo base_url(); ?>assets/js/Section/Menubar.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Section/Sidebar.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Section/PageAside.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Plugin/menu.js"></script>

<!-- Config -->
<script src="<?php echo base_url(); ?>assets/global/js/config/colors.js"></script>
<script src="<?php echo base_url(); ?>assets/js/config/tour.js"></script>
<script>
  Config.set('assets', '<?php echo base_url(); ?>assets');
</script>

<!-- Page -->
<script src="<?php echo base_url(); ?>assets/js/Site.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Plugin/asscrollable.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Plugin/slidepanel.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Plugin/switchery.js"></script>

<!-- Init -->
<script src="<?php echo base_url(); ?>assets/js/script-init.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/asrange/jquery-asRange.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/bootbox/bootbox.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Plugin/datatables.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/examples/js/tables/datatable.js"></script>-->
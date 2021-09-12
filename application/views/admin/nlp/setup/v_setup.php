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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
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
          <h1 class="page-title">Wit.ai Configuration List</h1>
          <br />
          <ol class="breadcrumb breadcrumb-arrow">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Wit.ai Configuration</li>
          </ol>
        </div>
        <br />
        <?php if ($this->session->status == "success") : ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close">&times;</button>
            <?php echo $this->session->msg; ?>
          </div>
        <?php elseif ($this->session->status == "error") : ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close">&times;</button>
            <?php echo $this->session->msg; ?>
          </div>
        <?php endif; ?>
        <div class="page-body">
          <table class="table table-striped table-hover table-bordered" id="table_driver" style="table-layout:fixed">
            <thead>
              <th style="width:5%">#</th>
              <th>Email Registered</th>
              <th>Application Name</th>
              <th>Token</th>
              <th>Last Modified</th>
              <th>Action</th>
            </thead>
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word">1</td>
                <td style="overflow-wrap:break-word"><?php echo $acc[0]["registered_email"]; ?></td>
                <td style="overflow-wrap:break-word"><?php echo $acc[0]["application_name"]; ?></td>
                <td style="overflow-wrap:break-word"><?php echo $acc[0]["server_access_token"]; ?></td>
                <td style="overflow-wrap:break-word"><?php echo $acc[0]["date_wit_ai_acc_last_modified"]; ?></td>
                <td style="overflow-wrap:break-word">
                  <button type="button" class="btn btn-primary btn-sm col-lg-12" data-toggle="modal" data-target="#editAccount0">EDIT ACCOUNT</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal fade" id="editAccount0">
          <div class="modal-dialog modal-center">
            <div class="modal-content">
              <div class="modal-header">
                <h4>EDIT Wit.ai ACCOUNT</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url(); ?>admin/nlp-function/setup/update" method="POST">
                  <input type="hidden" value="<?php echo $acc[0]["id_submit_wit_ai_acc"];?>" name="id_submit_wit_ai_acc">
                  <div class="form-group">
                    <h5>Registration Email</h5>
                    <input required type="text" class="form-control" name="registered_email" value="<?php echo $acc[0]["registered_email"]; ?>">
                  </div>
                  <div class="form-group">
                    <h5>Registration Name</h5>
                    <input required type="text" class="form-control" name="registered_name" value="<?php echo $acc[0]["registered_name"]; ?>">
                  </div>
                  <div class="form-group">
                    <h5>Application ID</h5>
                    <input required type="text" class="form-control" name="application_id" value="<?php echo $acc[0]["application_id"]; ?>">
                  </div>
                  <div class="form-group">
                    <h5>Application Name</h5>
                    <input required type="text" class="form-control" name="application_name" value="<?php echo $acc[0]["application_name"]; ?>">
                  </div>
                  <div class="form-group">
                    <h5>Server Access Token</h5>
                    <input required type="text" class="form-control" name="server_access_token" value="<?php echo $acc[0]["server_access_token"]; ?>">
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                </form>
              </div>
            </div>
          </div>
        </div>
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
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-buttons/dataTables.buttons.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-buttons/buttons.html5.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-buttons/buttons.flash.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-buttons/buttons.print.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-buttons/buttons.colVis.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/asrange/jquery-asRange.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/bootbox/bootbox.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Plugin/datatables.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/examples/js/tables/datatable.js"></script>-->
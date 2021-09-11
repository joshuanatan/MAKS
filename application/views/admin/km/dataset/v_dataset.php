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
          <h1 class="page-title">MASTER DATASET</h1>
          <br />
          <ol class="breadcrumb breadcrumb-arrow">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dataset</li>
          </ol>
        </div>
        <br />
        <?php if ($this->session->status_dataset == "success") : ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->msg_dataset; ?>
          </div>
        <?php elseif ($this->session->status_dataset == "error") : ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->msg_dataset; ?>
          </div>
        <?php endif; ?>
        <div class="page-body">
          <a href="<?php echo base_url(); ?>admin/km-function/dataset/add" class="btn btn-primary btn-sm">+ ADD DATASET</a>
          <a href="<?php echo base_url(); ?>admin/km-function/dataset/recycle_bin" class="btn btn-light btn-sm"><i class="icon wb-trash"></i></a>
          <br /><br />
          <table class="table table-striped table-hover table-bordered" id="table_driver" data-plugin="dataTable" style="table-layout:fixed">
            <thead>
              <th style="width:5%">#</th>
              <th>Database Name/Hostname</th>
              <th>Dataset Name</th>
              <th>Dataset Query</th>
              <th>Dataset Notes</th>
              <th>Result Type</th>
              <th>Last Modified</th>
              <th style="width:10%">Status Dataset</th>
              <th style="width:10%">Action</th>
            </thead>
            <tbody>
              <?php for ($a = 0; $a < count($dataset); $a++) : ?>
                <tr>
                  <td style="overflow-wrap:break-word"><?php echo ($a + 1); ?></td>
                  <td style="overflow-wrap:break-word"><?php echo $dataset[$a]["db_name"]; ?>/<?php echo $dataset[$a]["db_hostname"]; ?></td>
                  <td style="overflow-wrap:break-word"><?php echo $dataset[$a]["dataset_name"]; ?></td>
                  <td style="overflow-wrap:break-word"><?php echo $dataset[$a]["dataset_query"]; ?></td>
                  <td style="overflow-wrap:break-word"><?php echo $dataset[$a]["dataset_notes"];?></td>
                  <td style="overflow-wrap:break-word"><?php echo $dataset[$a]["id_result_type"];?></td>
                  <td style="overflow-wrap:break-word"><?php echo $dataset[$a]["tgl_dataset_last_modified"]; ?></td>
                  <td style="overflow-wrap:break-word">
                    <?php if ($dataset[$a]["status_aktif_dataset"] == 0) : ?>
                      <button class="btn btn-danger btn-sm col-lg-12">NOT ACTIVE</button>
                    <?php else : ?>
                      <button class="btn btn-primary btn-sm col-lg-12">ACTIVE</button>
                    <?php endif; ?>
                  </td>
                  <td style="overflow-wrap:break-word">
                    <?php if ($dataset[$a]["status_aktif_dataset"] == 1) : ?>
                      <a href="<?php echo base_url(); ?>admin/km-function/dataset/deactive/<?php echo $dataset[$a]["id_submit_dataset"]; ?>" class="btn btn-danger btn-sm col-lg-12">DEACTIVE</a>
                    <?php else : ?>
                      <a href="<?php echo base_url(); ?>admin/km-function/dataset/activate/<?php echo $dataset[$a]["id_submit_dataset"]; ?>" class="btn btn-light btn-sm col-lg-12">ACTIVATE</a>
                    <?php endif; ?>
                    <a href="<?php echo base_url(); ?>admin/km-function/dataset/delete/<?php echo $dataset[$a]["id_submit_dataset"]; ?>" class="btn btn-dark btn-sm col-lg-12">DELETE</a>
                    <a class="btn btn-primary btn-sm col-lg-12" href="<?php echo base_url(); ?>admin/km-function/dataset/edit/<?php echo $dataset[$a]["id_submit_dataset"]; ?>">EDIT DATASET</a>
                    <a class="btn btn-light btn-sm col-lg-12" href="<?php echo base_url(); ?>admin/km-function/dataset/related/<?php echo $dataset[$a]["id_submit_dataset"]; ?>">RELATED DATASET</a>
                  </td>
                </tr>
              <?php endfor; ?>
            </tbody>
          </table>
        </div>
        <div class="modal fade" id="try_dataset">
          <div class="modal-dialog modal-center">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">TRY get_dataset REQUEST</h4>
              </div>
              <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
                <form action="<?php echo base_url(); ?>admin/km-function/dataset/trial" method="post" target="_blank">
                  <div class="form-group">
                    <h5>Intent</h5>
                    <input type="text" class="form-control" name="intent">
                  </div>
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <th>#</th>
                      <th>Entity</th>
                      <th>Values (Comma Separated)</th>
                    </thead>
                    <tbody>
                      <?php for ($a = 0; $a < 10; $a++) : ?>
                        <tr>
                          <td>
                            <div class="checkbox-custom checkbox-primary">
                              <input type="checkbox" name="check[]" value="<?php echo $a; ?>">
                              <label></label>
                            </div>
                          </td>
                          <td>
                            <input type="text" class="form-control" name="entity<?php echo $a; ?>">
                          </td>
                          <td>
                            <textarea class="form-control" name="value<?php echo $a; ?>"></textarea>
                          </td>
                        </tr>
                      <?php endfor; ?>
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-primary btn-sm">Make Request</button>
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
<script src="<?php echo base_url(); ?>assets/global/vendor/asrange/jquery-asRange.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/bootbox/bootbox.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Plugin/datatables.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/examples/js/tables/datatable.js"></script>-->
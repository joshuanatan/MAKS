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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dataset</a></li>
            <li class="breadcrumb-item">Related</li>
          </ol>
        </div>
        <div class="page-body col-lg-12">
          <h5>Related Dataset</h5>
          <button type="button" data-toggle="modal" data-target="#addRelatedDataset" class="btn btn-primary btn-sm">+ADD RELATED DATASET</button>
          <br /><br />
          <form action="<?php echo base_url(); ?>admin/km-function/dataset/remove_related" method="POST">
            <table class="table table-stripped table-hover table-bordered" data-plugin="dataTable">
              <thead>
                <th style="width:5%">Delete</th>
                <th style="width:40%">Dataset Key / Dataset Name</th>
                <th>Dataset Query</th>
              </thead>
              <tbody>
                <?php for ($a = 0; $a < count($registered_related); $a++) : ?>
                  <tr>
                    <td>
                      <div class="checkbox-custom checkbox-danger">
                        <input type="checkbox" name="checks[]" value="<?php echo $registered_related[$a]["id_submit_dataset_related"]; ?>">
                        <label></label>
                      </div>
                    </td>
                    <td>
                      <?php echo $registered_related[$a]["dataset_name"]; ?>
                    </td>
                    <td><?php echo $registered_related[$a]["dataset_query"]; ?></td>
                  </tr>
                <?php endfor; ?>
              </tbody>
            </table>
            <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
            <a href="<?php echo base_url(); ?>admin/km-function/dataset" class="btn btn-primary btn-sm">BACK</a>
          </form>
        </div>

        <div class="modal fade" id="addRelatedDataset">
          <div class="modal-dialog modal-center modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Dataset Repository</h4>
              </div>
              <div class="modal-body" style='max-height: calc(100vh - 210px);overflow-y: auto;'>
                <h5>Selected Dataset</h5>
                <form action="<?php echo base_url(); ?>admin/km-function/dataset/insert_related" method="POST">
                  <table class="table table-striped table-hover table-bordered" style='width:100%'>
                    <thead>
                      <th>#</th>
                      <th>Dataset Name</th>
                      <th>Database Name/Hostname</th>
                      <th>Dataset Query</th>
                      <th>Dataset Notes</th>
                    </thead>
                    <tbody>
                      <?php for ($a = 0; $a < count($dataset_list); $a++) : ?>
                        <tr>
                          <td>
                            <div class='checkbox-custom checkbox-primary'>
                              <input type='checkbox' name='related_dataset_check[]' value='<?php echo $dataset_list[$a]["id_submit_dataset"];?>'><label></label>
                            </div>
                          </td>
                          <td><?php echo $dataset_list[$a]["dataset_name"]; ?></td>
                          <td><?php echo $dataset_list[$a]["db_hostname"]; ?> / <?php echo $dataset_list[$a]["db_name"]; ?></td>
                          <td><?php echo $dataset_list[$a]["dataset_query"]; ?></td>
                          <td><?php echo $dataset_list[$a]["dataset_notes"]; ?></td>
                        </tr>
                      <?php endfor; ?>
                    </tbody>
                  </table>
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
<script src="<?php echo base_url(); ?>assets/global/vendor/asrange/jquery-asRange.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/bootbox/bootbox.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/Plugin/datatables.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/examples/js/tables/datatable.js"></script>-->
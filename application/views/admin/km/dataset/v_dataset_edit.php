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
            <li class="breadcrumb-item">Add</li>
          </ol>
        </div>
        <br />
        <?php if ($this->session->status_dataset == "success") : ?>
          <div class="alert alert-success alert-dismissibile">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->msg_dataset; ?>
          </div>
        <?php elseif ($this->session->status_dataset == "error") : ?>
          <div class="alert alert-danger alert-dismissibile">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $this->session->msg_dataset; ?>
          </div>
        <?php endif; ?>
        <div class="page-body col-lg-12">
          <div class="row row-lg">
            <div class="col-xl-12">
              <!-- Example Tabs Left -->
              <div class="example-wrap">
                <div class="nav-tabs-vertical" data-plugin="tabs">
                  <ul class="nav nav-tabs mr-25" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#primaryData" aria-controls="primaryData" role="tab">Primary Data</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#buildQuery" aria-controls="primaryData" role="tab">Detail Dataset</a></li>

                  </ul>
                  <form action="<?php echo base_url(); ?>admin/km-function/dataset/update" method="post">
                    <div class="tab-content">
                      <div class="tab-pane active" id="primaryData" role="tabpanel">
                        <div class="form-group">
                          <h5>Dataset Name</h5>
                          <input type="text" class="form-control" name="dataset_name" required placeholder="What is this dataset user-friendly name?" value="<?php echo $detail[0]["dataset_name"]; ?>">
                          <input type="hidden" value="<?php echo $detail[0]["id_submit_dataset"]; ?>" name="id_submit_dataset">
                        </div>
                        <div class="form-group">
                          <h5>Database Connection</h5>
                          <select required id="id_db_connection" class="form-control" name="id_db_connection" onchange="activate_mapping_container()">
                            <option value=0 selected disabled>Where should I execute this query? :) Choose one of them!</option>
                            <?php for ($a = 0; $a < count($database); $a++) : ?>
                              <?php if ($database[$a]["id_submit_db_connection"] == $detail[0]["id_db_connection"]) : ?>
                                <option selected value="<?php echo $database[$a]["id_submit_db_connection"]; ?>"><?php echo $database[$a]["db_hostname"]; ?>/<?php echo $database[$a]["db_name"]; ?></option>
                              <?php else : ?>
                                <option value="<?php echo $database[$a]["id_submit_db_connection"]; ?>"><?php echo $database[$a]["db_hostname"]; ?>/<?php echo $database[$a]["db_name"]; ?></option>
                              <?php endif; ?>
                            <?php endfor; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <h5>Display</h5>
                          <select required class="form-control" name="id_result_type">
                            <option value=0 selected disabled>How do we present this information?</option>
                            <?php for ($a = 0; $a < count($result_type); $a++) : ?>
                              <?php if ($result_type[$a]["id_pk_result_type"] == $detail[0]["id_result_type"]) : ?>
                                <option selected value="<?php echo $result_type[$a]["result_type"]; ?>"><?php echo $result_type[$a]["result_type"]; ?></option>
                              <?php else : ?>
                                <option value="<?php echo $result_type[$a]["id_pk_result_type"]; ?>"><?php echo $result_type[$a]["result_type"]; ?></option>
                              <?php endif; ?>
                            <?php endfor; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <h5>Notes</h5>
                          <textarea class="form-control" name="notes"><?php echo $detail[0]["dataset_notes"]; ?></textarea>
                        </div>
                      </div>
                      <div class="tab-pane" id="buildQuery" role="tabpanel">
                        <div class="form-group">
                          <h5>Which user intention do you want to answer with this query?</h5>
                          <input value="<?php echo $detail[0]["dataset_intent"]; ?>" type="text" class="form-control" list="intent_list" name="intent">
                          <datalist id="intent_list">
                            <?php for ($a = 0; $a < count($intent); $a++) : ?>
                              <option><?php echo $intent[$a]["name"]; ?></option>
                            <?php endfor; ?>
                          </datalist>
                        </div>
                        <h5>Any specific argument? Tell us! Otherwise, You can leave me blank if this query is a general information </h5>
                        <table class="table table-bordered table-hover table-striped">
                          <thead>
                            <th style="width:10%">#</th>
                            <th>Entity</th>
                            <th style="width:10%"></th>
                          </thead>
                          <tbody id="entity_list">
                            <datalist id='entity_datalist'></datalist>
                            <?php for ($a = 0; $a < count($entity_registered); $a++) : ?>
                              <tr class='entity_row' id='entity_row<?php echo $a; ?>'>
                                <td>
                                  <div class='checkbox-custom checkbox-primary'>
                                    <input checked type='checkbox' name='entity_checks[]' value='<?php echo $a; ?>'><label></label>
                                  </div>
                                </td>
                                <td>
                                  <input value="<?php echo $entity_registered[$a]["entity_name"]; ?>" type='text' list='entity_datalist' name='entity_name<?php echo $a; ?>' class='form-control'>
                                </td>
                                <td>
                                  <button type='button' class='btn btn-danger btn-sm col-lg-12' onclick='remove_entity_row(<?php echo $a; ?>)'>
                                    <i class='icon wb-close'></i>
                                  </button>
                                </td>
                              </tr>
                            <?php endfor; ?>
                            <tr id="entity_button_container">
                              <td colspan=3><button type="button" class="btn btn-primary btn-sm col-lg-12" onclick="add_entity_row()">ADD NEW ENTITY</button></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="form-group">
                          <h5>Dataset Query <br />Let me know if there are needs to put argument inside my query! use prefix '<i>&</i>'+<i>entity_name</i>+'<i>sequence_number</i>'.</h5>
                          <textarea required class="form-control" rows="10" name="dataset_query" placeholder="select * from table_database where kolom_database = &entity11 and kolom_database2 = &entity21 and kolom_database = &entity12"><?php echo $detail[0]["dataset_query"]; ?></textarea>
                        </div>
                        <hr />
                        <div id="dbfield_mapping_container">
                          <p>Table below is to help the system to get the selected fields and present the result by using its alias hence the result will be a lot user-friendly.<br />Please kindly use "_" (underscore) if the alias has more than 1 word. The system will parse the "_" when presenting data. <br />Ex: product_name [Will be presented as: Product Name]</p>
                          <div class="form-group">
                            <h5>Input view/table Related to This Dataset</h5>

                            <table class="table table-stripped table-bordered table-hover" style="width:100%">
                              <thead>
                                <td style="width:5%">#</td>
                                <td style="width:30%">Table Name</td>
                                <td style="width:30%">Field/Column Name</td>
                                <td style="width:30%">Field/Column Alias</td>
                                <td></td>
                              </thead>
                              <?php //ambil yang entity dalam kategori informasi tersebut 
                              ?>
                              <tbody id="tableEntity">
                                <?php for ($a = 0; $a < count($dbfield); $a++) : ?>
                                  <tr class='db_field_row' id='db_field_row<?php echo $a;?>'>
                                    <td>
                                      <div class='checkbox-custom checkbox-primary'>
                                        <input checked type='checkbox' name='db_field_checks[]' value='<?php echo $a;?>'><label></label>
                                      </div>
                                    </td>
                                    <td>
                                      <input type='text' value = "<?php echo $dbfield[$a]["tbl_name"];?>" class='form-control' name='table_name<?php echo $a;?>'>
                                    </td>
                                    <td>
                                      <input type='text' value = "<?php echo $dbfield[$a]["db_field"];?>" class='form-control' name='db_field<?php echo $a;?>'>
                                    </td>
                                    <td>
                                      <input type='text' value = "<?php echo $dbfield[$a]["db_field_alias"];?>" class='form-control' name='db_field_alias<?php echo $a;?>'>
                                    </td>
                                    <td>
                                      <button type='button' class='btn btn-danger btn-sm col-lg-12' onclick='remove_db_field_row(<?php echo $a;?>)'>
                                        <i class='icon wb-close'></i>
                                      </button>
                                    </td>
                                  </tr>
                                <?php endfor; ?>
                              </tbody>
                              <tfoot>
                                <tr id="buttonContainer">
                                  <td colspan=4><button type="button" class="col-lg-12 btn btn-primary btn-sm" onclick="add_db_field_row()">+ Add Custom Field</button></td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>

                          <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
              <div class="form-group">
                <a href="<?php echo base_url(); ?>admin/km-function/dataset" class="btn btn-outline btn-primary btn-sm">BACK</a>
              </div>
              <!-- End Example Tabs Left -->
            </div>
          </div>
        </div>

        <div class="modal fade" id="tableList">
          <div class="modal-dialog modal-center">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Related Table / View</h4>
              </div>
              <div class="modal-body" style='max-height: calc(100vh - 210px);overflow-y: auto;'>
                <table class="table table-striped table-hover table-bordered" style='width:100%'>
                  <thead>
                    <th>#</th>
                    <th>Table / View</th>
                    <th>Action</th>
                  </thead>
                  <tbody id="tableListContainer">

                  </tbody>
                </table>
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
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
				<?php if ($this->session->status_login == "success") : ?>
					<div class="alert alert-success">
						<?php echo $this->session->msg_login; ?>
					</div>
				<?php elseif ($this->session->status_login == "error") : ?>
					<div class="alert alert-danger">
						<?php echo $this->session->msg_login; ?>
					</div>
				<?php endif; ?>
				<h2>WELCOME TO <i>MAKS</i> ADMINISTRATIVE PAGE</h2>
				<br />
				<h3>Quick Brief</h3>
				<hr />
				<h4>This administrative page consists of the following main functions: </h4>
				<ul>
					<li><a href = "<?php echo base_url();?>admin/user">User management</a>: To manage other administrator accounts
					<li><a href = "<?php echo base_url();?>admin/nlp-function/setup">Wit AI account management</a>: To manage Wit.ai's API key
					<li><a href = "<?php echo base_url();?>admin/nlp-function/intent">Intent management</a>: To manage Wit.ai's intents repository
					<li><a href = "<?php echo base_url();?>admin/nlp-function/entity">Entity management</a>: To manage Wit.ai's entity repository
					<li><a href = "<?php echo base_url();?>admin/km-function/database">Database connection / data source connection management</a>: To manage the connection to the data sources that will be used by MAKS to obtain the requested data
					<!--<li><a href = "<?php echo base_url();?>admin/rb-function/result_type">Result type management</a>: To manage the presentation of the information that will be provided to the user-->
					<li><a href = "<?php echo base_url();?>admin/km-function/dataset">Information / dashboard management</a>: To manage the information that will be presented to the user. 
				</ul>
				<br />
				<h5>MAKS uses Wit.ai to support its natural language processing. You can train Wit.ai's NLP directly in the <a href = "https://wit.ai/apps">Wit.ai</a> platform to maintain the stability</h5>
				<br />
				<br />

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
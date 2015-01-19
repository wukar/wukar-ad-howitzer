<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title><?php echo $_WUKAR_PAGE_TITLE_?></title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href=" <?php echo asset_url('css/main.css')?> ">
  <?php echo $_WUKAR_CSS_?>
  <?php echo $_WUKAR_JS_TOP_?>
</head>
<body>
  <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>WUKAR</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>

    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse wukar-sidebar">
		    <?php $this->load->view('_developer/includes/sidebar-1'); ?>
      </div><!--/.navbar-collapse -->

      <div class="wukar-content-wrapper">
        <div class="wukar-content">

         <!--  <ol class="breadcrumb">
            <li><a href="index.html">Admin Panel</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Overview</li>
            <li><a href="sign-in.html">Sign In Form</a></li>
          </ol> -->

          <?php echo $_WUKAR_HTML_TEMPLATE_;?>

        </div>      
      </div>      
      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
            </div>
            <div class="modal-footer">
              <a href="sign-in.html" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>


      <footer class="wukar-footer">
        <div class="wukar-copyright">
          <p>Copyright &copy; 2084 Your Company Name <!-- Credit: www.wukar.com --></p>
        </div>
      </footer>
    </div>

    <script src="<?php echo asset_url('js/jquery.min.js')?>"></script>
    <script src="<?php echo asset_url('js/bootstrap.min.js')?>"></script>
    <script src="<?php echo asset_url('js/main.js')?>"></script>
    <?php echo $_WUKAR_JS_BOT_?>
</body>
</html>
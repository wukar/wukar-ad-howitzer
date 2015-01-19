<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title><?php echo $_WUKAR_PAGE_TITLE_?></title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" type="text/css" href=" <?php echo asset_url('css/main.css')?> ">
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

    <?php echo $_WUKAR_HTML_TEMPLATE_;?>

    <script src="<?php echo asset_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?php echo asset_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo asset_url('assets/js/Chart.min.js')?>"></script>
    <script src="<?php echo asset_url('assets/js/main.js')?>"></script>
    <?php echo $_WUKAR_JS_BOT_?>
</body>
</html>
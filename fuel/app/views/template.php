<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?></title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <?php echo Asset::css('bootstrap-responsive.min.css'); ?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <script>
      function logout(){
        document.template_form.action = "<?php echo Uri::base();?>login/logout";
        document.template_form.submit();
      }
    </script>
</head>
<body>
    <form name="template_form" action="/" method="POST">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo Uri::base();?>">Sample Application</a>
            <div class="nav-collapse collapse">
              <p class="navbar-text pull-right">
              	<!--Logged in as <a href="#" class="navbar-link"><?php //echo Auth::instance()->get_employee_no(); ?></a>-->
                <!--<?php //echo Form::button('','Logout',array('class'=>'btn btn-inverse', 'onclick'=>'logout();')); ?>-->
              </p>
              <ul class="nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Samples<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><?php echo Html::anchor('user/index/'.'', 'Pagination Sample'); ?></li>
                    <li><?php echo Html::anchor('upload/index/'.'', 'File Upload Sample'); ?></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="container">
      <div class="row">
        <?php if (Session::get_flash('success')): ?>
          <div class="alert alert-info">
            <p><?php echo Session::get_flash('success'); ?></p>
          </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
          <div class="alert alert-error">
            <p><?php echo implode('</p><p>',(array)Session::get_flash('error')); ?></p>
          </div>
        <?php endif; ?>
        <div class="span12">
          <?php echo $content; ?>
        </div>
      </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <?php echo Asset::js('bootstrap.min.js'); ?>
    <?php echo Asset::js('bootstrap-dropdown.js'); ?>
</body>
</html>

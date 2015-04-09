<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $this->pageTitle; ?></title>
	<?php
		$baseUrl = Yii::app()->theme->baseUrl; 
		$cs = Yii::app()->getClientScript();
	?>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
	<?php $cs->registerCssFile($baseUrl.'/bootstrap/css/bootstrap.min.css'); ?>
    <!-- Font Awesome Icons -->
	<?php $cs->registerCssFile($baseUrl.'/font-awesome-4.3.0/css/font-awesome.min.css'); ?>
    <!-- Theme style -->
    <?php $cs->registerCssFile($baseUrl.'/css/AdminLTE.css'); ?>
    <!-- iCheck -->
    <link href="../../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    
	<?php echo $content; ?>

    <!-- jQuery 2.1.3 -->
	<?php $cs->registerScriptFile($baseUrl.'/plugins/jQuery/jQuery-2.1.3.min.js'); ?>
    <!-- Bootstrap 3.3.2 JS -->
	<?php $cs->registerScriptFile($baseUrl.'/bootstrap/js/bootstrap.min.js'); ?>
  </body>
</html>
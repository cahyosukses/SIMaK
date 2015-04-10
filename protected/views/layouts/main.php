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
    <!-- Ionicons -->
	<?php $cs->registerCssFile($baseUrl.'/ionicons-2.0.1/css/ionicons.min.css'); ?>
    <!-- Theme style -->
	<?php $cs->registerCssFile($baseUrl.'/css/AdminLTE.min.css'); ?>
	<?php $cs->registerCssFile($baseUrl.'/css/skins/skin-blue.min.css'); ?>
	
	<?php
		// Lock Screen
		if (!Yii::app()->user->isGuest) {
			Yii::app()->clientScript->registerScript('lock',"
				var autoLockTimer;
				window.onload = resetTimer;
				window.onmousemove = resetTimer;
				window.onmousedown = resetTimer; // catches touchscreen presses
				window.onclick = resetTimer;     // catches touchpad clicks
				window.onscroll = resetTimer;    // catches scrolling with arrow keys
				window.onkeypress = resetTimer;
		 
				function lockScreen() {
					window.location.href = '".$this->createUrl('/site/lockscreen',array('user'=>Yii::app()->user->name))."';
				}
		 
				function resetTimer() {
					clearTimeout(autoLockTimer);
					autoLockTimer = setTimeout(lockScreen, 600000);  // 10 Menit - time is in milliseconds
				}
			");
		}
	?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the 
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |  
  |---------------------------------------------------------|
  
  -->
  <body class="skin-blue">
    <div class="wrapper">
		
      <!-- Main Header -->
	  <?php require_once('_header.php'); ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php require_once('_sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Universitas Tembus Pandang
          </h1>
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
					'activeLinkTemplate'=>'<li class="active">{label}</li>',
					'homeLink'=>'<a href="'.$this->createUrl('/site').'"><i class="fa fa-dashboard"></i> Halaman Depan</a>',
					'htmlOptions'=>array('class'=>'breadcrumb')
				)); ?><!-- breadcrumbs -->
			<?php endif?>
		  
          
        </section>

        <!-- Main content -->
        <section class="content">
			
          <!-- Your Page Content Here -->
		  <?php echo $content; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?php require_once('_footer.php'); ?>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    
    <!-- jQuery 2.1.3 -->
	<?php $cs->registerScriptFile($baseUrl.'/plugins/jQuery/jQuery-2.1.3.min.js'); ?>
    <!-- Bootstrap 3.3.2 JS -->
	<?php $cs->registerScriptFile($baseUrl.'/bootstrap/js/bootstrap.min.js'); ?>
    <!-- AdminLTE App -->
	<?php $cs->registerScriptFile($baseUrl.'/js/app.min.js'); ?>
    
    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->
  </body>
</html>
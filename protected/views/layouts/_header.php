<header class="main-header">
	<!-- Logo -->
    <a href="<?php echo $this->createUrl('/site'); ?>" class="logo"><b>SIM</b>a<b>K</b></a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- Messages: style can be found in dropdown.less-->
				<?php //require_once('_header_messages.php'); ?>

				<!-- Notifications Menu -->
				<?php //require_once('_header_notifications.php'); ?>
			  
				<!-- Tasks Menu -->
				<?php //require_once('_header_tasks.php'); ?>
			  
				<!-- User Account Menu -->
				<?php require_once('_header_user.php'); ?>
            </ul>
		</div>
    </nav>
</header>
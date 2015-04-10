<body class="lockscreen">    
	<!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <b>SIM</b>a<b>K</b>
      </div>
      <!-- User name -->
      <div class="lockscreen-name"><?php echo $model->username; ?></div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="images/user/user2-160x160.jpg" alt="user image"/>
        </div>
        <!-- /.lockscreen-image -->
		
		<!-- lockscreen credentials (contains the form) -->
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'htmlOptions'=>array('class'=>'lockscreen-credentials'),
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
		
          <div class="input-group">
			<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
            <div class="input-group-btn">
              <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
		  <?php echo $form->error($model,'password'); ?>
		  
		<?php $this->endWidget(); ?>
		<!-- /.lockscreen credentials -->
      </div><!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Masukkan password untuk melanjutkan
      </div>
      <div class='text-center'>
        <a href="<?php echo $this->createUrl('site/login'); ?>">Atau login dengan pengguna lain</a>
      </div>
      <div class='lockscreen-footer text-center'>
        Hak Cipta &copy; 2015 <b><a href="http://kenrywan.blogspot.com" class='text-black'>E-One Software Solution</a></b>
      </div>
    </div><!-- /.center -->
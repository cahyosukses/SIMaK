<body class="login-page">
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Masuk Sistem';
?>

<div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>S</b>i<b>M</b>a<b>K</b></a></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login</p>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
          <div class="form-group has-feedback">
			<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'NIM / Username')); ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
			<?php echo $form->error($model,'username'); ?>
          </div>
          <div class="form-group has-feedback">
			<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<?php echo $form->error($model,'password'); ?>
          </div>
          <div class="row">
            <div class="col-xs-8">    
                               
            </div><!-- /.col -->
            <div class="col-xs-4">
			  <?php echo CHtml::submitButton('Masuk',array('class'=>'btn btn-primary btn-block btn-flat')); ?>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="#">Lupa Password</a><br>
        <a href="register.html" class="text-center">Daftar</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

<?php $this->endWidget(); ?>

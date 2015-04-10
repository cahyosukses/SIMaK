<?php
$this->pageTitle =Yii::app()->name.' - Kesalahan';
$this->breadcrumbs=array(
	'Kesalahan',
);
?>

<!-- Main content -->
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> <?php echo $code; ?></h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> <?php echo CHtml::encode($message); ?></h3>
			<p>
                Mohon hubungi Administrator jika masalah ini berulang terus.
                Kembali ke <a href='<?php echo $this->createUrl('/site')?>'>Halaman Utama</a>.
              </p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
</section><!-- /.content -->
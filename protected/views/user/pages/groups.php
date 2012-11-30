<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Lietotāju grupas',
);
?>
<h1>Izvēlaties lietotāju grupu</h1>

<p>
	<?php echo CHtml::link('Iemītnieki', array('showIemitnieki')); ?>
</p>
<p>
	<?php echo CHtml::link('Komandanti', array('showKomandanti')); ?>
</p>
<p>
	<?php echo CHtml::link('Administrātori', array('showAdministratori')); ?>
</p>
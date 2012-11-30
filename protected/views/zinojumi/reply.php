<?php
/* @var $this ZinojumiController */
/* @var $model Zinojumi */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
		'Ziņojumi'=>array('index'),
		'Sūtīt',
	);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zinojumi-reply-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Lauki ar <span class="required">*</span> ir obligāti.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('value'=>$title)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message', array('rows'=>5, 'cols'=>25)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Sūtīt'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
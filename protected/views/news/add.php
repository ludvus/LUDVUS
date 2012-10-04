<?php
/* @var $this JaunumiController */
/* @var $model Jaunumi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jaunumi-add-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'virsraksts'); ?>
		<?php echo $form->textField($model,'virsraksts'); ?>
		<?php echo $form->error($model,'virsraksts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teksts'); ?>
		<?php echo $form->textField($model,'teksts'); ?>
		<?php echo $form->error($model,'teksts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'autors'); ?>
		<?php echo $form->textField($model,'autors'); ?>
		<?php echo $form->error($model,'autors'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pievienot'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
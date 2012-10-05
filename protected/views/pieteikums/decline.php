<?php
/* @var $this PieteikumiController */
/* @var $model Pieteikumi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pieteikumi-add-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Lauki ar <span class="required">*</span> ir obligāti.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model,'surname'); ?>
		<?php echo $form->error($model,'surname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fakultate'); ?>
		<?php echo $form->dropDownList($model,'fakultate', $fakultates); ?>
		<?php echo $form->error($model,'fakultate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'limenis'); ?>
		<?php echo $form->dropDownList($model,'limenis', $limenis); ?>
		<?php echo $form->error($model,'limenis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kurss'); ?>
		<?php echo $form->dropDownList($model,'kurss', $kurss); ?>
		<?php echo $form->error($model,'kurss'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teksts'); ?>
		<?php echo $form->textArea($model,'teksts'); ?>
		<?php echo $form->error($model,'teksts'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Nosūtīt'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
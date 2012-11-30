<?php
/* @var $this AdministratoriController */
/* @var $model Administratori */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'administratori-administratori_form-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vards'); ?>
		<?php echo $form->textField($model,'vards'); ?>
		<?php echo $form->error($model,'vards'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uzvards'); ?>
		<?php echo $form->textField($model,'uzvards'); ?>
		<?php echo $form->error($model,'uzvards'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'epasts'); ?>
		<?php echo $form->textField($model,'epasts'); ?>
		<?php echo $form->error($model,'epasts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'talrunis'); ?>
		<?php echo $form->textField($model,'talrunis'); ?>
		<?php echo $form->error($model,'talrunis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adrese'); ?>
		<?php echo $form->textField($model,'adrese'); ?>
		<?php echo $form->error($model,'adrese'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Saglabāt'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
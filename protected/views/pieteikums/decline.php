<?php
/* @var $this PieteikumiController */
/* @var $model Pieteikumi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pieteikumi-decline-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Noraidīt'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
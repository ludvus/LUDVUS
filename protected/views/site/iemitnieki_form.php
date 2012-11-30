<?php
/* @var $this IemitniekiController */
/* @var $model Iemitnieki */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'iemitnieki-iemitnieki_form-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Lauki ir <span class="required">*</span> ir obligāti.</p>

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
		<?php echo $form->labelEx($model,'fakultates_id'); ?>
		<?php echo $form->dropDownList($model,'fakultates_id', $fakultates, array('options' => array($model->fakultates_id=>array('selected'=>true)), 'disabled'=>'true')); ?>
		<?php echo $form->error($model,'fakultates_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kurss'); ?>
		<?php echo $form->textField($model,'kurss', array('readonly'=>'true')); ?>
		<?php echo $form->error($model,'kurss'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Saglabāt'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this JaunumiController */
/* @var $model Jaunumi */
/* @var $form CActiveForm */
$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Jaunumi'=>array('index'),
	'Labot'
);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jaunumi-edit-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Lauki ar <span class="required">*</span> ir obligāti.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'virsraksts'); ?>
		<?php echo $form->textField($model,'virsraksts'); ?>
		<?php echo $form->error($model,'virsraksts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teksts'); ?>
		<?php echo $form->textArea($model,'teksts', array('rows'=>10, 'cols'=>50)); ?>
		<?php echo $form->error($model,'teksts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'autors'); ?>
		<?php echo $form->textField($model,'autors', array('readonly'=>'true','value'=>Yii::app()->user->name)); ?>
		<?php echo $form->error($model,'autors'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Saglabāt'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
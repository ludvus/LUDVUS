<?php
/* @var $this UserController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Lietotāji'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'Lietotāju saraksts', 'url'=>array('index')),
	array('label'=>'Izveidot lietotāju', 'url'=>array('create')),
	array('label'=>'Labot lietotāju', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Dzēst lietotāju', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Rediģēt lietotājus', 'url'=>array('admin')),
);
?>

<h1>Lietotājs ar ID: <?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'username',
		'pass',
		'user_id',
		'user_type',
	),
)); ?>

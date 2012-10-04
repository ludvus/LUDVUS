<?php
/* @var $this UserController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Rediģēt',
);

$this->menu=array(
	array('label'=>'Lietotāju saraksts', 'url'=>array('index')),
	array('label'=>'Izveidot lietotāju', 'url'=>array('create')),
	array('label'=>'Apskatīt lietotājus', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Rediģēt lietotājus', 'url'=>array('admin')),
);
?>

<h1>Rediģēt lietotāju ar ID: <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
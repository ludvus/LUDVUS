<?php
/* @var $this UserController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Lietotāji'=>array('index'),
	'Izveidot',
);

$this->menu=array(
	array('label'=>'Lietotāju saraksts', 'url'=>array('index')),
	array('label'=>'Lietotāju rediģēšana', 'url'=>array('admin')),
);
?>

<h1>Izveidot lietotāju</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
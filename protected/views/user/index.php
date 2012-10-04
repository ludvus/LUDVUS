<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lietotāji',
);

$this->menu=array(
	array('label'=>'Izveidot lietotāju', 'url'=>array('create')),
	array('label'=>'Rediģēt lietotājus', 'url'=>array('admin')),
);
?>

<h1>Lietotāji</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

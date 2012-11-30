<?php
/* @var $this UserController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Lietotāji'=>array('index'),
	'Rediģēt',
);

$this->menu=array(
	array('label'=>'Lietotāju saraksts', 'url'=>array('index')),
	array('label'=>'Izveidot lietotāju', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('users-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Lietotāju rediģēšana</h1>

<p>
Ir iespējams lietot salīdzināšanas operātorus (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) meklēšanas sākumā, lai norādītu, kā meklētājam darboties.
</p>

<?php echo CHtml::link('Paplašināta meklēšana','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'username',
		'pass',
		'user_id',
		'user_type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

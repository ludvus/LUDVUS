<?php
/* @var $this ZinojumiController */

$this->breadcrumbs=array(
	'Zinojumi'=>array('index'),
	$messages['title'],
);
?>
<h1><?php echo $messages['title']; ?></h1>

<p>
	<?php echo nl2br($messages['message']); ?>
</p>
<p>
	<b>Sūtītājs:</b> <?php echo $messages['name'] .' '. $messages['lastname']; ?>
</p>
<p>
	<b>Datums:</b> <?php echo $messages['ts']; ?>
</p>
<p>
	<?php echo CHtml::link('Atbildēt', array('reply', 'mid'=>$messages['id'])); ?> / 
	<?php echo CHtml::link('Dzēst', array('delete', 'mid'=>$messages['id']), array('confirm'=>'Vai tiešām dzēst?')); ?>
</p>
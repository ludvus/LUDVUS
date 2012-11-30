<?php
/* @var $this PieteikumsController */

$this->breadcrumbs=array(
	'Pieteikums',
);
?>
<h1>Pieteikumi</h1>

<div class="items">
	<?php if (empty($pieteikumi)): ?>
		<p>Nav neapstrādātu pieteikumu</p>
	<?php else: ?>
		<?php foreach ($pieteikumi as $key => $val): ?>
			<p>
			<?php foreach ($val as $k => $v): ?>
				<b><?php echo $k; ?>: </b>
				<?php echo $v; ?><br />
			<?php endforeach; ?>
			</p>
			<p>
				<?php echo CHtml::link('Apstiprināt', array('pieteikums/accept', 'id'=>$val['id']), array('confirm'=>'Vai tiešām apstiprināt?')); ?>
				 / 
				<?php echo CHtml::link('Noraidīt', array('pieteikums/decline', 'id'=>$val['id']), array('confirm'=>'Vai tiešām noraidīt?')); ?>
			</p>
			<hr />
		<?php endforeach; ?>
	<?php endif; ?>
</div>

<?php
/* @var $this ZinojumiController */

$this->breadcrumbs=array(
	'Zinojumi',
);
?>
<h1>Ziņojumi</h1>

<p>
<?php if (!empty($messages)): ?>
	<?php foreach ($messages as $msg): ?>
		No: <b><?php echo $msg['name'] .' '. $msg['lastname']; ?></b><br /> 
		<?php if ($msg['is_read'] == 'N') echo '<b>'; ?>	
		<?php echo CHtml::link($msg['title'], array('view', 'mid'=>$msg['id'])); ?>
		<?php if ($msg['is_read'] == 'N') echo '</b>'; ?><br />
		Kad: <?php echo $msg['ts']; ?><br /><br />
	<?php endforeach; ?>
<?php else: ?>
	Jums pašlaik nav ziņojumu.
<?php endif; ?>
</p>
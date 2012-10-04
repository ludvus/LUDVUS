<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Jaunumi',
);
?>

<h1>Jaunumi</h1>

<?php if (empty($news)): ?>
	<p>Pašlaik nav jaunumu.</p>
<?php else: ?>
	<?php foreach ($news as $new): ?>
		<h2><?php echo $new['virsraksts']; ?></h2>
		<hr>
		<p><?php echo nl2br($new['teksts']); ?></p>
		<p>
			<small>Autors: <?php echo $new['autors']; ?>. Laiks: <?php echo $new['ts']; ?></small>
			<?php echo CHtml::link('Labot', array('edit', 'id'=>$new['id'])); ?>
		</p>
		<hr>
	<?php endforeach; ?>
<?php endif; ?>
<p>
	<?php echo CHtml::link('Pievienot', array('add')); ?>
</p>

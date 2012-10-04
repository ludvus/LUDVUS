<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Jaunumi</h1>

<?php if (empty($news)): ?>
	<p>Pašlaik nav jaunumu.</p>
<?php else: ?>
	<?php foreach ($news as $new): ?>
		<h2><?php echo $new['virsraksts']; ?></h2>
		<hr />
		<p><?php echo nl2br($new['teksts']); ?></p>
		<p><small>Autors: <?php echo $new['autors']; ?>. Laiks: <?php echo $new['ts']; ?></small></p>
		<hr />
	<?php endforeach; ?>
<?php endif; ?>

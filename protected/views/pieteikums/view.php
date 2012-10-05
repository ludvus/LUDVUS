<?php
/* @var $this PieteikumsController */

$this->breadcrumbs=array(
	'Pieteikums',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	Pietekumi
	<div class="items">
	<?
		foreach ($pieteikumi as $key => $value) {
		echo '<div class="view">';
			foreach ($value as $k=>$v){
	?>
				<b><?=$k?>: </b>
				<?=$v?><br/>
	<?
			}
		echo '</div>';
		}
	?>
	</div>
</p>

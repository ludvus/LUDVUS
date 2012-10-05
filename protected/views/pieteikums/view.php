<?php
/* @var $this PieteikumsController */

$this->breadcrumbs=array(
	'Pieteikums',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	Pietekumi
	<?
		echo '<pre>';
		var_dump($pieteikumi->username);
		
		//print_r($pieteikumi);
		echo '</pre>';
	?>
</p>

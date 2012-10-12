<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
if (isset($users))
{
	$this->breadcrumbs=array(
		'Lietotāju grupas'=>array('page', 'view'=>'groups'),
		'Administrātori'
	);
}
elseif (isset($user))
{
	$this->breadcrumbs=array(
		'Lietotāju grupas'=>array('page', 'view'=>'groups'),
		'Administrātori'=>array('showAdministratori'),
		$user['vards'] .' '. $user['uzvards'],
	);
}
?>

<?php if (isset($users)): ?>
	<h1>Administrātori</h1>

	<?php foreach ($users as $user): ?>
		<p>
			<?php echo CHtml::link($user['vards']. ' '. $user['uzvards'], array('showAdministratori', 'id'=>$user['id'])); ?>
		</p>
		<hr />
	<?php endforeach; ?>
<?php elseif (isset($user)): ?>
	<h1><?php echo $user['vards'] .' '. $user['uzvards']; ?></h1>

	<p><b>Vārds:</b> <?php echo $user['vards']; ?></p>
	<p><b>Uzvārds:</b> <?php echo $user['uzvards']; ?></p>
	<p><b>Studentu apliecības numurs:</b> <?php echo $user['username']; ?></p>
	<p><b>Epasts:</b> <?php echo $user['epasts']; ?> (<?php echo CHtml::link('Nosūtīt ziņojumu', array('zinojumi/send', 'id'=>$user['id'])); ?>)</p>
	<p><b>Tālrunis:</b> <?php echo $user['talrunis']; ?></p>
	<p><b>Var atrast:</b> <?php echo $user['adrese']; ?></p>
<?php endif; ?>
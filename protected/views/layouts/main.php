<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
            <table id="h_table" width="100%">
                <tr>
                    <td id="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/lu_logo.png" alt="LU Logo" /></td>
                    <td id="title"><?php echo CHtml::encode(Yii::app()->name); ?></td>
                    <td id="login">
                        <form id="login_form" action="">
                            <div id="login_info">
                                Jūs neesat pieslēdzies. (<?php echo CHtml::link('Pieslēgties', array('/site/login')); ?>)<br/>
                            </div>
                            <div id="language_select">
                                <select name="lang">
                                    <option value="lv" selected="selected">Latviešu (lv)</option>
                                    <option value="en">English (en)</option>
                                </select>
                            </div>
                        </form>
                        <div id="header_submenu">
                            <a href="http://www.lu.lv">www.lu.lv</a> | 
                            <a href="http://www.luis.lanet.lv/lu">LUIS</a> | 
                            <a href="http://webmails.lu.lv">E-pasts</a> | 
                            <a href="http://www.estudijas.lu.lv">E-studijas</a>
                        </div>
                    </td>
                </tr>
            </table>
	</div><!-- header -->

	<div class="mainmenu">
            <div class="menu_header">
                Galvenā izvelne
            </div>
            <div class="menu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
            </div>
	</div><!-- mainmenu -->
        <div id="main_content">
            <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'homeLink'=>CHtml::link('Sākums', array('/site/index')),
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
            <?php endif?>
            <?php echo $content; ?>
        </div>
        <div class="mainmenu">
            <div class="menu_header">
                Galvenā izvelne
            </div>
            <div class="menu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
            </div>
	</div><!-- mainmenu -->
	<div class="clear"></div>

	<div id="footer">
        Copyright &copy; LUDVUS izstrādātāji, 2012.
        <?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

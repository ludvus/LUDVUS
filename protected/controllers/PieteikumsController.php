<?php

class PieteikumsController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAdd()
	{
		$model = new Pieteikumi;

		$fakultates = CHtml::listData(Fakultates::model()->findAll(), 'id', 'nosaukums');
		$limenis = CHtml::listData(Limenis::model()->findAll(), 'id', 'nosaukums');
		$kurss = array("1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4");

		if (isset($_POST['Pieteikumi']))
		{
			$model->attributes=$_POST['Pieteikumi'];
			if($model->save())
				$this->redirect(array('complete'));
		}

		$this->render('add', array('model'=>$model, 'fakultates'=>$fakultates, 'limenis'=>$limenis, 'kurss'=>$kurss));
	}

	public function actionComplete()
	{
		$this->render('complete');
	}

	public function actionIncomplete()
	{
		$this->render('incomplete');
	}

	public function actionView() 
	{
		$pieteikumi = Pieteikumi::model()->findAll();
		//var_dump($pieteikumi);
		$this->render('view', array('pieteikumi'=>$pieteikumi));
	}

	public function actionAccept($id) 
	{
		$this->render('accept');
	}

	public function actionDecline($id) 
	{
		$pieteikums = Pieteikumi::model()->findByPk($id);
		$arhivs     = new ArhivsPieteikumi;
		$arhivs->attributes = $data;
		
		if (!$arhivs->save())
			$this->redirect(array('site/error'));

		if ($pieteikums->delete())
			$this->render('decline');
		else
			$this->redirect(array('site/error'));
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
<?php

class NewsController extends Controller
{
	public function actionIndex()
	{
		$this->allowUser(2);

		$criteria = new CDbCriteria;
		$criteria->order = '`ts` DESC';

		$news = Jaunumi::model()->findAll($criteria);
		$this->render('index', array('news'=>$news));
	}

	public function actionEdit($id)
	{
		$this->allowUser(2);

		$model = Jaunumi::model()->findByAttributes(array('id'=>$id));
		
		if (isset($_POST['Jaunumi']))
		{
			$model->attributes=$_POST['Jaunumi'];
			$model->ts = date('Y-m-d H:i:s', strtotime('+1 hour'));
			if($model->save())
				$this->redirect(array('index'));
		}
		
		$this->render('edit', array('model'=>$model));
	}

	public function actionAdd()
	{
		$this->allowUser(2);
		
		$model = new Jaunumi;

		if (isset($_POST['Jaunumi']))
		{
			$model->attributes=$_POST['Jaunumi'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('add', array('model'=>$model));
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
<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->allowUser(2);

		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->allowUser(3);

		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->allowUser(3);

		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->allowUser(3);

		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->allowUser(2);

		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->allowUser(3);

		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionShowIemitnieki($id = null)
	{
		if ($id === null) 
		{
			$model = Users::model()->findAllByAttributes(array('user_type'=>1));

			foreach ($model as $key => $user)
			{
				$iemitnieki = Iemitnieki::model()->findByPk($user['user_id']);
				$data[$user['ID']]['id'] = $user['ID'];
				$data[$user['ID']]['username'] = $user['username'];
				$data[$user['ID']]['user_id'] = $user['user_id'];
				$data[$user['ID']]['vards'] = $iemitnieki['vards'];
				$data[$user['ID']]['uzvards'] = $iemitnieki['uzvards'];
				$data[$user['ID']]['epasts'] = $iemitnieki['epasts'];
			}

			$this->render('list_iemitnieki', array('users'=>$data));
		}
		else
		{
			$model = Users::model()->findByPk($id);
			$user = Iemitnieki::model()->findByPk($model->user_id);

			$data['id'] = $model['ID'];
			$data['username'] = $model['username'];
			$data['user_id'] = $model['user_id'];
			$data['vards'] = $user['vards'];
			$data['uzvards'] = $user['uzvards'];
			$data['epasts'] = $user['epasts'];

			$this->render('list_iemitnieki', array('user'=>$data));
		}
	}

	public function actionShowKomandanti($id = null)
	{
		if ($id === null) 
		{
			$model = Users::model()->findAllByAttributes(array('user_type'=>2));

			foreach ($model as $key => $user)
			{
				$komandanti = Komandanti::model()->findByPk($user['user_id']);
				$data[$user['ID']]['id'] = $user['ID'];
				$data[$user['ID']]['username'] = $user['username'];
				$data[$user['ID']]['user_id'] = $user['user_id'];
				$data[$user['ID']]['vards'] = $komandanti['vards'];
				$data[$user['ID']]['uzvards'] = $komandanti['uzvards'];
				$data[$user['ID']]['epasts'] = $komandanti['epasts'];
				$data[$user['ID']]['talrunis'] = $komandanti['talrunis'];
				$data[$user['ID']]['adrese'] = $komandanti['adrese'];
			}

			$this->render('list_komandanti', array('users'=>$data));
		}
		else
		{
			$model = Users::model()->findByPk($id);
			$user = Komandanti::model()->findByPk($model->user_id);

			$data['id'] = $model['ID'];
			$data['username'] = $model['username'];
			$data['user_id'] = $model['user_id'];
			$data['vards'] = $user['vards'];
			$data['uzvards'] = $user['uzvards'];
			$data['epasts'] = $user['epasts'];
			$data['talrunis'] = $user['talrunis'];
			$data['adrese'] = $user['adrese'];

			$this->render('list_komandanti', array('user'=>$data));
		}
	}

	public function actionShowAdministratori($id = null)
	{
		if ($id === null) 
		{
			$model = Users::model()->findAllByAttributes(array('user_type'=>3));

			foreach ($model as $key => $user)
			{
				$administratori = Administratori::model()->findByPk($user['user_id']);
				$data[$user['ID']]['id'] = $user['ID'];
				$data[$user['ID']]['username'] = $user['username'];
				$data[$user['ID']]['user_id'] = $user['user_id'];
				$data[$user['ID']]['vards'] = $administratori['vards'];
				$data[$user['ID']]['uzvards'] = $administratori['uzvards'];
				$data[$user['ID']]['epasts'] = $administratori['epasts'];
				$data[$user['ID']]['talrunis'] = $administratori['talrunis'];
				$data[$user['ID']]['adrese'] = $administratori['adrese'];
			}

			$this->render('list_administratori', array('users'=>$data));
		}
		else
		{
			$model = Users::model()->findByPk($id);
			$user = Administratori::model()->findByPk($model->user_id);

			$data['id'] = $model['ID'];
			$data['username'] = $model['username'];
			$data['user_id'] = $model['user_id'];
			$data['vards'] = $user['vards'];
			$data['uzvards'] = $user['uzvards'];
			$data['epasts'] = $user['epasts'];
			$data['talrunis'] = $user['talrunis'];
			$data['adrese'] = $user['adrese'];

			$this->render('list_administratori', array('user'=>$data));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->limit = 10;
		$criteria->order = '`ts` DESC';

		$news = Jaunumi::model()->findAll($criteria);
		$this->render('index', array('news'=>$news));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	* Displays logged in user profile
	*/
	public function actionProfile()
	{
		$this->allowUser(1);
		$fakultates = null;
		switch (Yii::app()->user->user_type)
		{
			case 1:
				$data = Iemitnieki::model()->findByAttributes(array('id'=>Yii::app()->user->user_id));
				$fakultates = CHtml::listData(Fakultates::model()->findAll(), 'id', 'nosaukums');

				$render = 'iemitnieki_form';
				break;
			case 2:
				$data = Komandanti::model()->findByAttributes(array('id'=>Yii::app()->user->user_id));
				$render = 'komandanti_form';
				break;
			case 3:
				$data = Administratori::model()->findByAttributes(array('id'=>Yii::app()->user->user_id));
				$render = 'administratori_form';
				break;
		}

		if (isset($_POST['Iemitnieki']))
		{
			$data->attributes=$_POST['Iemitnieki'];
			if($data->save())
				$this->redirect(array('profile'));
		}
		elseif (isset($_POST['Komandanti']))
		{
			$data->attributes=$_POST['Komandanti'];
			if ($data->save())
				$this->redirect(array('profile'));
		}
		elseif (isset($_POST['Administratori']))
		{
			$data->attributes=$_POST['Administratori'];
			if ($data->save())
				$this->redirect(array('profile'));
		}

		$this->render($render, array('model'=>$data, 'fakultates'=>$fakultates));
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
                        //$model->password = sha1($_POST['LoginForm']['password']);
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
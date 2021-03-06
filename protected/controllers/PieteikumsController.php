<?php

class PieteikumsController extends Controller
{
	public function actionIndex()
	{
		$this->redirect('add');
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
		$this->allowUser(3);

		$pieteikumi = Pieteikumi::model()->findAll();
		//var_dump($pieteikumi);
		$this->render('view', array('pieteikumi'=>$pieteikumi));
	}

	public function actionAccept($id) 
	{
		$this->allowUser(3);

		$pieteikums = Pieteikumi::model()->findByPk($id);
		$iemitnieki = new Iemitnieki;
		$users	 	= new Users;

		$lietotajs = Users::model()->findByAttributes(array('username'=>$pieteikums['username']));
	    if ($lietotajs !== null)
    		throw new CHttpException(403, 'Šāds lietotājs jau ir apstiprināts');

		$iemitnieki->attributes = array(
				'vards'=>$pieteikums['name'],
				'uzvards'=>$pieteikums['surname'],
				'epasts'=>$pieteikums['username'].'@lu.lv',
				'fakultates_id'=>$pieteikums['fakultate'],
				'kurss'=>$pieteikums['kurss'],
			);

		$pass = rand(10000000, 99999999);

		if (Pieteikumi::model()->deleteByPk($id)) {
			$iemitnieki->save(false);

			$users->attributes = array(
				'username'=>$pieteikums['username'],
				'pass'=>sha1($pass, $iemitnieki->epasts, $users->username),
				'user_id'=>$iemitnieki->primaryKey,
				'user_type'=>1
			);

			$users->save(false);

			$this->sendAcceptMail($pass);

			$this->render('accept', array('pass'=>$pass));
		} else
			$this->redirect(array('site/error'));
	}

	public function actionDecline($id) 
	{
		$this->allowUser(3);
		
		$pieteikums = Pieteikumi::model()->findByPk($id);
		$arhivs     = new ArhivsPieteikumi;
		$arhivs->attributes = array(
				'username'=>$pieteikums['username'],
				'fakultate'=>$pieteikums['fakultate'],
				'limenis'=>$pieteikums['limenis'],
				'kurss'=>$pieteikums['kurss'],
				'teksts'=>$pieteikums['teksts'],
				'name'=>$pieteikums['name'],
				'surname'=>$pieteikums['surname']
			);
		
		if (Pieteikumi::model()->deleteByPk($id)) {
			$arhivs->save(false);
			$this->render('decline');
		} else
			$this->redirect(array('site/error'));
	}

	private function sendAcceptMail($pass, $email, $username)
	{
		$from = Yii::app()->params['adminEmail'];
		$to   = $email;
		$subject = 'LU Dienesta Viesnīcas pieteikuma apstiprinājums';
		$body = '
			<html>
			<head>
			<title>LU Dienesta Viesnīcas pieteikuma apstiprinājums</title>
			</head>
			<body>
			<p>Jūsu pieteikums uz dienesta viesnīcu ir apstiprināts.</p>
			<p>Tagad Jūs varat pieslēgties LUDVUS sistēmai ar šādiem datiem:<br />
			Lietotājvārds: '.$username.' <br />
			Parole: '.$pass.'
			</p>

			<p>
			Ar cieņu,<br />
			LUDVUS administrācija
			</p>
			</body>
			</html>
		';
		$name='=?UTF-8?B?'.base64_encode($username).'?=';
		$subject='=?UTF-8?B?'.base64_encode($subject).'?=';
		$headers="From: $name <{$from}>\r\n".
				 "Reply-To: {$from}\r\n".
				 "MIME-Version: 1.0\r\n".
				 "Content-type: text/plain; charset=UTF-8";
		return mail($email,$subject,$body,$headers);
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
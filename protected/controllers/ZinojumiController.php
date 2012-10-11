<?php

class ZinojumiController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->order = '`ts` DESC';

		$msg = Zinojumi::model()->findAllByAttributes(array('receiver_id'=>Yii::app()->user->id), $criteria);

		if (!empty($msg))
		{
			foreach ($msg as $ms)
			{
				$user = Users::model()->findByPk($ms['sender_id']);
				switch ($user->user_type)
				{
					case 1:
						$iemitnieki = Iemitnieki::model()->findByPk($user->user_id);
						$data[$ms['id']]['name'] = $iemitnieki->vards;
						$data[$ms['id']]['lastname'] = $iemitnieki->uzvards;
						break;
					case 2:
						$komandanti = Komandanti::model()->findByPk($user->user_id);
						$data[$ms['id']]['name'] = $komandanti->vards;
						$data[$ms['id']]['lastname'] = $komandanti->uzvards;
						break;
					case 3:
						$administratori = Administratori::model()->findByPk($user->user_id);
						$data[$ms['id']]['name'] = $administratori->vards;
						$data[$ms['id']]['lastname'] = $administratori->uzvards;
						break;
				}
				$data[$ms['id']]['id'] = $ms['id'];
				$data[$ms['id']]['sender_id'] = $ms['sender_id'];
				$data[$ms['id']]['receiver_id'] = $ms['receiver_id'];
				$data[$ms['id']]['title'] = $ms['title'];
				$data[$ms['id']]['message'] = $ms['message'];
				$data[$ms['id']]['ts'] = $ms['ts'];
				$data[$ms['id']]['is_read'] = $ms['is_read'];
			}
		}

		$this->render('index', array('messages'=>$data));
	}

	public function actionView($mid)
	{
		$msg = Zinojumi::model()->findByPk($mid);

		if ($msg->is_read == 'N')
		{
			$msg->is_read = 'Y';
			$msg->update(array('is_read'));
		}

		$user = Users::model()->findByPk($msg->sender_id);
		switch ($user->user_type)
		{
			case 1:
				$iemitnieki = Iemitnieki::model()->findByPk($user->user_id);
				$data['name'] = $iemitnieki->vards;
				$data['lastname'] = $iemitnieki->uzvards;
				break;
			case 2:
				$komandanti = Komandanti::model()->findByPk($user->user_id);
				$data['name'] = $komandanti->vards;
				$data['lastname'] = $komandanti->uzvards;
				break;
			case 3:
				$administratori = Administratori::model()->findByPk($user->user_id);
				$data['name'] = $administratori->vards;
				$data['lastname'] = $administratori->uzvards;
				break;
		}
		$data['id'] = $msg->id;
		$data['sender_id'] = $msg->sender_id;
		$data['receiver_id'] = $msg->receiver_id;
		$data['title'] = $msg->title;
		$data['message'] = $msg->message;
		$data['ts'] = $msg->ts;

		$this->render('view', array('messages'=>$data));
	}

	public function actionSend($id)
	{
		$model = new Zinojumi;

		if (isset($_POST['Zinojumi']))
		{
			$model->attributes = $_POST['Zinojumi'];
			$model->sender_id = Yii::app()->user->id;
			$model->receiver_id = $id;
			if ($model->save())
				$this->redirect(array('sent'));
		}

		$this->render('reply', array('model'=>$model, 'title'=>''));
	}

	public function actionReply($mid)
	{
		$msg = Zinojumi::model()->findByPk($mid);
		$model = new Zinojumi;

		if (isset($_POST['Zinojumi']))
		{
			$model->attributes = $_POST['Zinojumi'];
			$model->sender_id = Yii::app()->user->id;
			$model->receiver_id = $msg->sender_id;
			if ($model->save())
				$this->redirect(array('sent'));
		}

		$this->render('reply', array('model'=>$model, 'title'=>'Re: '.$msg->title));
	}

	public function actionDelete($mid)
	{
		$msg = Zinojumi::model()->findByPk($mid);

		if ($msg->delete())
			$this->redirect(array('deleted'));
	}

	public function actionSent()
	{
		$this->render('sent');
	}

	public function actionDeleted()
	{
		$this->render('deleted');
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
<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Users::model()->findByAttributes(array('username'=>$this->username));
		if ($user === null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} else if ($user->pass !== sha1($this->password)) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$this->setState('id', $user->ID);
			$this->setState('user_id', $user->user_id);
			$this->setState('user_type', $user->user_type);
			$this->setState('username', $user->username);
			/*
			User Types:
			1 - iemītnieks
			2 - komandants
			3 - administrātors
			*/
			switch ($user->user_type)
			{
				case 1:
					$iemitnieki = Iemitnieki::model()->findByAttributes(array('id'=>$user->user_id));
					$this->setState('name', $iemitnieki->vards);
					$this->setState('last_name', $iemitnieki->uzvards);
					$this->setState('email', $iemitnieki->epasts);
					break;
				case 2:
					$komandanti = Komandanti::model()->findByAttributes(array('id'=>$user->user_id));
					$this->setState('name', $komandanti->vards);
					$this->setState('last_name', $komandanti->uzvards);
					$this->setState('email', $komandanti->epasts);
					$this->setState('phone', $komandanti->talrunis);
					$this->setState('address', $komandanti->adrese);
					break;
				case 3:
					$administratori = Administratori::model()->findByAttributes(array('id'=>$user->user_id));
					$this->setState('name', $administratori->vards);
					$this->setState('last_name', $administratori->uzvards);
					$this->setState('email', $administratori->epasts);
					$this->setState('phone', $administratori->talrunis);
					$this->setState('address', $administratori->adrese);
					break;
			}

			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
		/*
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
		*/
	}
}
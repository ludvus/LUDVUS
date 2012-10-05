<?php

/**
 * This is the model class for table "arhivs_pieteikumi".
 *
 * The followings are the available columns in table 'arhivs_pieteikumi':
 * @property integer $id
 * @property string $username
 * @property string $fakultate
 * @property string $limenis
 * @property integer $kurss
 * @property string $teksts
 * @property string $name
 * @property string $surname
 * @property string $ts
 */
class ArhivsPieteikumi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArhivsPieteikumi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'arhivs_pieteikumi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, fakultate, limenis, kurss, teksts, name, surname, ts', 'required'),
			array('kurss', 'numerical', 'integerOnly'=>true),
			array('username, fakultate, limenis, name, surname', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, fakultate, limenis, kurss, teksts, name, surname, ts', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'fakultate' => 'Fakultate',
			'limenis' => 'Limenis',
			'kurss' => 'Kurss',
			'teksts' => 'Teksts',
			'name' => 'Name',
			'surname' => 'Surname',
			'ts' => 'Ts',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('fakultate',$this->fakultate,true);
		$criteria->compare('limenis',$this->limenis,true);
		$criteria->compare('kurss',$this->kurss);
		$criteria->compare('teksts',$this->teksts,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('ts',$this->ts,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
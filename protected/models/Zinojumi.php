<?php

/**
 * This is the model class for table "zinojumi".
 *
 * The followings are the available columns in table 'zinojumi':
 * @property integer $id
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $title
 * @property string $message
 * @property string $ts
 * @property string $is_read
 */
class Zinojumi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Zinojumi the static model class
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
		return 'zinojumi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, message', 'required'),
			array('sender_id, receiver_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('is_read', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sender_id, receiver_id, title, message, ts, is_read', 'safe', 'on'=>'search'),
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
			'sender_id' => 'Sūtītājs',
			'receiver_id' => 'Saņēmējs',
			'title' => 'Virsraksts',
			'message' => 'Ziņojums',
			'ts' => 'Ts',
			'is_read' => 'Ir izlasīts?',
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
		$criteria->compare('sender_id',$this->sender_id);
		$criteria->compare('receiver_id',$this->receiver_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('ts',$this->ts,true);
		$criteria->compare('is_read',$this->is_read,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
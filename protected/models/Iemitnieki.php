<?php

/**
 * This is the model class for table "iemitnieki".
 *
 * The followings are the available columns in table 'iemitnieki':
 * @property integer $id
 * @property string $vards
 * @property string $uzvards
 * @property string $epasts
 * @property integer $fakultates_id
 * @property integer $kurss
 */
class Iemitnieki extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Iemitnieki the static model class
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
		return 'iemitnieki';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vards, uzvards, epasts, fakultates_id, kurss', 'required'),
			array('fakultates_id, kurss', 'numerical', 'integerOnly'=>true),
			array('vards, uzvards, epasts', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vards, uzvards, epasts, fakultates_id, kurss', 'safe', 'on'=>'search'),
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
			'vards' => 'Vārds',
			'uzvards' => 'Uzvārds',
			'epasts' => 'Epasts',
			'fakultates_id' => 'Fakultāte',
			'kurss' => 'Kurss',
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
		$criteria->compare('vards',$this->vards,true);
		$criteria->compare('uzvards',$this->uzvards,true);
		$criteria->compare('epasts',$this->epasts,true);
		$criteria->compare('fakultates_id',$this->fakultates_id);
		$criteria->compare('kurss',$this->kurss);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
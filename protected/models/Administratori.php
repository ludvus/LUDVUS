<?php

/**
 * This is the model class for table "administratori".
 *
 * The followings are the available columns in table 'administratori':
 * @property integer $id
 * @property string $vards
 * @property string $uzvards
 * @property string $epasts
 * @property string $talrunis
 * @property string $adrese
 */
class Administratori extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Administratori the static model class
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
		return 'administratori';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vards, uzvards, epasts, talrunis, adrese', 'required'),
			array('vards, uzvards, epasts, adrese', 'length', 'max'=>128),
			array('talrunis', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vards, uzvards, epasts, talrunis, adrese', 'safe', 'on'=>'search'),
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
			'talrunis' => 'Tālrunis',
			'adrese' => 'Adrese',
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
		$criteria->compare('talrunis',$this->talrunis,true);
		$criteria->compare('adrese',$this->adrese,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
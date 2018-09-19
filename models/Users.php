<?php

namespace app\models;

use yii\db\ActiveRecord;


class Users extends ActiveRecord{
	
	public static function tableName(){
		return 'usr';
	}
	
	
	public function attributeLabels(){
		return [
				'id'=>'ID',
				'login'=>'Логин',
				'pass'=>'Пароль',
				'surname'=>'Фамилия',
				'firstname'=>'Имя',
				'fathername'=>'Отчество'
		];
	}
	
	public function rules(){
	
		return [
				[['login','pass','surname','firstname','fathername'],'trim']
					
		];
	
	}	
	
	
}
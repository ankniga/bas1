<?php
namespace app\models;

use yii\db\ActiveRecord;


class Group extends ActiveRecord{
	
	public static function tableName(){
		return 'group';
	}

	
	public function attributeLabels(){
		return [
		'id'=>'ID',
		'groupname'=>'Наименование группы',
		'prim'=>'Примечание'				
				
		];
	}
	
	
	public function rules(){
		
		return [
				[['groupname','prim'],'trim']	
			
		];
		
	}
	
}
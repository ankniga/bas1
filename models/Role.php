<?php 
namespace app\models;

use yii\db\ActiveRecord;


class Role extends ActiveRecord{
	
	public static function tableName(){
		return 'roles';
	}

	
	public function attributeLabels(){
		return [
		'id'=>'ID',
		'rolename'=>'Наименование Роли',
		'prim'=>'Примечание'				
				
		];
	}
	
	
	public function rules(){
		
		return [
				[['rolename','prim'],'trim']	
			
		];
		
	}
	
}
?>
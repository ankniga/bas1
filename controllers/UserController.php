<?php

namespace  app\controllers;


//use Yii;
use app\models\Users;
use app\models\Group;
use yii\web\Controller;

class UserController extends Controller{
	
	
	public $layout='users';
	
	
	
	
	public function actionList(){
		
		$usr=Users::find()->all();
		$group=Group::find()->all();
		
		
		return $this->render('list',compact('usr','group'));
		
	}
	
}


?>
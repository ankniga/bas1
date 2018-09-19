<?php

namespace app\controllers;

use Yii;
use app\models\Group;
use app\models\GroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Grprole;

/**
 * GroupController implements the CRUD actions for Group model.
 */
class GroupController extends Controller
{
    /**
     * {@inheritdoc}
     */
	
	public $layout='users';
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Group models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Group model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
    	
    	// Таблица ролей (назначеных и не назначеных группе)
    	$query=new \yii\db\Query;
    	 
    	$query->select('roles.id AS id, roles.rolename AS rolename, grprole.idgroup AS idgroup')
    	->distinct()
    	->from('roles')
    	->leftJoin('grprole','grprole.idrole = roles.id and grprole.idgroup='.$id);
    	$command=$query->createCommand();
    	 
    	$roles=$command->queryAll();
    	 
    	 
    //	$usgr=usgr::find()->where(['iduser'=>$id])->all();
    	 
    	
        return $this->render('view', [
            'model' => $this->findModel($id),
        	'roles' => $roles,
        ]);
    }

    /**
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Group();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    
    
    public function actionUpdrole($idgroup,$idrole,$status){
    	 
    	if($status==1){
    		$ug=new Grprole();
    		$ug->idgroup=$idgroup;
    		$ug->idrole=$idrole;
    		$ug->save();
    		return 'Добавлено - '.$idgroup.' <+> '.$idrole;
    
    	}
    	 
    	if ($status==0){
    		$ug=Grprole::deleteAll("idgroup=$idgroup and idrole=$idrole");
    		return 'Удалено - '.$ug;
    
    	}
    	 
    	 
    	 
    
    }
    
    
    
    
    

    /**
     * Updates an existing Group model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Group model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

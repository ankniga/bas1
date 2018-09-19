<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новый пользователь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

    		
    	'columns' => [
        //   ['class' => 'yii\grid\SerialColumn'],

           [
        		'attribute'=>'id',
        		'contentOptions' => ['style' => 'width:100px; white-space: normal;text-align: center;'],
           		'headerOptions'  => ['style' => 'text-align: center;'],
        	],
        //    'login',
    			
    			[
    			'attribute'=>'login',
    			'format' => 'raw',
    			'value' => function ($model) {
    			return Html::a($model->login,['users/view',id=>$model->id]);
    			},
    			],
            //'pass',
            'surname',
            'firstname',
            'fathername',
         //   ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

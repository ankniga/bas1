<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление группами';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php  Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить группу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        	[
        		'attribute'=>'id',
        		'contentOptions' => ['style' => 'width:100px; white-space: normal;text-align: center;'],
        		'headerOptions'	=> ['style' => 'text-align: center;'],
        	],
        		
       	    [
        		'attribute'=>'groupname',
        		'format' => 'raw',
        	  	'value' => function ($model) {
        		return Html::a($model->groupname,['group/view',id=>$model->id],['data-pjax'=>0]);
        	  },
        		],

        		
            'prim',

		        ],
    ]); ?>
    
   <?php Pjax::end(); ?>
</div>

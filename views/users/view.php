<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$js=<<<JS
$("body").on('click','input:checkbox',function()	{
	
	console.log('click!');
	$.ajax({
			url: 'index.php?r=users/updgr',
			data:{	iduser:$model->id, 	idgroup:+$(this).attr("idgroup"),  status:+ $(this).prop("checked")},
				type:'GET',
				success: function(res){
					console.log(res);
					},		
				error: function(){
					alert('Error!');
				}

			});
	});

JS;




$this->registerJs($js);
$this->title = $model->surname.' '.$model->firstname.' '.$model->fathername;

$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">
<?php $usid=$model->id; ?>
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['label'=>'Параметр',
             'value'=>'Значение',	
            'captionOptions' => ['style' => 'width:150px; text-align: center; '],
      		 ],		
            'login',
            'pass',
            'surname',
            'firstname',
            'fathername',
        ],
    		
 //   		'captionOptions' => ['tooltip' => 'Tooltip'],
    ]) ?>





<?php 

//----------------------------------------------------------------------------------


$data = $groups;

$provider = new ArrayDataProvider([
    'allModels' => $data,
    'pagination' => [
        'pageSize' => 5,
    ],
    'sort' => [
        'attributes' => ['id'],
    ],
]);




//----------------------------------------------------------------------------------
?>

<h4> Группы пользователя</h4>

 <?php Pjax::begin(); ?>
<?= GridView::widget([
        'dataProvider' => $provider,
  //      'filterModel' => $searchModel,
        'columns' => [
        	[
        		'attribute'=>'id',
        		'contentOptions' => ['style' => 'width:100px; white-space: normal;text-align: center;'],
        			'headerOptions'  => ['style' => 'text-align: center;'],
        	],
        		
 			[
				'attribute'=>'groupname',
				'label'	=>'Наименование группы',
				'headerOptions' => ['style' => 'text-align: center;'],
			],
        	
       		[
        		'class' => 'yii\grid\CheckboxColumn',
        		'header' => 'Статус',
  				'headerOptions' => ['style' => 'text-align: center;'],
       			'contentOptions' => ['style' => 'width:100px; white-space: normal;text-align: center;'],
       			'checkboxOptions' =>function ($data) {
        			return $data['iduser'] ? ['checked' => "checked", 'idgroup'=>$data['id']] : 
        			['idgroup'=>$data['id']];
        		}
       		],
        		
        		],
    		]); ?>





<?php Pjax::end(); ?>

</div>

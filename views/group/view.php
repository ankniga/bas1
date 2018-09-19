<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Group */


$js=<<<JS
$("body").on('click','input:checkbox',function()	{

	console.log('click!');
	$.ajax({
			url: 'index.php?r=group/updrole',
			data:{	idgroup:$model->id, 	idrole:+$(this).attr("idrole"),  status:+ $(this).prop("checked")},
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
$this->title = $model->groupname;
$this->params['breadcrumbs'][] = ['label' => 'Группы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'groupname',
            'prim',
        ],
    ]) ?>


<?php 

//----------------------------------------------------------------------------------


$data = $roles;

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

<hr>
<h3> Роли Группы </h3>

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
				'attribute'=>'rolename',
				'label'	=>'Наименование роли',
				'headerOptions' => ['style' => 'text-align: center;'],
			],
        	
       		[
        		'class' => 'yii\grid\CheckboxColumn',
        		'header' => 'Статус',
  				'headerOptions' => ['style' => 'text-align: center;'],
       			'contentOptions' => ['style' => 'width:100px; white-space: normal;text-align: center;'],
       			'checkboxOptions' =>function ($data) {
        			return $data['idgroup'] ? ['checked' => "checked", 'idrole'=>$data['id']] : 
        			['idrole'=>$data['id']];
        		}
       		],
        		
        		],
    		]); ?>





<?php Pjax::end(); ?>
    


</div>

<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';

?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить заявку', ['/request/create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description',
            'data',
            [
                'attribute'=>'image',
                'format'=>'raw',
                'value'=>function($item){
                    return '<img alt="" src="../web/uploads/'.$item['image'].'">';
                }

            ],
            [
                'attribute' => 'status',
                'format'=> 'raw',
                'value'=>function($item){
                    if($item['status']=== 0 ) return 'на рассмотрении';
                    if($item['status']=== 1 ) return 'принято';
                    if($item['status']=== 2 ) return 'откланено';
                }
            ],
            [
                'attribute'=>'after_image',
                'format'=>'raw',
                'value'=>function($item){
                    return '<img alt="" src="../web/uploads/'.$item['after_image'].'">';
                }

            ],
            'after_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

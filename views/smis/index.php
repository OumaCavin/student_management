<?php

use app\models\SmNextOfKin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SmNextOfKinSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sm Next Of Kins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sm-next-of-kin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sm Next Of Kin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'next_of_kin_id',
            'adm_refno',
            'surname',
            'other_names',
            'relationship',
            //'primary_phone_number',
            //'alternative_phone_number',
            //'primary_email:email',
            //'alternative_email:email',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SmNextOfKin $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'next_of_kin_id' => $model->next_of_kin_id]);
                 }
            ],
        ],
    ]); ?>


</div>

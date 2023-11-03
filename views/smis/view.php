<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SmNextOfKin $model */

$this->title = $model->next_of_kin_id;
$this->params['breadcrumbs'][] = ['label' => 'Sm Next Of Kins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sm-next-of-kin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'next_of_kin_id' => $model->next_of_kin_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'next_of_kin_id' => $model->next_of_kin_id], [
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
            'next_of_kin_id',
            'adm_refno',
            'surname',
            'other_names',
            'relationship',
            'primary_phone_number',
            'alternative_phone_number',
            'primary_email:email',
            'alternative_email:email',
        ],
    ]) ?>

</div>

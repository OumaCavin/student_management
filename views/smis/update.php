<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SmNextOfKin $model */

$this->title = 'Update Sm Next Of Kin: ' . $model->next_of_kin_id;
$this->params['breadcrumbs'][] = ['label' => 'Sm Next Of Kins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->next_of_kin_id, 'url' => ['view', 'next_of_kin_id' => $model->next_of_kin_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sm-next-of-kin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SmNextOfKin $model */

$this->title = 'Create Sm Next Of Kin';
$this->params['breadcrumbs'][] = ['label' => 'Sm Next Of Kins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sm-next-of-kin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

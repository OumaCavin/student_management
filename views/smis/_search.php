<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SmNextOfKinSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sm-next-of-kin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'next_of_kin_id') ?>

    <?= $form->field($model, 'adm_refno') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'other_names') ?>

    <?= $form->field($model, 'relationship') ?>

    <?php // echo $form->field($model, 'primary_phone_number') ?>

    <?php // echo $form->field($model, 'alternative_phone_number') ?>

    <?php // echo $form->field($model, 'primary_email') ?>

    <?php // echo $form->field($model, 'alternative_email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

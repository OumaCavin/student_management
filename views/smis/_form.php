<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SmNextOfKin $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sm-next-of-kin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'next_of_kin_id')->textInput() ?>

    <?= $form->field($model, 'adm_refno')->textInput() ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_names')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relationship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primary_phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alternative_phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primary_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alternative_email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

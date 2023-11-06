<?php

use app\models\SmAdmittedStudent;
use app\models\SmNextOfKin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SmNextOfKinSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\SmAdmittedStudent $studentModel */
/** @var app\models\SmNextOfKin $nextOfKinModel */

$this->title = 'Student and Next Of Kin Details';
$this->params['breadcrumbs'][] = $this->title;

// Fetch the student model

$studentModel = SmAdmittedStudent::getStudentByAdmRefNo($searchModel->adm_refno);
$disableSearch = empty($searchModel->adm_refno) || !is_numeric($searchModel->adm_refno) ? 'disabled' : '';

$this->registerJs("
    $(document).ready(function() {
        $('#adm_refno').on('input', function() {
            if ($(this).val() === ''  || isNaN($(this).val())) {
                $('#searchBtn').prop('disabled', true);
            } else {
                $('#searchBtn').prop('disabled', false);
            }
        });
    });
");
?>
<div class="sm-next-of-kin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student Next Of Kin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Html::beginForm(['index'], 'get', ['class' => 'form-inline']) ?>
    <div class="form-group">
        <?= Html::label('Search Admission Reference Number:', 'adm_refno') ?>
        <?= Html::textInput('SmNextOfKinSearch[adm_refno]', isset($searchModel->adm_refno) ? $searchModel->adm_refno : null, ['class' => 'form-control', 'id' => 'adm_refno']) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'id' => 'searchBtn', 'disabled' => $disableSearch]) ?>
    </div>
    <?= Html::endForm() ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'next_of_kin_id',
            //'adm_refno',
            'surname',
            'other_names',
            'relationship',
            'primary_phone_number',
            //'alternative_phone_number',
            'primary_email:email',
            //'alternative_email:email',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SmNextOfKin $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'next_of_kin_id' => $model->next_of_kin_id]);
                 }
            ],
        ],
    ]); ?>
        <div class="student-details">
        <h2>Student Details</h2>
        <?php if ($studentModel !== null) : ?>
            <p><strong>Admission Reference Number:</strong> <?= $studentModel->adm_refno ?></p>
            <p><strong>Name:</strong> <?= $studentModel->surname ?> <?= $studentModel->other_names ?></p>
            <!-- Display other student details here -->
            
                    <h3>Next of Kin Details</h3>
        <?php
        $nextOfKinDetails = $studentModel->getNextOfKinDetails()->all();
        if (!empty($nextOfKinDetails)) : ?>
            <?= GridView::widget([
                'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $nextOfKinDetails]),
                'columns' => [
                    'surname',
                    'other_names',
                    'relationship',
                    // Include other columns as needed
                ],
            ]);
        else : ?>
            <p>No next of kin details found for this student.</p>
            <!-- Include logic to add Next of Kin if needed -->
        <?php endif; ?>
            
        <?php else : ?>
            <p>No student found.</p>
        <?php endif; ?>
    </div>


</div>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Surveys */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surveys-form">

    <?php $form = ActiveForm::begin(); ?>



    <div class="input-field title-field">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="assignee-section">
        <div class="input-field drop-down input-field-with-icon">
            <?= $form->field($model, 'targeted_role_id')->textInput() ?>
            <i class="material-icons prefix">person_pin_circle</i>
        </div>

        <div class="input-field drop-down last input-field-with-icon">
            <?= $form->field($model, 'targeted_department_id')->textInput() ?>
            <i class="material-icons prefix">account_balance</i>
        </div>
    </div>

    <div class="datepicker-container">
        <div class="datepicker-wrapper pub-date input-field-with-icon">
            <?= $form->field($model, 'publish_date')->textInput() ?>
            <i class="material-icons prefix">date_range</i>
        </div>

        <div class="datepicker-wrapper end-date input-field-with-icon">
            <?= $form->field($model, 'end_date')->textInput() ?>
            <i class="material-icons prefix">date_range</i>
        </div>
    </div>

    <div style="display: none;">
        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>
    </div>

    <div class="form-group lets-go">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

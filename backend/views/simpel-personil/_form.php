<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelPersonil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="simpel-personil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_personil')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput() ?>

    <?= $form->field($model, 'gol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eselon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pegawai.master_pegawai_nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

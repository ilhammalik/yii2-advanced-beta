<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelPagu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="simpel-pagu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'alokasi_sub_mak')->textInput() ?>

    <?= $form->field($model, 'alokasi_pra_revisi')->textInput() ?>

    <?= $form->field($model, 'kd_satker')->textInput() ?>

    <?= $form->field($model, 'nas_prog_id')->textInput() ?>

    <?= $form->field($model, 'nas_keg_id')->textInput() ?>

    <?= $form->field($model, 'kdoutput')->textInput() ?>

    <?= $form->field($model, 'kdsoutput')->textInput() ?>

    <?= $form->field($model, 'kdkmpnen')->textInput() ?>

    <?= $form->field($model, 'kdskmpnen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_mak')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MakTahun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mak-tahun-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_sub_mak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alokasi_sub_mak')->textInput() ?>

    <?= $form->field($model, 'suboutput_id')->textInput() ?>

    <?= $form->field($model, 'nas_mak_id')->textInput() ?>

    <?= $form->field($model, 'no_item')->textInput() ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <?= $form->field($model, 'satuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'har_sat')->textInput() ?>

    <?= $form->field($model, 'alokasi_pra_revisi')->textInput() ?>

    <?= $form->field($model, 'ket_revisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mak_header_id')->textInput() ?>

    <?= $form->field($model, 'subkomponen_id')->textInput() ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_satker')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nas_prog_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nas_keg_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kdoutput')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kdsoutput')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kdkmpnen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kdskmpnen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_mak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blokir')->textInput() ?>

    <?= $form->field($model, 'kdib')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header2')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

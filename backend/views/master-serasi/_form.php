<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MasterSerasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-serasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'suboutput_id')->textInput() ?>

    <?= $form->field($model, 'nama_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_detail_id')->textInput() ?>

    <?= $form->field($model, 'renc_tgl_mulai')->textInput() ?>

    <?= $form->field($model, 'renc_tgl_selesai')->textInput() ?>

    <?= $form->field($model, 'status_detail_id')->textInput() ?>

    <?= $form->field($model, 'real_tgl_mulai')->textInput() ?>

    <?= $form->field($model, 'real_tgl_selesai')->textInput() ?>

    <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_lapor_id')->textInput() ?>

    <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip_lapor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lapor')->textInput() ?>

    <?= $form->field($model, 'time_input')->textInput() ?>

    <?= $form->field($model, 'user_input')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_real_up')->textInput() ?>

    <?= $form->field($model, 'status_real_ls')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

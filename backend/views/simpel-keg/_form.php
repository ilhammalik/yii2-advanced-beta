<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelKeg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="simpel-keg-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'mak')->textInput() ?>

    <?= $form->field($model, 'nama_keg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tujuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_mulai')->textInput() ?>

    <?= $form->field($model, 'tgl_selesai')->textInput() ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'time_input')->textInput() ?>

    <?= $form->field($model, 'nip_ppk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_sp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_spd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'angkutan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'berangkat_asal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penandatangan')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'jml_dl')->textInput() ?>

    <?= $form->field($model, 'serasi2015.news_detail_keg_detail_id')->textInput() ?>

    <?= $form->field($model, 'nip_bpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pegawai.master_pegawai_nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_penyel')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

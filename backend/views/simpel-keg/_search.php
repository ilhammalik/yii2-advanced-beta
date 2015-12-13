<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelKegSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="simpel-keg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kegiatan') ?>

    <?= $form->field($model, 'mak') ?>

    <?= $form->field($model, 'nama_keg') ?>

    <?= $form->field($model, 'tujuan') ?>

    <?= $form->field($model, 'tgl_mulai') ?>

    <?php // echo $form->field($model, 'tgl_selesai') ?>

    <?php // echo $form->field($model, 'unit_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'time_input') ?>

    <?php // echo $form->field($model, 'nip_ppk') ?>

    <?php // echo $form->field($model, 'no_sp') ?>

    <?php // echo $form->field($model, 'no_spd') ?>

    <?php // echo $form->field($model, 'angkutan') ?>

    <?php // echo $form->field($model, 'berangkat_asal') ?>

    <?php // echo $form->field($model, 'penandatangan') ?>

    <?php // echo $form->field($model, 'nip_ttd') ?>

    <?php // echo $form->field($model, 'jabatan_ttd') ?>

    <?php // echo $form->field($model, 'jml_dl') ?>

    <?php // echo $form->field($model, 'serasi2015.news_detail_keg_detail_id') ?>

    <?php // echo $form->field($model, 'nip_bpp') ?>

    <?php // echo $form->field($model, 'pegawai.master_pegawai_nip') ?>

    <?php // echo $form->field($model, 'status_penyel') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

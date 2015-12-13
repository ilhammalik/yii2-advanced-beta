<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MakTahunSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mak-tahun-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sub_mak_id') ?>

    <?= $form->field($model, 'nama_sub_mak') ?>

    <?= $form->field($model, 'alokasi_sub_mak') ?>

    <?= $form->field($model, 'suboutput_id') ?>

    <?= $form->field($model, 'nas_mak_id') ?>

    <?php // echo $form->field($model, 'no_item') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'satuan') ?>

    <?php // echo $form->field($model, 'har_sat') ?>

    <?php // echo $form->field($model, 'alokasi_pra_revisi') ?>

    <?php // echo $form->field($model, 'ket_revisi') ?>

    <?php // echo $form->field($model, 'mak_header_id') ?>

    <?php // echo $form->field($model, 'subkomponen_id') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'kd_satker') ?>

    <?php // echo $form->field($model, 'nas_prog_id') ?>

    <?php // echo $form->field($model, 'nas_keg_id') ?>

    <?php // echo $form->field($model, 'kdoutput') ?>

    <?php // echo $form->field($model, 'kdsoutput') ?>

    <?php // echo $form->field($model, 'kdkmpnen') ?>

    <?php // echo $form->field($model, 'kdskmpnen') ?>

    <?php // echo $form->field($model, 'kode_mak') ?>

    <?php // echo $form->field($model, 'kode_header') ?>

    <?php // echo $form->field($model, 'blokir') ?>

    <?php // echo $form->field($model, 'kdib') ?>

    <?php // echo $form->field($model, 'header1') ?>

    <?php // echo $form->field($model, 'header2') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

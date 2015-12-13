<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MasterSerasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-serasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'detail_id') ?>

    <?= $form->field($model, 'suboutput_id') ?>

    <?= $form->field($model, 'nama_detail') ?>

    <?= $form->field($model, 'jenis_detail_id') ?>

    <?= $form->field($model, 'renc_tgl_mulai') ?>

    <?php // echo $form->field($model, 'renc_tgl_selesai') ?>

    <?php // echo $form->field($model, 'status_detail_id') ?>

    <?php // echo $form->field($model, 'real_tgl_mulai') ?>

    <?php // echo $form->field($model, 'real_tgl_selesai') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'status_lapor_id') ?>

    <?php // echo $form->field($model, 'lokasi') ?>

    <?php // echo $form->field($model, 'nip_lapor') ?>

    <?php // echo $form->field($model, 'tgl_lapor') ?>

    <?php // echo $form->field($model, 'time_input') ?>

    <?php // echo $form->field($model, 'user_input') ?>

    <?php // echo $form->field($model, 'status_real_up') ?>

    <?php // echo $form->field($model, 'status_real_ls') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

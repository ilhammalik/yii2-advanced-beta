<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelPaguSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="simpel-pagu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pagu') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'alokasi_sub_mak') ?>

    <?= $form->field($model, 'alokasi_pra_revisi') ?>

    <?= $form->field($model, 'kd_satker') ?>

    <?php // echo $form->field($model, 'nas_prog_id') ?>

    <?php // echo $form->field($model, 'nas_keg_id') ?>

    <?php // echo $form->field($model, 'kdoutput') ?>

    <?php // echo $form->field($model, 'kdsoutput') ?>

    <?php // echo $form->field($model, 'kdkmpnen') ?>

    <?php // echo $form->field($model, 'kdskmpnen') ?>

    <?php // echo $form->field($model, 'kode_mak') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

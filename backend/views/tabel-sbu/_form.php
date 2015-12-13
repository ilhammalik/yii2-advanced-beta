<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TabelSbu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-sbu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KDSBU12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KDSBU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NMSBU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SATUAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BIAYA12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BIAYA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KETERANGAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NMITEM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SATKEG')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '_NullFlags')->textInput() ?>

    <?= $form->field($model, 'TAHUN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

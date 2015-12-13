<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmp_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'struk_id')->textInput() ?>

    <?= $form->field($model, 'fung_id')->textInput() ?>

    <?= $form->field($model, 'gol_id')->textInput() ?>

    <?= $form->field($model, 'unit_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jeniskel_id')->textInput() ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'statpeg_id')->textInput() ?>

    <?= $form->field($model, 'no_karpeg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmt_struk')->textInput() ?>

    <?= $form->field($model, 'tmt_gol')->textInput() ?>

    <?= $form->field($model, 'jenjang_id')->textInput() ?>

    <?= $form->field($model, 'tahun_pend')->textInput() ?>

    <?= $form->field($model, 'aktif_id')->textInput() ?>

    <?= $form->field($model, 'tmt_fung')->textInput() ?>

    <?= $form->field($model, 'jenis_peg_id')->textInput() ?>

    <?= $form->field($model, 'jenis_jab_id')->textInput() ?>

    <?= $form->field($model, 'vol_bk_id')->textInput() ?>

    <?= $form->field($model, 'alasan_vol_bk_id')->textInput() ?>

    <?= $form->field($model, 'tmt_pns')->textInput() ?>

    <?= $form->field($model, 'tmt_cpns')->textInput() ?>

    <?= $form->field($model, 'nama_cetak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_staf_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latjab_id')->textInput() ?>

    <?= $form->field($model, 'tmt_eselon')->textInput() ?>

    <?= $form->field($model, 'nip_lama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'absensi_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_ext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mk_th_gol')->textInput() ?>

    <?= $form->field($model, 'mk_bl_gol')->textInput() ?>

    <?= $form->field($model, 'tgl_status')->textInput() ?>

    <?= $form->field($model, 'kdjabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

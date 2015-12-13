<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nip') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tmp_lahir') ?>

    <?= $form->field($model, 'tgl_lahir') ?>

    <?= $form->field($model, 'struk_id') ?>

    <?php // echo $form->field($model, 'fung_id') ?>

    <?php // echo $form->field($model, 'gol_id') ?>

    <?php // echo $form->field($model, 'unit_id') ?>

    <?php // echo $form->field($model, 'jeniskel_id') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'statpeg_id') ?>

    <?php // echo $form->field($model, 'no_karpeg') ?>

    <?php // echo $form->field($model, 'tmt_struk') ?>

    <?php // echo $form->field($model, 'tmt_gol') ?>

    <?php // echo $form->field($model, 'jenjang_id') ?>

    <?php // echo $form->field($model, 'tahun_pend') ?>

    <?php // echo $form->field($model, 'aktif_id') ?>

    <?php // echo $form->field($model, 'tmt_fung') ?>

    <?php // echo $form->field($model, 'jenis_peg_id') ?>

    <?php // echo $form->field($model, 'jenis_jab_id') ?>

    <?php // echo $form->field($model, 'vol_bk_id') ?>

    <?php // echo $form->field($model, 'alasan_vol_bk_id') ?>

    <?php // echo $form->field($model, 'tmt_pns') ?>

    <?php // echo $form->field($model, 'tmt_cpns') ?>

    <?php // echo $form->field($model, 'nama_cetak') ?>

    <?php // echo $form->field($model, 'unit_staf_id') ?>

    <?php // echo $form->field($model, 'latjab_id') ?>

    <?php // echo $form->field($model, 'tmt_eselon') ?>

    <?php // echo $form->field($model, 'nip_lama') ?>

    <?php // echo $form->field($model, 'absensi_id') ?>

    <?php // echo $form->field($model, 'no_ext') ?>

    <?php // echo $form->field($model, 'mk_th_gol') ?>

    <?php // echo $form->field($model, 'mk_bl_gol') ?>

    <?php // echo $form->field($model, 'tgl_status') ?>

    <?php // echo $form->field($model, 'kdjabatan') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

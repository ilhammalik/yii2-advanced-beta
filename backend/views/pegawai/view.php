<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pegawai */

$this->title = $model->nip;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pegawais'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->nip], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->nip], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nip',
            'nama',
            'tmp_lahir',
            'tgl_lahir',
            'struk_id',
            'fung_id',
            'gol_id',
            'unit_id',
            'jeniskel_id',
            'photo',
            'statpeg_id',
            'no_karpeg',
            'tmt_struk',
            'tmt_gol',
            'jenjang_id',
            'tahun_pend',
            'aktif_id',
            'tmt_fung',
            'jenis_peg_id',
            'jenis_jab_id',
            'vol_bk_id',
            'alasan_vol_bk_id',
            'tmt_pns',
            'tmt_cpns',
            'nama_cetak',
            'unit_staf_id',
            'latjab_id',
            'tmt_eselon',
            'nip_lama',
            'absensi_id',
            'no_ext',
            'mk_th_gol',
            'mk_bl_gol',
            'tgl_status',
            'kdjabatan',
            'keterangan',
        ],
    ]) ?>

</div>

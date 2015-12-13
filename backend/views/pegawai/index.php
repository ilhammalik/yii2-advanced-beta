<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pegawais');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pegawai'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nip',
            'nama',
            'tmp_lahir',
            'tgl_lahir',
            'struk_id',
            // 'fung_id',
            // 'gol_id',
            // 'unit_id',
            // 'jeniskel_id',
            // 'photo',
            // 'statpeg_id',
            // 'no_karpeg',
            // 'tmt_struk',
            // 'tmt_gol',
            // 'jenjang_id',
            // 'tahun_pend',
            // 'aktif_id',
            // 'tmt_fung',
            // 'jenis_peg_id',
            // 'jenis_jab_id',
            // 'vol_bk_id',
            // 'alasan_vol_bk_id',
            // 'tmt_pns',
            // 'tmt_cpns',
            // 'nama_cetak',
            // 'unit_staf_id',
            // 'latjab_id',
            // 'tmt_eselon',
            // 'nip_lama',
            // 'absensi_id',
            // 'no_ext',
            // 'mk_th_gol',
            // 'mk_bl_gol',
            // 'tgl_status',
            // 'kdjabatan',
            // 'keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

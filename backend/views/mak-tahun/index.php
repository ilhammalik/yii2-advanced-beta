<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MakTahunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mak Tahuns');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mak-tahun-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Mak Tahun'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sub_mak_id',
            'nama_sub_mak',
            'alokasi_sub_mak',
            'suboutput_id',
            'nas_mak_id',
            // 'no_item',
            // 'volume',
            // 'satuan',
            // 'har_sat',
            // 'alokasi_pra_revisi',
            // 'ket_revisi',
            // 'mak_header_id',
            // 'subkomponen_id',
            // 'tahun',
            // 'kd_satker',
            // 'nas_prog_id',
            // 'nas_keg_id',
            // 'kdoutput',
            // 'kdsoutput',
            // 'kdkmpnen',
            // 'kdskmpnen',
            // 'kode_mak',
            // 'kode_header',
            // 'blokir',
            // 'kdib',
            // 'header1',
            // 'header2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

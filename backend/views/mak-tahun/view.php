<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MakTahun */

$this->title = $model->sub_mak_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mak Tahuns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mak-tahun-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->sub_mak_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->sub_mak_id], [
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
            'sub_mak_id',
            'nama_sub_mak',
            'alokasi_sub_mak',
            'suboutput_id',
            'nas_mak_id',
            'no_item',
            'volume',
            'satuan',
            'har_sat',
            'alokasi_pra_revisi',
            'ket_revisi',
            'mak_header_id',
            'subkomponen_id',
            'tahun',
            'kd_satker',
            'nas_prog_id',
            'nas_keg_id',
            'kdoutput',
            'kdsoutput',
            'kdkmpnen',
            'kdskmpnen',
            'kode_mak',
            'kode_header',
            'blokir',
            'kdib',
            'header1',
            'header2',
        ],
    ]) ?>

</div>

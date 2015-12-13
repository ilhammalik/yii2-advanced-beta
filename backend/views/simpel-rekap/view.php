<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelKeg */

$this->title = $model->id_kegiatan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Kegs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simpel-keg-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_kegiatan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_kegiatan], [
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
            'id_kegiatan',
            'mak:ntext',
            'nama_keg',
            'tujuan',
            'tgl_mulai',
            'tgl_selesai',
            'unit_id',
            'user_id',
            'time_input',
            'nip_ppk',
            'no_sp',
            'no_spd',
            'angkutan',
            'berangkat_asal',
            'penandatangan',
            'jml_dl',
            'serasi2015.news_detail_keg_detail_id',
            'nip_bpp',
            'pegawai.master_pegawai_nip',
            'status_penyel',
            'status',
            'status_edit',
            'negara',
            'detail_id',
            'tgl_penugasan',
            'random',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelPersonil */

$this->title = $model->id_personil;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Personils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simpel-personil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_personil], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_personil], [
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
            'id_personil',
            'pegawai_id',
            'id_kegiatan',
            'tgl_penugasan',
            'tgl_berangkat',
            'tgl_kembali',
            'pejabat',
            'no_sp:ntext',
            'berangkat_asal',
            'tujuan_keberangkatan',
            'uang_makan',
            'angkutan',
            'status_',
        ],
    ]) ?>

</div>

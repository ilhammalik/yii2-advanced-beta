<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelPagu */

$this->title = $model->id_pagu;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Pagus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simpel-pagu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_pagu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_pagu], [
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
            'id_pagu',
            'tahun',
            'alokasi_sub_mak',
            'alokasi_pra_revisi',
            'kd_satker',
            'nas_prog_id',
            'nas_keg_id',
            'kdoutput',
            'kdsoutput',
            'kdkmpnen',
            'kdskmpnen',
            'kode_mak',
        ],
    ]) ?>

</div>

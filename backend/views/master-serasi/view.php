<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MasterSerasi */

$this->title = $model->detail_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Master Serasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-serasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->detail_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->detail_id], [
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
            'detail_id',
            'suboutput_id',
            'nama_detail',
            'jenis_detail_id',
            'renc_tgl_mulai',
            'renc_tgl_selesai',
            'status_detail_id',
            'real_tgl_mulai',
            'real_tgl_selesai',
            'ket',
            'status_lapor_id',
            'lokasi',
            'nip_lapor',
            'tgl_lapor',
            'time_input',
            'user_input',
            'status_real_up',
            'status_real_ls',
        ],
    ]) ?>

</div>

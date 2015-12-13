<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MasterSerasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Master Serasis');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-serasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Master Serasi'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama_detail',
            'jenis_detail_id',
            'renc_tgl_mulai',
            // 'renc_tgl_selesai',
            // 'status_detail_id',
            // 'real_tgl_mulai',
            // 'real_tgl_selesai',
            // 'ket',
            // 'status_lapor_id',
            // 'lokasi',
            // 'nip_lapor',
            // 'tgl_lapor',
            // 'time_input',
            // 'user_input',
            // 'status_real_up',
            // 'status_real_ls',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

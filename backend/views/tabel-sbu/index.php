<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TabelSbuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Standar Biaya Umum');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-sbu-index">
<div class="panel panel-primary">
<div class="panel-heading"><?= Html::encode($this->title) ?></div>
<div class="panel-body">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>
<div class="box ">
                <div class="box-body" style="display: block;">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'KDSBU12',
            'KDSBU',
            'NMSBU',
            'SATUAN',
            'BIAYA12',
            // 'BIAYA',
            // 'KETERANGAN',
            // 'NMITEM',
            // 'SATKEG',
            // '_NullFlags',
            'TAHUN',
            // 'id',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
</div>
</div>
</div>

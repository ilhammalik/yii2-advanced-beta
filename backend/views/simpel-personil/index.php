<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimpelPersonilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Simpel Personils');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simpel-personil-index">
<img src="<?= Url::to(['simpel-keg/qrcode']) ?>" />  
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Simpel Personil'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_personil',
          
            // 'pegawai.master_pegawai_nip',
            // 'status_',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

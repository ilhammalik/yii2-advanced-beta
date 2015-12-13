<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimpelKegSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', ' Arsip');
$this->params['breadcrumbs'][] = 'Proses';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="simpel-keg-index">
<div class="block">
<div class="block-title">
   <ul class="nav nav-tabs ">
            <li >
                <a href="<?= Url::to(['simpel-keg/index']) ?>" >
                    Daftar Permohonan Dinas</a>
            </li>
            <li >
                <a href="<?= Url::to(['simpel-keg/tabdinas']) ?>" >
                    Daftar Perjalanan Dinas</a>
            </li>
            <li >
                <a href="<?= Url::to(['simpel-keg/tabcetak']) ?>" >
                    Cetak </a>
            </li>
            <li>
                <a href="<?= Url::to(['simpel-keg/tabuang']) ?>" >
                    Bendahara </a>
            </li>
            <li class="active">
                <a href="<?= Url::to(['simpel-keg/tabarsip']) ?>" >
                    Arsip </a>
            </li>
        </ul>
</div>
<?php
Pjax::begin(['id' => 'dinasSearch']);
$url_search = Url::to(['simpel-keg/search-dinas']);
$js =<<<js
$("#searchQuery").keyup(function(){
    $("#datadinasGridview").load("{$url_search}"+"?search="+$(this).val());
});


 
js;
$this->registerJS($js);
?>
<div class="wp-posts-index">
<div class="row">
    <div class="col-lg-6">

    </div>
    <div class="col-lg-6">
        <form class="FormAjax" method="get" action="">
            <div class="input-group">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                <input id="searchQuery" type="text" class="form-control" placeholder="masukkan nama, tipe atau nomor seri dinas">
                <span class="input-group-btn">
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
        </form>
    </div>
</div>
<br/>
<div id="datadinasGridview">
   <?= GridView::widget([
        'dataProvider' => $dataArsip,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             [
                'attribute' => 'Tanggal',
                'headerOptions' => ['width' => '200'],
                'value' => function($data) {
            return substr($data['tgl_mulai'], 8, 2) . ' -  ' . substr($data['tgl_selesai'], 8, 2) . '  ' . \common\components\MyHelper::BacaBulan(substr($data['tgl_mulai'], 5, 2)) . '  ' . substr($data['tgl_mulai'], 0, 4);
                }
            ],
            'mak',
           [
                                            'header' => 'Maksud',
                                            'format' => 'html',
                                            'contentOptions' => ['style' => 'width:490px; z-index:200;'],
                                            'value' => function($data) {
                                        return $data->nama_keg;
                                    }
                                        ],
             [
                                            'header' => 'Negara',
                                            'format' => 'html',
                                            'value'=>function($data){
                                                if($data->negara == 1){
                                                    return 'Dalam Negri';
                                                }else{
                                                    return 'Luar Negri' ;
                                                }
                                            }
                                        ],
 [
                                            'header' => 'Anggaran (Rp)/
                                                         Jum Personil',
                                            'contentOptions' => ['style' => 'width:140px; z-index:200;'],
                                            'format' => 'html',
                                            'value' => function($data) {
                                        return MyHelper::CountAng($data->id_kegiatan);
                                    }
                                        ],

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width:190px; z-index:200;'],
                                'header' => 'Actions',
                                'template' => '{pass}',
                                'buttons' => [
                                     'pass' => function ($url, $model) {
                                                                                        return Html::a(' <button type="button" class="btn btn-danger data-placement="top">
                                                                           <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back
                                                                          </button>', Yii::$app->urlManager->createUrl(['simpel-keg/editkeg','id' => $model->id_kegiatan]), [
                                                                                                        'title' => Yii::t('yii', 'Proses'),
                                                                                                        'data-confirm' => Yii::t('yii', 'Apakah Anda Yakin Ingin Melakukan Proses?'),

                                                                                                      ]);},
                                        ],
                                    ],
        ],
    ]); ?>
</div>

</div>
</div>
</div>
<?php
Pjax::end();
?>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\db\Query;
use hscstudio\mimin\components\Mimin;
use \common\models\DaftarUnit;
use \common\components\HelperUnit;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimpelKegSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = 'Proses';
$this->params['breadcrumbs'][] = 'Permohonan Dinas';

$this->params['breadcrumbs'][] = $this->title;
//echo $dataSerasi->sql;
?>

<div class="simpel-keg-index">
    <div class="block">
        <div class="block-title">
            <ul class="nav nav-tabs ">

                <li class="active">
                    <a href="<?= Url::to(['simpel-keg/index']) ?>" >
                        Daftar Permohonan Dinas</a>
                </li>
                <?php if ((Mimin::filterRoute($this->context->id . '/tabdinas'))) { ?>

                    <li>
                        <a href="<?= Url::to(['simpel-keg/tabdinas']) ?>" >
                            Daftar Perjalanan Dinas</a>
                    </li>
                <?php } ?>
                <?php if ((Mimin::filterRoute($this->context->id . '/tabcetak'))) { ?>

                    <li>
                        <a href="<?= Url::to(['simpel-keg/tabcetak']) ?>" >
                            Cetak </a>
                    </li>
                <?php } ?>
                <?php if ((Mimin::filterRoute($this->context->id . '/tabuang'))) { ?>
                    <li>
                        <a href="<?= Url::to(['simpel-keg/tabuang']) ?>" >
                            Bendahara </a>
                    </li>
                <?php } ?>
                <?php if ((Mimin::filterRoute($this->context->id . '/tabarsip'))) { ?>
                    <li >
                        <a href="<?= Url::to(['simpel-keg/tabarsip']) ?>" >
                            Arsip </a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="wp-posts-index">
            <div class="row">


            </div>
            <br/>
            <div id="datadinasGridview">
                <h3 align="center">Daftar Kegiatan Berdasarkan Unit Kerja <br/><?= HelperUnit::Unit($_GET['unit']) ?></h3>   
                        <?=
                GridView::widget([
                    'dataProvider' => $dataSerasi,
                    'id'=>'akun',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                      
                      
                        [
                            'attribute' => 'Tanggal',
                            'headerOptions' => ['width' => '10'],
                            'value' => function($data) {
                        return substr($data['renc_tgl_mulai'], 8, 2) . ' -  ' . substr($data['renc_tgl_selesai'], 8, 2) . '  ' . \common\components\MyHelper::BacaBulan(substr($data['renc_tgl_mulai'], 5, 2)) . '  ' . substr($data['renc_tgl_mulai'], 0, 4);
                    }
                        ,
                        ],
                        
                         [
                            'attribute' => 'Bidang',
                            'headerOptions' => ['width' => '255'],
                            'value' => function($data) {
                                return HelperUnit::Unit($data['unit_id']);
                    }
                        ,
                        ],
                          [
                            'attribute' => 'Mata Anggaran',
                            'headerOptions' => ['width' => '255'],
                            'value' => function($data) {
                        return $data['nas_prog_id'].'.'.$data['nas_keg_id'].'.'.$data['kdoutput'].'.'.$data['kdsoutput'].'.'.$data['kdkmpnen'].'.'.$data['kdskmpnen'].'.'.$data['kode_mak'];
                    }
                        ,
                        ],
                             [
                            'attribute' => 'Nama Kegiatan',
                            'headerOptions' => ['width' => '455'],
                            'value' => function($data) {
                                return $data['nama_detail'];
                    }
                        ,
                        ],

                    //       [
                    //         'attribute' => 'SUb',
                    //         'headerOptions' => ['width' => '55'],
                    //         'value' => function($data) {
                    //             return $data['sub_mak_id'];
                    // }
                    //     ,
                    //     ],
                            [
                            'attribute' => 'Jenis Kegiatan',
                            'headerOptions' => ['width' => '120'],
                            'value' => function($data) {
                               switch ($data['jenis_detail_id']) {
                                        case "3": 
                                            return 'External';
                                        break;
                                         case "4": 
                                            return 'Dalam Negri';
                                        break;
                                        case "5":
                                            return 'Luar Negri';
                                            break;
                                        
                                    }
                                    }
                        
                        ],
                     
                          
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'contentOptions' => ['style' => 'width:13px; z-index:20;'],
                            'header' => 'Actions',
                            'template' => Mimin::filterTemplateActionColumn(['view'], $this->context->route),
                            'buttons' => [

                                'view' => function ($url, $model) {

                                   
                                     switch ($model['jenis_detail_id']) {
                                        case 3: 
                                            return Html::button('<span class="glyphicon glyphicon glyphicon-share-alt"></span> ', ['value' =>
                                                Url::to(['mak-tahun/dn', 'id' => $model['detail_id'],'unit' => $model['unit_id']]), 'class' => 'modalButtonn btn btn-info', 'title' => 'Lanjut Proses']);
                                        break;
                                         case 4: 
                                            return Html::button('<span class="glyphicon glyphicon glyphicon-share-alt"></span> ', ['value' =>
                                                Url::to(['mak-tahun/dn', 'id' => $model['detail_id'],'unit' => $model['unit_id']]), 'class' => 'modalButtonn btn btn-info', 'title' => 'Lanjut Proses']);
                                        break;
                                        case 5:
                                            return Html::button('<span class="glyphicon glyphicon glyphicon-share-alt"></span>', ['value' =>
                                                Url::to(['mak-tahun/po', 'id' => $model['detail_id'],'unit' => $model['unit_id']]), 'class' => 'modalLuar btn btn-danger', 'title' => ' Lanjut Proses']);
                                            break;
                                        
                                    }
                                },

                                    ],
                                ],
                            ],
                        ]);
                        ?>

       
            </div>
        </div>
    </div>


</div>
<?php
$js = <<<Modal



$(function () {
    $('.modalButtonn').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });

});


$(function () {
    $('.modalLuar').click(function () {
        $('#luar').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });

})

Modal;
$this->registerJs($js);
?>



<?php
Modal::begin([
    'header' => 'Perjalanan Dinas Dalam Negri',
    'options' => [
        'tabindex' => false // important for Select2 to work properly
    ],
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>";

Modal::end();
?> 


<?php
Modal::begin([
    'header' => 'Perjalanan Dinas luar Negri',
    'options' => [
        'tabindex' => false // important for Select2 to work properly
    ],
    'id' => 'luar',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>";

Modal::end();
?> 





<style type="text/css">
    th{
        text-align: center;
    }
   
</style>
 



<?php

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
Pjax::begin(['id' => 'searchingdinas']);
?>
<?=
                        GridView::widget([
                            'dataProvider' => $dataSerasi,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => 'Tanggal',
                                    'headerOptions' => ['width' => '200'],
                                    'value' => function($data) {
                                return substr($data['renc_tgl_mulai'], 8, 2) . ' -  ' . substr($data['renc_tgl_selesai'], 8, 2) . '  ' . \common\components\MyHelper::BacaBulan(substr($data['renc_tgl_mulai'], 5, 2)) . '  ' . substr($data['renc_tgl_mulai'], 0, 4);
                            }
                                ,
                                ],
                                
                                'nama_detail',
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'contentOptions' => ['style' => 'width:143px; z-index:200;'],
                                    'header' => 'Actions',
                                    'template' => '{update}',
                                    'buttons' => [

                                        'update' => function ($url, $model) {
                                            return Html::button('<span class="glyphicon glyphicon-chevron-right"></span>Lanjut Proses', ['value' =>
                                                        Url::to(['mak-tahun/po', 'id' => $model['detail_id']]), 'class' => 'modalButtonn btn btn-info', 'title' => 'view dokumen']);
                                        },
                                            ],
                                        ],
                                    ],
                                ]);
                                ?>
<?php

Pjax::end();
?>
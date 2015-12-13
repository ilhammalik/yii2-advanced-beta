<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

Pjax::begin(['id' => 'searchingdinas']);
?>
<?= GridView::widget([
        'dataProvider' => $dataDinas,
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
                                'value' => function($data) {
                                    return $data->nama_keg;
                        }
                                
                                        ],
            'tujuan',
            'tgl_mulai',
            
        ],
    ]); ?>
<?php

Pjax::end();
?>
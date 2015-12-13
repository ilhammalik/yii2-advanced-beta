  <?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\components\MyHelper;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
                                    

<?=

GridView::widget([
                    'dataProvider' => $dataTerima,

                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'tgl_terima',
                          
                          [
                                    'attribute' => 'Nama Personil',
                                    'headerOptions' => ['width' => '200'],
                                    'value' =>'pegawai.nama',
                                ],
                    ],
        ]);
        ?>

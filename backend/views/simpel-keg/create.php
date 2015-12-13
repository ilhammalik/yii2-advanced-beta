<?php

use yii\widgets\ActiveForm;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Angkutan;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;


$this->title = Yii::t('app', 'Daftar Perjalanan Dinas');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$js = <<<Modal
$(function () {
    $('.modalButton').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });

})
Modal;
$this->registerJs($js);

$js = <<<Modal
$(function () {
    $('.modalButtonn').click(function () {
        $('#modall').modal('show')
                .find('#modalContentt')
                .load($(this).attr('value'));
    });

});



Modal;
$this->registerJs($js);
?>

<?php
Modal::begin([
    'header' => 'Tambah Perjalanan Dinas',
    'options' => [
        'id' => 'modal',
        'tabindex' => false // important for Select2 to work properly
    ],
    'id' => 'modal',
    'size' => 'bigModal',
]);
echo "<div id='modalContent'></div>";

Modal::end();

Modal::begin([
    'header' => 'Data Personil',
    'options' => [
        //'id' => 'modall',
        'tabindex' => false // important for Select2 to work properly
    ],
    'id' => 'modall',
    'size' => 'bigModal',
]);
echo "<div id='modalContentt'></div>";

Modal::end();
?> 


<div class="block">
<div class="block-title">

</div> 
<div class="wp-posts-index"> 
<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
       // 'nomi_id',
        'mak',
        'nama_keg',
          [                      // the owner name of the model
           'label' => 'Kwitansi',
           'value' =>$model->no_reg,
          ],
        [                      // the owner name of the model
           'label' => 'Tujuan Keberangkatan',
           'value' =>\backend\models\SimpelKeg::Tujuan($model->negara),
          ],
         /* [                      // the owner name of the model
           'label' => 'Tanggal key',
           'value' =>\common\components\MyHelper::Formattgl($model->tgl_key),
          ],*/
        'no_spd',
       // 'kota.kokab_nama',
    ],
])
?>



         <?php      

           switch ($model->negara) {
                    case 1: 
                    echo $this->renderAjax('detail_dalam_negri', [
                                'model' => $model,
                                'model2' => $model2,
                    ]);
                     break;
                    case 2:
                     echo $this->renderAjax('detail_luar_negri', [
                                    'model' => $model,
                                    'model2' => $model2,
                        ]);
                        break;
                    
                }
          
?>

</div>
</div>
  
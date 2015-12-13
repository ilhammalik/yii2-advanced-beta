  <?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\components\MyHelper;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>


<div class="bs-example" data-example-id="bordered-table">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Cetak Data</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($model->kode_mak == '524113'){ ?>
                    <tr>
                      <th scope="row">1</th>
                      <td>Form Bukti Kehadiran</td>
                      <td><?= Html::a('Cetak', ['spd', 'id' => $model->id_kegiatan], ['target'=>'_blank','class' => 'btn btn-primary']) ?></td>
                    </tr>
                    <tr>
                       <td  align="right" colspan="3"><?=Html::a('Kirim Ke bendaraha', '#',['value' =>
                                                                Url::to(['simpel-keg/isi', 'id' => $model['id_kegiatan']]), 'class' => 'modalBend btn btn-primary']) ?></td>
                    </tr>

                <?php  } else{ ?>
                  <tr>
                      <th scope="row">1</th>
                      <td>SPD</td>
                      <td><?= Html::a('Cetak', ['spd', 'id' => $model->id_kegiatan], ['target'=>'_blank','class' => 'btn btn-primary']) ?></td>
                    </tr>
                 <tr>
                      <th scope="row">2</th>
                      <td>Nominatif</td>
                      <td><?= Html::a('Cetak', ['drki', 'id' => $model->id_kegiatan], ['target'=>'_blank','class' => 'btn btn-primary'])?></td>
                    </tr>
                     <tr>
                      <th scope="row">3</th>
                      <td>Rincian</td>
                       <td><?= Html::a('Cetak', ['rincianbpd', 'id' => $model->id_kegiatan], ['target'=>'_blank','class' => 'btn btn-primary']) ?></td>      
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Kwitansi</td>
                       <td><?= Html::a('Cetak', ['kwitansi', 'id' => $model->id_kegiatan], ['target'=>'_blank','class' => 'btn btn-primary']) ?></td>
                    </tr>
                   
                         <?php
                     switch ($model->negara) {
                       case '1': ?>
                   
                      <tr>
                      <th scope="row">5</th>
                      <td>Pengeluaran Rill</td>
                       <td><?= Html::a('Cetak', ['dpr', 'id' => $model->id_kegiatan], ['target'=>'_blank','class' => 'btn btn-primary']) ?></td>
                       <tr>
                      
                       <?php  break;
                       
                       default:
                       echo "";
                         break;
                     }
                     ?>
                      
                       <td  align="right" colspan="3"><?=Html::a('Kirim Ke bendaraha', '#',['value' =>
                                                                Url::to(['simpel-keg/isi', 'id' => $model['id_kegiatan']]), 'class' => 'modalBend btn btn-primary']) ?></td>
                    </tr>

                    <?php } ?>
                   
                  </tbody>
                </table>
              </div>
  <?php
        $js = <<<Modal


$(function () {
    $('.modalBend').click(function () {
        $('#bend').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });

})

$(function () {
    $('.modalCetak').click(function () {
        $('#cetak').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });

})


Modal;
        $this->registerJs($js);
        ?>

   

        <?php
        Modal::begin([
            'options' => [
                'tabindex' => false // important for Select2 to work properly
            ],
            'id' => 'cetak',
            'size' => 'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
        ?> 

 <?php
        Modal::begin([
            'options' => [
                'tabindex' => false // important for Select2 to work properly
            ],
            'id' => 'bend',
            'size' => 'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
        ?> 

        

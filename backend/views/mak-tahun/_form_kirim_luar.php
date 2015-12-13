<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use \common\components\HelperUnit;

/**
 * @var yii\web\View $this
 * @var backend\models\Nominatif $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="nominatif-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName(),'enableClientValidation' => false,
     'enableAjaxValidation' => false,]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'mak')->textInput(['readonly' => true, 'value' => $result['nas_prog_id'] . '.' . $result['nas_keg_id'] . '.' . $result['kdoutput'] . '.' . $result['kdsoutput'] . '.' . $result['kdkmpnen'] . '.' . $result['kode_mak']]) ?>

            <?= $form->field($model, 'detail_id')->hiddenInput(['rows' => 6, 'value' => $result['detail_id']])->label(false) ?>
            <?= $form->field($model, 'kode_mak')->hiddenInput(['rows' => 6, 'value' => $result['kode_mak']])->label(false) ?>
            <?= $form->field($model, 'ppk')->textInput(['readonly' => true,'rows' => 6, 'value' => HelperUnit::Pegawai(HelperUnit::Ppk(HelperUnit::ParentUnit($_GET['unit'])))])->label('Nama PPK ') ?>
          
            <div id="kota">

                       <?php
                $data = ArrayHelper::map(\backend\models\DafNegara::find()->asArray()->all(), 'kode_negara', 'nama');
                echo $form->field($model, 'kota_asal')->widget(Select2::classname(), [
                    'data' => $data,
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => ['id' => 'asal',  'placeholder' => 'Pilih Negara Asal'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label(' Negara Asal');
                ?>         
                <?php
                $data = ArrayHelper::map(\backend\models\DafNegara::find()->asArray()->all(), 'kode_negara', 'nama');
                echo $form->field($model, 'negara_tujuan')->widget(Select2::classname(), [
                    'data' => $data,
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => ['id' => 'brkota',  'placeholder' => 'Pilih Negara Tujuan'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label(' Negara Tujuan');
                ?>

            </div> 
             
            <?php
            echo $form->field($model, 'renc_tgl_mulai')->widget(DatePicker::classname(), [
                'options' => ['value' => $result['renc_tgl_mulai'], 'placeholder' => 'Pilih Tanggal'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d',
                ]
            ])->label('Pergi Keberangkatan');
            ?>
           <?php
                echo $form->field($model, 'tgl_penugasan')->widget(DatePicker::classname(), [
                    'options' => [ 'placeholder' => 'Pilih Tanggal'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d',
                    ]
                ])->label('Tanggal Penugasan');
                ?>
                  <?php
                 switch ($result['jenis_detail_id']) {
                    case "3": 
                        echo $form->field($model, 'no_spd')->textInput(['readOnly' => true, 'require' => true, 'value' => str_pad($dat, 4, "0", STR_PAD_LEFT) . '/PERJADIN-DN/' . \common\components\MyHelper::Romawi(date('m')) . '/' . date('Y')])->label('No. SPD');
                    break;
                    case "4": 
                        echo $form->field($model, 'no_spd')->textInput(['readOnly' => true, 'require' => true, 'value' => str_pad($dat, 4, "0", STR_PAD_LEFT) . '/PERJADIN-DN/' . \common\components\MyHelper::Romawi(date('m')) . '/' . date('Y')])->label('No. SPD');
                    break;
                    case "5":
                        echo $form->field($model, 'no_spd')->textInput(['readOnly' => true, 'require' => true, 'value' => str_pad($dat, 4, "0", STR_PAD_LEFT) . '/PERJADIN-LN/' . \common\components\MyHelper::Romawi(date('m')) . '/' . date('Y')])->label('No. SPD');
                
                        break;
                    
                }
               
                ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'nama_detail')->textInput(['rows' => 6, 'value' => $result['nama_detail']])->label('Nama Kegiatan') ?>
            <?= $form->field($model, 'unit_id')->hiddenInput(['rows' => 6, 'value' => $_GET['unit']])->label(false) ?>


            <?php
            $data = ArrayHelper::map(\common\models\Pegawai::find()->asArray()->all(), 'nip', 'nama_cetak');
            echo $form->field($model, 'nip_bpp')->widget(Select2::classname(), [
                'data' => $data,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['placeholder' => 'Pilih Nama BPP'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Pilih Nama BPP');
            ?>

            <div id="kota2"> 
            <?= $form->field($model, 'kota_negara')->textInput(['rows' => 6])->label('Kota Negara Tujuan') ?>
          
            <?php
                echo $form->field($model, 'renc_tgl_selesai')->widget(DatePicker::classname(), [
                    'options' => ['value' => $result['renc_tgl_selesai'], 'placeholder' => 'Pilih Tanggal'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d',
                    ]
                ])->label('Sampai Keberangkatan');
                ?>
        
            </div>
                <?php
                 switch ($result['jenis_detail_id']) {
                    case "3": 
                        echo $form->field($model, 'no_reg')->textInput(['readOnly' => true, 'require' => true, 'value'=>str_pad($dat, 4, "0", STR_PAD_LEFT).'/SPPD-DN/BU/'.\common\components\MyHelper::Romawi(date('m')) . '/' . date('Y')])->label('No. Kwitansi');
                    break;
                    case "4": 
                        echo $form->field($model, 'no_reg')->textInput(['readOnly' => true, 'require' => true, 'value'=>str_pad($dat, 4, "0", STR_PAD_LEFT).'/SPPD-DN/BU/'.\common\components\MyHelper::Romawi(date('m')) . '/' . date('Y')])->label('No. Kwitansi');
                    break;
                    case "5":
                        echo $form->field($model, 'no_reg')->textInput(['readOnly' => true, 'require' => true, 'value'=>str_pad($dat, 4, "0", STR_PAD_LEFT).'/SPPD-LN/BU/'.\common\components\MyHelper::Romawi(date('m')) . '/' . date('Y')])->label('No. Kwitansi');
                
                        break;
                    
                }
               
                ?>

                
            <?= $form->field($model, 'nip_ppk')->hiddenInput(['readonly' => true,'rows' => 6, 'value' => HelperUnit::Ppk(HelperUnit::ParentUnit($_GET['unit']))])->label(false) ?>

        </div>
    </div>


    <div class="modal-footer">
        <div class="row">
            <div class="col-md-6">
                <h5 align="left"><?= Html::a('Batal', ['create'], ['class' => 'btn btn-success ', 'data-dismiss' => 'modal']) ?></h5>
            </div>
            <div class="col-md-6">
            <?php
            echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Kirim'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
            ActiveForm::end();
            ?>
            </div>
        </div>

            <?php
            $js = <<<js


$('form#{$model->formName()}').on('beforeSubmit', function(e)
    {

      var \$form = $(this);
      $.post(
        \$form.attr("action"), 
        \$form.serialize()
        )

          .done(function(result) {
            if(result.message == 'Success')
            {

              $(document).find('secondmodal').modal('hide');
              $.pjax.reload({container:'#commodity-grid'});
            }else
            {
              $(\$form).triggger("reset");
              $("#message").html(result.message);
            }
          }).fail(function()
          {
            console.log("server Error");
          })
      return false;
    });


js;
            ?>
      

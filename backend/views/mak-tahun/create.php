<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/**
 * @var yii\web\View $this
 * @var backend\models\Nominatif $result
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="nominatif-form">

    <?php $form = ActiveForm::begin(['id' => $result->formName(),'enableClientValidation' => false,
     'enableAjaxValidation' => false,]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($result, 'mak')->textInput(['readonly' => true, 'value' => $result['nas_prog_id'] . '.' . $result['nas_keg_id'] . '.' . $result['kdoutput'] . '.' . $result['kdsoutput'] . '.' . $result['kdkmpnen'] . '.' . $result['kode_mak']]) ?>

            <?= $form->field($result, 'nama_detail')->textInput(['rows' => 6, 'value' => $result['nama_detail']])->label('Nama Kegiatan') ?>
            <?= $form->field($result, 'detail_id')->hiddenInput(['rows' => 6, 'value' => $result['detail_id']])->label(false) ?>
            <?= $form->field($result, 'kode_mak')->hiddenInput(['rows' => 6, 'value' => $result['kode_mak']])->label(false) ?>
            <div id="kota">         
                <?php
                $data = ArrayHelper::map(\backend\models\DafKota::find()->asArray()->all(), 'kab_id', 'nama');
                echo $form->field($result, 'kota_keberangkatan')->widget(Select2::classname(), [
                    'data' => $data,
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => ['id' => 'brkota',  'placeholder' => 'Pilih Kota Keberangkatan'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>
            </div> 
                <?php
                $unit = ArrayHelper::map(\common\models\DaftarUnit::find()->asArray()->all(), 'unit_id', 'nama');
                echo $form->field($result, 'unit_id')->widget(Select2::classname(), [
                    'data' => $unit,
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => ['required' => 'required', 'placeholder' => 'Pilih UNIT Kerja'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label('Unit Kerja');
                ?>

            <?php
            echo $form->field($result, 'renc_tgl_mulai')->widget(DatePicker::classname(), [
                'options' => ['value' => $result['renc_tgl_mulai'], 'placeholder' => 'Enter birth date ...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d',
                ]
            ])->label('Pergi Keberangkatan');
            ?>
           <?php
                echo $form->field($result, 'tgl_penugasan')->widget(DatePicker::classname(), [
                    'options' => [ 'placeholder' => 'Enter birth date ...'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d',
                    ]
                ])->label('Tanggal Penugasan');
                ?>
        </div>
        <div class="col-md-6">

            <?php
            $data = ArrayHelper::map(\common\models\Pegawai::find()->asArray()->all(), 'nip', 'nama_cetak');
            echo $form->field($result, 'nip_ppk')->widget(Select2::classname(), [
                'data' => $data,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['placeholder' => 'Pilih Nama PPK'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Pilih Nama PPK');
            ?>
            <?php
            $data = ArrayHelper::map(\common\models\Pegawai::find()->asArray()->all(), 'nip', 'nama_cetak');
            echo $form->field($result, 'nip_bpp')->widget(Select2::classname(), [
                'data' => $data,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['placeholder' => 'Pilih Nama BPP'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Pilih Nama BPP');
            ?>
            <div id="kota2"> 
            <?php
            $data = ArrayHelper::map(\backend\models\DafKota::find()->asArray()->all(), 'kab_id', 'nama');
            echo $form->field($result, 'kota_tujuan')->widget(Select2::classname(), [
                'data' => $data,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['placeholder' => 'Pilih Kota Tujuan'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
            <?php
            $data = ArrayHelper::map(\backend\models\DafPropinsi::find()->asArray()->all(), 'propinsi_id', 'nama');
            echo $form->field($result, 'propinsi_id')->widget(Select2::classname(), [
                'data' => $data,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['placeholder' => 'Pilih Kota Tujuan'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Propinsi Tujuan');
            ?>
            </div>
                <?php
                echo $form->field($result, 'no_spd')->textInput(['readOnly' => true, 'require' => true, 'value' => str_pad($dat, 4, "0", STR_PAD_LEFT) . '/PERJADIN-DN/' . \common\components\MyHelper::Romawi(date('m')) . '/' . date('Y')])->label('No. SPD');
                ?>
                <?php

                echo $form->field($result, 'no_reg')->textInput(['readOnly' => true, 'require' => true, 'value'=>str_pad($dat, 4, "0", STR_PAD_LEFT).'/SPPD-DN/BU/'.\common\components\MyHelper::Romawi(date('m')) . '/' . date('Y')])->label('No. Kwitansi');
                ?>

                <?php
                echo $form->field($result, 'renc_tgl_selesai')->widget(DatePicker::classname(), [
                    'options' => ['value' => $result['renc_tgl_selesai'], 'placeholder' => 'Enter birth date ...'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d',
                    ]
                ])->label('Sampai Keberangkatan');
                ?>

        </div>
    </div>


    <div class="modal-footer">
        <div class="row">
            <div class="col-md-6">
                <h5 align="left"><?= Html::a('Batal', ['create'], ['class' => 'btn btn-success ', 'data-dismiss' => 'modal']) ?></h5>
            </div>
            <div class="col-md-6">
            <?php
            echo Html::submitButton($result->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Kirim'), ['class' => $result->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
            ActiveForm::end();
            ?>
            </div>
        </div>

            <?php
            $js = <<<js


$('form#{$result->formName()}').on('beforeSubmit', function(e)
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
      

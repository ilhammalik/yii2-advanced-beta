  <?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\components\MyHelper;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
 /* 
 * @property User $user
 * 
 * @author Ilham Malik Ibrahim <ilhammalik19@gmail.com> www.ipteku.com 2015
 * @since 1.0
 */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
    <?= $form->field($model2, 'id_kegiatan')->hiddenInput(['value'=>$model->id_kegiatan,'maxlength' => true])->label(false) ?>
     <?php
                                $data3 = ArrayHelper::map(\common\models\Pegawai::find()->where('unit_id=132210')->asArray()->all(), 'nip', 'nama');
                                echo $form->field($model2, 'personil_id')->widget(Select2::classname(), [
                                    'data' => $data3,
                                    'options' => ['placeholder' => 'Pilih Nama Pejabat'],
                                                  'pluginOptions' => [
                                                      'allowClear' => true
                                                  ],
                                ])->label('Nama Personil');


                                ?>
    </div>
    <div class="col-md-6">
    <br/>
    <?php
        echo $form->field($model2, 'tgl_terima')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Tanggal Kirim'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d',

            ]
        ])->label('Tanggal Kirim');
        ?>
    </div>
     <div class="row">
       <div class="col-md-12">
        &nbsp; &nbsp; &nbsp;<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Kirim '), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
       </div>
    </div>
  </div>
    
    

  

    <?php ActiveForm::end(); ?>
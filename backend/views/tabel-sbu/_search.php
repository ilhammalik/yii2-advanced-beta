<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TabelSbuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabel-sbu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'KDSBU')->label('Kode') ?>
        </div>
        <div class="col-md-3">
             <?= $form->field($model, 'NMSBU')->label('Item Uraian') ?>
        </div>

        <div class="col-md-2">
      

<?php 
        $thisYear = date('Y', time());
        for($yearNum = $thisYear; $yearNum >= 2010; $yearNum--){
            $years[$yearNum] = $yearNum;
        }
   echo $form->field($model, 'TAHUN')->dropDownList(
                                $years, 
                                ['prompt'=>'Pilih Tahun']);
?>


        </div>
        <div class="col-md-3">
        <br/>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Cari'), ['class' => 'btn btn-primary']) ?>
            </div>

        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>

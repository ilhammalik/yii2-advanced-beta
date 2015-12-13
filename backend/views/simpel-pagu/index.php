<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\SqlDataProvider;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimpelPaguSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pengaturan');
$this->params['breadcrumbs'][] = $this->title;

$this->params['breadcrumbs'][] = 'Pagu Mak';
?>
<div class="simpel-pagu-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>
  
        
    </table>
     <?php $form = ActiveForm::begin([ 'action' => ['generate']]); ?>
<div class="block">
    <div class="block-title">
        <h2>Pengaturan Pagu Anggaran BAPETEN <?= date('Y') ?></h2>
        <div class="block-options pull-right">
         <?php
            $thisYear = date('Y', time());
            if ($thisYear = '2015'){
                for ($yearNum = $thisYear; $yearNum >= 2015; $yearNum--) {
                $years[$yearNum] = $yearNum;
            }
            }
           
            ?>

            <select name="tahun" onchange="this.form.submit()">
                <?php
                foreach ($years as $key) {
                    echo '<option value="' . $key . '">' . $key . '</option>';
                }
                ?>

            </select>
         <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <div class="wp-posts-index">


    <?php ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                'tahun',
                'kd_satker',
                'nas_prog_id',
                'nas_keg_id',
                'kdoutput',
                'kdsoutput',
                'kdkmpnen',
                'kdskmpnen',
                'kode_mak',
                'alokasi_sub_mak',
                
                 
                 [
                            'attribute' => 'Unit Kerja',
                            'headerOptions' => ['width' => '200'],

                            'value' => function($data) {
                        return $data->put->unit->nama;
                    }
                        ,
                        ],
        ],
    ]); ?>

</div>
</div>
</div>
</div>

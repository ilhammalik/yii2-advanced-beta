<?php

use kartik\widgets\ActiveForm;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Angkutan;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;


$this->title = Yii::t('app', 'Daftar Personil');
$this->params['breadcrumbs'][] = $this->title;
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
                   <tr>
                      <th scope="row">4</th>
                      <td>SPD</td>
                      <td><?= Html::a('Cetak', ['spd', 'id' => $model->kegiatan_id], ['target'=>'_blank','class' => 'btn btn-primary'])?></td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>Nominatif</td>
                      <td><?= Html::a('Cetak', ['drki', 'id' => $model->kegiatan_id], ['target'=>'_blank','class' => 'btn btn-primary']) ?>'</td>
                    </tr>
                     <tr>
                      <th scope="row">3</th>
                      <td>Rincian</td>
                       <td><?= Html::a('Cetak', ['rincianbpd', 'id' => $model->kegiatan_id], ['target'=>'_blank','class' => 'btn btn-primary'])?></td>      
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Kwitansi</td>
                       <td><?= Html::a('Cetak', ['kwitansi', 'id' => $model->kegiatan_id], ['target'=>'_blank','class' => 'btn btn-primary'])?></td>
                    </tr>
                   
                   
                       
                    <tr>
                      <td colspan="3"><?= Html::a(Yii::t('app', 'Update'), ['uang', 'id' => $model->kegiatan_id], ['class' => 'btn btn-primary']) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
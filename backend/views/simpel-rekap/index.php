<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use hscstudio\mimin\components\Mimin;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimpelRekapSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Daftar Rekapitulasi Perjadin');
$this->params['breadcrumbs'][] = $this->title;

?>
<style type="text/css">
    th{
        text-align: center;
    }
    .list{

        border-collapse: collapse;
        width: 100%;
        display: table-header-group;

    }
    .list tr td{
        border: 1px solid black;
        padding: 4px;
        border-collapse: collapse;
    }
    .list tr th{
        text-align: center; 
        font-weight: bold;
        border: 1px solid black;
        padding: 5px;

        border-collapse: collapse;
        background-color: #9DA39E;
        color:#fff;
    }
    .list tr.even td {
        background-color: #d6eaff;
    }
</style>
<div class="simpel-keg-index">
    <div class="block">
        <div class="block-title">
            <ul class="nav nav-tabs ">
                <li  class="active" >
                    <a href="<?= Url::to(['simpel-rekap/index']) ?>" >
                    Rekapitulasi Perjadin</a>
                </li>
                <li>
                    <a href="<?= Url::to(['simpel-rekap/keg']) ?>" >
                    Rekapitulasi Kegiatan</a>
                </li>
                <li>
                    <a href="<?= Url::to(['simpel-rekap/monikeg']) ?>" >
                    Monitoring Kegiatan </a>
                </li>

            </div>
            <?= $this->render('_search') ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 align="center" class="panel-title"><?= $this->title ?></h3>
                </div>
                <table class="table table-responsive list table-bordered " width="100%">
               
                    <tr>
                        
                        <th >No </th>
                        <th >Nama </th>
                        <th >Nama Kegiatan </th>
                        <th >Tujuan </th>
                        <th >Jumlah DL </th>

                        <th >Tanggal </th>
                    </tr>
                    
                    <?php
                        $no = 1;
                    foreach ($models as $data) {

                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td width="500"><?= $data->pegawai->nama ?></td>
                        <td align="center" width="300"><?= $data->keg->nama_keg ?></td>

                        <td align="center" width="300"><?= $data->keg->kotaTujuan->nama ?></td>
                        <td align="center" width="300">
                        <?php 
                        //$count = \backend\models\SimpelPersonil::find()->where('id_kegiatan='.$data->id_kegiatan.' and pegawai_id='.$data->pegawai_id);
                        if($data->id_kegiatan>0){
                         $count = Yii::$app->db->createCommand("SELECT count(pegawai_id) from simpel_personil where id_kegiatan=".$data->id_kegiatan." and pegawai_id=".$data['pegawai_id'])->queryScalar();
                        echo $count;
                        }
                        
                        ?>
                        </td>
                        <td align="center" width="300">
                        <?= substr($data->tgl_berangkat, 8,2).' s/d '.substr($data->tgl_kembali, 8,2).'  '.\common\components\MyHelper::BacaBulan(substr($data->tgl_berangkat, 5,2)).'  '.substr($data->tgl_berangkat, 0,4) ?>
                        </td>
                    </tr>
                    <?php $no++;} ?>
                </table>
            </div>
            <?php
            echo LinkPager::widget([
    'pagination' => $pages,
]);
?>
        </div>
    </div>

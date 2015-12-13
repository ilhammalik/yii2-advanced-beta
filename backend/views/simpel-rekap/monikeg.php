<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use \common\components\MyHelper;
use kartik\widgets\DatePicker;
use kartik\select2\Select2;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimpelRekapSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Simpel Kegs');
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    th {
        text-align: center;
        background-color: #9DA39E;
    }
</style>
<div class="simpel-keg-index">
    <div class="block">
        <div class="block-title">
            <ul class="nav nav-tabs ">
                <li  >
                    <a href="<?= Url::to(['simpel-rekap/index']) ?>" >
                        Rekaoitulasi Perjadin</a>
                </li>
                <li  >
                    <a href="<?= Url::to(['simpel-rekap/keg']) ?>" >
                        Rekapitulasi Kegiatan</a>
                </li>
                <li class="active">
                    <a href="<?= Url::to(['simpel-rekap/monikeg']) ?>" >
                        Monitoring Kegiatan </a>
                </li>

        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 align="center" class="panel-title">Monitoring Perjadin</h3>
            </div>
         <?= $this->render('_search') ?>

           
        </div>
         <table class="table table-bordered table-responsive" width="100%">
                <tr height="50">
                    <th rowspan="2" style="color:white;" width="5%">NO</th>
                    <th rowspan="2" style="color:white;" width="30%">Nama Pelaksan / Surat Tugas NIP</th>
                    <th colspan="31" style="color:white;" width="130%">Tanggal Pelaksanaan</th>
                </tr> 
                <tr>
                    <?php for ($i = 01; $i <= 31; $i++) { ?>
                        <th width="10"><?= $i ?></th>

                    <?php } ?>

                </tr>
                
                <?php
                $no = 1;

                foreach ($models as $key) {
                    ?>
                    <tr align="center">
                        <td><?= $no ?></td>
                        <td align="left"><?= \common\components\HelperUnit::Pegawai($key['pegawai_id']) ?></td>
                        <?php for ($i = 01; $i <= 31; $i++) { ?>
                            <td width="10">
                            <?php
                            $tahun = substr($key['tgl_berangkat'], 0,4);
                            $bln = substr($key['tgl_berangkat'],5,2);
                            if($i < 10){
                                $da = '0'.$i;
                            }elseif($i == 20){
                                $da = $i.'0';
                            }elseif($i == 30){
                                $da = $i.'0';
                            }else{
                                $da = $i;
                            }
                            // echo $da;
                            // die();
                            $count = Yii::$app->db->createCommand("SELECT count(pegawai_id) from simpel_personil where pegawai_id=".$key['pegawai_id']." and tgl_berangkat like '%".$tahun.'-'.$bln.'-'.$da."%'")->queryScalar();
                          
                            if($count > 0){ ?>
                            
                                <span class="label label-success" data-toggle="popover" data-html="true" title="Detail Tujuan Keberangkatan"
                                 data-content="
                                 <?php 
                                 $data = \backend\models\SimpelPersonil::find()->where("pegawai_id=".$key['pegawai_id']."  and tgl_berangkat like '%".$_GET['tgl_mulai']."%'")->all();
                                 foreach ($data as $value) {
                                    echo '<b>'.$value->keg->kotaTujuan->nama.'</b> ';
                                        echo "<br/>";
                                        echo $value->keg->nama_keg;
                                        echo "<br/>";
                                        echo "<br/>";
                                 }

                                  ?>"><?= $count.'x' ?></span>
                           <?php }else{
                                echo "";
                            }
                           
                             ?>

                            </td>

                        <?php } ?>


                    </tr>
                    <center>
                  
                    <?php $no++;
                }
                            
                ?>
                </center>
            </table>
    </div>
    <?php 
              echo LinkPager::widget([
                    'pagination' => $pages,

                ]);
                ?>
</div>
<script type="text/javascript">
    document.getElementById('test').addEventListener('change', function () {
        var style = this.value >= 100000? 'block' : 'none';
        document.getElementById('hidden_div').style.display = style;
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'left',
        trigger : 'hover',
        width:'500px',
    });
});
</script>
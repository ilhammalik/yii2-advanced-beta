<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use \common\components\MyHelper;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimpelRekapSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Daftar Rekapitulasi Kegiatan');
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
                <li  >
                    <a href="<?= Url::to(['simpel-rekap/index']) ?>" >
                        Rekaoitulasi Perjadin</a>
                </li>
                <li  class="active">
                    <a href="<?= Url::to(['simpel-rekap/keg']) ?>" >
                        Rekapitulasi Kegiatan</a>
                </li>
                <li>
                    <a href="<?= Url::to(['simpel-rekap/monikeg']) ?>" >
                        Monitoring Kegiatan </a>
                </li>

        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 align="center" class="panel-title"><?= $this->title ?></h3>
            </div>
            <?= $this->render('_search') ?>
            <p align="right">
            <?php Pjax::begin(); ?>
             <?php $form = ActiveForm::begin([ 'action' => ['keg'],'method' => 'post']); ?>
            <input type="hidden" name="cetak" value="cetak">
             <?php echo Html::submitButton(Yii::t('app', 'Cetak'), ['class' => 'btn btn-primary']) ?>
              <?php ActiveForm::end(); ?>
             <?php Pjax::end(); ?>
            </p>
        </div>
        <table width="1000"class="table table-responsive list table-bordered ">

            <tr>
                <th  rowspan="2" width="20">No</th>
                <th  rowspan="2" width="200">No. Surat Penugasan<br/>Tgl Surat Penugasan</th>
                <th  rowspan="2" width="200">Nama / NIP / Gol / Eselon</th>
                <th rowspan="2" align="center">Akun</th>
                <th  width="200" rowspan="2"> Kota Tujuan</th>
                <th  width="130" rowspan="2" >Tanggal </th>
                <th rowspan="2">Lama </th>
                <th  colspan="6"><center>Biaya</center></th>

            </tr>
            <tr>
                <th  width="100">Transport </th>
                <th  width="100" >Taksi</th>
                <th  width="100">Uang Harian</th>
                <th  width="100" rowspan="1">Representatif </th>
                <th width="100" rowspan="1">Penginapan </th>
                <th width="100" rowspan="1">Jumlah </th>
            </tr>
            <?php
            $no = 1;
            foreach ($models as $data) {
                $biaya = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id in (1,2,4,8,6)')->all();
                $count = Yii::$app->db->createCommand("SELECT sum(jml) from simpel_rincian_biaya where personil_id='" . $data->id_personil . "'  and kat_biaya_id in (1,2,4,8,6) ")->queryScalar();
                ?>


                <tr>
                    <td align="center"><?php echo $no; ?></td>
                    <td align="left">
                        <?= $data->no_sp ?><br/>
                        <?= $data->tgl_penugasan ?>
                    </td>
                    <td align="left">

                        <?= $data->pegawai->nama ?> <br/>
                        NIP. <?= $data->pegawai->nip ?><br/>
                        Gol. <?= MyHelper::Gole($data->pegawai->gol_id) ?><br/>
                        Eselon. <?= MyHelper::Eselon(MyHelper::Struk($data->pegawai->struk_id)) ?>
                    </td>
                    <td width="80" align="center"><?= $data->keg->mak ?> </td>
                    <td align="center"><?= $data->keg->kotaTujuan->nama ?></td>
                    <td align="center"><?= substr($data->tgl_berangkat, 8, 2) ?>&nbsp;&nbsp;s/d&nbsp;&nbsp;<?= substr($data->tgl_kembali, 8, 2) ?> &nbsp; <?= MyHelper::BacaBulan(substr($data->tgl_kembali, 5, 2)) ?> <?= substr($data->tgl_kembali, 0, 4) ?></td>
                    <td align="center">
                        <?php
                        $pergi = substr($data->tgl_berangkat, 8, 2);
                        $pulang = substr($data->tgl_kembali, 8, 2);
                        $hitung = $pulang - $pergi + 1;
                        echo $hitung . '  Hari';
                        ?>
                    </td>
                    <?php
                    if (!empty($biaya)) {
                        foreach ($biaya as $key) {
                            ?>

                            <td align="center">
                                <?php
                                if (!empty($key->jml)) {
                                    echo number_format($key->jml, 0, ",", ".");
                                } else {
                                    echo $key->jml;
                                }
                                ?>
                            </td>
                            <? }  }else{ 
                            for ($i=0; $i < 5; $i++) { ?>
                            <td align="center">-</td>
                        <?php } ?>





                    <?php } ?>



                    <td><?= number_format($count, 0, ",", "."); ?></td>



                </tr>






                <?php
                $no++;
            }
            ?>
        </table>

    </div>
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
</div>
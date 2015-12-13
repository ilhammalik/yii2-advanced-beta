<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use \common\components\MyHelper;
?>
<style type="text/css">
    th{
        text-align: center;
    }
    .list{
        border-collapse: collapse;
        width: 130%;
        display: table-header-group;
    }
    .list tr td{
        border: 1px solid black;
        padding: 3px;
        border-collapse: collapse;
    }
    .list tr th{
        text-align: center;
        font-weight: bold;
        border: 1px solid black;
        padding: 10px;
        border-collapse: collapse;
        //background-color: #9DA39E;
        color:black;
    }
    .list tr.even td {
        background-color: #d6eaff;
    }
</style>


<h5 align="center" style="font-weight: bold;">DAFTAR NOMINATIF PERJALANAN DINAS LUAR NEGERI </h5>
<h5 align="center" style="font-weight: bold;"><?= $model->nama_keg ?></h5>
<br/><br/><br/>
<table>
    <tr height="100">
        <td width="700"><p style="font-weight: bold;" align="left"> MAK : <?= $model->mak ?></p></td>
        <td width=""></td>
    </tr>
</table>

<table class="table list table-bordered ">
    <tr>
        <th align="center" rowspan="3" width="20">No</th>
        <th align="center" rowspan="3" width="200">Nama / NIP</th>
        <th rowspan="3" align="center">Pangkat/ Ruang. Gol</th>
        <th align="center" width="20" rowspan="3">Tujuan</th>
        <th align="center" width="100" rowspan="3" >Tanggal <br/>Berangkat <br/> /kembali</th>
        <th rowspan="3" width="10">Lama Hari</th>
        <th align="center" colspan="5">Biaya</th>
        <th align="center" rowspan="3" colspan="1">Jumlah Biaya</th>
    </tr>
    <tr>
        <th align="center" colspan="3" width="100">Transport </th>


        <th align="center" width="100" colspan="2"  rowspan="2">Lumpsum </th>
    </tr>
    <tr>

        <th align="center" width="100">Tiket</th>
        <th align="center" width="100" >Asuransi</th>
        <th align="center" width="100">Airport tax </th>


    </tr>
    <?php
    $no = 1;

    foreach ($model2 as $data) {
        $tiket = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and bukti_kwitansi in(1,2) and  kat_biaya_id=13')->one();
        $asuransi = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and bukti_kwitansi in(1,2) and kat_biaya_id=11')->one();
        $tax = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and bukti_kwitansi in(1,2) and kat_biaya_id=12')->one();
        $lumpsum = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and bukti_kwitansi in(1,2) and kat_biaya_id=14')->one();
        $lumpsum1 = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and bukti_kwitansi in(1,2) and kat_biaya_id=15')->one();
        $lumpsum2 = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and bukti_kwitansi in(1,2) and kat_biaya_id=16')->one();

        $jab = MyHelper::Pangkat($data->pegawai->gol_id);
        ?>
        <tr>
            <td rowspan="3" align="center"><?php echo $no; ?></td>
            <td rowspan="3" align="left">

                <?= $data->pegawai->nama ?> <br/>
                NIP. <?= $data->pegawai->nip ?>
            </td>
            <td rowspan="3" width="80" align="center"><?php echo $jab; ?>  <?= MyHelper::Gole($data->pegawai->gol_id) ?> </td>
            <td rowspan="3" width="100" align="center"><?= \common\components\Myhelper::Negara($model->negara_tujuan) ?>  </td>
            <td rowspan="3" align="center"><?= substr($data->tgl_berangkat, 8, 2) ?>&nbsp;&nbsp;s/d&nbsp;&nbsp;<?= substr($data->tgl_kembali, 8, 2) ?> &nbsp; <?= \common\components\MyHelper::BacaBulan(substr($data->tgl_kembali, 6, 2)) ?> <?= substr($data->tgl_kembali, 0, 4) ?></td>
            <td rowspan="3" align="center"><?= $data->uang_makan ?></td>
            <td rowspan="3" align="center">
                <?php
                if (!empty($tiket->jml)) {
                    echo 'Rp. ' . number_format($tiket->jml, 0, ',', '.');
                } else {
                    echo '-';
                }
                ?>
            </td>
            <td rowspan="3">

                <?php
                if (!empty($asuransi->jml)) {
                    echo 'Rp. ' . number_format($asuransi->jml, 0, ',', '.');
                } else {
                    echo '-';
                }
                ?>
            </td>
            <td rowspan="3">

                <?php
                if (!empty($tax->jml)) {
                    echo 'Rp. ' . number_format($tax->jml, 0, ',', '.');
                } else {
                    echo '-';
                }
                ?>
            </td>
            <td>
                <?php
                if (!empty($lumpsum->jml)) {
                    echo $lumpsum->uraian_rincian;
                } else {
                    echo '-';
                }
                ?>
            </td>
            <td >   <?php
                if (!empty($lumpsum->jml)) {
                    echo 'Rp. ' . number_format($lumpsum->jml, 0, ',', '.');
                } else {
                    echo '-';
                }
                ?>
            </td>

            <td rowspan="3" valign="justify" >
            <center>
            <font >Rp. <?php
             $count = Yii::$app->db->createCommand("SELECT sum(jml) FROM simpel_rincian_biaya where personil_id='".$data->id_personil."' and kat_biaya_id in (11,12,13,14,15,16)" )->queryScalar();
              echo number_format($count, 0, ',', '.');
              ?></font>
              </center>
              </td>

        </tr>
        <tr>
            <td>
                <?php
                if (!empty($lumpsum1->jml)) {
                    echo $lumpsum1->uraian_rincian;
                } else {
                    echo '-';
                }
                ?>
            </td>
             <td >   <?php
                if (!empty($lumpsum1->jml)) {
                    echo 'Rp. ' . number_format($lumpsum1->jml, 0, ',', '.');
                } else {
                    echo '-';
                }
                ?>
            </td>
        </tr>
           <tr>
            <td>
                <?php
                if (!empty($lumpsum2->jml)) {
                    echo $lumpsum2->uraian_rincian;
                } else {
                    echo '-';
                }
                ?>
            </td>
             <td>   <?php
                if (!empty($lumpsum2->jml)) {
                    echo 'Rp. ' . number_format($lumpsum1->jml, 0, ',', '.');
                } else {
                    echo '-';
                }
                ?>
            </td>
         
        </tr>
        
    
       
        <?php
        $no++;
    }
    ?>
   
    
</table>


<table >
    <tr>
        <td style="padding-top:10px;"  align="center" width="300">
            Bendahara Pengeluaran,
        </td>
        <td align="center" width="300"></td>
        <td  align="center" width="300">
            Jakarta, <?= MyHelper::Formattgl($model->tgl_selesai) ?><br/>
            Pejabat Pembuat Komitmen,
        </td>
    </tr>

</table>
<table border="3">
    <tr>
        <td style="padding-top:60px;" align="center" width="300">
            <b><u><?= $model->bpp->nama_cetak ?></u></b><br/>
            NIP. <?= $model->nip_bpp ?> 
        </td>
        <td width="300">
        </td>
        <td align="center" width="300">
    <center>
        <br/><br/><br/><b><u><?= $model->ppk->nama_cetak ?></u></b><br/>
        NIP. <?= $model->nip_ppk ?>
    </center>
</td>
</tr>
<tr height="300">
</table>


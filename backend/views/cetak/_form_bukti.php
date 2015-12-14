<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\components\MyHelper;
?>      

<style type="text/css">
    th{
        text-align: center;
        color: white;
        background-color: gray;
    }
</style>
    <?php
    for ($i=0; $i < 5; $i++) { 
        echo '<br/>';
    }
    ?>
  <h3 align="center">Form Bukti Kehadiran Pelaksanaan Perjalanan Dinas Jabatan <br/>Dalam Kota sampai dengan 8 (delapan) jam</h3>
        <table width="100%" cellpadding="4" cellspacing="0">
    <col width="40">
    <col width="167">
    <col width="104">
    <col width="104">
    <col width="104">
    <col width="104">
    <col width="125">
    <tr valign="top">
        <th rowspan="2" width="40" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.04in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p align="center">No</p>
        </th>
        <th rowspan="2" width="167" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.04in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p align="center">Pelaksana 
            </p>
        </th>
        <th rowspan="2" width="104" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.04in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p align="center">Hari</p>
        </th>
        <th rowspan="2" width="104" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.04in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p align="center">Tanggal 
            </p>
        </th>
        <th colspan="3" width="349" style="border: 1px solid #000000; padding: 0.04in">
            <p align="center">Pejabat / Petugas yang mengesahkan</p>
        </th>
    </tr>
    <tr valign="top">
        <th width="104" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p align="center">Nama</p>
        </th>
        <th width="104" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p align="center">Jabatan</p>
        </th>
        <th width="125" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0.04in">
            <p align="center">Tanda Tangan</p>
        </th>
    </tr>
      <?php
        $no = 1;

    foreach ($model2 as $mode) {
        ?>
    <tr valign="top">
        <td align="center" width="40" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p><br/>
            <?= $no ?>
            </p>
        </td>
        <td align="left" width="167" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p><br/>
            <?= $mode->pegawai->nama_cetak ?>
            </p>
        </td>
        <td width="104" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
              <p><br/>
             <?= \common\components\MyHelper::Hari($mode->tgl_berangkat) ?> s/d  <?= \common\components\MyHelper::Hari($mode->tgl_kembali) ?>
            </p>
        </td>
        <td width="104" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p><br/>
             <?= substr($mode['tgl_berangkat'], 8, 2) . ' -  ' . substr($mode['tgl_kembali'], 8, 2) . '  ' . \common\components\MyHelper::BacaBulan(substr($mode['tgl_berangkat'], 5, 2)) . '  ' . substr($mode['tgl_berangkat'], 0, 4) ?>
            </p>
        </td>
        <td width="104" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p><br/>

            </p>
        </td>
        <td width="104" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
            <p><br/>

            </p>
        </td>
        <td width="125" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0.04in">
            <p><br/>

            </p>
        </td>
    </tr>
        <?php
    $no++;
}
?>

</table>
<p style="margin-bottom: 0in; line-height: 100%"><br/>


<table >
    <tr>
        <td  width="300"></td>
        <td style="padding-top:30px;padding-left:-420px;"  align="center" width="300">
        <br/>
            Pejabat / Petugas yang mengesahkan
        </td>
        <td align="center" width="200"></td>
        <td  align="left" width="300">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>Jakarta, <?=  MyHelper::Formattgl($model->tgl_selesai) ?><br/><br/><br/>
            Pejabat Pembuat Komitmen,
        </td>
    </tr>

</table>
<table>
    <tr>
        <td  width="300"></td>
        <td style="padding-top:30px;padding-left:-170px;" align="left" width="300">
           <br/><br/><b><u><?= $model->bpp->nama_cetak ?></u></b><br/>
            NIP. <?= $model->nip_bpp ?>
        </td>
        <td width="200">
        </td>
        <td style="padding-top:600px;"align="center" width="300">
            <br/><br/><br/><br/><b><u><?= $model->ppk->nama_cetak ?></u></b><br/>
            NIP. <?= $model->nip_ppk ?>
        </td>
    </tr>
    
    </table>

 

</body>


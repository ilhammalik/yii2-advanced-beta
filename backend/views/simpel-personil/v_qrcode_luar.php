<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\components\MyHelper;
?>

<h3 align="center">Pemberitahuan</h3> 
<p align="center">Menyatakan Surat Perjalanan Dinas (SPD) Luar Negri sebagai berikut</p>
<p align="center"><?= $model->keg->nama_keg ?></p>

<center>
    <table width="400">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $model->pegawai->nama_cetak ?></td>

        </tr>
        <tr>
            <td>Kota Negara Asal</td>
            <td>:</td>
            <td><?= \common\components\MyHelper::Negara($model->keg->kota_asal) ?></td>

        </tr>
        <tr>
            <td>Negara Tujuan</td>
            <td>:</td>
            <td><?= \common\components\MyHelper::Negara($model->keg->negara_tujuan) ?></td>

        </tr>
          <tr>
            <td>Kota Negara </td>
            <td>:</td>
            <td><?= $model->keg->kota_negara ?></td>

        </tr>
        <tr>
            <td>Selama</td>
            <td>:</td>
            <td>
                <?php
                $data1 = $model->tgl_berangkat;
                $data2 = $model->tgl_kembali;
                $selisih = ((abs(strtotime($data2) - strtotime($data1))) / (60 * 60 * 24));
                echo $selisih+1 . '  Hari';
                ?>
            </td>


        </tr>
        <tr>
            <td>Tangal</td>
            <td>:</td>
            <td><?= MyHelper::Formattgl($model->tgl_berangkat) ?> s/d <?= MyHelper::Formattgl($model->tgl_kembali) ?></td>

        </tr>
    </table>
    <p>Dengan ini dinyatakan <b>ASLI,</b> Sesuai dari subbag. Perjalanan Dinas - Biro Umum</p>

</center>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?> 
     
<?php
 $no = 1;
$hitung = count($model2);
foreach ($model2 as $data) {
   
    ?>

    <h5 align="center" style="font-weight: bold;">Nominatif Perjalanan Dinas  </h5>
    <h5 align="center" style="font-weight: bold;"><?= $model->maksud ?></h5>
     <br/><br/><br/>
    <table>
        <tr>
            <td width="700"><p style="font-weight: bold;" align="left"> MAK : <?= $model->mak ?></p></td>
            <td width=""><p style="font-weight: bold;" align="left">Kode No. ________</p></td>
        </tr>
    </table>
   
    <table class="table  table-bordered ">
        <tr>
            <th align="center" rowspan="2" width="20">No</th>
            <th align="center" rowspan="2" width="200">Nama / NIP</th>
            <th rowspan="2" align="center">Gol</th>

            <th align="center" width="200" rowspan="2">Tujuan</th>
            <th align="center" width="100" rowspan="2" >Tanggal <br/>Berangkat <br/> /kembali</th>
            <th rowspan="2">Lama Hari</th>
            <th align="center" colspan="5">Biaya</th>
            <th rowspan="2" align="center" width="100"align="center">Jumlah</th>
        </tr>
        <tr>
            <th align="center" width="100">Transport </th>
            <th align="center" width="100" >Uang Harian</th>
            <th align="center" width="100">Uang Harian
                Fullboard </th>
            <th align="center" width="100" rowspan="1">Representatif </th>
            <th align="center" width="100" rowspan="1">Penginapan </th>
        </tr>
        <tr>
            <td align="center"><?php echo $no; ?></td>
            <td align="left">
                
              <?= $data->nama ?> <br/>
                NIP. <?= $data->nip ?>
            </td>
            <td width="80" align="center"><?= $data->gol ?> </td>
            <td align="center"><?= $data->kota->kokab_nama ?> </td>
            <td align="center"><?= $data->pergi ?><br/><?= $data->pulang ?></td>
            <td align="center"><?= $data->uang_makan ?></td>
            <td align="center"><?= $data->trans_pim ?></td>
            <td align="center"><?= $data->uhr ?></td>
            <td align="center"><?= $data->uhr_fb ?></td>
            <td align="center"><?= $data->representatif ?></td>
            <td align="center"><?= $data->penginapan ?></td>
            <td align="center"><?= $data->inap_fb ?></td>
            
        </tr>
        <tr>
            <td align="right" colspan="6">Jumlah :</td>
            <td align="center" ><?= $data->trans_pim ?></td>
            <td align="center" ><?= $data->uhr ?></td>
            <td align="center" ><?= $data->uhr_fb ?></td>
            <td align="center" ><?= $data->representatif ?></td>
            <td align="center" ><?= $data->penginapan ?></td>
            <td align="center" ><?= $data->inap_fb ?></td>
        </tr>
    </table>
    <br/>
    <br/>
    <br/>
    <table >
        <tr>
        <td  width="300"></td>
            <td style="padding-top:60px;"  align="center" width="300">
                Bendahara Pengeluaran Pembantu

            </td>
            <td align="center" width="200"></td>

            <td  align="left" width="300">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jakarta, 14 <?= date('m') ?> <?= date('Y')?><br/><br/><br/><br/>
                Pejabat Pembuat Komitmen,
            </td>

        </tr>
        

    </table>

    <table>
        <tr>
            <td  width="300"></td>
              <td style="padding-top:60px;" align="center" width="300">
                <b><u>Weni Kristiawan, S.AP</u></b><br/>
                NIP. <?= $model->nip_bpp ?> &nbsp;&nbsp;&nbsp;
            </td>
            <td width="200">

            </td>
            <td style="padding-top:600px;"align="left" width="300">
                <br/><br/><br/><br/><b><u><?= $model->ppk ?></u></b><br/>
                NIP. <?= $model->nip_ppk ?>
            </td>
        </tr>
        <tr height="300">

    </table>
    <?php
    if ($no < $hitung){

        echo "<pagebreak>";

    }
    $no++;
}

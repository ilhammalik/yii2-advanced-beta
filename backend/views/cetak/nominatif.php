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


<h5 align="center" style="font-weight: bold;">Daftar Nominatif Perjalanan Dinas  </h5>
<h5 align="center" style="font-weight: bold;"><?= $model->nama_keg ?></h5>
<br/><br/><br/>
<table>
    <tr height="100">
        <td width="700"><p style="font-weight: bold;" align="left"> MAK : <?= $model->mak ?></p></td>
        <td width=""><p style="font-weight: bold;" align="left">Kode No. ________</p></td>
    </tr>
</table>

<table class="table list table-bordered ">
    <tr>
        <th align="center" rowspan="2" width="20">No</th>
        <th align="center" rowspan="2" width="200">Nama / NIP</th>
        <th rowspan="2" align="center">Gol</th>
        <th align="center" width="200" rowspan="2">Tujuan</th>
        <th align="center" width="100" rowspan="2" >Tanggal <br/>Berangkat <br/> /kembali</th>
        <th rowspan="2">Lama Hari</th>
        <th align="center" colspan="6">Biaya</th>
    </tr>
    <tr>
        <th align="center" width="100">Transport </th>
        <th align="center" width="100" >Uang Harian</th>
        <th align="center" width="100">Uang Harian
        Fullboard </th>
        <th align="center" width="100"  rowspan="1">Penginapan </th>

        <th align="center" width="100" rowspan="1">Representatif </th>

        <th align="center" width="100"  rowspan="1">Jumlah </th>
    </tr>
       <?php
        $no = 1;

    foreach ($model2 as $data) {
            $jm = \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and kat_biaya_id in(1,4,5,8,6) ')->all();
        ?>
        <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="left">

            <?= $data->pegawai->nama ?> <br/>
            NIP. <?= $data->pegawai->nip ?>
        </td>
        <td width="80" align="center"><?= MyHelper::Gole($data->pegawai->gol_id) ?> </td>
        <td align="center"><?= $model->kotaAsal->nama ?> </td>
        <td align="center"><?= substr($data->tgl_berangkat, 8, 2) ?>&nbsp;&nbsp;s/d&nbsp;&nbsp;<?= substr($data->tgl_kembali, 8, 2) ?> &nbsp; <?= MyHelper::BacaBulan(substr($data->tgl_kembali, 5, 2)) ?>  <?= substr($data->tgl_kembali, 0, 4) ?></td>
        <td align="center">
            <?php

             $a = substr($data->tgl_kembali, 8,2);
             $b = substr($data->tgl_berangkat, 8,2); 
             echo $a-$b+1; 
            
            ?></td>
        <?php 
        foreach ($jm as $key) { ?>
            
            <?php
                if($key->bukti_kwitansi != 3){
                    if($key->kat_biaya_id == 1){
                        $sql = "SELECT sum(jml) from simpel_rincian_biaya where  personil_id='".$data->id_personil."' and kat_biaya_id in (1,2,3) and bukti_kwitansi in(1,2)" ;
                        $count = Yii::$app->db->createCommand($sql)->queryScalar(); ?>
                        <td align="center"> <?=  number_format($count, 0 ,',','.') ?> </td>
                 <?php }else{ ?>
                <td align="center"> <?= number_format($key->jml, 0 ,',','.') ?> </td>
            <?php   } }else{ ?>
            <td align="center"> -  </td>
            <?php    }
            ?>
      <?php  } ?>
       
        
 <td align="center" ><font >
<?php $count = Yii::$app->db->createCommand("SELECT sum(jml) FROM simpel_rincian_biaya where personil_id='".$data->id_personil."' and kat_biaya_id in (1,2,3,4,5,6,8) and bukti_kwitansi in(1,2)" )->queryScalar();
echo number_format($count, 0 ,',','.');
  ?> 

 </font></td>

    </tr>
    
       <?php
       $no++;
        }
    ?>
    <tr>
        <td colspan="6" align="right">Jumlah :</td>
        <td align="center">
        <?php $total = Yii::$app->db->createCommand("SELECT sum(jml) from simpel_rincian_biaya where  id_kegiatan='".$model->id_kegiatan."' and kat_biaya_id in (1,2,3) and bukti_kwitansi in(1,2)" )->queryScalar();
                    echo number_format($total, 0 ,',','.');
              ?> 
        </td>
        <td align="center">
        <?php $total = Yii::$app->db->createCommand("SELECT sum(jml) from simpel_rincian_biaya where  id_kegiatan='".$model->id_kegiatan."' and kat_biaya_id in (4) and bukti_kwitansi in(1,2)" )->queryScalar();
                    echo number_format($total, 0 ,',','.');
              ?> 
        </td>
        <td align="center">
        <?php $total = Yii::$app->db->createCommand("SELECT sum(jml) from simpel_rincian_biaya where  id_kegiatan='".$model->id_kegiatan."' and kat_biaya_id in (5) and bukti_kwitansi in(1,2)" )->queryScalar();
                    echo number_format($total, 0 ,',','.');
              ?> 
        </td>
        <td align="center">
        <?php $total = Yii::$app->db->createCommand("SELECT sum(jml) from simpel_rincian_biaya where  id_kegiatan='".$model->id_kegiatan."' and kat_biaya_id in (6) and bukti_kwitansi in(1,2)" )->queryScalar();
                    echo number_format($total, 0 ,',','.');
              ?> 
        </td>
        <td align="center">
        <?php $total = Yii::$app->db->createCommand("SELECT sum(jml) from simpel_rincian_biaya where  id_kegiatan='".$model->id_kegiatan."' and kat_biaya_id in (8) and bukti_kwitansi in(1,2)" )->queryScalar();
                    echo number_format($total, 0 ,',','.');
              ?> 
        </td>
        <td align="center">
        <?php $total = Yii::$app->db->createCommand("SELECT sum(jml) from simpel_rincian_biaya where  id_kegiatan='".$model->id_kegiatan."' and kat_biaya_id in (1,2,3,4,5,6,8) and bukti_kwitansi in(1,2)" )->queryScalar();
                    echo number_format($total, 0 ,',','.');
              ?> 
        </td>
       
       
    </tr>
</table>


<table >
    <tr>
        <td style="padding-top:60px;"  align="center" width="300">
            Bendahara Pengeluaran Pembantu
        </td>
        <td align="center" width="300"></td>
        <td  align="center" width="300">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jakarta, <?=  MyHelper::Formattgl($model->tgl_selesai) ?><br/><br/><br/><br/>
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

 
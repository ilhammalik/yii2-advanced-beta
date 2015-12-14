<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use \common\components\MyHelper;

$this->title = Yii::t('app', 'Daftar  Perjalanan Dinas');
?>      
<style type="text/css">
    body{
        font-size: 13px;
    }
</style>
<?php
$no  =1 ;
foreach ($model2 as $data) {

     $transport = \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and kat_biaya_id=1')->one();
        $taksi = \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and kat_biaya_id=2')->one();
        $uhr = \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and kat_biaya_id=4')->one();
        $saku = \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and kat_biaya_id=5')->one();
        $rep = \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and kat_biaya_id=8')->one();
        $inap = \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and kat_biaya_id=6')->one();
      
 ?>



    <table>
    <tr>
        <td>
            <h5 align="left"><img src="<?= Url::to(['/images/logo_bp.png'])?>" width="60px"/></h5>

        </td>
        <td style="font-weight: bold;">
          <b>  BADAN PENGAWAS TENAGA NUKLIR </b><br/>
        Jl. Gajah Mada No. 8 Jakarta Pusat
        </td>
    </tr>
</table>

<table>
    
    <tr>
        <td height="10" width="400"></td>

        <td width="100">Lunas Tanggal</td>
        <td>:</td>
        <td valign="bottom">  <center> _____________________________________</center> </td>
    </tr>
    <tr>
        <td width="400"></td>

        <td>Nomor </td>
        <td>:</td>

        <td valign="bottom">  <center> ______________________________________</center> </td>
    </tr>
    <tr>
        <td width="400"></td>
        <td>MAK  </td>
        <td>:</td>
        <td>  <?= $model->mak ?></td>

    </tr>
</table>
<hr/>
    
    <h4 style="font-weight: bold;" align="center"><b><u>KWITANSI</u></b></h4>
    <h6 align="center">No. <?= $model->no_reg ?></h6>
<table >
    <tbody>
        <tr>      
        <td width="170"> Sudah terima dijakarta   </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;"> Badan Pengawas Tenaga Nuklir </td>

        </tr>
         <tr>      
        <td width="170"> Uang sebesar </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;">
               <?= number_format(MyHelper::CountUper($data->id_personil), 0 ,'.','.') ?>
            </td>

        </tr>
         <tr>      
        <td width="170"> Terbilang   </td>
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;">
            (<?= MyHelper::Terbilang(MyHelper::CountUper($data->id_personil)).' rupiah )' ?>
            </td>

        </tr>
         <tr>      
        <td width="170"><br/> Guna Pembayaran   </td>
          
            <td width="20"><br/> :</td>
            <td width="260">  <br/>Lumpsum  &nbsp;&nbsp;&nbsp;&nbsp; Perjalanan dinas menurut <p style=" border-style: solid;border-top: 1  #050505;"><strike>Kekurangan</strike></p></td>


        </tr>
         <tr>      
        <td width="170"> Surat Perintah dari  </td>
          
            <td width="20"> :</td>
            <td width="460" style="font-weight: bold;"> <?= $data->perintah_dari ?></td>

        </tr>

              <tr>      
        <td width="170" > Tanggal,  <?= MyHelper::Formattgl($data->tgl_berangkat) ?> </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;"> Nomor : <?= $model->no_spd ?></td>

        </tr>

              <tr>      
        <td width="190" > Untuk perjalanan dinas dari  </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;"><?= $model->kotaAsal->nama ?> ke :  <?= $model->kotaTujuan->nama ?>  ,  <?= $model->kotaTujuan->provinsi->nama ?></td>

        </tr>
       
               <tr>      
        <td width="170" > Nama  </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;"><?= $data->pegawai->nama_cetak ?> </td>

        </tr>
       
               <tr>      
        <td width="170"> Golongan/Pangkat/Jabatan : </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;">
             <?php
                    $jab = MyHelper::Jab($data->pegawai->struk_id);
                    $gol = MyHelper::Gole($data->pegawai->gol_id);
                    $pangkat = MyHelper::Pangkat($data->pegawai->gol_id);
                    $unit1= MyHelper::Unit($data->pegawai->unit_id);
                    $unit2=str_replace(array('Deputi','Sekretariat Utama','Direktorat','Biro','Pusat','Inspektorat','Subdirektorat','Bidang','Bagian','Balai','Subbagian','Seksi','Kelompok'),array('','','','','','','','','','','','',''),$unit1);
                    $jabatan1=$gol.' / '.$pangkat.'  / '.$jab." ".$unit1;
                    $jabatan2=$gol.' / '.$pangkat.'  / '.$jab." ".$unit2;
                    if(!$jab) {$inst="-";}else{$inst='BAPETEN';}
                    if($jab=="Staf") {echo $jabatan1." ";} elseif($jabatan2){echo $jabatan2." ";} else {echo "- ";} 
                ?>
             </td>

        </tr>
       
               <tr>      
        <td  width="170"> Tempat Kedudukan  </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;"> Jakarta</td>

        </tr>
       


    </tbody>
</table> 

<table>
    
    <tr>
        <td height="20" width="400"></td>

        <td width="300">Jakarta, <?= MyHelper::Formattgl($data->tgl_kembali) ?><br/>
Yang bepergian,</td>
    </tr>
    <tr>
       
        <td height="20" width="400"></td>

        <td style="padding-top:10px;font-weight: bold;" align="center"width="400"><br/><br/><br/><br/><b><u>(<?= $data->pegawai->nama_cetak ?>)</u><br/>NIP : <?= $data->pegawai->nip ?> </td>

    </tr>
   
</table>
    <table>
    <tr>
        <td>
            <h5 align="left"><img src="<?= Url::to(['/images/logo_bp.png'])?>" width="60px"/></h5>

        </td>
        <td style="font-weight: bold;">
          <b>  BADAN PENGAWAS TENAGA NUKLIR </b><br/>
        Jl. Gajah Mada No. 8 Jakarta Pusat
        </td>
    </tr>
</table>

<table>
    
    <tr>
        <td height="10" width="400"></td>

        <td width="100">Lunas Tanggal</td>
        <td>:</td>
         <td valign="bottom">  <center> _____________________________________</center> </td>
    </tr>
    <tr>
        <td width="400"></td>

        <td>Nomor </td>
        <td>:</td>

         <td valign="bottom">  <center> _____________________________________</center> </td>
    </tr>
    <tr>
        <td width="400"></td>
        <td>MAK  </td>
        <td>:</td>
        <td>  <?= $model->mak ?></td>

    </tr>
</table>
<hr/>
    
 <h4 style="font-weight: bold;" align="center"><b><u>KWITANSI</u></b></h4>
    <h6 align="center">No. <?= $model->no_reg ?></h6>
<table >
    <tbody>
        <tr>      
        <td width="170"> Sudah terima dijakarta </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;"> Badan Pengawas Tenaga Nuklir </td>

        </tr>
         <tr>      
        <td width="170"> Uang sebesar </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;">     <?= number_format(MyHelper::CountUper($data->id_personil), 0 ,'.','.') ?> </td>

        </tr>
         <tr>      
        <td width="170"> Terbilang   </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;">
          ( <?= MyHelper::Terbilang(MyHelper::CountUper($data->id_personil)).' '.'  rupiah )' ?>

           </td>

        </tr>
         <tr>      
        <td width="170"><br/> Guna Pembayaran   </td>
          
            <td width="20"><br/> :</td>
            <td width="260">  <br/>Lumpsum &nbsp;&nbsp;&nbsp;&nbsp; Perjalanan dinas menurut <p style=" border-style: solid;border-top: 1  #050505;"><strike>Kekurangan</strike></p></td>

        </tr>
         <tr>      
        <td width="170"> Surat Perintah dari  </td>
          
            <td width="20"> :</td>
            <td width="460" style="font-weight: bold;"><?= $data->perintah_dari ?></td>

        </tr>

         <tr>      
        <td width="170" > Tanggal,  <?= MyHelper::Formattgl($data->tgl_berangkat) ?> </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;"> Nomor : <?= $model->no_spd ?></td>

        </tr>

              <tr>      
        <td width="190" > Untuk perjalanan dinas dari  </td>
          
            <td width="20"> :</td>
           <td width="260" style="font-weight: bold;"> <?= $model->kotaAsal->nama ?> ke :  <?= $model->kotaTujuan->nama ?>  ,  <?= $model->kotaTujuan->provinsi->nama ?></td>

        </tr>
       
               <tr>      
        <td width="170" > Nama  </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;"><?= $data->pegawai->nama_cetak ?> </td>

        </tr>
       
               <tr>      
        <td width="170"> Golongan/Pangkat/Jabatan : </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;">
                 <?php
                    $jab = MyHelper::Jab($data->pegawai->struk_id);
                    $gol = MyHelper::Gole($data->pegawai->gol_id);
                    $pangkat = MyHelper::Pangkat($data->pegawai->gol_id);
                    $unit1= MyHelper::Unit($data->pegawai->unit_id);
                    $unit2=str_replace(array('Deputi','Sekretariat Utama','Direktorat','Biro','Pusat','Inspektorat','Subdirektorat','Bidang','Bagian','Balai','Subbagian','Seksi','Kelompok'),array('','','','','','','','','','','','',''),$unit1);
                    $jabatan1=$gol.' / '.$pangkat.'  / '.$jab." ".$unit1;
                    $jabatan2=$gol.' / '.$pangkat.'  / '.$jab." ".$unit2;
                    if(!$jab) {$inst="-";}else{$inst='BAPETEN';}
                    if($jab=="Staf") {echo $jabatan1." ";} elseif($jabatan2){echo $jabatan2." ";} else {echo "- ";} 
                ?>


             </td>

        </tr>
       
               <tr>      
        <td  width="170"> Tempat Kedudukan  </td>
          
            <td width="20"> :</td>
            <td width="260" style="font-weight: bold;"> Jakarta</td>

        </tr>
       


    </tbody>
</table> 
<table>
    
    <tr>
        <td height="20" width="400"></td>

        <td width="300">Jakarta, <?= MyHelper::Formattgl($model->tgl_selesai) ?><br/>
Yang bepergian,</td>
    </tr>
    <tr>
       
        <td height="20" width="400"></td>

        <td style="padding-top:10px;font-weight: bold;" align="center"width="400"><br/><br/><br/><br/><b><u>(<?= $data->pegawai->nama_cetak ?>)</u><br/>NIP : <?= $data->pegawai->nip ?> </td>

    </tr>
   
</table>
<?php

if ($no < $count) {
       echo '<p style="margin-bottom: 0in; line-height: 100%; page-break-before: always"> </p>';
    } else {
       echo '<p style="margin-bottom: 0in; line-height: 100%; page-break-after:avoid"> </p>';
    }
    $no++;

}       

?>

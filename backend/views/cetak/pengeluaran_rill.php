<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\components\MyHelper;

?>
<style type="text/css">
        @page { margin: 0.79in }
        p { margin-bottom: 0.1in; line-height: 120% }
        td p { margin-bottom: 0in }
        a:link { so-language: zxx }
    </style>
<style type="text/css">
body{
    font-family: Times;
}
    .list{

        border-collapse: collapse;
        width: 100%;
        display: table-header-group;
        border: 1px solid black;
    }
    .list tr {
        border-left: 1px solid black;
        border-right: 1px solid black;
        text-align: center; 
        
        padding: 4px;
    }
    .list tr th{
        text-align: center; 
        font-weight: bold;
        border-top: 1px solid black;
        border-box: 1px solid black;
        padding: 5px;

        border-collapse: collapse;
        color:black;
    }
    .list tr.even td {
        background-color: #d6eaff;
    }
    .bold{
        font-weight: bold;
    }
</style>
<?php
$no = 1;
$hitung = count($model2);
foreach ($model2 as $mode) {
    ?>
<h5 align="center"><img align="center" width="10" src="<?= Url::to(['/images/logo_bp.png'])?>" width="90px"></h5>
<div align="center" style="font-size:17px;"><b class="bold"><u>BADAN PENGAWAS TENAGA NUKLIR</u></b></div>
<div align="center" style="font-size:14px;"><b class="bold">Jl. Gajah Mada No. 8 Jakarta Pusat</b></div>
<br>
<style>
    th { border:1px solid #000; }
</style>
<h6 align="center" class="bold"><u>DAFTAR PENGELUARAN RIIL</u></h6> <br>

<table width="100%">
    <tr>
        <td colspan="4" height="30">Yang bertandatangan di bawah ini:</td>
    </tr>
    <tr>
        <td width="5%">&nbsp;</td>
        <td width="16%">Nama</td>
        <td width="4%">:</td>
        <td><b class="bold"><?= $mode->pegawai->nama_cetak ?></b></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>NIP</td>
        <td>:</td>
        <td><b class="bold"><?= $mode->pegawai->nip ?></b></td>
    </tr>
    <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top">Jabatan</td>
        <td valign="top">:</td>
        <td valign="top"><b class="bold">
        <?php
           $jab = MyHelper::Jab($mode->pegawai->struk_id);
    $unit1= MyHelper::Unit($mode->pegawai->unit_id);
    $unit2=str_replace(array('Deputi','Sekretariat Utama','Direktorat','Biro','Pusat','Inspektorat','Subdirektorat','Bidang','Bagian','Balai','Subbagian','Seksi','Kelompok'),array('','','','','','','','','','','','',''),$unit1);
    $jabatan1=$jab." ".$unit1;
    $jabatan2=$jab." ".$unit2;
            if(!$jab) {$inst="-";}else{$inst='BAPETEN';}
            if($jab=="Staf") {echo $jabatan1." ";} elseif($jabatan2){echo $jabatan2." ";} else {echo "- ";} 
        ?>
       </b></td>
    </tr>
    <tr>
        <td style=" font-size: 14px;" colspan="4" align="justify" height="60">
            berdasarkan Surat Perjalanan Dinas (SPD) Nomor: <b class="bold"><?= $model->no_spd ?></b> tanggal <b class="bold"><?= \common\components\MyHelper::Formattgl($mode->tgl_berangkat) ?></b>, 
            dengan ini kami menyatakan dengan sesungguhnya bahwa:
        </td>
    </tr>
    <tr>
        <td valign="top" height="60">1.&nbsp;</td>
        <td colspan="3" align="justify" valign="top">
            Biaya transport pegawai dan/atau biaya penginapan di bawah ini yang tidak 
            dapat diperoleh bukti-bukti pengeluarannya, meliputi:
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3" align="justify">
            <table width="100%" cellpadding="4" cellspacing="0">
    <colgroup><col width="19*">
    <col width="180*">
    <col width="57*">
    </colgroup><tbody>
        <tr valign="top">
            <td width="7%" style="border-top: 2px solid black; font-weight: bold; text-align: center; border-bottom: 2px solid black; border-left: 2px solid black; border-right: none; padding-top: 0.04in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
                <p align="center">No</p>
            </td>
            <td width="70%" style="border-top: 2px solid black; font-weight: bold;  text-align: center; border-bottom: 2px solid black; border-left: 2px solid black; border-right: none; padding-top: 0.04in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
                <p align="center">Uraian</p>
            </td>
            <td width="22%" style="border: 2px solid black;  font-weight: bold;  text-align: center; padding: 0.04in">
                <p align="center">Jumlah</p>
            </td>
        </tr>
    </tbody>
    <tbody>
          <?php 
                $rincian =  \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$mode->id_personil.' and bukti_kwitansi=2')->all();
                
              $n = 1;
                foreach ($rincian as $key) { ?>
                <tr valign="top">
                    <td valign="top" width="7%" style="border-top: none; text-align:center; border-bottom: none; border-left: 2px solid black; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.04in; padding-right: 0in">
                        <p align="center"><?= $n ?> </p> <br/><br/>
                    </td>
                    <td valign="top" width="70%" style="border-top: none; border-bottom: none; border-left: 2px solid black; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.04in; padding-right: 0in">
                        <p style="padding-top:-30px;">
                            <?= $key->label ?>
                        </p>
                    </td>
                    <td valign="top" width="22%" style="text-align:center;border-top: none; border-bottom: none; border-left: 2px solid black; border-right: 2px solid black; padding: 0in 0.04in">
                        <p>
                            Rp. <?= number_format($key->jml, 0, ",", ".")?>
                        </p>
                    </td>
                </tr>
               
                          
                   
             <?php $n++; } ?>
        
      
    </tbody>
    <tbody>
  
        <tr valign="top">
            <td width="7%" style="border-top: 2px solid black; border-bottom: 2px solid black; border-left: 2px solid black; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
                <p align="center"><br>

                </p>
            </td>
            <td width="70%" style="border-top: 2px solid black; border-bottom: 2px solid black; border-left: 2px solid black; border-right: none; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
                <p align="right">Jumlah:</p>
            </td>
            <td width="22%" style="text-align:center;border-top: 2px solid black; border-bottom: 2px solid black; border-left: 2px solid black; border-right: 2px solid black; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0.04in">
                <p>Rp.<?php
                     $count = Yii::$app->db->createCommand("SELECT sum(jml) FROM simpel_rincian_biaya where bukti_kwitansi=2 and personil_id='".$mode->id_personil."'")->queryScalar();
                echo number_format($count,0,',','.');
               ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td valign="top" height="70">2.&nbsp;</td>
        <td colspan="3" align="justify" valign="top">
            <p>Jumlah uang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk 
            pelaksanaan Perjalanan Dinas dimaksud dan apabila di kemudian hari terdapat 
            kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut 
            ke Kas Negara.</p>
        </td>
    </tr>
    <tr>
        <td colspan="4" align="justify">
            Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.
        </td>
    </tr>
</table>

<br>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tr>
        <td width="60%">
        <br/>
        <br/>
            Mengetahui/Menyetujui: <br> 
            Pejabat Pembuat Komitmen, <br><br><br><br><br>
            <center>
            <p class="bold"><u><?= $model->ppk->nama_cetak ?> </u> </p> 
           <p align="center"> NIP. <?= $model->ppk->nip ?></p>
           </center>
        </td>
        <td width="">
        <p style="padding-top:-400px"> Jakarta, <?= \common\components\MyHelper::Formattgl($mode->tgl_kembali) ?></p> <br> 
            Pelaksana SPD, <br><br><br><br><br>
             <center>
            <b class="bold"><u><?= $mode->pegawai->nama_cetak ?></u> <br> 
            NIP. <?= $mode->pegawai_id ?></b>
        </center>
        </td>
    </tr>
</table>


<?php
 if ($no < $hitung){

        echo "<pagebreak>";

    }
    $no++;
}

?>


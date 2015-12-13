<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use \common\components\MyHelper;
?>      

<style type="text/css">
.div {
   
    border: 2px solid black;
    margin-bottom: 10px;
    margin-left: 10px;
    
}
    .bold{
        font-weight: bold;
    }
    body{
        font-family: Times ;
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
        background-color: #3c8dbc;
        color:#fff;
    }
    .list tr.even td {
        background-color: #d6eaff;
    }




    .lis{

        border-collapse: collapse;
        width: 100%;
        display: table-header-group;

    }
    .lis tr td{
        border: 1px solid black;
        padding: 0px;
        border-collapse: collapse;
    }
    .lis tr th{
        text-align: center; 
        font-weight: bold;
        border: 1px solid black;
        padding: 0px;
        border-collapse: collapse;
        background-color: #3c8dbc;
        color:#fff;
    }
    .lis tr.even td {
        background-color: #d6eaff;
    }

    .noborder{
        border:none;
    }
    .noborder td {
        border:none;
    }

    .noborder tr td {
        border:none;
    }

</style>

<?php
    $no = 1;
$hitung = count($model2);
foreach ($model2 as $mode) {

    $cetak = \backend\models\SimpelKeg::find()->where('id_kegiatan=' . $model->id_kegiatan.' and mak like  \'%'.'524111'.'%\'')->one();
    
    ?>


    <h5 style="font-weight: bold;" align="left"><b>
            <i>BADAN PENGAWAS TENAGA NUKLIR</i> <br/>

    </h5>
    <p style="padding-top:-10px; margin-left:50">&nbsp;Jl. Gajah Mada No. 8 Jakarta Pusat</b></p>
    <p style="padding-top:-20px; margin-left:80">&nbsp;Ministry / Institution</p>
    <table cellspacing="0" cellpadding="0" style="margin-top:-1000px;">

        <tr>

            <td width="450"></td>

            <td>
                <table style="margin-top:-40px;">

                    <tr>
                        <td width="100">Lembar Ke</td>
                        <td>:</td>

                        <td> <?= '  '.$no. Myhelper::Terbilang($no) ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><i>Sheet No.</i></td>

                    </tr>
                    <tr>
                        <td>Kode No </td>
                        <td>:</td>

                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3"><i>Code No.</i></td>

                    </tr>
                    <tr>
                        <td>Nomor  </td>
                        <td>:</td>
                        <td></td>

                    </tr>
                    <tr>
                        <td colspan="3"><i>Number</i></td>

                    </tr>
                </table></td>
        </tr>

    </table>

    <h6 align="center" style="font-weight: bold;"><u>SURAT PERJALANAN DINAS (SPD)</u></h6>
    <h6 align="center"><i>LETTER OF OFFICAL TRAVEL</i></h6>

    <table  width="100%" class='list'>
        <tbody>
            <tr>                
                <td height="30" width='10'>1</td>
                <td colspan="3" height="30" width="260"> <u>F Pembuat Komitmen</u><br/><i>Authorizing Officer</i></td>
    <td valign="top" height="30" colspan="3"> <?= $model->ppk->nama ?></td>

    </tr>
    <tr>
        <td height="30">2</td>
        <td  colspan="3" height="30" width="240"><u>Nama / Nip Pegawai yang melaksanakan Perjalanan Dinas</u><br/>Name / Employee Register Number of the assigned officer</td>
    <td valign="top" height="30" colspan="3">
    <?= $mode->pegawai->nama ?> <br/>
    NIP. <?= $mode->pegawai_id ?>
    </td>

    </tr>

    <tr>
        <td height="30">2</td>
        <td colspan="3" height="50">
            
            a. <u>Pangkat dan Golongan</u><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;Officer rank <br/>
    b. <u>Jabatan / Instansi</u><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;Position / Institution<br/>

    c. <u>Tingkat Biaya Perjalanan Dinas</u><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;Level of Official Travel Expanse  <br/>

    
    </td>
    <td valign="top" height="30" colspan="3">
    <p style="padding-top:-10px;">  a. <?= MyHelper::Gole($mode->pegawai->gol_id) ?></p><br/>
    <p style="padding-top:-10px;">  b. <?= MyHelper::Jab($mode->pegawai->struk_id) ?> </p><br/>
    <p style="padding-top:-10px;">  c. <?= \common\components\Myhelper::Tingkat($mode->tingkat_id) ?></p><br/>

    </td>

    </tr>

    <tr>
        <td>4</td>
        <td colspan="3" height="30">Maksud Perjalanan Dinas<br/> Purpose of Travel  </td>

        <td colspan="3"><?= $model->nama_keg ?>,<br/></td>

    </tr>

    <tr>
        <td>5</td>
        <td colspan="3" height="30"><u>Alat angkut yang dipergunakan</u><br/>Made of transportion</td>

    <td colspan="3"><?= $mode->kend->nama ?></td>

    </tr>

    <tr>
        <td>6</td>
        <td colspan="3" height="50">
            
            a. <u>Tempat Berangkat</u><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;Point of Departure<br/>
    b. <u>Tempat Tujuan</u><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;Point of Destination<br/>

    
    </td>

    <td valign="top" colspan="3">
          <p style="padding-top:-10px;">  a. <?= \common\components\Myhelper::Negara($model->kota_asal) ?></p><br/>
    <p style="padding-top:-10px;">  b.  <?= \common\components\Myhelper::Negara($model->negara_tujuan) ?> </p><br/>
    </td>

    </tr>

    <tr>
        <td>7</td>
        <td colspan="3" height="60">
            
            a. <u>Lama Perjalanan Dinas</u><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;Duration of Official Travel<br/>

    b. <u>Tanggal Berangkat</u><br/> 
    &nbsp;&nbsp;&nbsp;&nbsp;Date of Departure<br/>

    c. <u>Tanggal harus kembali/tiba ditempat baru *)</u><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;End of assignment Date/Start of assignment date<br/>



    
    </td>

    <td valign="top" colspan="3">
        <p style="padding-top:0px;"> 
         a. <?php 
         $dat = substr($mode->tgl_kembali, 8 ,2)-substr($mode->tgl_berangkat, 8, 2);
         echo $dat+1 .' ( '.Myhelper::Terbilang($dat+1).' ) Hari' ; ?></p><br/>
    <p style="padding-top:0px;">  b.  <?= MyHelper::Formattgl($mode->tgl_berangkat) ?> </p><br/>
    <p style="padding-top:0px;">  c.  <?= MyHelper::Formattgl($mode->tgl_kembali) ?> </p><br/>
    </td>

    </tr>

    <tr>
        <td>
            
            8
            
        </td>
        <td width="10%"> <center> <u>Pengikut:</u>  <br/>Companion &nbsp;&nbsp;&nbsp;</center></td>
    <td colspan="2" width="250"><u>Nama</u><br/> <i>Name</i></td>

    <td  ><center><u>Tanggal Lahir</u><br/><i>Date of Birth</i></center> </td>
    <td  colspan="2"><center><u>Keterangan</u><br/><i>Note</i></center> </td>


    </tr>

    <tr>
        <td></td>
        <td height="80">
            <center>
            1. <br/>
            2. <br/>
            3. 
        </center>
            
        </td>
        <td colspan="2"></td>
        <td></td>
        <td colspan="2"></td>


    </tr>

    <tr>
        <td valign="top">9</td>
        <td colspan="3" height="50">
            
    <u>Pembebanan Anggaran: </u><br/>
    &nbsp;&nbsp; <u>Budget Allocation</u><br/>
    a. <u>Instansi<u> <br/>
            &nbsp;&nbsp; Institution<br/>
            b. <u>Akun</u><br/>
            &nbsp;&nbsp; Code of Account 
            
            </td>
            <td colspan="3"><p>a. &nbsp;&nbsp;&nbsp; <span style="font-wieght: bold;"></span>Badan Pengawas Tenaga Nuklir <br/><br/> <p> b. &nbsp;&nbsp;&nbsp; <?= $model->mak ?>  </p><br/></td>

            </tr>

            <tr>
                <td>10</td>
                <td colspan="3">                 
            <u>Keterangan Lain-lain</u><br/>Additional Note</td>
            <td colspan="3" ></td>

            </tr>



            </tbody>
            </table> 
            <br/>
            <br/>
            <table  border="3" width="100%" >
                <tr>
                    <td style="padding-top: -20px"width="10%"><u><b>*) Coret yang tidak perlu</b></u><br/>Cross if not Applicable</td>
                    <td  style="padding-top: -30px"><u><b>Dikeluarkan di</b></u></td>
                <td style="padding-top: -20px;padding-left: -30px;" >: </td>
                <td style="padding-top: -30px;padding-left: -15px;"><br/><?= $model->kotaAsal->nama ?></td>
                </tr>
                <tr>
                    <td width="30%">
                    </td>
                    <td style="padding-top: -10px" align="left">
                      <i>Please of Insurance</i>
                    </td>
                </tr>
                <tr>
                    <td width="30%"></td>
                    <td style="padding-top:10px;"> <u><b>Tanggal<br/>  <i> Date of Inssuance</i> </td>
               <td style="padding-top: -10px;padding-left: -30px;" >:</td>
                <td style="padding-left: -15px;"><?= \common\components\MyHelper::Formattgl(date('Y-m-d')) ?></td>
                </tr>
                <tr>
                    <td width="65%" style="padding-left: 65px;"><img src="<?= Url::to(['simpel-personil/qrcod','id'=>$mode->id_personil]) ?>" width="150px"/></td>
                    <td style="padding-top:-30px;"colspan="3"><br/><u><b>Pejabat Pembuat Komitmen<br/>Authorizing Officer</b></u><br/><br/><br/><br/><br/></td>

                </tr>

                <tr>
                    <td width="30%"></td>
                    <td style="padding-top:10px;" colspan="3">
                        <h6 style="font-weight: bold;"><u><?= $model->ppk->nama ?></u></h6>
                    </td>
                </tr>
                <tr>
                    <td width="50%"></td>
                    <td style="padding-top:10px;" ><h6 style="font-weight: bold;">NIP : <?= $model->ppk->nip ?></h6>
                    </td>

                </tr>

            </table>
            <pagebreak>
            <br/>
            <div class="div">
<br/>
<br/>
<table width="826" cellpadding="4" cellspacing="0">
    <colgroup><col width="27">
    <col width="126">
    <col width="7">
    <col width="203">
    <col width="14">
    <col width="34">
    <col width="126">
    <col width="6">
    <col width="211">
    </colgroup><tbody><tr valign="top">
        <td valign="top" rowspan="5" width="27" style="border: none; padding: 0in">
            <p ><font face="Arial, sans-serif">&nbsp;&nbsp;&nbsp;I.</font></p>
        </td>
        <td width="126" style="border: none; padding: 0in">
             <p><font class="bold" face="Arial, sans-serif">Tiba di    </font>
            </p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Arrival
            at</font></font></p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:  </font>
            </p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p><br>
                <?= Myhelper::Negara($model->kota_asal) ?>
            </p>
        </td>
        <td rowspan="5" width="14" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td valign="top" rowspan="5" width="34" style="border: none; padding: 0in">
            <p align="center"><font face="Arial, sans-serif">II.</font></p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Berangkat dari</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Departure
            from</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p><br>
                <?= Myhelper::Negara($model->negara_tujuan) ?>
            </p>
        </td>
    </tr>
    <tr valign="top">
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Pada Tanggal    </font>
            </p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Date
             </font></font>
            </p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p><br>
                <?= Myhelper::Formattgl($mode->tgl_berangkat) ?>
            </p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Ke</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">To</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>
               
            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p><br>
                 <?= Myhelper::Negara($model->kota_asal) ?>
            </p>
        </td>
    </tr>
    <tr valign="top">
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Kepala Kantor</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Head
            of Office</font></font></p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><font face="Arial, sans-serif">. . . . . . . . .
            . . . . . . . . . . . . . . . . . .</font>
            </p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Pada Tanggal</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Date</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p align="center"><br>
                <?= Myhelper::Formattgl($mode->tgl_kembali) ?>
            </p>
            <p align="center"><font face="Arial, sans-serif"></font></p>
        </td>
    </tr>
    <tr valign="top">
        <td width="126" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Kepala Kantor</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Head
            of Office</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>

            <p align="center"><font face="Arial, sans-serif">. . . . . . . . .
            . . . . . . . . . . . . . . . . . .</font>
            </p>
        </td>
    </tr>
    <tr valign="top">
        <td colspan="3" width="352" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><br>

            </p>
            <p><br>

            </p>
            <br/><br/><br/><br/><br/><p align="center"><font face="Arial, sans-serif">(. . . . . . . .
            . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )</font></p>
            <p>  <font face="Arial, sans-serif"><font size="2" style="font-size: 9pt">NIP</font></font></p>
        </td>
        <td colspan="3" width="359" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><br>

            </p>
            <p align="center"><br>

            </p>
            <br/><br/><br/><br/><br/><p align="center"><font face="Arial, sans-serif">(. . . . . . . .
            . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )</font></p>
            <p>  <font face="Arial, sans-serif"><font size="2" style="font-size: 9pt">NI</font><font size="2" style="font-size: 9pt">P</font></font></p>
        </td>
    </tr>
</tbody></table>
<p style="margin-bottom: 0in; line-height: 100%"><br>

</p>
<table width="826" cellpadding="4" cellspacing="0">
    <colgroup><col width="27">
    <col width="126">
    <col width="7">
    <col width="203">
    <col width="14">
    <col width="34">
    <col width="126">
    <col width="6">
    <col width="211">
    </colgroup><tbody><tr valign="top">
        <td valign="top" rowspan="5" width="27" style="border: none; padding: 0in">
            <p align="center"><font face="Arial, sans-serif">&nbsp;&nbsp;&nbsp;III.</font></p>
        </td>
        <td width="126" style="border: none; padding: 0in">
             <p><font class="bold" face="Arial, sans-serif">Tiba di    </font>
            </p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Arrival
            at</font></font></p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:  </font>
            </p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td rowspan="5" width="14" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td valign="top" rowspan="5" width="34" style="border: none; padding: 0in">
            <p align="center"><font face="Arial, sans-serif">IV.</font></p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Berangkat dari</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Departure
            from</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
    </tr>
    <tr valign="top">
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Pada Tanggal    </font>
            </p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Date
             </font></font>
            </p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Ke</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">To</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
    </tr>
    <tr valign="top">
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Kepala Kantor</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Head
            of Office</font></font></p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><font face="Arial, sans-serif">. . . . . . . . .
            . . . . . . . . . . . . . . . . . .</font>
            </p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Pada Tanggal</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Date</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><font face="Arial, sans-serif"></font></p>
        </td>
    </tr>
    <tr valign="top">
        <td width="126" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Kepala Kantor</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Head
            of Office</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><font face="Arial, sans-serif">. . . . . . . . .
            . . . . . . . . . . . . . . . . . .</font>
            </p>
        </td>
    </tr>
    <tr valign="top">
        <td colspan="3" width="352" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><br>

            </p>
            <p><br>

            </p>
            <br/><br/><br/><br/><br/><p align="center"><font face="Arial, sans-serif">(. . . . . . . .
            . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )</font></p>
            <p>  <font face="Arial, sans-serif"><font size="2" style="font-size: 9pt">NIP</font></font></p>
        </td>
        <td colspan="3" width="359" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><br>

            </p>
            <p align="center"><br>

            </p>
            <br/><br/><br/><br/><br/><p align="center"><font face="Arial, sans-serif">(. . . . . . . .
            . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )</font></p>
            <p>  <font face="Arial, sans-serif"><font size="2" style="font-size: 9pt">NI</font><font size="2" style="font-size: 9pt">P</font></font></p>
        </td>
    </tr>
</tbody></table>
<p style="margin-bottom: 0in; line-height: 100%"><br>

</p>
<p style="margin-bottom: 0in; line-height: 100%"><br>

</p>
<table width="826" cellpadding="4" cellspacing="0">
    <colgroup><col width="27">
    <col width="126">
    <col width="7">
    <col width="203">
    <col width="14">
    <col width="34">
    <col width="126">
    <col width="6">
    <col width="211">
    </colgroup><tbody><tr valign="top">
        <td valign="top" rowspan="5" width="27" style="border: none; padding: 0in">
            <p align="center"><font face="Arial, sans-serif">&nbsp;&nbsp;&nbsp;V.</font></p>
        </td>
        <td width="126" style="border: none; padding: 0in">
             <p><font class="bold" face="Arial, sans-serif">Tiba di    </font>
            </p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Arrival
            at</font></font></p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:  </font>
            </p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td rowspan="5" width="14" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td valign="top" rowspan="5" width="34" style="border: none; padding: 0in">
            <p align="center"><font face="Arial, sans-serif">VI.</font></p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Berangkat dari</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Departure
            from</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
    </tr>
    <tr valign="top">
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Pada Tanggal    </font>
            </p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Date
             </font></font>
            </p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Ke</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">To</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
    </tr>
    <tr valign="top">
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Kepala Kantor</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Head
            of Office</font></font></p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><font face="Arial, sans-serif">. . . . . . . . .
            . . . . . . . . . . . . . . . . . .</font>
            </p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Pada Tanggal</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Date</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><font face="Arial, sans-serif"></font></p>
        </td>
    </tr>
    <tr valign="top">
        <td width="126" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td width="7" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td width="203" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
        </td>
        <td width="126" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif">Kepala Kantor</font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Head
            of Office</font></font></p>
        </td>
        <td width="6" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="211" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><font face="Arial, sans-serif">. . . . . . . . .
            . . . . . . . . . . . . . . . . . .</font>
            </p>
        </td>
    </tr>
    <tr valign="top">
        <td colspan="3" width="352" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><br>

            </p>
            <p><br>

            </p>
            <br/><br/><br/><br/><br/><p align="center"><font face="Arial, sans-serif">(. . . . . . . .
            . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )</font></p>
            <p>  <font face="Arial, sans-serif"><font size="2" style="font-size: 9pt">NIP</font></font></p>
        </td>
        <td colspan="3" width="359" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><br>

            </p>
            <p align="center"><br>

            </p>
            <br/><br/><br/><br/><br/><p align="center"><font face="Arial, sans-serif">(. . . . . . . .
            . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )</font></p>
            <p>  <font face="Arial, sans-serif"><font size="2" style="font-size: 9pt">NI</font><font size="2" style="font-size: 9pt">P</font></font></p>
        </td>
    </tr>
</tbody></table>
<p style="margin-bottom: 0in; line-height: 100%"><br>

</p>
<table width="826" cellpadding="4" cellspacing="0">
    <colgroup><col width="27">
    <col width="155">
    <col width="13">
    <col width="168">
    <col width="14">
    <col width="34">
    <col width="359">
    </colgroup><tbody><tr valign="top">
        <td valign="top" rowspan="4" width="27" style="border: none; padding: 0in">
            <p align="center"><font face="Arial, sans-serif">&nbsp;&nbsp;VII.</font></p>
        </td>
        <td width="155" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif"><font size="1" style="font-size: 8pt">Tiba
            di Tempat Kedudukan</font></font></p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Arrival
            at Departure Pont</font></font></p>
        </td>
        <td width="13" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:  </font>
            </p>
        </td>
        <td width="168" style="border: none; padding: 0in">
            <p><br>
                <?= Myhelper::Negara($model->kota_asal) ?>
            </p>
        </td>
        <td rowspan="4" width="14" style="border: none; padding: 0in">
            <p><br>

            </p>
        </td>
        <td rowspan="4" width="34" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
        </td>
        <td rowspan="2" width="359" style="border: none; padding: 0in">
            <p style="text-align: justify;text-justify: inter-word;"><font face="Arial, sans-serif"><font size="1" style="font-size: 8pt">Telah
            diperiksa dengan keterangan bahwa perjalanan tersebut atas
            perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu
            yang sesingkatsingkatnya.</font></font></p>
        </td>
    </tr>
    <tr valign="top">
        <td width="155" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif"><font size="1" style="font-size: 8pt">Pada
            Tanggal</font>    </font>
            </p>
            <p><font face="Arial, sans-serif"><font size="1" style="font-size: 6pt">Date
             </font></font>
            </p>
        </td>
        <td width="13" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><font face="Arial, sans-serif">:</font></p>
        </td>
        <td width="168" style="border: none; padding: 0in">
            <p><br>
                <?= Myhelper::Formattgl($mode->tgl_kembali) ?>
            </p>
        </td>
    </tr>
    <tr valign="top">
        <td colspan="3" width="352" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif"><font size="1" style="font-size: 8pt"><u>Pejabat
                Pembuat Komitmen </u></font></font><br/><font size="1" style="font-size: 6pt">Authorizing Office</font></p>
            <p><br>

            </p>
        </td>
        <td width="359" style="border: none; padding: 0in">
            <p><font class="bold" face="Arial, sans-serif"><font size="1" style="font-size: 8pt">
               <u> Pejabat Pembuat Komitmen </u></font></font><br/><font size="1" style="font-size: 6pt">Authorizing Office</font></p>
            <p><br>

            </p>
        </td>
    </tr>
    <tr valign="top">
        <td colspan="3" width="352" style="border: none; padding: 0in">
            <p><br>

            </p>
            <p><br>

            </p>
            <p><br>

            </p>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

            <p align="left"><font class="bold" face="Arial, sans-serif"><font size="1" style="font-size: 8pt"><u><?= $model->ppk->nama ?>
            ST</u></font></font></p>
            <p><font class="bold" face="Arial, sans-serif"><font size="1" style="font-size: 8pt">NIP. <?= $model->ppk->nip ?></font></font></p>
        </td>
        <td width="359" style="border: none; padding: 0in">
            <p align="center"><br>

            </p>
            <p align="center"><br>

            </p>
            <p align="center"><br>

            </p>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <p align="left"><font class="bold" face="Arial, sans-serif"><font size="1" style="font-size: 8pt"><u><?= $model->ppk->nama ?>
            ST</u></font></font></p>
            <p align="left"><font class="bold" face="Arial, sans-serif"><font size="1" style="font-size: 8pt">NIP. <?= $model->ppk->nip ?></font></font></p>
        </td>
    </tr>
</tbody></table>
<p style="margin-bottom: 0in; line-height: 100%"><br>

</p>

</body>


            </div>

      <?php
 if ($no < $hitung){

        echo "<pagebreak>";

    }
    $no++;
}


?>
          
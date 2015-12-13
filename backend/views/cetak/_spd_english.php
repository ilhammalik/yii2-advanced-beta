<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use \common\components\MyHelper;
?>      

<style type="text/css">
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
                <td style="padding-top: -30px;padding-left: -40px;" >:</td>
                <td style="padding-top: -30px;padding-left: -45px;"><?= $model->kotaAsal->nama ?></td>
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
               <td style="padding-top: -10px;padding-left: -40px;" >:</td>
                <td style="padding-left: -65px;"><?= \common\components\MyHelper::Formattgl(date('Y-m-d')) ?></td>
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
            <br/>
            <br/>
            <br/>
            <br/>
                <h6 align="right"><br/> </h6>
                <table border="2" width="100%">
                        <tr>
                        <td width="500"> 
                             <table >
                                <tr>
                                    <td  style="padding-top:-10px;" height="20" width="200"><b>I. &nbsp;&nbsp;&nbsp;&nbsp;<u>Tiba di</u> </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arrival At</td>
                                    <td width="5" >:</td>
                                    <td><?= $model->kota_negara ?>, <?= $model->negara_tujuan ?></td>
                                </tr>
                                <tr>
                                    <td style="padding-top:10px;" width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Pada Tanggal</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date </td>
                                <td width="5" >:</td>
                                <td><?= Myhelper::Formattgl($mode->tgl_berangkat) ?></td>
                        </tr>
                    <tr>
                        <td style="padding-top:-140px;"height="200" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Kepala Kantor</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Head of Office</td>
                    <td style="padding-top:-170px;" width="5" >:</td>
                    <td style="padding-top:-170px;" align="center">.  . . . . . . . . . . . . . . . . . . . . . . . . .</td>

                    </tr>

                    <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>(. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .)</b></u></td>

                    </tr>
                      <tr>
                        <td  style="padding-top:10px;" colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NIP</b></td>

                    </tr>

                </table>
                </td>


                <td width="500"> 
                <table >
                                <tr>
                                    <td style="padding-top:-80px;"  height="20" width="200"><b>II. &nbsp;&nbsp;&nbsp;&nbsp;<u>Berangkat dari</u> </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Departure from</td>
                                    <td style="padding-top:-80px;" width="5" >:</td>
                                    <td style="padding-top:-40px;" valign="top"><?= $model->kota_negara ?>, <?= $model->negara_tujuan ?></td>
                                </tr>
                                <tr>
                                    <td  style="padding-top:-40px;" height="20" width="200"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Ke</u> </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>To</i></td>
                                    <td style="padding-top:-40px;" width="5" >:</td>
                                    <td style="padding-top:-40px;" >Jakarta</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:-10px;" width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Pada Tanggal</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date </td>
                                    <td width="5" >:</td>
                                    <td><?= Myhelper::Formattgl($mode->tgl_kembali) ?></td>
                    </tr>
                    <tr>
                        <td style="padding-top:-100px;" height="150" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Kepala Kantor</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Head of Office</td>
                    <td style="padding-top:-120px;" width="5" >:</td>
                    <td style="padding-top:-120px;" align="center">.  . . . . . . . . . . . . . . . . . . . . . . . . .</td>

                    </tr>

                    <tr>
                        <td style="padding-top:30px;" colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>(. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .)</b></u></td>

                    </tr>
                      <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NIP</b></td>

                    </tr>

                </table>
                </td>

                </tr>



    <tr>
                        <td width="500"> 
                             <table >
                                <tr>
                                    <td style="padding-top:20px;"  height="20" width="200"><b>III. &nbsp;&nbsp;&nbsp;&nbsp;<u>Tiba di</u> </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arrival At</td>
                                    <td width="5" >:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Pada Tanggal</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date </td>
                        <td width="5" >:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="padding-top:-170px;"height="200" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Kepala Kantor</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Head of Office</td>
                    <td style="padding-top:-170px;" width="5" >:</td>
                    <td style="padding-top:-170px;" align="center">.  . . . . . . . . . . . . . . . . . . . . . . . . .</td>

                    </tr>

                    <tr>
                        <td style="padding-top:-70px;" colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>(. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .)</b></u></td>

                    </tr>
                      <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NIP</b></td>

                    </tr>

                </table>
                </td>
                <td width="500"> 
                <table >
                                <tr>
                                    <td style="padding-top:-80px;"  height="20" width="200"><b>IV. &nbsp;&nbsp;&nbsp;&nbsp;<u>Berangkat dari</u> </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Departure from</td>
                                    <td style="padding-top:-80px;" width="5" >:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td  style="padding-top:-40px;" height="20" width="200"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Ke</u> </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>To</i></td>
                                    <td style="padding-top:-80px;"width="5" >:</td>
                                    <td style="padding-top:-80px;"></td>
                                </tr>
                                <tr>
                                    <td style="padding-top:-10px;" width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Pada Tanggal</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date </td>
                        <td width="5" >:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="padding-top:-120px;" height="150" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Kepala Kantor</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Head of Office</td>
                    <td style="padding-top:-120px;" width="5" >:</td>
                    <td style="padding-top:-120px;" align="center">.  . . . . . . . . . . . . . . . . . . . . . . . . .</td>

                    </tr>

                    <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>(. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .)</b></u></td>

                    </tr>
                      <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NIP</b></td>

                    </tr>

                </table>
                </td>
                </tr>


                    <tr>
                        <td width="500"> 
                             <table >
                                <tr>
                                    <td  style="padding-top:20px;"  height="20" width="200"><b>V. &nbsp;&nbsp;&nbsp;&nbsp;<u>Tiba di</u> </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arrival At</td>
                                    <td width="5" >:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Pada Tanggal</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date </td>
                        <td width="5" >:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="padding-top:-170px;"height="200" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Kepala Kantor</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Head of Office</td>
                    <td style="padding-top:-170px;" width="5" >:</td>
                    <td style="padding-top:-170px;" align="center">.  . . . . . . . . . . . . . . . . . . . . . . . . .</td>

                    </tr>

                    <tr>
                        <td style="padding-top:-70px;" colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>(. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .)</b></u></td>

                    </tr>
                      <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NIP</b></td>

                    </tr>

                </table>
                </td>
                <td width="500"> 
                <table >
                                <tr>
                                    <td style="padding-top:-80px;"  height="20" width="200"><b>VI. &nbsp;&nbsp;&nbsp;&nbsp;<u>Berangkat dari</u> </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Departure from</td>
                                    <td style="padding-top:-80px;" width="5" >:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td  style="padding-top:-40px;" height="20" width="200"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Ke</u> </b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>To</i></td>
                                    <td style="padding-top:-80px;"width="5" >:</td>
                                    <td style="padding-top:-80px;"></td>
                                </tr>
                                <tr>
                                    <td style="padding-top:-10px;" width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Pada Tanggal</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date </td>
                        <td width="5" >:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="padding-top:-120px;" height="150" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Kepala Kantor</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Head of Office</td>
                    <td style="padding-top:-120px;" width="5" >:</td>
                    <td style="padding-top:-120px;" align="center">.  . . . . . . . . . . . . . . . . . . . . . . . . .</td>

                    </tr>

                    <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>(. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .)</b></u></td>

                    </tr>
                      <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NIP</b></td>

                    </tr>

                </table>
                </td>
                </tr>


               
                <tr>
                    <td width="500"> 
                           <table >
                                <tr>
                                    <td   style="padding-top:-20px; padding-left:30;"  height="20" width="250"><b>VII. <u><br/>Tiba di Tempat Kedudukan</u> </b>
                                        <br/><span>Arrival at Departure Point</span> </td>
                                    <td style="padding-top:80px;"> </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:-20px;" height="10" width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Pada Tanggal</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date </td>
                        <td style="padding-top:-80px;">:</td>
                        <td style="padding-top:-80px;"><?= Myhelper::Formattgl($mode->tgl_kembali) ?></td>
                    </tr>
                           <tr>
                            <td style="padding-top:-60px;" colspan="3" height="90" width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Pejabat Pembuat Komitmen</u><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Authorizing Office</i> </td>

                        </tr>

                    <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>Afrizal, ST</b></u></td>

                    </tr>
                      <tr>
                        <td  colspan="3" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NIP.197304101999111001</b></td>

                    </tr>

                </table>
                </td>

                <td width="100"> 
                    <table >
                                <tr>
                                    <td  colspan="3" style="padding-top:10px;"  >

                                <div>Telah diperiksa dengan keterangan bahwa perjalanan
                               tersebut atas perintahnya dan semata-mata untuk
                                kepentingan jabatan dalam waktu yang sesingkat-singkatnya.</div>
                                </td>
                                </tr>
                           
                           <tr>
                            <td style="padding-top:10px;" colspan="3" height="90" width="200"><u>Pejabat Pembuat Komitmen</u><br/><i>Authorizing Office</i> </td>

                        </tr>

                    <tr>
                        <td  style="padding-top:50px;" colspan="3" align="left" ><u><b><?= $model->ppk->nama ?>T</b></u></td>

                    </tr>
                      <tr>
                        <td  colspan="3" align="left" ><b>NIP.<?= $model->nip_ppk ?></b></td>

                    </tr>

                </table>
                </td>

                </tr>
                


                </table>
    <pagebreak>

             <!-- <img src="<?= Url::to(['daftar-keg/qrcode']) ?>" />  -->


    <?php
   if ($no < $hitung){

        echo "<pagebreak>";

    }
    $no++;
}
  

?>
            </body>
<style type="text/css">
    div {
    text-align: justify;
    text-justify: inter-word;
}
</style>



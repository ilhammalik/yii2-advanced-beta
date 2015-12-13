<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\components\MyHelper;
?>      

 <style type="text/css">
/* GENERAL CSS */

body { 
    font-family:tahoma,arial;
    font-size:12px; 
    //background: url('../images/wood-blue.jpg');

}

    a,a:active,a:visited {
    text-decoration: none;
    color: blue;
    }
    a:hover {
    text-decoration : underline;
    color : red;
    }
    html, body, div, dl, dt, dd, ul, ol, li, h1, h2, h3,
    h4, h5, h6, pre, form, fieldset, input, textarea,
    p, blockquote, { margin:0;padding:0; }

    table       { border-collapse:collapse;border-spacing:0;}
    fieldset, img   { border:0; }
    strong              { font-weight:bold; }
    ol, ul      { list-style:none; }

    caption, th     { text-align:center; }
    h2 { font-size:1.2em; font-weight:bold;  background:#B9C9FE; padding:6px; }
    
    #container          { width:100%; background:#fff; margin:auto; }
    .inpad      { padding:15px; }


    
/* HOME CSS*/
#home .latar
{
    background: url('../images/wood-blue.jpg');
}


/* HEADER CSS */
#head 
{
/*width: 1200px;*/

border: 1px #005252;
text-align: center;
color: purple;
background: black;
}

#head .head_title
{
background: url('../images/wood-block.jpg');
/* -moz-radial-gradient(center, snow, #660099);
-moz-border-radius: 30px 30px 10px 10px;
-ms-linear-gradient(top, #005252, silver);
-ms-border-radius: 30px 30px 10px 10px;
-webkit-gradient(top, #005252, silver);
-webkit-border-radius: 30px 30px 10px 10px;
-o-linear-gradient(top, #005252, silver);
-o-border-radius: 30px 30px 10px 10px; */

font-weight: bold;
font-size: 4.2em;
padding: 10px;
height: 140px;
}

#head .head_subtitle
{
text-align: center;
color: yellow;
font-weight: bold;
background: url('../images/wood-tile.jpg');
/* -moz-radial-gradient(center, snow, #660099);
-moz-border-radius: 10px 10px 50px 50px;
-ms-linear-gradient(bottom, #005252, silver);
-ms-border-radius: 10px 10px 50px 50px;
-webkit-gradient(bottom, #005252, silver);
-webkit-border-radius: 10px 10px 50px 50px;
-o-linear-gradient(bottom, #005252, silver);
-o-border-radius: 10px 10px 50px 50px; */
padding: 6px;
height: 30px;
}


    
/* FOOTER CSS  */
#foot div
{
/*width: 1200px;*/
height: 70px;
border: 1px solid #005252;
background: url('../images/wood-tile.jpg');
/* -moz-radial-gradient(center, #660099, snow);
-moz-border-radius: 10px 10px 30px 30px; */
text-align: center;
color: yellow;
font-weight: bold;
font-size: 0.8em;
padding: 2px;
}

/* FORM CSS */

input[type=button],button,input[type=submit],input[type=reset]  
{
    padding:0px;
    font-size:1em;
}

textarea, input[type=text], input[type=password]
{
    border:1px inset #ddd;
    width:100%;
}

/* DATA CSS */

#data table
{
    width: 100%;
    background: snow;
}

#data th
{
    background: #C6F;
    border-right: .1em solid;
    border-top: .1em solid;
}

#data td
{
    background: #CCCCFF;
    border-right: .1em solid purple;
    border-top: .1em solid #CCFFFF;
    padding: 3px;
}


/* RINCIAN */

.kanan
{
    border-right: 1px solid black;

}

.kiri
{
    border-left: 1px solid black;
}
.bold{
    font-weight: bold;
}
.atas
{
    border-top: 1px solid black;
}
.center{
    text-align: center;
}
.bawah
{
    border-bottom: 1px solid black;
}

 </style>
   
        <p class="center"><img  src="<?= Url::to(['/images/logo-bapeten.png']) ?>" width="100px" /></p>
 <div align="center"><big><b class="bold">BADAN PENGAWAS TENAGA NUKLIR</b></big></div>
    <div align="center"><b class="bold">Jl. Gajah Mada No. 8 Jakarta Pusat</b></div><table width="850" align="center" cellspacing="0" cellpadding="0">
        <tr> <td>&nbsp;</td> </tr>
        <tr> <td width="645">&nbsp;</td> <td width="100">Lembar Ke</td> <td width="5">&nbsp;:&nbsp;</td> <td>1 (satu)</td> </tr>
        <tr> <td>&nbsp;</td> <td>Kode No.</td> <td>&nbsp;:&nbsp;</td> <td>&nbsp;</td> </tr>
        <tr> <td>&nbsp;</td> <td>Nomor</td> <td>&nbsp;:&nbsp;</td> <td><?= $model->no_spd ?></td> </tr>
    </table>
    <br>
    <p align="center"><big class="bold"><b class="bold"><u>SURAT PERJALANAN DINAS (SPD)</u></b></big></p>
    <table width="100%" align="center" cellpadding="7" style="font-size:13px;">
        <tr>
            <td width="5%" class="kiri atas" align="center" height="40">1.</td>
            <td width="45%" class="kiri atas">Pejabat Pembuat Komitmen</td>
            <td class="kiri atas bold kanan" colspan="2"><b class="bold"><?= $model->ppk->nama ?></b></td>
        </tr>
        <tr>
            <td class="kiri atas" align="center" valign="top">2.</td>
            <td class="kiri atas" valign="top">Nama/NIP Pegawai yang melaksanakan Perjalanan Dinas</td>
            <td class="kiri atas bold kanan" colspan="2"><b class="bol">Terlampir</b></td>
        </tr>
        <tr>
            <td class="kiri atas" align="center" valign="top">3.</td>
            <td class="kiri atas" valign="top">
                <table border="0" width="100%" style="font-size:13px;">
                    <tr>
                        <td width="5%">a.</td>
                        <td>Pangkat dan Golongan</td>
                    </tr>
                    <tr>
                        <td valign="top">b.</td>
                        <td height="60" valign="top">Jabatan / Instansi</b></td>
                    </tr>
                    <tr>
                        <td>c.</td>
                        <td>Tingkat Biaya Perjalanan Dinas</td>
                    </tr>
                </table>
            </td>
            <td class="kiri atas kanan" colspan="2" valign="top">
                <table border="0" width="100%" style="font-size:13px;">
                    <tr>
                    
                        <td><b class="bold">Terlampir</b></td>
                    </tr>
                    
                </table>
            </td>
        </tr>
        <tr>
            <td class="kiri  atas" align="center" valign="top">4.</td>
            <td class="kiri atas" valign="top">Maksud Perjalanan Dinas</td>
            <td class="kiri atas kanan" colspan="2" align="justify" valign="top"><b class="bold">Terlampir</b></td>
        </tr>
        <tr>
            <td class="kiri atas" align="center" height="40">5.</td>
            <td class="kiri atas">Alat angkut yang dipergunakan</td>
            <td class="kiri atas kanan" colspan="2"><b class="bold">Terlampir</b></td>
        </tr>
        <tr>
            <td class="kiri atas" align="center" valign="top">6.</td>
            <td class="kiri atas" valign="top">
                <table border="0" width="100%" style="font-size:13px;">
                    <tr>
                        <td width="5%">a.</td>
                        <td>Tempat Berangkat</td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>Tempat Tujuan</td>
                    </tr>
                </table>
            </td>
            <td class="kiri atas kanan" colspan="2" valign="top">
                <table border="0" width="100%" style="font-size:13px;">
                    <tr>
                        <td width="5%">a.</td>
                        <td><b class="bold"><?= $model->kotaAsal->nama ?></b></td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td><b class="bold"><?= $model->kotaTujuan->nama ?></b></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="kiri atas" align="center" valign="top">7.</td>
            <td class="kiri atas" valign="top">
                <table border="0" width="100%" style="font-size:13px;">
                    <tr>
                        <td width="5%">a.</td>
                        <td>Lama Perjalanan Dinas</td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>Tanggal Berangkat</td>
                    </tr>
                    <tr>
                        <td>c.</td>
                        <td>Tanggal harus kembali/tiba ditempat baru *)</td>
                    </tr>
                </table>
            </td>
            <td class="kiri atas kanan" colspan="2" valign="top">
                <table border="0" width="100%" style="font-size:13px;">
                    <tr>
                        <td width="5%">a.</td>
                        <td><b class="bold"><?php $a = substr($model->tgl_selesai, 8,2);$b = substr($model->tgl_mulai, 8,2); echo $a-$b+1; echo '  ( '.MyHelper::Terbilang($a-$b+1).' )  hari'; ?></b></td>
                    
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td><b class="bold"><?= MyHelper::Formattgl($model->tgl_mulai) ?></b></td>
                    </tr>
                    <tr>
                        <td>c.</td>
                        <td><b class="bold"><?= MyHelper::Formattgl($model->tgl_selesai) ?></b></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="kiri atas" align="center">8.</td>
            <td class="kiri atas"><u>Pengikut:</u> Nama</td>
            <td class="kiri atas" width="26%" align="center">Tanggal Lahir</td>
            <td class="kiri atas kanan" align="center">Keterangan</td>
        </tr>
        <tr>
            <td class="kiri atas" align="center">&nbsp;</td>
            <td class="kiri atas">
                1.&nbsp;<br>
                2.&nbsp;<br>
                3.&nbsp;<br>
                4.&nbsp;<br>
                5.&nbsp;
            </td>
            <td class="kiri atas" align="center">&nbsp;</td>
            <td class="kiri atas kanan" align="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="kiri atas" align="center" valign="top">9.</td>
            <td class="kiri atas" valign="top">
                <table border="0" width="100%" style="font-size:13px;">
                    <tr>
                        <td colspan="2"><u>Pembebanan Anggaran:</u></td>
                    </tr>
                    <tr>
                        <td width="5%">a.</td>
                        <td>Instansi</td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>Akun</td>
                    </tr>
                </table>
            </td>
            <td class="kiri atas kanan" colspan="2" valign="top">
                <table border="0" width="100%" style="font-size:13px;">
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="5%">a.</td>
                        <td><b class="bold">Badan Pengawas Tenaga Nuklir</b></td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td><b class="bold"><?= $model->mak ?></b></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="kiri atas bawah" align="center" height="40">10.</td>
            <td class="kiri atas bawah">Keterangan Lain-lain</td>
            <td class="kiri atas bawah kanan" colspan="2"><b class="bold">&nbsp;</b></td>
        </tr>
    </table><br>
     <table border="0" width="100%" align="center" cellpadding="3" style="font-size:13px;">
        <tr>
            <td width="53%">&nbsp;</td>
            <td width="14%">Dikeluarkan di</td>
            <td width="3%" width="5%"><center>:</center></td>
            <td><b class="bold"><?= $model->kotaAsal->provinsi->nama ?></b></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td class="bawah">Tanggal</td>
            <td class="bawah" width="5%"><center>:</center></td>
            <td class="bawah"><b class="bold"><?= MyHelper::Formattgl(date('Y-m-d')) ?></b></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="3" align="center">Pejabat Pembuat Komitmen,</td>
        </tr>
        <tr><td style="padding-left:100;padding-top:-50px;"><img src="<?= Url::to(['simpel-keg/qrcode','id'=>$model->id_kegiatan]) ?>" width="150px"/></td></tr>

    
        <tr>
            <td>&nbsp;</td>
            <td colspan="3" style="padding-top:-50px;" align="center"><b class="bold"><u><?= $model->ppk->nama_cetak ?></u><br>NIP. <?= $model->nip_ppk ?></b></td>
        </tr>
    </table>
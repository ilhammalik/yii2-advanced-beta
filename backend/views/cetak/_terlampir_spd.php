<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use \common\components\MyHelper;
?>      

 <style type="text/css">
.list{
    
    border-collapse: collapse;
    width: 170%;
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
  
  <table>
      <tr>
          <td>Lampiran SPD</td>
      </tr>
      <tr><td>Nomor : <?= $model->no_spd ?> Tanggal: <?php echo  \common\components\MyHelper::Formattgl($model['tgl_mulai'])  ; ?></td></tr>

  </table>
<br/>
<br/>
  <table >
      <tr>
      <td valign="top">Daftar Kegiatan </td>
      <td valign="top">:</td>
      <td valign="top"><?= $model->nama_keg ?></td>
      </tr>
      <tr>
          <td>Tanggal Penyelengaraan</td>
          <td width="10">:</td>
          <td><?php echo  \common\components\MyHelper::Formattgl($model['tgl_mulai'])  ; ?></td>
      </tr>
      <tr>
          <td>Kota Tempat Penyelenggaraan</td>
          <td  width="10">:</td>
          <td ><?= $model->kotaTujuan->nama ?>, <?= $model->kotaTujuan->provinsi->nama ?></td>
      </tr>
      <tr>
          <td>Satuan Kerja</td>
          <td width="10">:</td>
          <td><?= \common\components\MyHelper::Unit($model->unit_id) ?></td>
      </tr>
      <tr>
          <td>Kementrian Negara / Lembaga </td>
          <td width="10">:</td>
          <td>BAPETEN</td>
      </tr>

  </table>
  <br/>

  <table class="list">
      <tr>
          <th rowspan="2" > No</th>
          <th rowspan="2" width="120"> Nama Pelaksana SPD / NIP</th>
          <th rowspan="2" width="10"> Pangkat Gol</th>
          <th rowspan="2"> Jabatan</th>
          <th rowspan="2"> Tempat Kedudukan Asal</th>
          <th rowspan="2"> Tingkat Biaya Perjalanan Dinas</th>
          <th rowspan="2"> Alat Angkutan yang digunakan</th>
          <th colspan="2"> Surat Tugas</th>
          <th colspan="2"> Tanggal </th>
          <th rowspan="2"> Lamanya Perjalanan Dinas</th>
          <th rowspan="2" width="110px"> Ket</th>
      </tr>
      <tr>
      
          <th> Nomor</th>
          <th> Tanggal</th>
          <th> Keberangkatan Dari Tempat Kedudukan Asal</th>
          <th> Tiba Kembali Kedudukan Asal</th>
      </tr>
        <?php 
        $no = 1;
        foreach ($model2 as $key) {
            $a = substr($model['tgl_mulai'], 8, 2);
            $b = substr($model['tgl_selesai'], 8, 2);
            $c = $b - $a;
            echo '<tr>'.
            '<td style="padding-left:10px" valign="top"> '.$no.'</td>'.
            '<td> '.$key->pegawai['nama'].'<br/>'.'NIP  '.$key->pegawai['nip'].'</td>'.
            '<td> '.\common\components\MyHelper::Gole($key->pegawai['gol_id']).'</td>'.
            '<td> '.\common\components\MyHelper::Jab($key->pegawai['struk_id']).'</td>'.
            '<td> '.\common\components\MyHelper::Unit($key->pegawai['unit_id']).'</td>'.
            '<td align="center">'.MyHelper::Tingkat(MyHelper::Struk($key->pegawai->struk_id)).'</td>'.
            '<td> '.\common\components\MyHelper::Angkutan($key['angkutan']).'</td>'.
            '<td>'. $key->no_sp.'</td>'.
            '<td align="center"> '. \common\components\MyHelper::Formattgl($model['tgl_mulai']).'</td>'.
            '<td align="center"> '.\common\components\MyHelper::Formattgl($model['tgl_mulai']).'</td>'.
            '<td align="center"> '.\common\components\MyHelper::Formattgl($model['tgl_selesai']).'</td>'.
            '<td align="center"> '.$c.' Hari</td>'.
            '<td> </td>'.


            '</tr>';
            $no++;
        } 
        ?>
  </table>

<table >
    <tr>
        <td  width="300"></td>
        <td style="padding-top:60px;padding-left:-420px;"  align="center" width="300">
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
        <td style="padding-top:60px;" align="center" width="300">
           
        </td>
        <td width="200">
        </td>
        <td style="padding-top:600px;"align="center" width="300">
            <br/><br/><br/><br/><b><u><?= $model->ppk->nama_cetak ?></u></b><br/>
            NIP. <?= $model->nip_ppk ?>
        </td>
    </tr>
    
    </table>

 

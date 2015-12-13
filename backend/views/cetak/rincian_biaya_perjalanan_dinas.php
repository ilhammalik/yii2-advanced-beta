<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use \common\components\MyHelper;
?>      

<style type="text/css">
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
foreach ($model2 as $data) {
    $transport = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id=1')->one();
    $taksi = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id=2')->one();
    $taksi_pulang = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id=3')->one();
    $uhr = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id=4')->one();
    $saku = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id=5')->one();
    $rep = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id=8')->one();
    $inap = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id=6')->one();
    $inapp = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id=7')->one();
    $pimpinan = \backend\models\SimpelRincianBiaya::find()->where('personil_id=' . $data->id_personil . ' and kat_biaya_id=9')->one();
    ?>
    <h5 align="center"><img align="center" src="<?= Url::to(['/images/logo_bp.png']) ?>" width="90px"></h5>

    <h5 style="font-weight: bold;" align="center"><b>
            BADAN PENGAWAS TENAGA NUKLIR <br/>

    </h5>
    <h6 style="font-weight: bold;" align="center">Jl. Gajah Mada No. 8 Jakarta Pusat</h6>

    <br/>
    <h5 style="font-weight: bold;" align="center"><b>RINCIAN BIAYA PERJALANAN DINAS</b></h5>

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
                <p align="center">Perincian Biaya</p>
            </td>
            <td width="22%" style="border: 2px solid black;  font-weight: bold;  text-align: center; padding: 0.04in">
                <p align="center">Jumlah</p>
            </td>
             <td width="22%" style="border: 2px solid black;  font-weight: bold;  text-align: center; padding: 0.04in">
                <p align="center">Keterangan</p>
            </td>
        </tr>
    </tbody>
    <tbody>
          <?php 
                $rincian =  \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and bukti_kwitansi=1 and kat_biaya_id not in (19,2,3,13) ')->all();
              $n = 1;
                foreach ($rincian as $key) { ?>
                <tr valign="top">
                    <td valign="top" width="7%" style="border-top: none; text-align:center; border-bottom: none; border-left: 2px solid black; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.04in; padding-right: 0in">
                        <p align="center" style="font-weight: bold;"><?= $n ?> .</p> <br/><br/>
                    </td>
                    <td valign="top" width="70%" style="border-top: none; border-bottom: none; border-left: 2px solid black; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.04in; padding-right: 0in">
                        <p style="padding-top:-30px; font-weight: bold;">
                        <?= $key->label ?> : 
                        </p>
                          <?php 
                    switch ($key->kat_biaya_id) {
                        case '4':
                            echo $key->uraian_rincian;                            break;
                            break;
                         case '5':
                            echo $key->uraian_rincian;                            break;
                            break;
                             case '6':
                            echo $key->uraian_rincian;                            break;
                            break;
                             case '7':
                            echo $key->uraian_rincian;                            break;
                            break;
                             case '8':
                            echo $key->uraian_rincian;                            break;
                            break;
                          case '1':
                             $rinc =  \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and bukti_kwitansi=1 and kat_biaya_id in (2,3) ')->all();
                             foreach ($rinc as $ke){
                                    echo $ke->label; 
                                    echo "<br/>";                       
                                    echo "<br/>";                       
                                }
                             break;
                          case '11':
                            echo $key->uraian_rincian;
                            break;
                      
                    }
                    ?>
                    <br/>
                    &nbsp;&nbsp;
                    </td>
                    <td valign="top" width="22%" style="text-align:center;border-top: none; border-bottom: none; border-left: 2px solid black; border-right: 2px solid black; padding: 0in 0.04in">
                        <p style="font-weight: bold;">
                            Rp.
                        
                         <?php 

                    switch ($key->kat_biaya_id) {
                          case '1':
                          echo '<u>'.number_format($key->jml, 0, ",", ".").'</u>';
                             $rinc =  \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$data->id_personil.' and bukti_kwitansi=1 and kat_biaya_id in (2,3) ')->all();
                             foreach ($rinc as $ke){
                                     echo "<br/>";       
                                    echo 'Rp. '.number_format($ke->jml, 0, ",", ".");
                                    echo "<br/>";                       
                 
                                }
                             break;
                          default:
                            echo number_format($key->jml, 0, ",", ".");
                            break;
                      
                    }
                    ?>
                    </p>
                    </td>
                     <td valign="top" width="22%" style="text-align:center;border-top: none; border-bottom: none; border-left: 2px solid black; border-right: 2px solid black; padding: 0in 0.04in">
                        
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
                  <?php $count = Yii::$app->db->createCommand("SELECT sum(jml) FROM simpel_rincian_biaya where personil_id='".$data->id_personil."' and bukti_kwitansi=1 " )->queryScalar(); ?>
                    Rp. <?= number_format($count,0,',','.') ?>    
            </td>
                <td width="22%" style="text-align:center;border-top: 2px solid black; border-bottom: 2px solid black; border-left: 2px solid black; border-right: 2px solid black; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0.04in">
                <p>
                </p>
            </td>
        </tr>
        <tr valign="top">
          
            <td width="70%" colspan="4" style="text-align:center;border-top: 2px solid black; border-bottom: 2px solid black; border-left: 2px solid black; border-right: 2px solid black; padding-top: 0in; padding-bottom: 0.04in; padding-left: 0.04in; padding-right: 0in">
                <?php $ter = Yii::$app->db->createCommand("SELECT sum(jml) FROM simpel_rincian_biaya where personil_id='".$data->id_personil."' and bukti_kwitansi=1 " )->queryScalar(); ?>
                <p align="right">Terbilang: <?= \common\components\MyHelper::Terbilang($count) ?> Rupiah </p> 
            </td>
           
        </tr>
    </tbody>
</table>

<br/>

    <table >
        <tbody>

            <tr>
                <td width="340"><br/></td>
                <td colspan=""><h5 style="font-weight: bold;">Jakarta, <?= MyHelper::Formattgl($data->tgl_kembali) ?></h5><br/><br/></td>

            </tr>


            <tr>
                <td width="340"><h5 style="padding-top:-30px;" ><u>Telah dibayar sejumlah : </u></h5><br/> <h5 class="bold">Rp. <?= number_format($count,0,',','.') ?></h5></td>
                <td colspan=""><h5 ><u>Telah menerima jumlah uang sebesar : </u></h5><br/> <h5 class="bold" >Rp. <?= number_format($count,0,',','.') ?></h5> </td>

            </tr>

            <tr>
                <td >Bendahara Pengeluaran Pembantu, <br/>
                </td>
                <td colspan="">Yang menerima,</td>
            </tr>
            <tr>
                <td style="padding-top:50;font-weight: bold;" width="340">
                    <u><?= $model->bpp->nama_cetak ?></u><br/>
                    NIP : <?= $model->bpp->nip ?>
                </td>
                <td style="padding-top:50;font-weight: bold;"><u><?= $data->pegawai->nama_cetak ?></u><br/>NIP : <?= $data->pegawai->nip ?></td>
            </tr>


        </tbody>
    </table> 
    <hr/>
    <h5 style="padding-top:-20;font-weight: bold;"align="center"><u>PERHITUNGAN SPPD RAMPUNG</u></h5>
    <table >
        <tr>
            <td width="340">
                Ditetapkan sejumlah 
            </td>
            <td>Rp.  <?= number_format($count,0,',','.') ?></h5></td>
        </tr>
        <tr>
            <td width="340">
                Yang telah dibayar semula  
            </td>
            <td>Rp. .  .  .  .  .  .  .  .  .  . </td>
        </tr>
        <tr>
            <td width="340">
                Sisa kurang/lebih
            </td>
            <td>Rp. .  .  .  .  .  .  .  .  .  .</td>
        </tr>
        <tr>
            <td width="340">

            </td>
            <td> <br/><br/>Pejabat Pembuat Komitmen</td>
        </tr>
        <tr>
            <td width="340">

            </td>
            <td style="padding-top:50;font-weight: bold;"><?= $model->ppk->nama_cetak ?><br/>NIP :<?= $model->nip_ppk ?></td>
        </tr>
    </table>
    <?php
    if ($no < $hitung){

        echo "<pagebreak>";

    }
    $no++;
}

?>


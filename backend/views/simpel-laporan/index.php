<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use \common\components\MyHelper;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use \common\models\DaftarUnit;
use \common\components\HelperUnit;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Laporan Realisasi Per Unit Kerja');
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    th{
        text-align: center;
    }
</style>
<div class="simpel-personil-index">
    <div class="block">
        <div class="block-title">
            <ul class="nav nav-tabs ">
                <li class="active">
                    <a href="<?= Url::to(['simpel-laporan/index']) ?>" >
                        Realisasi</a>
                </li>
                <li >
                    <a href="<?= Url::to(['simpel-laporan/mak']) ?>" >
                        Realisasi Mak</a>
                </li>

            </ul>
        </div>
        <div class="wp-posts-index">

            <form class="FormAjax" method="get" action="">
                <div class="simpel-keg-search">

                    <div class="block">
                        <div class="block-title">
                            <h2>Pencarian</h2>
                        </div>
                        <div class="wp-posts-index">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        Satuan Kerja
                                    </div>
                                    <div class="col-md-8">

                                        <?php
                                        $data = ArrayHelper::map(\common\models\DaftarUnit::find()->where('unit_id in (110000,120000,130000)')->asArray()->all(), 'unit_id', 'nama');
                                        ?>

                                        <?php
                                        echo Select2::widget([
                                            'name' => 'unit',
                                            'data' => $data,
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                            'options' => [
                                                'id' => 'test',
                                                'placeholder' => 'Pilih Unit Kerja',
                                                'onchange' => '$.post( "' . Yii::$app->urlManager->createUrl('simpel-rekap/lists?id=') . '"+$(this).val(), function( data ) {
                                                         $("select#ids").html( data );
                                                         $("#hidden_div").show();
                                                         $("#hidden").show();
                                                    });',
                                            ]
                                        ]);
                                        ?>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row" id="hidden_div" style="display: none;" >
                                    <div class="col-md-4">
                                        Unit Kerja Mak
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                        $data = ArrayHelper::map(\common\models\DaftarUnit::find()->asArray()->all(), 'unit_id', 'nama');
                                        ?>
                                        <?php
                                        echo Select2::widget([
                                            'name' => 'unit_id',
                                            'data' => $data,
                                            'options' => [
                                                'id' => 'ids',
                                                'placeholder' => 'Pilih Unit Kerja Kerja',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                                'format' => 'yyyy-m-d'
                                            ],
                                        ]);
                                        ?>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-4">
                                        Tahun
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                        $thisYear = date('Y', time());
                                        if ($thisYear = '2015') {
                                            for ($yearNum = $thisYear; $yearNum >= 2015; $yearNum--) {
                                                $years[$yearNum] = $yearNum;
                                            }
                                        }
                                        ?>
                                        <select name="tahun" onchange="this.form.submit()">
                                            <?php
                                            foreach ($years as $key) {
                                                echo '<option value="' . $key . '">' . $key . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php echo Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?></div>
                    </div>
                </div>
            </form>

            <table class="table  table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2"> No. </th>
                        <th rowspan="2"> UNIT KERJA /  MAK </th>
                        <th rowspan="2"> PAGU </th>
                        <th colspan="13"> R E A L I S A S I</th>
                        <th rowspan="2"> S I S A </th>
                        <th rowspan="2" 0=""> % </th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <th><?= \common\components\MyHelper::BacaBulan($i) ?></th>
                        <?php } ?>
                        <th>Jumlah</th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i <= 18; $i++) { ?>
                            <th><?= $i ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    $un = isset($_GET['unit']) ? $_GET['unit'] : '110000,120000,130000';
                    $unit = \common\models\DaftarUnit::find()->where('unit_id in (' . $un . ')')->all();
                    $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
                    $no = 1;
                    foreach ($unit as $unit) {

                        switch ($unit->unit_id) {
                            case 110000:
                                $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and unit_id in (111000,112000,113000,114000,115000)")->queryScalar();
                                $totalreal = Yii::$app->db->createCommand("SELECT SUM(jml) as JUMLah FROM `simpel_rincian_biaya` as g WHERE id_kegiatan in 
                            (SELECT a.id_kegiatan FROM simpel_keg a  LEFT JOIN 
                             pegawai.daf_unit b ON a.unit_id=b.unit_id WHERE status=4 and g.bukti_kwitansi in(1,2) and 
                             b.unit_id 
                             IN (SELECT c.unit_id FROM  pegawai.daf_unit c  WHERE c.unit_parent_id in (111000,112000,113000,114000,115000) ))")->queryScalar();
                                break;
                            case 120000:
                                $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and unit_id in(121000,122000,123000,124000)")->queryScalar();
                                $totalreal = Yii::$app->db->createCommand("SELECT SUM(jml) as JUMLah FROM `simpel_rincian_biaya` as g WHERE id_kegiatan in 
                            (SELECT a.id_kegiatan FROM simpel_keg a  LEFT JOIN 
                             pegawai.daf_unit b ON a.unit_id=b.unit_id WHERE status=4 and g.bukti_kwitansi in(1,2) and 
                             b.unit_id 
                             IN (SELECT c.unit_id FROM  pegawai.daf_unit c  WHERE c.unit_parent_id in (121000,122000,123000,124000) ))")->queryScalar();
                                break;
                            case 130000:
                                $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and unit_id in(131000,132000,133000)")->queryScalar();
                                $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
                                $real = Yii::$app->db->createCommand("SELECT SUM(jml) as JUMLah FROM `simpel_rincian_biaya` as g WHERE id_kegiatan in 
                                (SELECT a.id_kegiatan FROM simpel_keg a  LEFT JOIN 
                                 pegawai.daf_unit b ON a.unit_id=b.unit_id WHERE status=4 and g.bukti_kwitansi in(1,2) and 
                                 b.unit_id 
                                 IN (SELECT c.unit_id FROM  pegawai.daf_unit c  WHERE c.unit_parent_id in (131000,132000,133000) ))")->queryScalar();
                                $totalreal = Yii::$app->db->createCommand("SELECT SUM(jml) as JUMLah FROM `simpel_rincian_biaya` as g WHERE id_kegiatan in 
                            (SELECT a.id_kegiatan FROM simpel_keg a  LEFT JOIN 
                             pegawai.daf_unit b ON a.unit_id=b.unit_id WHERE status=4 and g.bukti_kwitansi in(1,2) and 
                             b.unit_id 
                             IN (SELECT c.unit_id FROM  pegawai.daf_unit c  WHERE c.unit_parent_id in (131000,132000,133000) ))")->queryScalar();
                                break;
                            case 161100:
                                $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and  unit_id in(161100)")->queryScalar();
                                $real = Yii::$app->db->createCommand("SELECT SUM(jml) as JUMLah FROM `simpel_rincian_biaya` as g WHERE id_kegiatan in 
                                (SELECT a.id_kegiatan FROM simpel_keg a  LEFT JOIN 
                                 pegawai.daf_unit b ON a.unit_id=b.unit_id WHERE status=4 and g.bukti_kwitansi in(1,2) and 
                                 b.unit_id 
                                 IN (SELECT c.unit_id FROM  pegawai.daf_unit c  WHERE c.unit_parent_id in (161100) ))")->queryScalar();
                                $totalreal = Yii::$app->db->createCommand("SELECT SUM(jml) as JUMLah FROM `simpel_rincian_biaya` as g WHERE id_kegiatan in 
                            (SELECT a.id_kegiatan FROM simpel_keg a  LEFT JOIN 
                             pegawai.daf_unit b ON a.unit_id=b.unit_id WHERE status=4 and g.bukti_kwitansi in(1,2) and 
                             b.unit_id 
                             IN (SELECT c.unit_id FROM  pegawai.daf_unit c  WHERE c.unit_parent_id in (161100) ))")->queryScalar();
                                break;
                            case 151000:
                                $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and unit_id in(151000)")->queryScalar();
                                $totalreal = Yii::$app->db->createCommand("SELECT SUM(jml) as JUMLah FROM `simpel_rincian_biaya` as g WHERE id_kegiatan in 
                            (SELECT a.id_kegiatan FROM simpel_keg a  LEFT JOIN 
                             pegawai.daf_unit b ON a.unit_id=b.unit_id WHERE status=4 and g.bukti_kwitansi in(1,2) and 
                             b.unit_id 
                             IN (SELECT c.unit_id FROM  pegawai.daf_unit c  WHERE c.unit_parent_id in (151000) ))")->queryScalar();

                                break;
                         
                        }
                        ?>
                        <tr bgcolor="#68C8E8" >
                            <th><?= $no ?>.</th>
                            <th > <?= \common\components\HelperUnit::Apagu($unit->unit_id) ?></th>
                            <th><?= number_format($jum, 0, ",", ".") ?></th>
                            <?php
                            for ($i = 1; $i < 13; $i++) {
                                if ($i < 10) {
                                    $a = '0' . $i;
                                } else {
                                    $a = $i;
                                }
                                switch ($unit->unit_id) {
                                    case 110000:
                                        $unito = '111000,112000,113000,114000,115000';
                                        break;
                                    case 120000:
                                        $unito = '121000,122000,123000,124000';
                                        break;
                                    case 130000:
                                        $unito = '131000,132000,133000';
                                        break;
                                    case 161100:
                                        $unito = '161100';
                                        break;
                                    case 151000:
                                        $unito = '151000';
                                        break;
                                }
                                $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
                                $bln = $tahun . '-' . $a . '-';
                                $sql = "SELECT SUM(jml) as JUMLah FROM `simpel_rincian_biaya` as g WHERE id_kegiatan in 
                                (SELECT a.id_kegiatan FROM simpel_keg a  LEFT JOIN 
                                 pegawai.daf_unit b ON a.unit_id=b.unit_id WHERE status=4 and g.bukti_kwitansi in(1,2) and 
                                 b.unit_id 
                                 IN (SELECT c.unit_id FROM  pegawai.daf_unit c  WHERE a.tgl_mulai like '%" . $bln . "%' and  c.unit_parent_id in (".$unito.") ))";
                                $nilai = Yii::$app->db->createCommand($sql)->queryScalar();
                                ?>
                                <td><?php
                                    if ($nilai > 0) {
                                        echo number_format($nilai, 0, ",", ".");
                                    } else {
                                        echo '<center>-</center>';
                                    }
                                    ?></td>

                            <?php } ?>
                            <td><?= $totalreal ?></td>
                                <td align="center"><?= number_format($jum - $totalreal, 0, ",", "."); ?></td>
                            <td align="center"><?php
                                echo number_format(($totalreal / $jum) * 100, 2, ",", ".");
                                ?> %
                            </td>

                        </tr>
                        <?php
                        switch ($unit->unit_id) {
                            case 110000:
                                $ese = isset($_GET['unit_id']) ? $_GET['unit_id'] : '111000,112000,113000,114000,115000';
                                $satker = DaftarUnit::find()->where(' unit_id in (' . $ese . ')')->all();
                                break;
                            case 120000:
                                $ese = isset($_GET['unit_id']) ? $_GET['unit_id'] : '121000,122000,123000,124000';
                                $satker = DaftarUnit::find()->where(' unit_id in (' . $ese . ')')->all();
                                break;
                            case 130000:
                                $ese = isset($_GET['unit_id']) ? $_GET['unit_id'] : '131000,132000,133000';
                                $satker = DaftarUnit::find()->where(' unit_id in (' . $ese . ')')->all();
                                $jum = Yii::$app->db->createCommand("SELECT 
                                      sum(alokasi_sub_mak) as total
                                     FROM pagu_mak where  unit_id in(131000,132000,133000)")->queryScalar();

                                break;
                        }
                        $n = 1;
                        foreach ($satker as $sat) {

                            $ese = isset($_GET['unit_id']) ? $_GET['unit_id'] : $sat->unit_id;
                            $hsl = Yii::$app->db->createCommand("SELECT 
                                      sum(alokasi_sub_mak) as total
                                     FROM pagu_mak where  unit_id in(" . $ese . ")")->queryScalar();
                            ?>

                            <tr >
                                <td align="right"><?= $n ?>.</td>
                                <td><?= \common\components\HelperUnit::unit($sat->unit_id) ?></td>
                                <td align="center"><?php
                                    $pag = HelperUnit::Pagu($sat->unit_id);
                                    $pagn = number_format(HelperUnit::Pagu($sat->unit_id), 0, ",", ".");
                                    echo $pagn;
                                    ?>   
                                </td>
                                <?php
                                for ($i = 1; $i < 13; $i++) {

                                    if ($i < 10) {
                                        $a = '0' . $i;
                                    } else {
                                        $a = $i;
                                    }
                                    $unit = isset($_GET['unit_id']) ? $_GET['unit_id'] : $sat->unit_id;
                                    $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
                                    $bln = $tahun . '-' . $a . '-';
                                    $sql = "SELECT sum(b.jml) FROM simpel_keg as a 
                                        LEFT JOIN simpel_rincian_biaya as b on a.id_kegiatan=b.id_kegiatan
                                        LEFT JOIN pegawai.daf_unit as c on a.unit_id=c.unit_id
                                        where a.status=4 and a.tgl_mulai like '%" . $bln . "%' and c.unit_parent_id='" . $unit . "'";
                                    $nilaiReal = Yii::$app->db->createCommand($sql)->queryScalar();
                                    ?>
                                    <td><?php
                                        if ($nilaiReal > 0) {
                                            echo number_format($nilaiReal, 0, ",", ".");
                                        } else {
                                            echo '<center>-</center>';
                                        }
                                        ?></td>

                                <?php } ?>
                                <td> 
                                    <?php
                                    $re = HelperUnit::Real($sat->unit_id);
                                    $ren = number_format(HelperUnit::Real($sat->unit_id), 0, ",", ".");
                                    if ($ren > 0) {
                                        echo $ren;
                                    } else {
                                        echo '<center>-</center>';
                                    }
                                    ?>  
                                </td>
                                <td align="center"><?php echo number_format($hsl - $re, 0, ",", "."); ?> </td>
                                <td align="center"><?php echo number_format(($re / $hsl) * 100, 2, ",", "."); ?> %</td>
                                <?php
                                $n++;
                            }
                            ?>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

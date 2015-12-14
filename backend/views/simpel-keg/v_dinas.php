<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\db\Query;
use hscstudio\mimin\components\Mimin;
use \common\models\DaftarUnit;
use \common\components\HelperUnit;

$this->params['breadcrumbs'][] = 'Proses';
$this->params['breadcrumbs'][] = 'Daftar Perjalanan Dinas';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="simpel-keg-index">
    <div class="block">
        <div class="block-title">
            <ul class="nav nav-tabs ">

                <li >
                    <a href="<?= Url::to(['simpel-keg/index']) ?>" >
                        Daftar Permohonan Dinas</a>
                </li>
                <?php if ((Mimin::filterRoute($this->context->id . '/dinas'))) { ?>

                    <li class="active">
                        <a href="<?= Url::to(['simpel-keg/dinas']) ?>" >
                            Daftar Perjalanan Dinas</a>
                    </li>
                <?php } ?>
                <?php if ((Mimin::filterRoute($this->context->id . '/vcetak'))) { ?>

                    <li>
                        <a href="<?= Url::to(['simpel-keg/vcetak']) ?>" >
                            Cetak </a>
                    </li>
                <?php } ?>
                <?php if ((Mimin::filterRoute($this->context->id . '/bendahara'))) { ?>
                    <li>
                        <a href="<?= Url::to(['simpel-keg/bendahara']) ?>" >
                            Bendahara </a>
                    </li>
                <?php } ?>
                <?php if ((Mimin::filterRoute($this->context->id . '/varsip'))) { ?>
                    <li >
                        <a href="<?= Url::to(['simpel-keg/varsip']) ?>" >
                            Arsip </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php
        Pjax::begin(['id' => 'dinasSearch']);
        $url_search = Url::to(['simpel-keg/search-serasi']);
        $js = <<<js
$("#searchQuery").keyup(function(){
    var kata = $(this).val();
    if(kata.length > 3 || kata.length == 0){
         $("#datadinasGridview").load("{$url_search}"+"?search="+$(this).val());
    }
});


 
js;
        $this->registerJS($js);
        ?>
        <div class="wp-posts-index">
            <div class="row">


            </div>
            <br/>
            <div id="datadinasGridview">

                <table class="table1" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Satuan Kerja</th>
                            <th width="120"  scope="col" abbr="Medium"><center>Jumlah Kegiatan</center></th>
                    <th scope="col" abbr="Business"><center>Pagu</center></th>
                    </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        <?php
                        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
                        $satker = DaftarUnit::find()->where('unit_id in (110000,120000,130000,161100,151000)')->all();
                        $no = 1;
                        foreach ($satker as $unit) {

                            switch ($unit->unit_id) {
                                case 110000:
                                    $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and unit_id in(111000,112000,113000,114000,115000)")->queryScalar();
                                    $real = Yii::$app->db->createCommand("SELECT sum(jml) as jml, b.unit_id FROM simpel_rincian_biaya as a join simpel_keg as b on a.id_kegiatan=b.id_kegiatan where b.unit_id in(111000,112000,113000,114000,115000)")->queryScalar();

                                    break;
                                case 120000:
                                    $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and unit_id in(121000,122000,123000,124000)")->queryScalar();
                                    $real = Yii::$app->db->createCommand("SELECT sum(jml) as jml, b.unit_id FROM simpel_rincian_biaya as a join simpel_keg as b on a.id_kegiatan=b.id_kegiatan where b.unit_id in(121000,122000,123000,124000)")->queryScalar();
                                    break;
                                case 130000:
                                    $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and unit_id in(131000,132000,133000)")->queryScalar();
                                    $real = Yii::$app->db->createCommand("SELECT sum(jml) as jml, b.unit_id FROM simpel_rincian_biaya as a join simpel_keg as b on a.id_kegiatan=b.id_kegiatan where b.unit_id in(131000,132000,133000)")->queryScalar();

                                    break;
                                case 161100:
                                    $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and  unit_id in(151000)")->queryScalar();
                                    $real = Yii::$app->db->createCommand("SELECT sum(jml) as jml, b.unit_id FROM simpel_rincian_biaya as a join simpel_keg as b on a.id_kegiatan=b.id_kegiatan where b.unit_id in(161100)")->queryScalar();
                                    break;
                                case 151000:
                                    $jum = Yii::$app->db->createCommand("SELECT 
                                sum(alokasi_sub_mak) as total
                             FROM pagu_mak where tahun=" . $tahun . " and unit_id in(151000)")->queryScalar();
                                    $real = Yii::$app->db->createCommand("SELECT sum(jml) as jml, b.unit_id FROM simpel_rincian_biaya as a join simpel_keg as b on a.id_kegiatan=b.id_kegiatan where b.unit_id in(151000)")->queryScalar();

                                    break;
                            }
                            ?>
                            <tr>
                                <td style="background-color: white;"  scope="row"></td>
                            </tr>
                            <tr>
                                <th><?= $no ?></th>
                                <th style="text-align:left;" colspan="3" scope="row"><h6>  <?= HelperUnit::Apagu($unit->unit_id) ?> </h6></th>


                            </tr>

                            <?php
                            switch ($unit->unit_id) {
                                case 110000:
                                    $satker = DaftarUnit::find()->where('satker_id=110000 and unit_id in (111000,112000,113000,114000,115000)')->all();
                                    break;
                                case 120000:
                                    $satker = DaftarUnit::find()->where(' unit_id in (121000,122000,123000,124000)')->all();
                                    break;
                                case 130000:
                                    $satker = DaftarUnit::find()->where('unit_id in (131000,132000,133000)')->all();
                                    break;
                                case 161100:
                                    $satker = DaftarUnit::find()->where("unit_id='161100'")->all();
                                    break;
                                case 151000:
                                    $satker = DaftarUnit::find()->where("unit_id='151000'")->all();
                                    break;
                            }
                            $n = 1;
                            foreach ($satker as $sat) {
                                ?>
                                <tr>
                                    <td width="40"></td>
                                    <td  width="50" bgcolor="gray" style="text-align:center;">
                                        <div >
                                            <?php
                                            switch ($sat->unit_id) {
                                                case 110000:
                                                    ?>
                                                    <h6> <?=
                                                        Html::a(HelperUnit::Apagu($sat->unit_id), Yii::$app->urlManager->createUrl(['simpel-keg/tabdinas', 'unit' => $sat->unit_id]), [
                                                            'title' => Yii::t('yii', 'Proses'),
                                                        ])
                                                        ?> </h6>  

                                                    <?php
                                                    break;
                                                case 120000:
                                                    ?>
                                                    <h6> <?=
                                                        Html::a(HelperUnit::Apagu($sat->unit_id), Yii::$app->urlManager->createUrl(['simpel-keg/tabdinas', 'unit' => $sat->unit_id]), [
                                                            'title' => Yii::t('yii', 'Proses'),
                                                        ])
                                                        ?> </h6>  

                                                    <?php
                                                    break;
                                                case 130000:
                                                    ?>
                                                    <h6> <?=
                                                        Html::a(HelperUnit::Apagu($sat->unit_id), Yii::$app->urlManager->createUrl(['simpel-keg/tabdinas', 'unit' => $sat->unit_id]), [
                                                            'title' => Yii::t('yii', 'Proses'),
                                                        ])
                                                        ?> </h6>  

                                                    <?php
                                                    break;
                                                case 161100:
                                                    ?>
                                                    <h6> <?=
                                                        Html::a('Inspektorat', Yii::$app->urlManager->createUrl(['simpel-keg/unit', 'unit' => '151000']), [
                                                            'title' => Yii::t('yii', 'Proses'),
                                                        ])
                                                        ?> </h6>  

                                                    <?php
                                                    break;
                                                case 151000:
                                                    ?>
                                                    <h6> <?=
                                                        Html::a(HelperUnit::Apagu($sat->unit_id), Yii::$app->urlManager->createUrl(['simpel-keg/tabdinas', 'unit' => '161100']), [
                                                            'title' => Yii::t('yii', 'Proses'),
                                                        ])
                                                        ?> </h6>  

                                                    <?php
                                                    break;

                                                default:
                                                    ?>
                                                    <h6> <?=
                                                        Html::a(HelperUnit::Apagu($sat->unit_id), Yii::$app->urlManager->createUrl(['simpel-keg/tabdinas', 'unit' => $sat->unit_id]), [
                                                            'title' => Yii::t('yii', 'Proses'),
                                                        ])
                                                        ?> </h6> 
                                                    <?php
                                                    break;
                                            }
                                            ?>

                                        </div>

                                    </td>

                                    <td width="120" align="center">
                                    <?= $count ?>

                                    </td>
                                    <td align="center" width="260">Rp. <?php
                                        $pag = number_format(HelperUnit::Pagu($sat->unit_id), 0, ",", ".");
                                        echo $pag;
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $n++;
                            }
                            ?>
                            <?php
                            $no++;
                        }
                        ?>
                        <tr>
                            <td style="background-color: white;"  scope="row"></td>
                        </tr>





                    </tbody>
                </table>

            </div>
        </div>
    </div>
     </div>



<?php
$js = <<<Modal



$(function () {
    $('.modalButtonn').click(function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });

});


$(function () {
    $('.modalLuar').click(function () {
        $('#luar').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });

})

Modal;
$this->registerJs($js);
?>



<?php
Modal::begin([
    'header' => 'Perjalanan Dinas Dalam Negri',
    'options' => [
        'tabindex' => false // important for Select2 to work properly
    ],
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>";

Modal::end();
?> 


<?php
Modal::begin([
    'header' => 'Perjalanan Dinas luar Negri',
    'options' => [
        'tabindex' => false // important for Select2 to work properly
    ],
    'id' => 'luar',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>";

Modal::end();
?> 



<style type="text/css">
    .edit{
        background-color: green;
    }
</style>





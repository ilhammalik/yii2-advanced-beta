<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use kartik\date\DatePicker;
use kartik\touchspin\TouchSpin;
use yii\bootstrap\Modal;
use kartik\widgets\SwitchInput;
use dosamigos\switchinput\SwitchRadio;
use  \common\components\MyHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Perjadin */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript">
    $(document).ready(function () {
        // Smart Wizard
        $('#wizard').smartWizard();
        function onFinishCallback() {
            $('#wizard').smartWizard('showMessage', 'Finish Clicked');
        }
    });
</script>
<?php
$js = <<<Modal
$(function () {
    $('.modalBut').click(function () {
        $('#moda').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });
})
Modal;
$this->registerJs($js);
?>
<?php
Modal::begin(['header' => 'Daftar Tabel TSBU', 'options' => ['id' => 'moda', 'tabindex' => false
// important for Select2 to work properly
], 'id' => 'modal', 'size' => 'bigModal', ]);
echo "<div id='modalContent'></div>";
Modal::end();
Modal::begin(['header' => 'Data Personil', 'options' => [
//'id' => 'modall',
'tabindex' => false
// important for Select2 to work properly
], 'id' => 'modall', 'size' => 'bigModal', ]);
echo "<div id='modalContentt'></div>";
Modal::end();
?>
<table align="center" border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr><td>
        <?php
        $form = ActiveForm::begin(['id' => 'id_form']); ?>
        <!-- Smart Wizard -->
        <?php echo $form->field($model2, 'id_kegiatan')->hiddenInput(['value' => $model2->id_kegiatan])->label(false) ?>
        <div id="wizard" class="swMain">
            <ul>
                <li><a href="#step-1">
                    <span class="stepNumber">1</span>
                    <span class="stepDesc">
                    Personil<br />
                    <small>Data Personil</small>
                    </span>
                </a></li>
                <li><a href="#step-2">
                    <span class="stepNumber">2</span>
                    <span class="stepDesc">
                    Pembiyaiaan<br />
                    <small>Data Pembiyaiaan</small>
                    </span>
                </a></li>
            </ul>
            <div id="step-1">
                <!-- input penugasan -->
                <br/>
                <h2 class="StepTitle">Input Data Penugasan</h2>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            $data2 = ArrayHelper::map(\common\models\Pegawai::find()->asArray()->all(), 'nip', 'nama_cetak');
                            echo $form->field($model, 'pegawai_id')->widget(Select2::classname(), ['data' => $data2, 'options' => ['id' => 'data1', 'placeholder' => 'Pilih Nama Personil'], 'pluginOptions' => ['allowClear' => true], ])->label('Pilih Nama Personil');
                            ?>
                             <?php
                            echo $form->field($model, 'tingkat_id')->widget(Select2::classname(), ['data' => ['1'=>'Tingkat A','2'=>'Tingkat B','3'=>'Tingkat C','4'=>'Tingkat D'], 'options' => ['id' => 'data3', 'placeholder' => 'Pilih Tingkat'], 'pluginOptions' => ['allowClear' => true], ])->label('Pilih Tingkat');
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo $form->field($model, 'no_sp')->textInput()->label('No. Surat Penugasan');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo $form->field($model, 'tgl_berangkat')->widget(DatePicker::classname(), ['options' => ['placeholder' => 'Tanggal Keberangkatan'], 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-m-d', ]])->label('Tangal Keberangkatan');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                           // $data7 = ArrayHelper::map(\common\models\MasterKokab::find()->asArray()->all(), 'kota_id', 'kokab_nama');
                            //echo $form->field($model, 'berangkat_asal')->widget(Select2::classname(), ['data' => $data7, ])->label('Kota Keberangkatan');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $data9 = ArrayHelper::map(\common\models\Pegawai::find()->asArray()->all(), 'nip', 'nama_cetak');
                            echo $form->field($model, 'pejabat')->widget(Select2::classname(), ['data' => $data9, 'options' => ['id' => 'data2', 'placeholder' => 'Pilih Nama Pejabat'], 'pluginOptions' => ['allowClear' => true], ])->label('Pilih Pejabat');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $data2 = ArrayHelper::map(\common\models\Angkutan::find()->asArray()->all(), 'angkutan_id', 'nama');
                            echo $form->field($model, 'angkutan')->widget(Select2::classname(), ['data' => $data2, 'options' => ['placeholder' => 'Pilih Angkutan'], 'pluginOptions' => ['allowClear' => true], ])->label('Pilih Angkutan');
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo $form->field($model, 'tgl_kembali')->widget(DatePicker::classname(), ['options' => ['placeholder' => 'Tanggal Kembali'], 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-m-d', ]])->label('Tangal Kembali');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            // /echo $form->field($model, 'tujuan_keberangkatan')->widget(Select2::classname(), ['data' => $data7, ])->label('Kota Tujuan');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo $form->field($model, 'tgl_penugasan')->widget(DatePicker::classname(), ['options' => ['id' => 'tglsp', 'placeholder' => 'Tanggal Penugasan'], 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-m-d', ]])->label('Tanggl Penugasan');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo $form->field($model, 'uang_makan')->widget(TouchSpin::classname(), ['options' => ['id' => 'idmakan', 'placeholder' => 'Masukan Jumlah Uang Makan'], 'pluginOptions' => ['buttonup_class' => 'btn btn-primary', 'buttondown_class' => 'btn btn-info', 'buttonup_txt' => '<i class="glyphicon glyphicon-plus-sign"></i>', 'buttondown_txt' => '<i class="glyphicon glyphicon-minus-sign"></i>']]);
                            ?>
                              <p style="display: none;" id="dtg"><?= MyHelper::Formattgl($model2->tgl_mulai) ?></p>
                            <p style="display: none;" id="kmbl"><?= MyHelper::Formattgl($model2->tgl_selesai) ?></p>
                            <p style="display: none;" id="kdtg"><?= $model2->negaratuj->nama ?></p>
                            <p style="display: none;" id="kkmbl"><?= $model2->kota_negara ?></p>
                            <p style="display: none;" id="mkn"><?= $model->uang_makan ?> </p>
                        </div>
                    </div>
                </div>
            </div>
              <div id="step-2">
                    <br/>
                    <h2 class="StepTitle">Input Data Pembiayaan</h2>
                    <br/>
                    <table width="1000px" class="table table-striped table-bordered">
                        <tr style="background-color:#4e95f4;">
                            <td>No</td>
                            <td align="center">Kategori Pembiayian</td>
                            <td align="center">Bukti Kwitansi </td>
                            <td align="center">Volume </td>
                            <td align="center">Pagu</td>
                            <td align="center">%</td>
                            <td align="center">Harga Satuan</td>
                            <td align="center">Jumlah</td>
                            <td align="center">Uraian</td>
                        </tr>
                        <tbody id="container">
                            <!-- nanti rows nya muncul di sini -->
                         <?php
                        $no = 1;
                        $input = \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$model->id_personil)->all();
                        foreach ($input as $ke) { 

                                switch ($ke->kat_biaya_id) {
                                    case "1":
                                        echo '1';
                                        break;
                                    case "2":
                                        echo '1';
                                        break;
                                }
                                ?>

                                <tr>
                                    <td width="5%">
                                        <?php echo $no;
                                        ?>
                                    </td>
                                    <td width="7%">
                                       <?= $ke->biaya->nama ?>
                                       <input id="<?php echo $no ?>" name="<?= 'id_rincian_biaya'.$no ?>" value="<?php echo $ke->id_rincian_biaya ?>" type="hidden">
                                       <input id="<?php echo 'label' . $no ?>" class="form-control" name="<?php echo 'label'.$no; ?>" value="<?= $ke->biaya->nama ?>" type="hidden">
                                    </td>
                                       <td width="7%">
                                      <?php

                                $data = [1=>'Ada', 2=>'Tidak Ada',3=>'Kosong'];
                                echo Select2::widget([
                                               'name' => 'bukti_kwitansi'.$no,
                                               'value' => $ke->bukti_kwitansi, // value to initialize
                                               'data' => $data
                                            ]);

                                            ?>
                                    </td>
                                    <?php
                                    $data = [1 => 'Ada', 2 => 'Tidak Ada',3=>'Kosong'];
                                    switch ($ke->biaya->kode) {
                                        case "1":
                                            echo ' <td width="5%" align="center">';
                                            ?>
                                    <input id="<?php echo 'volume' . $no ?>" class="form-control" name="<?php echo 'volume' . $no; ?>" value="<?= $ke->volume ?>" type="text">

                                    <?php
                                    echo ' </td>';
                                    echo ' <td width="5%" align="center">';
                                    ?>
                                    <input id="<?php echo 'pagu' . $no ?>" class="form-control" name="<?php echo 'pagu' . $no; ?>" value="<?= $ke->pagu ?>"type="text">

                                    <?php
                                    echo ' </td>';
                                    echo ' <td width="5%" align="center">';
                                    ?>
                                    <input id="<?php echo 'persen' . $no ?>" class="form-control" name="<?php echo 'persen' . $no; ?>" value="<?= $ke->persen ?>"type="text">

                                    <?php
                                    echo ' </td>';
                                    echo ' <td width="10%" align="center">';
                                    ?>
                                    <input id="<?php echo 'satuan' . $no ?>" class="form-control" name="<?php echo 'satuan' . $no; ?>" value="<?= $ke->harga_satuan ?>"type="text">

                                    <?php
                                    echo ' </td>';
                                    echo ' <td width="10%" align="center">';
                                    ?>
                                    <input id="<?php echo 'jml' . $no ?>" class="form-control" name="<?php echo 'jml' . $no; ?>" value="<?= $ke->jml ?>" type="text">

                                    <?php
                                    echo ' </td>';
                                    echo ' <td width="10%" align="center">';
                                    ?>
                                    <textarea id="<?php echo 'uraian_rincian' . $no ?>" class="form-control" name="<?php echo 'uraian_rincian' . $no; ?>" ><?= $ke->uraian_rincian ?> </textarea>

                                    <?php
                                    echo ' </td>';
                                    break;
                                case "2":
                                    echo ' <td width="5%" align="center">';
                                    ?>
                                    <input id="<?php echo 'volume' . $no ?>" class="form-control" name="<?php echo 'volume' . $no; ?>" value="<?= $ke->volume ?>" type="text">

                                    <?php
                                    echo ' </td>';
                                           echo ' <td width="5%" align="center">';
                                    ?>

                                    <?php
                                    echo ' </td>';
                                           echo ' <td width="5%" align="center">';
                                    ?>

                                    <?php
                                    echo ' </td>';
                                      echo ' <td width="10%" align="center">';
                                    ?>
                                    <input id="<?php echo 'satuan' . $no ?>" class="form-control" name="<?php echo 'satuan' . $no; ?>" value="<?= $ke->harga_satuan ?>" type="text">

                                    <?php
                                    echo ' </td>';
                                      echo ' <td width="10%" align="center">';
                                    ?>
                                    <input id="<?php echo 'jml' . $no ?>" class="form-control" name="<?php echo 'jml' . $no; ?>"  value="<?= $ke->jml ?>"type="text">

                                    <?php
                                    echo ' </td>';
                                      echo ' <td width="10%" align="center">';
                                    ?>
                                    <textarea id="<?php echo 'uraian_rincian' . $no ?>" class="form-control" name="<?php echo 'uraian_rincian' . $no; ?>" value="<?= $ke->uraian_rincian ?>"> <?php echo $ke->uraian_rincian ?></textarea>

                                    <?php
                                    echo ' </td>';
                                    break;


                                case "6":
                                    ?>

                                    <td  colspan="5" align="center">
                                        <textarea id="<?php echo 'uraian_rincian' . $no ?>" rows="6" class="form-control" name="<?php echo 'uraian_rincian' . $no; ?>" value="<?= $ke->uraian_rincian ?>"> <?= $ke->uraian_rincian ?></textarea>
                                    <input id="<?php echo 'volume' . $no ?>" class="form-control" name="<?php echo 'volume' . $no; ?>" value="<?= $ke->volume ?>" type="hidden">

                                    <input id="<?php echo 'satuan' . $no ?>" class="form-control" name="<?php echo 'satuan' . $no; ?>" value="<?= $ke->harga_satuan ?>"type="hidden">

                                    <input id="<?php echo 'jml' . $no ?>" class="form-control" name="<?php echo 'jml' . $no; ?>" value="<?= $ke->jml ?>" type="hidden">
                                        
                                    </td>
                                    <?php
                                    break;
                            }
                            ?>












                            </tr>

                            <input id="<?php echo $no ?>" name="rows[]" value="<?php echo $no ?>" type="hidden">


                            <?php
                            $no++;
                        }
                        ?>
                        </tbody>
                    </table>
            </div>
        </div>



        <?php
        ActiveForm::end(); ?>
        <!-- End SmartWizard Content -->
    </td></tr>
</table>
<?php echo $this->render('biaya_luar') ?>

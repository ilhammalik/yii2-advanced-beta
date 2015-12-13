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
                    <small>Data  Pembiayaan</small>
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

                            <p style="display: none;" id="dtg"><?= MyHelper::Formattgl($model2->tgl_mulai) ?></p>
                            <p style="display: none;" id="kmbl"><?= MyHelper::Formattgl($model2->tgl_selesai) ?></p>
                            <p style="display: none;" id="kdtg"><?= $model2->kotaAsal->nama ?></p>
                            <p style="display: none;" id="kkmbl"><?= $model2->kotaTujuan->nama ?></p>
                            <p style="display: none;" id="kprov"><?= $model2->kotaTujuan->provinsi->nama ?></p>
                            <p style="display: none;" id="mkn"><?= $model->uang_makan ?> </p>
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
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-2">
                <br/>
                <h2 class="StepTitle">Input Data Penugasan</h2>
                <br/>
                <table width="1000px" class="table table-striped table-bordered">
                    <tr style="background-color:#4e95f4;">
                        <td>No</td><td>Kategori Pembiayaan</td><td >Bukti Kwitansi</td><td>Volume </td><td>Harga Satuan</td><td>Jumlah</td><td>Urian Pembiayaan</td>
                    </tr>
                    <tbody id="container">
                        <!-- nanti rows nya muncul di sini -->
                        <?php
                        $no = 1;
                        $input = \backend\models\SimpelRincianBiaya::find()->where('personil_id='.$model->id_personil)->all();
                        foreach ($input as $ke) { ?>
                        <tr>
                            <td>
                                <?php echo $no;
                                ?>
                            </td>
                            <td> <?= $ke->biaya->nama ?>
                            <input id="<?php echo $no ?>" name="<?= 'id_rincian_biaya'.$no ?>" value="<?php echo $ke->id_rincian_biaya ?>" type="hidden">
                                <input id="<?php echo 'kat_biaya_id' . $no ?>" name="<?php echo 'kat_biaya_id'.$no; ?>" value="<?= $ke->kat_biaya_id ?>" type="hidden">
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
                            <td>   <input id="<?php echo 'volume' . $no ?>" class="form-control" name="<?php echo 'volume'.$no; ?>" value="<?= $ke->volume ?>" type="int"></td>
                            <td width="300">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input id="<?php echo 'satuan' . $no ?>" class="form-control" name="<?php echo 'satuan'.$no; ?>"  value="<?= $ke->harga_satuan ?>" type="int">
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo Html::button('<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>', ['value' => Url::to(['simpel-keg/master', 'id' => $model->id_kegiatan]), 'class' => 'modalBut btn btn-danger', 'title' => 'view dokumen']) ?>
                                    </div>
                                </div>
                            </td>
                            <td>   <input id="<?php echo 'jml' . $no ?>" class="form-control" name="<?php  echo 'jml'.$no; ?>" value="<?= $ke->jml ?>" type="int"></td>
                            <td>   <input id="<?php echo 'uraian_rincian'.$no ?>" class="form-control" name="<?php  echo 'uraian_rincian'.$no; ?>"  value="<?= $ke->uraian_rincian ?>" type="text"></td>
                        </tr>
                         

                        <input id="<?php echo $no ?>" name="rows[]" value="<?php echo $no ?>" type="hidden">
                        <?php
                            $no++;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
<?php echo $this->render('biaya') ?>

        <?php
        ActiveForm::end(); ?>
        <!-- End SmartWizard Content -->
    </td></tr>
</table>


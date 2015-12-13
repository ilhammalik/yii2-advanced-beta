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
use dosamigos\tinymce\TinyMce;
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
        <?php echo $form->field($model2, 'id_kegiatan')->hiddenInput(['value' => $model2->id_kegiatan])->label(false) ?>
        <!-- Smart Wizard -->
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

                            <p style="display: none;" id="dtg"><?= MyHelper::Formattgl($model2->tgl_mulai) ?></p>
                            <p style="display: none;" id="kmbl"><?= MyHelper::Formattgl($model2->tgl_selesai) ?></p>
                            <p style="display: none;" id="kdtg"><?= $model2->kotaAsal->nama ?></p>
                            <p style="display: none;" id="kkmbl"><?= $model2->kotaTujuan->nama ?></p>
                            <p style="display: none;" id="kprov"><?= $model2->kotaTujuan->provinsi->nama ?></p>
                            <p style="display: none;" id="mkn"><?= $model->uang_makan ?> </p>
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
                            echo $form->field($model2, 'tgl_mulai')->widget(DatePicker::classname(), ['options' => ['placeholder' => 'Tanggal Keberangkatan'], 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-m-d', ]])->label('Tangal Keberangkatan');
                            ?>
                        </div>
                       
                        <div class="form-group">
                            <?php
                            $data9 = ArrayHelper::map(\common\models\Pegawai::find()->asArray()->all(), 'nip', 'nama_cetak');
                            echo $form->field($model, 'pejabat')->widget(Select2::classname(), ['data' => $data9, 'options' => ['id' => 'data2', 'placeholder' => 'Pilih Pejabat Memberi Tugas'], 'pluginOptions' => ['allowClear' => true], ])->label('Pilih Pejabat Memberi Tugas');
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
                            echo $form->field($model2, 'tgl_selesai')->widget(DatePicker::classname(), ['options' => ['placeholder' => 'Tanggal Kembali'], 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-m-d', ]])->label('Tangal Kembali');
                            ?>
                        </div>

                 
                        <div class="form-group">
                            <?php
                            echo $form->field($model, 'tgl_penugasan')->widget(DatePicker::classname(), ['options' => ['id' => 'tglsp','require' => true,'placeholder' => 'Tanggal Penugasan'], 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-m-d', ]])->label('Tanggl Penugasan');
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
                <h2 class="StepTitle">Input Data Pembiayaan</h2>
                <br/>
                <table width="1000px" class="table table-striped table-bordered">
                    <tr style="background-color:#4e95f4;">
                        <td>No</td><td>Kategori Pembiayaan</td><td style="width:130px;">Bukti Kwitansi</td><td>Volume </td><td>Harga Satuan</td><td>Jumlah</td><td>Urian Pembiyaian</td>
                    </tr>
                    <tbody id="container">
                        <!-- nanti rows nya muncul di sini -->
                        <?php
                        $no = 1;
                     
                        switch ($model2->negara) {
                                case "1":
                                 $input = \backend\models\SimpelDafKatBiaya::find()->where('kat_biaya_id in (1,2,3,4,5,6,7,8,9,10)')->orderby('kat_biaya_id asc')->all();
                                    break;
                                case "2":
                                    $input = \backend\models\SimpelDafKatBiaya::find()->where('kat_biaya_id in (16,11,12,13,14,15,19)')->orderby('kat_biaya_id asc')->all();
                                    break;
                                
                            }
                        foreach ($input as $ke) { ?>
                        <tr>
                            <td>
                                <?php echo $no;
                                ?>
                            </td>
                            <td>
                            <?php 

                            echo $ke->nama ;

                                ?>

                                <input id="<?php echo 'kat_biaya_id' . $no ?>" name="<?php echo 'kat_biaya_id'.$no; ?>" value="<?= $ke->kat_biaya_id ?>" type="hidden">
                            </td>
                         <td>
                         <?php
                                $data = [1=>'Ada', 2=>'Tidak Ada',3=>'Kosong'];
                                echo Select2::widget([
                                               'name' => 'bukti_kwitansi'.$no,
                                               'value' => 1, // value to initialize
                                               'data' => $data
                                            ]);
                          ?>   
                                            <input id="<?php echo 'label' . $no ?>" class="form-control" name="<?php echo 'label'.$no; ?>" value="<?= $ke->nama ?>" type="hidden">

                         </td>
                         <td> <input id="<?php echo 'volume' . $no ?>" class="form-control" name="<?php echo 'volume'.$no; ?>" type="text"></td>
                          <td width="300">
                                        <div class="row">
                                            <div class="col-md-8">
                                               <input id="<?php echo 'satuan' . $no ?>" class="form-control" name="<?php echo 'satuan'.$no; ?>" type="text">
                                              </div>
                                                <div class="col-md-2">
                                                  <?php echo Html::button('<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>', ['value' => Url::to(['simpel-keg/master', 'id' => $model2->id_kegiatan]), 'class' => 'modalBut btn btn-danger', 'title' => 'view sbu']) ?>
                                                   </div>
                                                </div>
                                            </td>
                          <td> 
                                               <input id="<?php echo 'jml' . $no ?>" class="form-control" name="<?php  echo 'jml'.$no; ?>" type="text">
                                               </td>
                        <td>
                                             <textarea id="<?php echo 'uraian'.$no ?>" class="form-control" name="<?php  echo 'uraian'.$no; ?>" > </textarea>
                                             </td>
                        </tr>

                                    <input id="<?php echo $no ?>" name="rows[]" value="<?php echo $no ?>" type="hidden">
                                       
                                  
                        <?php
                            $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        ActiveForm::end(); ?>
        <!-- End SmartWizard Content -->
    </td></tr>
</table>
<?php echo $this->render('biaya') ?>
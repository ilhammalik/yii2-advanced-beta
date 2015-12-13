<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use \common\components\MyHelper;
use kartik\widgets\DatePicker;
use kartik\select2\Select2;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimpelRekapSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
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

                                        $data = ArrayHelper::map(\common\models\DaftarUnit::find()->where('unit_id in (100000,110000,120000,130000)')->asArray()->all(), 'unit_id', 'nama');
                                        ?>
                                 
                                        <?php
                                        echo Select2::widget([
                                            'name' => 'unit',
                                            'data' => $data,
                                            'pluginOptions' => [
                                                    'allowClear' => true
                                                ],
                                            'options' => [
                                                'id'=>'test',

                                                'placeholder' => 'Pilih Unit Kerja',
                                              'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl('simpel-rekap/lists?id=').'"+$(this).val(), function( data ) {
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
                                                'id'=>'ids',
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
                                        Bulan / Tahun
                                    </div>
                                    <div class="col-md-8">
                                        <table>
                                            <tr>
                                                <td>
                                                    <?php
                                                    echo DatePicker::widget([
                                                        'name' => 'tgl_mulai',
                                                        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'format' => 'yyyy-mm-d'
                                                        ]
                                                    ]);
                                                    ?>

                                                </td>
                                                <td align="center" width="50">s/d</td>
                                                <td>
                                                    <?php
                                                    echo DatePicker::widget([
                                                        'name' => 'tgl_kembali',
                                                        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'format' => 'yyyy-mm-d'
                                                        ]
                                                    ]);
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <hr/>
                               <!--  <div class="row">
                                    <div class="col-md-4">
                                        Tahun
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                        $thisYear = date('Y', time());
                                        for ($yearNum = $thisYear; $yearNum >= 2010; $yearNum--) {
                                            $years[$yearNum] = $yearNum;
                                        }
                                        ?>
                                        <select name="tahun" onchange="this.form.submit()" class="form-group">
                                            <?php
                                            foreach ($years as $key) {
                                                echo '<option value="' . $key . '">' . $key . '</option>
                                                            ';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> -->
                            </div>

                            <?php echo Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?></div>
                    </div>
                </div>

            </form>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\ArrayHelper;
use \common\components\MyHelper;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WpPostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Home');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="block">
    <div class="block-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="wp-posts-index">



        <h2 align="center">Realisasi Perjalanan Dinas per Satuan Kerja T.A.
            <?php
            $form = ActiveForm::begin([
                        'action' => ['index'],
                        'method' => 'get',
            ]);
            ?>
            <?php
            $thisYear = date('Y', time());
            for ($yearNum = $thisYear; $yearNum >= 2010; $yearNum--) {
                $years[$yearNum] = $yearNum;
            }
            ?>

            <select name="tahun" onchange="this.form.submit()">
                <?php
                foreach ($years as $key) {
                    echo '<option value="' . $key . '">' . $key . '</option>';
                }
                ?>

            </select>

            <?php ActiveForm::end(); ?>


        </h2>


        <table class="table1" width="100%">
            <thead>
                <tr>
                    <th>Satuan Kerja</th>
                    <th scope="col" abbr="Starter"><center>Pagu</center></th>
            <th scope="col" abbr="Medium"><center>Realisasi</center></th>
            <th scope="col" abbr="Business"><center>Sisa</center></th>
            <th scope="col" abbr="Deluxe"><center>Prosen</center></th>
            </tr>
            </thead>
            <tfoot>
                
            </tfoot>
            <tbody>
             <tr>
                    <td style="background-color: white;"  scope="row"></td>
                </tr>
                <tr>
                    <th scope="row">Deputi PI</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    </td>

                </tr>
                <?php
                
                $satker = \common\models\DaftarUnit::find()->where('satker_id=110000 and unit_id in (111000,112000,113000,114000,115000)')->all();

                foreach ($satker as $sat) {
                    ?>
                    <tr>
                        <th  bgcolor="gray" align="left">
                            <div class="pull-right">
                                <?= \common\components\HelperUnit::Apagu($sat->unit_id)  ?>   
                            </div>

                        </th>

                    </tr>



                <?php } ?>
                 <tr>
                    <td style="background-color: white;"  scope="row"></td>
                </tr>
                
               
               
          

            </tbody>
        </table>




    </div>
</div>

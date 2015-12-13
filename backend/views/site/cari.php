 <?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;


?>
        <?php $form = ActiveForm::begin([
                                    'action' => ['index'],
                                    'method' => 'get',
        ]); ?>
        <?php
                                    $thisYear = date('Y', time());
                                    for($yearNum = $thisYear; $yearNum >= 2010; $yearNum--){
                                        $years[$yearNum] = $yearNum;
        }?>
        <select name="tahun" onchange="this.form.submit()">
            <?php foreach ($years as $key) {
                                        echo '<option value="'.$key.'">'.$key.'</option>';
                                    }
            ?>

        </select>
        <?php ActiveForm::end(); ?>
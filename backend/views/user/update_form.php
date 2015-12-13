<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar User');
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="user-index">
         <?php $form = ActiveForm::begin(); ?>

    <div class="block">
        <div class="block-title">
            <div class="block-options pull-left">
                <?= Html::a(Yii::t('app', '<i class="fa fa-list"></i>'), ['index'], ['class' => 'btn btn-alt btn-sm btn-default', 'data-toggle' => 'tooltip', 'title' => '', 'data-original-title' => 'Tambah User']) ?>
            </div>
            <h6><?= Html::encode($this->title) ?></h6>


            <div class="block-options pull-right">
                <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i>'), ['create'], ['class' => 'btn btn-alt btn-sm btn-default', 'data-toggle' => 'tooltip', 'title' => '', 'data-original-title' => 'Tambah User']) ?>
            </div>
        </div>
        <div class="wp-posts-index">
                <fieldset>
                    <legend>Profile Info</legend>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Username</label>
                        <div class="col-md-8">
                          <?php   echo $form->field($model, 'username')->textInput(['value'=>$model->username])->label(false); ?>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                        <div class="col-md-8">
                          <?php   echo $form->field($model, 'email')->textInput(['value'=>$model->email])->label(false); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-email">Hak Akses</label>
                        <div class="col-md-8">
                        <?php
                            if(Yii::$app->user->identity->role == 1){
                                $data = [1=> 'Superadmin', 2=> 'Admin', 3 => 'Pimpinan 1', 4 => 'Pimpinan 2',5 => 'User'];
                            }else if (Yii::$app->user->identity->role == 2){
                                $data = [2=> 'Admin', 3 => 'Pimpinan 1', 4 => 'Pimpinan 2',5 => 'User'];
                            }else if (Yii::$app->user->identity->role == 3){
                                $data = [ 3 => 'Pimpinan 1', 4 => 'Pimpinan 2',5 => 'User'];
                            }
                            echo $form->field($model, 'role')->widget(Select2::classname(), [
                                'name' => 'role',
                                'data' => $data,
                                'theme' => Select2::THEME_KRAJEE,
                                'options' => ['placeholder' => 'Pilh Hak Akses'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                               ])->label(false);// Classic Theme
              
                            ?>
                        </div>
                    </div>
                    
                </fieldset>
                
                <br/>
              
                <br/>
               

        </div>
    </div>

    <div class="widget">
<div class="widget-simple">
<?= Html::a(Yii::t('app', 'Batal &nbsp;'), ['/site/index'], ['class' => 'btn btn-success']) ?>&nbsp;&nbsp;&nbsp;
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'pull-right btn btn-primary']) ?>
</h3>
</div>
</div>
<?php ActiveForm::end(); ?>


</div>


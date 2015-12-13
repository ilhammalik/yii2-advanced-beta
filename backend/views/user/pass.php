<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
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
                            <p class="form-control-static"><?= Yii::$app->user->identity->username ?></p>
                        </div>
                    </div>
                   
                </fieldset>
                <fieldset>
                    <legend>Password Update</legend>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-password">Old Password</label>
                        <div class="col-md-8">
                          <?php   echo $form->field($model, 'password')->passwordInput()->label(false); ?>
                          <?php   echo $form->field($model, 'email')->hiddenInput(['value'=>$model->email])->label(false); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                        <div class="col-md-8">
                          <?php  echo $form->field($model, 'password_new')->passwordInput()->label(false); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                        <div class="col-md-8">
                            <?php  echo $form->field($model, 'password_compare')->passwordInput()->label(false); ?>
                        </div>
                    </div>
                </fieldset>
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


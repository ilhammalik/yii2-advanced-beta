<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SimpelUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Simpel Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Pjax::begin(['id' => 'userSearch']);
$url_search = Url::to(['simpel-user/search-user']);
$js =<<<js
$("#searchQuery").keyup(function(){
    $("#datauserGridview").load("{$url_search}"+"?search="+$(this).val());
});


 
js;
$this->registerJS($js);


?>
<?=  Yii::$app->user->can('superadmin/view') ?>
<div class="simpel-user-index">
<div class="block">
<div class="block-title">
<h2><?= Html::encode($this->title) ?></h2>
<div class="block-options pull-right">
   
                    <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i>'), ['create'], ['class' => 'btn btn-alt btn-sm btn-default', 'data-toggle'=>'tooltip', 'title'=>'','data-original-title'=>'Tambah User']) ?>
        

  
</div>
</div>
 
<div class="wp-posts-index">
<div class="row">
    <div class="col-lg-6">
    </div>
    <div class="col-lg-6">
        <form class="FormAjax" method="get" action="">
            <div class="input-group">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                <input id="searchQuery" type="text" class="form-control" placeholder="masukkan nama user, email , Jabatan">
                <span class="input-group-btn">
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
        </form>
    </div>
</div>
<br/>
<div id="datauserGridview">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
                [
            'label' => 'User Group',
            'value' => 'UserRole',
            ],
            'email:email',
             'unit_id',

             
                [
                            'class' => 'yii\grid\ActionColumn',
                            'contentOptions' => ['style' => 'width:169px; z-index:200;'],
                            'header' => 'Actions',
                            'template' => '{update}{delete}{create}{view}',
                            'buttons' => [
                               'update' => function ($url, $model) {
                                if (\Yii::$app->user->can('simpel-user/update')) {
                                  return Html::a('<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button> &nbsp;', Yii::$app->urlManager->createUrl(['simpel-user/update','id' => $model->id]), [
                                                    'title' => Yii::t('yii', 'Edit'),
                                                  ]);
                                    }
                                    else {
                                    return ''; 
                                    }
                                 },
                                /*'update' => function ($url, $model) {
                                    return Html::a('<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button> &nbsp;', Yii::$app->urlManager->createUrl(['simpel-user/update','id' => $model->id]), [
                                                    'title' => Yii::t('yii', 'Edit'),
                                                  ]);},*/
                                'delete' => function ($url, $model) {
                                    return Html::a('<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>', Yii::$app->urlManager->createUrl(['simpel-user/delete','id' => $model->id]), [
                                                    'title' => Yii::t('yii', 'Edit'),
                                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                                                            'data-method' => 'post',
                                                  ]);},
                                    ],
                                ],
        ],
    ]); ?>
</div>

</div>
</div>
</div>
<?php
Pjax::end();
?>

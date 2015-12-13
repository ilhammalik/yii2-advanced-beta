<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MasterSerasi */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Master Serasi',
]) . ' ' . $model->detail_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Master Serasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->detail_id, 'url' => ['view', 'id' => $model->detail_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="master-serasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

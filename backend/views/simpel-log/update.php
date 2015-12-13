<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelLog */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Simpel Log',
]) . ' ' . $model->id_log;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_log, 'url' => ['view', 'id' => $model->id_log]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="simpel-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

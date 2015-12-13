<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelPersonil */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Simpel Personil',
]) . ' ' . $model->id_personil;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Personils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_personil, 'url' => ['view', 'id' => $model->id_personil]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="simpel-personil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

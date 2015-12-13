<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelPagu */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Simpel Pagu',
]) . ' ' . $model->id_pagu;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Pagus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pagu, 'url' => ['view', 'id' => $model->id_pagu]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="simpel-pagu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

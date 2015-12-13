<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SimpelKeg */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Simpel Keg',
]) . ' ' . $model->id_kegiatan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Kegs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kegiatan, 'url' => ['view', 'id' => $model->id_kegiatan]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="simpel-keg-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

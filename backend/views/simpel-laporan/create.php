<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SimpelPersonil */

$this->title = Yii::t('app', 'Create Simpel Personil');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Personils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simpel-personil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

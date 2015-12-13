<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SimpelKeg */

$this->title = Yii::t('app', 'Create Simpel Keg');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Kegs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simpel-keg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

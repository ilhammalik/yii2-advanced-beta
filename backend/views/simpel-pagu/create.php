<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SimpelPagu */

$this->title = Yii::t('app', 'Create Simpel Pagu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Pagus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simpel-pagu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

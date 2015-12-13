<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SimpelLog */

$this->title = Yii::t('app', 'Create Simpel Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simpel-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

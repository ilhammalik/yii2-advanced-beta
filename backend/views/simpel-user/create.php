<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SimpelUser */

$this->title = Yii::t('app', 'Create Simpel User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simpel Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simpel-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

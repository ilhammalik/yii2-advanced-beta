<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TabelSbu */

$this->title = Yii::t('app', 'Create Tabel Sbu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tabel Sbus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-sbu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

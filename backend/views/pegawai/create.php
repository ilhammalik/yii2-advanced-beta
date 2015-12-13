<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pegawai */

$this->title = Yii::t('app', 'Create Pegawai');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pegawais'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

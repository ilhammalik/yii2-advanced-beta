<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MasterSerasi */

$this->title = Yii::t('app', 'Create Master Serasi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Master Serasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-serasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

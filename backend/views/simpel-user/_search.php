<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

Pjax::begin(['id' => 'searchinguser']);
?>
<?= GridView::widget([
        'dataProvider' => $dataUser,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
             'unit_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php

Pjax::end();
?>
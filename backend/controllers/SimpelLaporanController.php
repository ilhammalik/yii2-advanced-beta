<?php

namespace backend\controllers;

class SimpelLaporanController extends \yii\web\Controller {

    public $layout = 'admin';

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionMak() {
        return $this->render('max');
    }

}

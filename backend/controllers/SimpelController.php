<?php

namespace backend\controllers;

class SimpelController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionPimpinan1() {
        return $this->render('pimpinan1');
    }

    public function actionPimpinan2() {
        return $this->render('pimpinan2');
    }

    public function actionUser() {
        return $this->render('user');
    }

}

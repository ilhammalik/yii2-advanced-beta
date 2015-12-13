<?php

namespace backend\controllers;

use Yii;
use backend\models\SimpelUser;
use backend\models\SimpelUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * SimpelUserController implements the CRUD actions for SimpelUser model.
 */
class SimpelUserController extends Controller {

    public $layout = 'admin';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SimpelUser models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SimpelUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SimpelUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SimpelUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SimpelUser();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                //logik untuk menambahkan role / hak akses 
                if ($_POST['SimpelUser']['role'] == 1) {
                    $auth = Yii::$app->get('authManager');
                    $authorRole = $auth->getRole('superadmin');
                    $auth->assign($authorRole, $model->getId());
                } else if ($_POST['SimpelUser']['role'] == 2) {
                    $auth = Yii::$app->get('authManager');
                    $authorRole = $auth->getRole('admin');
                    $auth->assign($authorRole, $data_hasil);
                } else if ($_POST['SimpelUser']['role'] == 3) {
                    $auth = Yii::$app->get('authManager');
                    $authorRole = $auth->getRole('pimpinan 1');
                    $auth->assign($authorRole, $data_hasil);
                } else if ($_POST['SimpelUser']['role'] == 4) {
                    $auth = Yii::$app->get('authManager');
                    $authorRole = $auth->getRole('pimpinan 2');
                    $auth->assign($authorRole, $data_hasil);
                } else if ($_POST['SimpelUser']['role'] == 5) {
                    $auth = Yii::$app->get('authManager');
                    $authorRole = $auth->getRole('user');
                    $auth->assign($authorRole, $data_hasil);
                }

                $content = '
                    <center><img src="http://i.imgur.com/p5lHZXS.png"/></center><br/>
                    <h4 align="center">Badan Pengawas Tenaga Nuklir  ' . date('Y') . '</h4>
                    <hr/>
                    <p>Yth ' . $model->username . ',<br/>  
                    Dengan ini kami sampaikan akun telah terdaftar untuk masuk ke Sistem Aplikasi Perjalanan Dinas – BAPETEN, sebagai berikut:<br/> 
                    Username : ' . $model->username . ' <br/>
                    Password :<b>' . $random . '</b><br/>
                    Mohon lakukan penggantian password Anda setelah melakukan login.\n
                    Terima Kasih. <hr/>
                    <h5 align="center">Subbag Perjalanan Dinas Biro Umum BAPETEN  ' . date('Y') . '</h5><br/>';
                Yii::$app->mailer->compose("@common/mail/layouts/html", ["content" => $content])
                        ->setTo($_POST['User']['email'])
                        ->setFrom([$_POST['User']['email'] => $model->username])
                        ->setSubject('Ubah Kata Sandi')
                        ->setTextBody($random)
                        ->send();
                return $this->redirect(['view', 'id' => $model->user_id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SimpelUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SimpelUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SimpelUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SimpelUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SimpelUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //
    public function actionSearchUser($search) {
        $sumber = SimpelUser::find()->andWhere('(username like \'%' . $search . '%\' or unit_id  like \'%' . $search . '%\')');
        $dataUser = new ActiveDataProvider([
            'query' => $sumber,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
        return $this->renderAjax('@backend/views/simpel-user/_search', [
                    'dataUser' => $dataUser,
        ]);
    }

}

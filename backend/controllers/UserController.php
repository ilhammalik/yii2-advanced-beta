<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\jui\Dialog;
use yii\base\DynamicModel;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public $layout = 'admin';

    public $password_new;
    public $password_compare;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

       public function actionCreate()
    {
        $model = New User;

        if ($model->load(Yii::$app->request->post())) {
          if ($model->save()) {
            $str = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'.date('yyydmmdhis');
                    $potong = str_shuffle($str);
                    $random = substr($potong, 3, 12);
            $model->setPassword($random);
            $model->username= $_POST['User']['username'];
            $model->role = $_POST['User']['role'];
            $model->generateAuthKey();
          
          
            $content = '
                    <center><img src="http://i.imgur.com/p5lHZXS.png"/></center><br/>
                    <h4 align="center">Badan Pengawas Tenaga Nuklir  '.date('Y').'</h4>
                    <hr/>
                    <p>Yth '.$model->username.',<br/>  
                    Dengan ini kami sampaikan akun telah terdaftar untuk masuk ke Sistem Aplikasi Perjalanan Dinas – BAPETEN, sebagai berikut:<br/> 
                    Username : '.$model->username.' <br/>
                    Password :<b>'.$random.'</b><br/>
                    Mohon lakukan penggantian password Anda setelah melakukan login.\n
                    Terima Kasih. <hr/>
                    <h5 align="center">Subbag Perjalanan Dinas Biro Umum BAPETEN  '.date('Y').'</h5><br/>';
                    Yii::$app->mailer->compose("@common/mail/layouts/html", ["content" => $content ])
                        ->setTo( $_POST['User']['email'])
                        ->setFrom([$_POST['User']['email'] => $model->username])
                        ->setSubject('Ubah Kata Sandi')
                        ->setTextBody($random)
                        ->send();
            $model->save();
            return $this->redirect(['index']);
          
        }else{
            var_dump($model->errors);
        }
        
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
 

        public function actionProfile($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (!empty($model->save())){
                   if ($_POST['User']['role'] == 1){
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('superadmin');
                        $auth->assign($authorRole, $model->id);
                    }else if ($_POST['User']['role'] == 2){
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('admin');
                        $auth->assign($authorRole, $model->id);
                    }else if ($_POST['User']['role'] == 3){
                        
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('Pimpinan 1');
                        $auth->assign($authorRole, $model->id);
                    }else if ($_POST['User']['role'] == 4){
                       
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('Pimpinan 2');
                        $auth->assign($authorRole, $model->id);
                    }
                    else if ($_POST['User']['role'] == 5){
                       
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('User');
                        $auth->assign($authorRole, $model->id);
                    }
                    Yii::$app->db->createCommand()->update('user', ['role' =>$_POST['User']['role']], ['id' => $model->id])->execute();
                    $model->save();
                Dialog::begin([
                     'clientOptions' => [
                          'modal' => true,
                      ],
                  ]);
                 
                  echo 'Data Sudah Tersimpan';
                 
                Dialog::end();
            }
            
                    //return $this->redirect(['/user/profile']);
        }
        return $this->render('profile', [
                    'model' => $model
        ]);
    }

       public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (!empty($model->save())){
                   if ($_POST['User']['role'] == 1){
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('superadmin');
                        $auth->assign($authorRole, $model->id);
                    }else if ($_POST['User']['role'] == 2){
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('admin');
                        $auth->assign($authorRole, $model->id);
                    }else if ($_POST['User']['role'] == 3){
                        
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('Pimpinan 1');
                        $auth->assign($authorRole, $model->id);
                    }else if ($_POST['User']['role'] == 4){
                       
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('Pimpinan 2');
                        $auth->assign($authorRole, $model->id);
                    }
                    else if ($_POST['User']['role'] == 5){
                       
                        $auth = Yii::$app->get('authManager');
                        $auth->getRolesByUser($model->id);
                        $auth->revokeAll($model->id);
                        $authorRole = $auth->createRole('User');
                        $auth->assign($authorRole, $model->id);
                    }
                    Yii::$app->db->createCommand()->update('user', ['role' =>$_POST['User']['role']], ['id' => $model->id])->execute();
                    $model->save();
                Dialog::begin([
                     'clientOptions' => [
                          'modal' => true,
                      ],
                  ]);
                 
                  echo 'Data Sudah Tersimpan';
                 
                Dialog::end();
            }
            
                    //return $this->redirect(['/user/profile']);
        }
        return $this->render('update', [
                    'model' => $model
        ]);
    }

    public function actionPass($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('ubahpassword');

        if ($model->load(Yii::$app->request->post())) {
            if ($_POST['User']) {
                $model->attributes = $_POST['User'];
                $valid = $model->validate();

                if ($valid) {
                    $model = User::find()
                            ->where(['id' => $id])
                            ->one();
                    $model->setPassword($_POST['User']['password_new']);
                    $model->save();
                    $content = "<p>Kata Sandi Ada    ".$_POST['User']['password_new']."</p>";

                    Yii::$app->mailer->compose("@common/mail/layouts/html", ["content" => $content ])
                        ->setTo($model->email)
                        ->setFrom([$model->email => $model->username])
                        ->setSubject('Ubah Kata Sandi')
                        ->setTextBody($_POST['User']['password_new'])
                        ->send();
                        Yii::$app->session->setFlash('success', 'Email Sudah DI Kirim');
                    Yii::$app->user->logout();
                    return $this->redirect(['/site/login']);
                }


            }
        }
        return $this->render('pass', [
                    'model' => $model
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSell()
    {
        $searchModel  = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->isAjax):

            echo json_encode($dataProvider);

            return true;

        endif;

        return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider
            ]);
    }

    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use \common\models\User;
use yii\helpers\Url;
use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public $layout = 'admin';

    //public $defaultAction = 'coba';
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'reset', 'error', 'coba'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'admin'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    // public function actionAdmin() {

    //     return $this->render('index');
    // }

    public function actionAdmin() {

        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
        $dunit = Yii::$app->user->identity->unit_id;

        if ($dunit == '100000') {

            $command = Yii::$app->db->createCommand("SELECT 
                sum(pagu) as total
                 FROM t_mak where unit_mak in('BP','BHO','BU','Biro Umum','INSPEK','BDL') and t_mak.tahun=" . $tahun);

            $dataPagu = $command->queryScalar();

            $command2 = Yii::$app->db->createCommand("SELECT 
                sum(pagu)
                 FROM t_mak where unit_mak in('DIFRZR', 'DPIBN', 'DPFRZR', 'DI2BN', 'DK2N') and t_mak.tahun=" . $tahun);
            $dataPagu2 = $command2->queryScalar();

            $command3 = Yii::$app->db->createCommand("SELECT 
                sum(pagu)
                 FROM t_mak where unit_mak in('P2STPFRZR', 'P2STPIBN', 'DP2FRZR', 'DP2IBN') and t_mak.tahun=" . $tahun);
            $dataPagu3 = $command3->queryScalar();

            $command4 = Yii::$app->db->createCommand("SELECT 
                sum(pagu)
                 FROM t_mak where unit_mak in('SKLN') and t_mak.tahun=" . $tahun);
            $dataPagu4 = $command4->queryScalar();
            //akhir data pagu

            $totalPagu = $dataPagu + $dataPagu2 + $dataPagu3 + $dataPagu4;
            //mulai data realisasi
        }
        if ($dunit == '100000') {
            $count = \common\models\DaftarUnit::find()->where('unit_id in (110000,120000,130000,161100,151000)')->count();
            $unit = \common\models\DaftarUnit::find()->where('unit_id in (110000,120000,130000,161100,151000)');
        } else {

            $count = \common\models\DaftarUnit::find()->where('unit_id in (' . $dunit . ')')->count();
            $unit = \common\models\DaftarUnit::find()->where('unit_id in (' . $dunit . ')');
        }


        $pages = new Pagination(['totalCount' => $count]);
        $models = $unit->offset($pages->offset, $pages->pageSize = 100)
                ->limit($pages->limit)
                ->all();


        $unitkerja = Yii::$app->db->createCommand("SELECT sum(pagu) FROM t_mak where  t_mak.tahun=" . $tahun)->queryScalar();
        $unitke = Yii::$app->db->createCommand("SELECT sum(pagu) FROM t_mak where  t_mak.tahun=" . $tahun)->queryScalar();
        $realisasi = Yii::$app->db->createCommand("SELECT sum(jml) FROM `simpel_rincian_biaya` where id_kegiatan=4")->queryScalar();


        return $this->render('index', [
                    //'dataPagu' => $dataPagu,
                    'dataPagu2' => $dataPagu2,
                    'dataPagu3' => $dataPagu3,
                    'dataPagu4' => $dataPagu4,
                    'totalPagu' => $totalPagu,
                    'pages' => $pages,
                    'unit' => $unit,
                    'realisasi' => $realisasi,
                    'models' => $models,
                    'unitkerja' => $unitkerja,
                    'unitke' => $unitke,
                    'dunit'=>$dunit,
        ]);
    }

    public function actionIndex() {
        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
        $dunit = Yii::$app->user->identity->unit_id;
        $commandR2 = Yii::$app->db->createCommand("SELECT 
                  a.*
                FROM simpel_keg as a, simpel_rincian_biaya as b, t_mak as c
                where a.id_kegiatan=b.id_kegiatan
                AND a.mak=c.mak
                AND unit_mak in('DIFRZR', 'DPIBN', 'DPFRZR', 'DI2BN', 'DK2N')
                AND c.tahun=" . $tahun);
        

        return $this->render('pimpinan1', [
                    
                      'dunit'=>$dunit,
        ]);
    }

    public function actionLogin() {
        $this->layout = 'login';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        //$dunit = Yii::$app->user->identity->unit_id;
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
             print_r($_POST['LoginForm']['username']);
            die();
               return $this->goHome();
            // switch ($dunit) {
            //     case 100000:
            //         return $this->redirect(['/site/index']);
            //         break;
            //     case 110000:
            //         return $this->redirect(['/site/pimpinan1']);
            //         break;
            // }
        } else {
            return $this->render('log', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {

        Yii::$app->user->logout();
        return $this->goHome();
    }

    //ilham fungsi reset password menambahkan tanggal 24 september 2015
    public function actionReset() {
        $this->layout = 'login';
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            if ($_POST['User']) {
                $model->attributes = $_POST['User'];
                $valid = $model->validate();

                if ($valid) {
                    $model = User::find()
                            ->where(['email' => $_POST['User']['email']])
                            ->one();
                    $str = date('ymdhis') . 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890' . date('d');
                    $potong = str_shuffle($str);
                    $random = substr($potong, 3, 8, 12);
                    $model->setPassword($random);
                    $content = '
                    <center><img src="http://i.imgur.com/p5lHZXS.png"/></center><br/>
                    <h4 align="center">Badan Pengawas Tenaga Nuklir  ' . date('Y') . '</h4>
                    <hr/>
                    <p>Yth ' . $model->username . ',<br/>  
                    Dengan ini kami sampaikan password telah direset  sebagai berikut:<br/> 
                    Username : ' . $model->username . ' <br/>
                    Password :<b>' . $random . '</b><br/>
                    Mohon lakukan penggantian password Anda setelah melakukan login. <hr/>
                    <h5 align="center">Subbag Perjalanan Dinas Biro Umum BAPETEN  ' . date('Y') . '</h5><br/>';
                    Yii::$app->mailer->compose("@common/mail/layouts/html", ["content" => $content])
                            ->setTo($_POST['User']['email'])
                            ->setFrom([$_POST['User']['email'] => 'Aplikasi Simpel Bapeten'])
                            ->setSubject('Ubah Kata Sandi')
                            ->setTextBody($random)
                            ->send();
                    $model->save();
                    return $this->redirect(['/site/login']);
                }
            }
        }
        return $this->render('reset', [
                    'model' => $model
        ]);
    }

}

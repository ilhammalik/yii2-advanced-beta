<?php

namespace backend\controllers;

use Yii;
use backend\models\SimpelPagu;
use backend\models\SimpelPaguSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SimpelPaguController implements the CRUD actions for SimpelPagu model.
 */
class SimpelPaguController extends Controller {

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
     * Lists all SimpelPagu models.
     * @return mixed
     */
    public function actionIndex() {


        $searchModel = new SimpelPaguSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGenerate() {

        if ($_POST['tahun']) {

            $data = Yii::$app->db->createCommand("SELECT  a.*, b.unit_id FROM serasi2015_sql.news_sub_mak_tahun as a join serasi2015_sql.news_nas_suboutput as b on a.suboutput_id=b.suboutput_id
         where a.kode_mak in (524113,524111,524119,524114) ")->queryAll();

            //524114 tidak filter 
            $pagu = Yii::$app->db->createCommand("SELECT * FROM pagu_mak")->queryAll();

            foreach ($pagu as $ke) {
                Yii::$app->db->createCommand('DELETE FROM pagu_mak WHERE  id_pagu=' . $ke['id_pagu'])->execute();
            }
            foreach ($data as $key) {
                //      print_r($key['suboutput_id']);
                // die(); 

                Yii::$app->db->createCommand()->insert('pagu_mak', [
                    'tahun' => $key['tahun'],
                    'alokasi_sub_mak' => $key['alokasi_sub_mak'],
                    'kd_satker' => $key['kd_satker'],
                    'nas_prog_id' => $key['nas_prog_id'],
                    'nas_keg_id' => $key['nas_keg_id'],
                    'kdoutput' => $key['kdoutput'],
                    'kdsoutput' => $key['kdsoutput'],
                    'kdkmpnen' => $key['kdkmpnen'],
                    'kdskmpnen' => $key['kdskmpnen'],
                    'kdsoutput' => $key['kdsoutput'],
                    'kode_mak' => $key['kode_mak'],
                    'suboutput_id' => $key['suboutput_id'],
                    'unit_id' => \common\components\HelperUnit::Out($key['suboutput_id']),
                        ], ['tahun' => $_POST['tahun']])->execute();
            }
            Yii::$app->session->setFlash('success', 'Update Pagu Anggaran Berhasil');
        }
        Yii::$app->session->setFlash('success', 'Update Pagu Anggaran Berhasil');
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing SimpelPagu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SimpelPagu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SimpelPagu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SimpelPagu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

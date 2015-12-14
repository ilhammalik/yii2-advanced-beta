<?php

namespace backend\controllers;

use Yii;
use backend\models\SimpelPersonil;
use backend\models\SimpelKeg;
use backend\models\SimpelRekapSeacrh;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \mPDF;
use kartik\mpdf\Pdf;
use yii\data\Pagination;

/**
 * SimpelRekapController implements the CRUD actions for SimpelKeg model.
 */
class SimpelRekapController extends Controller {

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
     * Lists all SimpelKeg models.
     * @return mixed
     */
    public function actionLists($id) {
        $countKokab = \common\models\DaftarUnit::find()
                ->where(['unit_parent_id' => $id])
                ->count();

        $Kokab = \common\models\DaftarUnit::find()
                ->where(['unit_parent_id' => $id])
                ->all();

        if ($countKokab > 0) {
            echo "<option ><center>- Pilih -  </center></option>";
            foreach ($Kokab as $kota) {
                echo "<option value='" . $kota->unit_id . "'>" . $kota->nama . "</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }

    public function actionIndex() {
      
        if (!empty($_GET['unit_id'])) {
            $find_query = "SELECT c.* FROM simpel_keg as a
                            LEFT JOIN pegawai.daf_unit b ON  a.unit_id = b.unit_id
                            LEFT JOIN simpel_personil c ON  a.id_kegiatan = c.id_kegiatan
                          WHERE (unit_parent_id='" . $_GET['unit_id'] . "')  and tgl_berangkat='" . $_GET['tgl_mulai'] . "' or tgl_kembali='" . $_GET['tgl_kembali'] . "' and c.status=4 group by pegawai_id";
            $query = SimpelPersonil::findBySql($find_query);
            $countQuery = count($query->all());
            $pages = new Pagination(['totalCount' => $countQuery]);
            $models = $query->offset($pages->offset, $pages->pageSize = 10)
                    ->limit($pages->limit)
                    ->all();
        } else {
            $unit = SimpelPersonil::find()->joinWith('keg')->where('simpel_keg.status = 4');
            $count = count($unit->all());
            $pages = new Pagination(['totalCount' => $count]);
            $models = $unit->offset($pages->offset, $pages->pageSize = 10)
                    ->limit($pages->limit)
                    ->all();
        }

        return $this->render('index', [
                    'pages' => $pages,
                    'models' => $models,
        ]);
    }

    public function actionKeg() {

        if (!empty($_GET['unit_id'])) {
            $find_query = "SELECT c.* FROM simpel_keg as a
                            LEFT JOIN pegawai.daf_unit b ON  a.unit_id = b.unit_id
                            LEFT JOIN simpel_personil c ON  a.id_kegiatan = c.id_kegiatan
                          WHERE (unit_parent_id='" . $_GET['unit_id'] . "')  and tgl_berangkat='" . $_GET['tgl_mulai'] . "' or tgl_kembali='" . $_GET['tgl_kembali'] . "' and c.status=4 group by pegawai_id";
            $query = SimpelPersonil::findBySql($find_query);
            $countQuery = count($query->all());
            $pages = new Pagination(['totalCount' => $countQuery]);
            $models = $query->offset($pages->offset, $pages->pageSize = 10)
                    ->limit($pages->limit)
                    ->all();
        } else {
            $unit = SimpelPersonil::find()->joinWith('keg')->where('simpel_keg.status = 4');
            $count = count($unit->all());
            $pages = new Pagination(['totalCount' => $count]);
            $models = $unit->offset($pages->offset, $pages->pageSize = 10)
                    ->limit($pages->limit)
                    ->all();
        }

        return $this->render('keg', [
                    'pages' => $pages,
                    'models' => $models,
        ]);
    }

    public function actionMonikeg() {

        // get your HTML raw content without any layouts or scripts


        if (!empty($_GET['unit_id'])) {
            $find_query = "SELECT c.* FROM simpel_keg as a
                            LEFT JOIN pegawai.daf_unit b ON  a.unit_id = b.unit_id
                            LEFT JOIN simpel_personil c ON  a.id_kegiatan = c.id_kegiatan
                          WHERE (unit_parent_id='" . $_GET['unit_id'] . "') and tgl_berangkat='" . $_GET['tgl_mulai'] . "' or tgl_kembali='" . $_GET['tgl_kembali'] . "' and c.status=4 group by pegawai_id";
            $query = SimpelPersonil::findBySql($find_query);
            $countQuery = count($query->all());
            $pages = new Pagination(['totalCount' => $countQuery]);
            $models = $query->offset($pages->offset, $pages->pageSize = 10)
                    ->limit($pages->limit)
                    ->all();
        } else {
            $unit = SimpelPersonil::find()->joinWith('keg')->where('simpel_keg.status = 4')->groupBy('pegawai_id');
            $count = count($unit->all());
            $pages = new Pagination(['totalCount' => $count]);
            $models = $unit->offset($pages->offset, $pages->pageSize = 10)
                    ->limit($pages->limit)
                    ->all();
        }


        return $this->render('monikeg', [
                    'pages' => $pages,
                    'models' => $models,
        ]);
    }

    /**
     * Displays a single SimpelKeg model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SimpelKeg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SimpelKeg();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kegiatan]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SimpelKeg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kegiatan]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SimpelKeg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SimpelKeg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SimpelKeg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SimpelKeg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

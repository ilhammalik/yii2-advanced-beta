<?php

namespace backend\controllers;

use Yii;
use common\models\MakTahun;
use common\models\MakTahunSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\base\DynamicModel;

/**
 * MakTahunController implements the CRUD actions for MakTahun model.
 */
class MakTahunController extends Controller {

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
     * Lists all MakTahun models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MakTahunSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPo($id, $unit) {
        $model = $this->findDetail($id);

        // $sql = "SELECT COUNT(DISTINCT(a.detail_id)), a.detail_id, a.nama_detail, a.renc_tgl_selesai, a.renc_tgl_mulai, 
        //        a.jenis_detail_id, b.sub_mak_id, c.*, d.suboutput_id, d.unit_id, e.unit_id, e.unit_parent_id 
        //        FROM serasi2015_sql.news_detail_keg as a
        //    	    INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id
        //    	    LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id
        //    	    LEFT JOIN serasi2015_sql.news_nas_suboutput as d ON c.suboutput_id=d.suboutput_id
        //    	    LEFT JOIN pegawai.daf_unit as e ON d.unit_id=e.unit_parent_id
        //    	    LEFT JOIN fix_simpel.simpel_keg g on g.detail_id = a.detail_id
        //        where a.jenis_detail_id in (3,4,5) and (c.kode_mak= 524114 or c.kode_mak= 524113 or c.kode_mak= 524111 or c.kode_mak= 524119 ) 
        //        and e.unit_id='".$unit."' and a.detail_id='".$id."'  
        //        and g.detail_id IS NULL
        //         group by a.detail_id order by a.renc_tgl_mulai desc  ";
        $sql = "SELECT  a.detail_id, a.jenis_detail_id, a.nama_detail, a.renc_tgl_selesai, a.renc_tgl_mulai, b.*,d.unit_id FROM serasi2015_sql.news_detail_keg as a 
         LEFT JOIN serasi2015_sql.news_sub_mak_tahun as b on a.suboutput_id=b.suboutput_id 
         LEFT JOIN serasi2015_sql.news_nas_suboutput as c on a.suboutput_id=c.suboutput_id
         LEFT JOIN fix_simpel.simpel_keg g on g.detail_id = a.detail_id
         LEFT JOIN pegawai.daf_unit as d on c.unit_id=d.unit_parent_id
        where a.jenis_detail_id in (3,4,5) and (b.kode_mak= 524114 or b.kode_mak= 524113 or b.kode_mak= 524111 or b.kode_mak= 524119 ) and g.detail_id IS NULL and d.unit_id='" . $unit . "' and a.detail_id='" . $id . "' group by a.detail_id order by a.renc_tgl_mulai desc";

        //echo $sql;
        $command = Yii::$app->db->createCommand($sql);
        $connection = \Yii::$app->db;
        $result = $command->queryOne();

        $connection = \Yii::$app->db;

        //untuk melihat random terakhir
        $data_random = $connection->createCommand('SELECT MAX(random) FROM simpel_keg');
        $random = $data_random->queryScalar();
        $dat = $random + 1;

        if ($_POST) {

            Yii::$app->db->createCommand()->insert('simpel_log', ['user_id' => Yii::$app->user->id, 'nama_proses' => 'Proses <strong>Daftar Perjalanan Dinas</strong> ' . $_POST['MasterSerasi']['nama_detail'], 'waktu' => date('Y-m-d H:i')])->execute();
            Yii::$app->db->createCommand()->insert('simpel_keg', ['random' => $dat,
                'status' => 1,
                'no_reg' => $_POST['MasterSerasi']['no_reg'],
                'kode_mak' => $_POST['MasterSerasi']['kode_mak'],
                'nip_ppk' => $_POST['MasterSerasi']['nip_ppk'],
                'nip_bpp' => $_POST['MasterSerasi']['nip_bpp'],
                'unit_id' => $_POST['MasterSerasi']['unit_id'],
                'negara_tujuan' => $_POST['MasterSerasi']['negara_tujuan'],
                'mak' => $_POST['MasterSerasi']['mak'],
                'detail_id' => $_POST['MasterSerasi']['detail_id'],
                'nama_keg' => $_POST['MasterSerasi']['nama_detail'],
                'negara' => 2,
                'berangkat_asal' => 617,
                'tujuan' => 617,
                'kota_asal' => $_POST['MasterSerasi']['kota_asal'],
                'kota_negara' => $_POST['MasterSerasi']['kota_negara'],
                'tgl_mulai' => $_POST['MasterSerasi']['renc_tgl_mulai'],
                'tgl_selesai' => $_POST['MasterSerasi']['renc_tgl_selesai'],
                'tgl_penugasan' => $_POST['MasterSerasi']['tgl_penugasan'],
                'no_spd' => $_POST['MasterSerasi']['no_spd'],
                'random' => substr($_POST['MasterSerasi']['no_spd'], 0, 4)])->execute();
            //var_dump($_POST['MakTahun']);
            return $this->redirect(['/simpel-keg/tabdinas']);
        } else {
            return $this->renderAjax('_form_kirim_luar', [
                        'model' => $model,
                        'result' => $result,
                        'dat' => $dat,
            ]);
        }
    }

    public function actionDn($id, $unit) {

        $model = $this->findDetail($id);
        // print_r($_POST);
        // die();
        $sql = "SELECT COUNT(DISTINCT(a.detail_id)), a.detail_id, a.nama_detail, a.renc_tgl_selesai, a.renc_tgl_mulai, 
        a.jenis_detail_id, b.sub_mak_id, c.*, d.suboutput_id, d.unit_id, e.unit_id, e.unit_parent_id 
        FROM serasi2015_sql.news_detail_keg as a
    	    INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id
    	    LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id
    	    LEFT JOIN serasi2015_sql.news_nas_suboutput as d ON c.suboutput_id=d.suboutput_id
    	    LEFT JOIN pegawai.daf_unit as e ON d.unit_id=e.unit_parent_id
    	    LEFT JOIN fix_simpel.simpel_keg g on g.detail_id = a.detail_id
        where a.jenis_detail_id in (3,4,5) and (c.kode_mak= 524114 or c.kode_mak= 524113 or c.kode_mak= 524111 or c.kode_mak= 524119 ) 
        and e.unit_id='" . $unit . "' and a.detail_id='" . $id . "'  
        and g.detail_id IS NULL
         group by a.detail_id order by a.renc_tgl_mulai desc  ";
        //echo $sql;
        //exit;
        /* "SELECT COUNT(DISTINCT(a.detail_id)), a.detail_id, a.nama_detail, a.renc_tgl_selesai, a.renc_tgl_mulai, a.jenis_detail_id, b.sub_mak_id, c.* FROM serasi2015_sql.news_detail_keg as a
          INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id
          LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id


          where a.jenis_detail_id in (3,4,5) and (c.kode_mak= 524114 or c.kode_mak= 524113 or c.kode_mak= 524111 or c.kode_mak= 524119 )  and a.detail_id='".$id."'  and a.detail_id  NOT IN (SELECT detail_id FROM fix_simpel.simpel_keg)  group by a.detail_id order by a.renc_tgl_mulai desc  ");
         */
        $command = Yii::$app->db->createCommand($sql);
        $connection = \Yii::$app->db;
        $result = $command->queryOne();


        //untuk melihat random terakhir
        $data_random = $connection->createCommand('SELECT MAX(random) FROM simpel_keg');
        $random = $data_random->queryScalar();
        $dat = $random + 1;

        if ($model->load(Yii::$app->request->post())) {

            Yii::$app->db->createCommand()->insert('simpel_log', ['user_id' => Yii::$app->user->id, 'nama_proses' => 'Proses <strong>Daftar Perjalanan Dinas</strong> ' . $_POST['MasterSerasi']['nama_detail'], 'waktu' => date('Y-m-d H:i')])->execute();
            Yii::$app->db->createCommand()->insert('simpel_keg', ['random' => $dat,
                'status' => '1',
                'no_reg' => $_POST['MasterSerasi']['no_reg'],
                'kode_mak' => $_POST['MasterSerasi']['kode_mak'],
                'nip_ppk' => $_POST['MasterSerasi']['nip_ppk'],
                'nip_bpp' => $_POST['MasterSerasi']['nip_bpp'],
                'unit_id' => $_POST['MasterSerasi']['unit_id'],
                'mak' => $_POST['MasterSerasi']['mak'],
                'detail_id' => $_POST['MasterSerasi']['detail_id'],
                'nama_keg' => $_POST['MasterSerasi']['nama_detail'],
                'negara' => 1,
                'kota_asal' => 'ID',
                'berangkat_asal' => $_POST['MasterSerasi']['kota_keberangkatan'],
                'tujuan' => $_POST['MasterSerasi']['kota_tujuan'],
                'negara_tujuan' => 'ID',
                'tgl_mulai' => $_POST['MasterSerasi']['renc_tgl_mulai'],
                'tgl_selesai' => $_POST['MasterSerasi']['renc_tgl_selesai'],
                'tgl_penugasan' => $_POST['MasterSerasi']['tgl_penugasan'],
                'no_spd' => $_POST['MasterSerasi']['no_spd'],
                'random' => substr($_POST['MasterSerasi']['no_spd'], 0, 4)])->execute();

            return $this->redirect(['/simpel-keg/tabdinas']);
        } else {
            return $this->renderAjax('_form_kirim', [

                        'model' => $model,
                        'result' => $result,
                        'dat' => $dat,
            ]);
        }
    }

    /**
     * Displays a single MakTahun model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MakTahun model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new MakTahun();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sub_mak_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MakTahun model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sub_mak_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MakTahun model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MakTahun model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MakTahun the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = MakTahun::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findDetail($id) {
        if (($model = \common\models\MasterSerasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

<?php

namespace backend\controllers;

use Yii;
use backend\models\Model;
use backend\models\SimpelKeg;
use common\models\TabelSbuSearch;
use backend\models\SimpelPersonil;
use backend\models\SimpelRincianBiaya;
use backend\models\SimpelPenugasan;
use backend\models\SimpelKegSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use common\models\TabelSbu;
use \mPDF;
use kartik\mpdf\Pdf;
use dosamigos\qrcode\QrCode;
use yii\helpers\Url;

/**
 * SimpelKegController implements the CRUD actions for SimpelKeg model.
 */
class SimpelKegController extends Controller {

    public $layout = 'admin';
    public $enableCsrfValidation = false;

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
    public function actionIndex() {
        if ($_POST) {// membuat aritmatika if jika mendapatkan $_Post
            //mengambil data post checkbox bendahara
            if (isset($_POST['arsip'])) {
                $jumlah = count($_POST['selection']);
                for ($i = 0; $i < $jumlah; $i++) {
                    echo $_POST['selection'][$i] . '<br/>';
                    Yii::$app->db->createCommand()->update('simpel_keg', ['status' => '4', 'status_edit' => '0'], ['id_kegiatan' => $_POST['selection'][$i]])->execute();
                    return $this->redirect(['daftar-keg/tabarsip']);
                }
            }
            //jika semua proses sudah dilakukan maka halaman akan di edirect
        }

        $dataLog = new ActiveDataProvider([
            'query' => \backend\models\SimpelLog::find()->where('user_id=' . Yii::$app->user->id)->orderBy('id_log desc'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
                    //'dataSerasi' => $dataSerasi,
                    'dataLog'=>$dataLog,
        ]);
    }

    public function actionDinas() {


        return $this->render('v_dinas', [
                    //'dataSerasi' => $dataSerasi,
        ]);
    }


    public function actionVcetak() {


        return $this->render('v_cetak', [
                    //'dataSerasi' => $dataSerasi,
                    
        ]);
    }


    public function actionBendahara() {


        return $this->render('v_bendahara', [
                    //'dataSerasi' => $dataSerasi,
        ]);
    }


    public function actionVarsip() {


        return $this->render('v_arsip', [
                    //'dataSerasi' => $dataSerasi,
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

    public function actionUnit($unit) {
        $model = $this->findUnit($unit);
        switch ($unit) {
            case '161100':
                $def = "a.jenis_detail_id in (3,4,5) and d.unit_id='" . $unit . "' group by a.detail_id order by a.renc_tgl_mulai desc";
                break;
            case '151000':
                $def = "a.jenis_detail_id in (3,4,5) and d.unit_id='" . $unit . "' group by a.detail_id order by a.renc_tgl_mulai desc";
                break;

            default:
                $def = "a.jenis_detail_id in (3,4,5) and (b.kode_mak= 524114 or b.kode_mak= 524113 or b.kode_mak= 524111 or b.kode_mak= 524119 ) and g.detail_id IS NULL and d.unit_parent_id='" . $unit . "' group by a.detail_id order by a.renc_tgl_mulai desc";
                break;
        }
        $hitung = "SELECT count(DISTINCT(a.detail_id)) FROM serasi2015_sql.news_detail_keg a LEFT JOIN serasi2015_sql.news_sub_mak_tahun b on a.suboutput_id=b.suboutput_id LEFT JOIN serasi2015_sql.news_nas_suboutput c on a.suboutput_id=c.suboutput_id LEFT JOIN fix_simpel.simpel_keg g on g.detail_id = a.detail_id LEFT JOIN pegawai.daf_unit d on c.unit_id=d.unit_parent_id where a.jenis_detail_id in (3,4,5) and (b.kode_mak= 524114 or b.kode_mak= 524113 or b.kode_mak= 524111 or b.kode_mak= 524119 ) and g.detail_id IS NULL and d.unit_parent_id='" . $unit . "'";
        $count = Yii::$app->db->createCommand($hitung)->queryScalar();
        $sql = "SELECT  a.detail_id, a.jenis_detail_id, a.nama_detail, a.renc_tgl_selesai, a.renc_tgl_mulai, b.*, d.unit_id 
        FROM serasi2015_sql.news_detail_keg as a 
         LEFT JOIN serasi2015_sql.news_sub_mak_tahun as b on a.suboutput_id=b.suboutput_id 
         LEFT JOIN serasi2015_sql.news_nas_suboutput as c on a.suboutput_id=c.suboutput_id
         LEFT JOIN pegawai.daf_unit as d on c.unit_id3=d.unit_id
         LEFT JOIN fix_simpel.simpel_keg g on g.detail_id = a.detail_id
        where " . $def;
        // echo $sql;
        // die();
        $dataSerasi = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => intval($count),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('akun_mak', [
                    'model' => $model,
                    'dataSerasi' => $dataSerasi,
        ]);
    }

    /**
     * Creates a new SimpelKeg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $model = $this->findModel($id);
        $model2 = SimpelPersonil::find()->where('id_kegiatan=' . $model->id_kegiatan);
        if ($model->load(Yii::$app->request->post())) {
            print_r($_POST);
            // && $model->save()
            //return $this->redirect(['view', 'id' => $model->id_kegiatan]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'model2' => $model2,
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
        Yii::$app->db->createCommand('DELETE FROM simpel_tgl_terima WHERE  id_kegiatan=' . $id)->execute();
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

    //ilham menambahkan
    public function actionTabdinas($unit) {
        //data gridview Arsip
        $sql = "SELECT * FROM simpel_keg a LEFT JOIN pegawai.daf_unit b on a.unit_id=b.unit_id WHERE status=1 and b.unit_parent_id='".$unit."' ";
        $sqlcount = "SELECT count(a.id_kegiatan) FROM simpel_keg a LEFT JOIN pegawai.daf_unit b on a.unit_id=b.unit_id WHERE status=1 and b.unit_parent_id='".$unit."' ";
        $count = Yii::$app->db->createCommand($sqlcount)->queryScalar();
        $dataDinas = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => count($count),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('dinas', [
                    'dataDinas' => $dataDinas,
                    'count'=>$count,
        ]);
    }

    public function actionTabcetak($unit) {
        //data gridview Arsip
        $sql = "SELECT  * FROM simpel_keg a LEFT JOIN pegawai.daf_unit b on a.unit_id=b.unit_id WHERE status=2 and b.unit_parent_id='".$unit."'";
        $count = Yii::$app->db->createCommand($sql)->queryScalar();
        $dataCetak = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => count($count),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('cetak', [
                    'dataCetak' => $dataCetak,
        ]);
    }

    public function actionTabuang($unit) {
        //data gridview Arsip
        if ($_POST) {// membuat aritmatika if jika mendapatkan $_Post
            //mengambil data post checkbox bendahara
            if (isset($_POST['arsip'])) {
                $jumlah = count($_POST['selection']);
                for ($i = 0; $i < $jumlah; $i++) {
                    echo $_POST['selection'][$i] . '<br/>';
                    Yii::$app->db->createCommand()->update('simpel_keg', ['status' => '3', 'status_edit' => '0'], ['id_kegiatan' => $_POST['selection'][$i]])->execute();
                    return $this->redirect(['daftar-keg/tabarsip']);
                }
            }
        }
        $sql = "SELECT  * FROM simpel_keg a LEFT JOIN pegawai.daf_unit b on a.unit_id=b.unit_id WHERE status=3 and b.unit_parent_id='".$unit."'";
        $count = Yii::$app->db->createCommand($sql)->queryScalar();
        $dataUang = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => count($count),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('bendahara', [
                    'dataUang' => $dataUang,
        ]);
    }

    public function actionTabarsip($unit) {
        //data gridview Arsip
        $sql = "SELECT  * FROM simpel_keg a LEFT JOIN pegawai.daf_unit b on a.unit_id=b.unit_id WHERE a.status=4 and b.unit_parent_id='".$unit."'";
        $count = Yii::$app->db->createCommand($sql)->queryScalar();
        // echo $sql;
        // die();
        $dataArsip = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => count($count),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('arsip', [
                    'dataArsip' => $dataArsip,
        ]);
    }

    public function actionSearchSerasi($search) {
        $count = Yii::$app->db->createCommand('SELECT COUNT(*), a.nama_detail, a.renc_tgl_selesai, a.renc_tgl_mulai, c.kode_mak, c.nama_sub_mak, c.sub_mak_id FROM serasi2015_sql.news_detail_keg as a INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id where (c.kode_mak= 524111 or c.kode_mak= 524119) and a.detail_id NOT IN (SELECT detail_id FROM fix_simpel.simpel_keg) group by a.detail_id')->queryScalar();
        $dataSerasi = new SqlDataProvider([
            'sql' => "SELECT DISTINCT(a.detail_id), a.nama_detail, a.renc_tgl_selesai, a.renc_tgl_mulai, c.kode_mak, c.nama_sub_mak,
            c.sub_mak_id FROM serasi2015_sql.news_detail_keg as a
        INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id
        LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id
        where a.jenis_detail_id in (3,4,5) and (c.kode_mak= 524114 or c.kode_mak= 524113 or c.kode_mak= 524111 or c.kode_mak= 524119 )  and a.nama_detail like '%" . $search . "%' and a.detail_id  NOT IN (SELECT detail_id FROM fix_simpel.simpel_keg)  group by a.detail_id order by a.renc_tgl_mulai desc ",
            'totalCount' => 50,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->renderAjax('@backend/views/simpel-keg/search_serasi', [
                    'dataSerasi' => $dataSerasi,
        ]);
    }

    public function actionSearchDinas($search) {
        $sumber = SimpelKeg::find()->andWhere('(mak like \'%' . $search . '%\' or nama_keg  like \'%' . $search . '%\' or tgl_mulai  like \'%' . $search . '%\' or tgl_selesai  like \'%' . $search . '%\' or tujuan like \'%' . $search . '%\')');
        //$sumber = SimpelKeg::find()->where('id_kegiatan='.$search);
        $dataDinas = new ActiveDataProvider([
            'query' => $sumber,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
        return $this->renderAjax('@backend/views/simpel-keg/s_dinas', [
                    'dataDinas' => $dataDinas,
        ]);
    }

    // ilham menambahkan
    //   ilham menambahkan fungsi tanggal 23 september 2015
    public function actionTambah($id) {
        $model = new SimpelPersonil();
        $model2 = $this->findModel($id);
        $model3 = new SimpelRincianBiaya();
        if ($_POST) {
            // print_r($_POST);
            // die();
            $model->id_kegiatan = $model2->id_kegiatan;
            $model->tingkat_id = $_POST['SimpelPersonil']['tingkat_id'];
            $model->pegawai_id = $_POST['SimpelPersonil']['pegawai_id'];
            $model->tgl_penugasan = $_POST['SimpelPersonil']['tgl_penugasan'];
            $model->tgl_berangkat = $_POST['SimpelKeg']['tgl_mulai'];
            $model->tgl_kembali = $_POST['SimpelKeg']['tgl_selesai'];
            $model->no_sp = $_POST['SimpelPersonil']['no_sp'];

            $model->pejabat = $_POST['SimpelPersonil']['pejabat'];
            $model->uang_makan = $_POST['SimpelPersonil']['uang_makan'];
            $model->angkutan = $_POST['SimpelPersonil']['angkutan'];
            if ($model->save()) {
                $data = count($_POST['rows']);
                for ($i = 1; $i <= $data; $i++) {
                    $model3 = new SimpelRincianBiaya();
                    $model3->id_kegiatan = $model2->id_kegiatan;
                    $model3->personil_id = $model->getId();
                    $model3->kat_biaya_id = $_POST['kat_biaya_id' . $i];
                    $model3->harga_satuan = $_POST['satuan' . $i];
                    $model3->volume = $_POST['volume' . $i];
                    $model3->label = $_POST['label' . $i];
                    $model3->jml = $_POST['jml' . $i];
                    $model3->uraian_rincian = $_POST['uraian' . $i];
                    $model3->bukti_kwitansi = $_POST['bukti_kwitansi' . $i];
                    $model3->save();
                }
            }
            return $this->redirect(['create', 'id' => $model2->id_kegiatan]);
        } else {

            return $this->renderAjax('input_personil', [
                        'model' => $model,
                        'model2' => $model2,
            ]);
        }
    }

    public function actionTambahluar($id) {
        $model = new SimpelPersonil();
        $model2 = $this->findModel($id);
        $model3 = new SimpelRincianBiaya();
        if ($_POST) {

            $model->id_kegiatan = $model2->id_kegiatan;
            $model->tingkat_id = $_POST['SimpelPersonil']['tingkat_id'];
            $model->pegawai_id = $_POST['SimpelPersonil']['pegawai_id'];
            $model->tgl_penugasan = $_POST['SimpelPersonil']['tgl_penugasan'];
            $model->tgl_berangkat = $_POST['SimpelKeg']['tgl_mulai'];
            $model->tgl_kembali = $_POST['SimpelKeg']['tgl_selesai'];
            $model->no_sp = $_POST['SimpelPersonil']['no_sp'];

            $model->pejabat = $_POST['SimpelPersonil']['pejabat'];
            $model->uang_makan = $_POST['SimpelPersonil']['uang_makan'];
            $model->angkutan = $_POST['SimpelPersonil']['angkutan'];
            if ($model->save()) {
                $data = count($_POST['rows']);
                for ($i = 1; $i <= $data; $i++) {
                    $model3 = new SimpelRincianBiaya();
                    $model3->id_kegiatan = $model2->id_kegiatan;
                    $model3->personil_id = $model->getId();
                    $model3->kat_biaya_id = $_POST['kat_biaya_id' . $i];
                    $model3->harga_satuan = $_POST['satuan' . $i];
                    $model3->volume = $_POST['volume' . $i];
                    $model3->label = $_POST['label' . $i];
                    $model3->jml = $_POST['jml' . $i];
                    $model3->uraian_rincian = $_POST['uraian' . $i];
                    $model3->bukti_kwitansi = $_POST['bukti_kwitansi' . $i];
                    $model3->save();
                }
            }
            return $this->redirect(['create', 'id' => $model2->id_kegiatan]);
        } else {

            return $this->renderAjax('input_luar_negri', [
                        'model' => $model,
                        'model2' => $model2,
            ]);
        }
    }

    public function actionMaster($id) {
        //     $query = TabelSbu::find();
        //     $dataProvider = new ActiveDataProvider([
        //         'query' => $query,
        //          'pagination' => [
        //     'pageSize' => 5,
        // ],
        //     ]);
        $searchModel = new TabelSbuSearch();
        $dataProvider = $searchModel->searchh(Yii::$app->request->queryParams);

        return $this->renderAjax('master', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCetak($id) {
        $model = $this->findModel($id);
        $query = \common\models\TglTerima::find()->where('id_kegiatan=' . $model->id_kegiatan);
        $dataTerima = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->renderAjax('kirim_ben', [
                    'model' => $model,
                    'dataTerima' => $dataTerima,
        ]);
    }

    public function actionCe($id) {
        $model = $this->findModel($id);
        $model2 = $this->findUnit($model->unit_id);
        Yii::$app->db->createCommand()->insert('simpel_log', ['user_id' => Yii::$app->user->id, 'nama_proses' => 'Proses <strong>Cetak</strong> ' . $model->nama_keg])->execute();
        Yii::$app->db->createCommand()->update('simpel_keg', ['status' => '2', 'status_edit' => '0'], ['id_kegiatan' => $id])->execute();
        // echo $id;
        // die();
        return $this->redirect(['simpel-keg/tabcetak','unit'=>$model2->unit_parent_id]);
    }

    // fungsi ini berguna untuk menginput personil dn tgl pada modal cetak
    public function actionIsi($id) {
        $model = $this->findModel($id);
        $model2 = new \common\models\TglTerima;
        if (isset($_POST['TglTerima'])) {
            $model2->id_kegiatan = $_POST['TglTerima']['id_kegiatan'];
            $model2->personil_id = $_POST['TglTerima']['personil_id'];
            $model2->tgl_terima = $_POST['TglTerima']['tgl_terima'];
            if ($model2->save()) {
                Yii::$app->db->createCommand()->insert('simpel_log', ['user_id' => Yii::$app->user->id, 'nama_proses' => 'Proses <strong>Bendhara</strong> ' . $model->nama_keg])->execute();
                Yii::$app->db->createCommand()->update('simpel_keg', ['status' => 3], ['id_kegiatan' => $id])->execute();
            }

            return $this->redirect(['tabuang','unit'=>$model2->unit_parent_id]);
        } else {
            return $this->renderAjax('kirim_isi', [
                        'model' => $model,
                        'model2' => $model2,
            ]);
        }
    }

    //menambahkan fungsi cetak daftar perjalanan dinas ditambahkan tanggal 25 september 2015
    //fungsi cetak surat perjalan dinas
    public function actionSpd($id) {
        $this->layout = 'pdf'; //untuk mengarahkan ke newt_listbox_clear_selection(listbox)ayout pdf.php yang ada di layout
        $model = $this->findModel($id); //untuk membaca id daftar kegiatan
        $model2 = SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        $model3 = SimpelPersonil::find()->where('id_kegiatan=' . $id)->count();
        $content = $this->render('/cetak/_spd', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);
        $con = $this->render('/cetak/_spt', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);
        $content2 = $this->render('/cetak/_spd2', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);
        $formbukti = $this->render('/cetak/_form_bukti', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);
        $content3 = $this->render('/cetak/_terlampir_spd', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);

        $content_english = $this->render('/cetak/_spd_english', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);
        $content_english2 = $this->render('/cetak/_spd2_english', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);
        $content_english3 = $this->render('/cetak/_terlampir_spd_english', [
            'model' => $model,
            'model2' => $model2,
            'model3' => $model3,
        ]);
        $stylesheet = "
        td,div { font-size:9pt; font-family:arial,helvetica; }
        .title { font-size:14px; font-weight:bold; text-align:center;}
        table { border-collapse:collapse; border-type:solid; }
        ";
        $mpdf = new mPDF('en-GB', 'A4');
        $akun = $model->mak;
        switch ($model->negara) {
            case 2:
                if ($model3 > 1) {
                    $mpdf->SetDisplayMode('fullpage');
                    $mpdf->AddPage('P', '', '', '', '', 5, 5, 5, 1, 5, 5);


                    $mpdf->WriteHTML($content_english);
                } else {

                    $mpdf->SetDisplayMode('fullpage');
                    $mpdf->AddPage('P', '', '', '', '', 5, 5, 5, 1, 5, 5);

                    $mpdf->WriteHTML($content_english);
                }
                $mpdf->Output('SURAT PERJALANAN DINAS (SPD)', I);
                break;

            default:
                if ($model3 > 0) {

                    if ($model->kode_mak == '524113') {


                        $mpdf->AddPage('L', '', '', '', '', 15, 15, 5, 1, 5, 5);

                        $mpdf->WriteHTML($formbukti);
                    } elseif ($model->kode_mak == '524114') {

                        $mpdf->SetDisplayMode('fullpage');

                        $mpdf->AddPage('P', '', '', '', '', 5, 5, 5, 1, 5, 5);

                        $mpdf->WriteHTML($con);

                        $mpdf->AddPage('L', '', '', '', '', 15, 15, 5, 1, 5, 5);

                        $mpdf->WriteHTML($content3);
                    } elseif ($model->kode_mak == '524119') {

                        $mpdf->SetDisplayMode('fullpage');
                        $mpdf->AddPage('P', '', '', '', '', 5, 5, 5, 1, 5, 5);

                        $mpdf->WriteHTML($con);

                        $mpdf->AddPage('L', '', '', '', '', 15, 15, 5, 1, 5, 5);

                        $mpdf->WriteHTML($content3);
                    } elseif ($model->kode_mak == '524111') {

                        $mpdf->SetDisplayMode('fullpage');
                        $mpdf->AddPage('P', '', '', '', '', 5, 5, 5, 1, 5, 5);

                        $mpdf->WriteHTML($content);
                    }
                } else {
                    $mpdf->SetDisplayMode('fullpage');

                    $mpdf->AddPage('P', '', '', '', '', 5, 5, 5, 1, 5, 5);

                    $mpdf->WriteHTML($content);
                }
                $mpdf->Output('SURAT PERJALANAN DINAS (SPD)', I);
        }
    }

    //ilham menambahkan fungsi pada tanggal
    //qr-code untuk spd
    //ilham menambahkan fungsi untuk pdf daftar Pengeluaran RIll

    public function actionDpr($id) {

        $this->layout = 'pdf';

        $model = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $count = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->count();
        $model2 = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        $content = $this->render('/cetak/pengeluaran_rill', [
            'model' => $model,
            'model2' => $model2,
            'count' => $count,
        ]);
        $mpdf = new mPDF('utf-8', 'A4-L');
        $mpdf->AddPage('P', '', '', '', '', 15, 15, 5, 1, 5, 5);


        $mpdf->WriteHTML($content);
        $mpdf->Output('Pengeluaran RIll', I);
    }

    public function actionDnpd($id) {

        $this->layout = 'pdf';
        $model = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $content = $this->render('_dpr', [
            'model' => $model,
        ]);
        $mpdf = new mPDF('utf-8', 'A4-L');
        $mpdf->AddPage('P', '', '', '', '', 15, 15, 5, 1, 5, 5);

        $mpdf->WriteHTML($content);
        $mpdf->Output();
    }

    //Ilham Menambahkan fungsi untuk DAFTAR Rangka keamanan Informasi 
    public function actionDrki($id) {

        $this->layout = 'pdf';
        $model = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $count = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->count();
        $model2 = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->groupBy('pegawai_id')->all();
        $content = $this->render('/cetak/nominatif', [
            'model' => $model,
            'model2' => $model2,
            'count' => $count,
        ]);
        $content_luar = $this->render('/cetak/nominatif_luar', [
            'model' => $model,
            'model2' => $model2,
            'count' => $count,
        ]);
        $mpdf = new mPDF('utf-8', 'A4-L');
        switch ($model->negara) {
            case 1:
                $mpdf->AddPage('L', '', '', '', '', 15, 15, 5, 1, 5, 5);

                $mpdf->WriteHTML($content);
                break;
            case 2:
                $mpdf->AddPage('L', '', '', '', '', 15, 15, 5, 1, 5, 5);

                $mpdf->WriteHTML($content_luar);
                break;
        }

        $mpdf->Output('Nominatif', I);
    }

    //Ilham Menambahkan fungsi untuk Rincian Biaya Perjalanan Dinas pada tanggal 28 September 2015
    public function actionRincianbpd($id) {
        $this->layout = 'pdf';
        $model = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $model2 = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        $count = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->count();
        $content = $this->render('/cetak/rincian_biaya_perjalanan_dinas', [
            'model' => $model,
            'model2' => $model2,
            'count' => $count,
        ]);

        $mpdf = new mPDF('utf-8', 'A4-L');
        $mpdf->AddPage('P', '', '', '', '', 15, 15, 5, 1, 5, 5);
        //$mpdf->SetAutoPageBreak(on,0);
        $mpdf->WriteHTML($content);
        $mpdf->Output('RINCIAN BIAYA PERJALANAN DINAS.pdf', I);
    }

    //ilham menambahkan fungsi untuk kwitansi dalam
    public function actionKwitansi($id) {

        $this->layout = 'pdf';
        $model = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $model2 = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        $count = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->count();

        $html = $this->render('/cetak/kwitansi', [
            'model' => $model,
            'model2' => $model2,
            'count' => $count,
        ]);


        $mpdf = new mPDF('utf-8', 'A4-L');
        $mpdf->AddPage('P', '', '', '', '', 15, 15, 5, 1, 5, 5);

        $mpdf->WriteHTML($html);
        $mpdf->Output('Kwitansi', I);

        // return the pdf output as per the destination setting
    }

    public function actionKwitansii($id) {

        $this->layout = 'pdf';
        $model = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $model2 = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        $count = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->count();

        $html = $this->render('/cetak/kwitansi_luar', [
            'model' => $model,
            'model2' => $model2,
            'count' => $count,
        ]);


        $mpdf = new mPDF('utf-8', 'A4-L');
        $mpdf->AddPage('P', '', '', '', '', 15, 15, 5, 1, 5, 5);

        $mpdf->WriteHTML($html);
        $mpdf->Output('Kwitansi', I);

        // return the pdf output as per the destination setting
    }

    //membuat fungsi input pada saat personil tanggal

    public function actionInput($id) {
        $model = $this->findModel($id);
        return Yii::$app->db->createCommand()->update('tgl_terima', ['personil_id' => $id], ['id_kegiatan' => $model->id_kegiatan])->execute();
    }

    public function actionEditkeg($id) {
        $model = $this->findModel($id);
        Yii::$app->db->createCommand()->insert('simpel_log', ['user_id' => Yii::$app->user->id, 'nama_proses' => 'Proses <strong>Mengedit</strong> ' . $model->nama_keg])->execute();
        Yii::$app->db->createCommand()->update('simpel_keg', ['status' => 1, 'status_edit' => 1], ['id_kegiatan' => $id])->execute();

        return $this->redirect(['/simpel-keg/tabdinas']);
    }

    public function actionArsip($unit) {
        $model = $this->findModel($unit);
        $model2 = $this->findUnit($model->unit_id);
        Yii::$app->db->createCommand()->insert('simpel_log', ['user_id' => Yii::$app->user->id, 'nama_proses' => 'Proses <strong>Arsip</strong> ' . $model->nama_keg])->execute();
        Yii::$app->db->createCommand()->update('simpel_keg', ['status' => 4, 'status_edit' => 0], ['id_kegiatan' => $model->unit_id])->execute();
        return $this->redirect(['/simpel-keg/tabarsip'.'unit'=>$model->unit_id]);
    }

    //membuat fungsi untuk agar bendahara mengetahui tanggal terima ditambahkan pada tanggal 25 september 2015
    public function actionTerima($id) {
        $model = $this->findModel($id);
        $query = \common\models\TglTerima::find()->where('id_kegiatan=' . $model->id_kegiatan);
        $dataTerima = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $this->renderAjax('tgl_terima', [
                    'dataTerima' => $dataTerima,
        ]);
    }

    public function actionUrl($id) {
        $model = $this->findModel($id);
        $model2 = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        return $this->renderAjax('v_qrcode', [
                    'model' => $model,
                    'model2' => $model2,
        ]);
    }

    public function actionUrll($id) {
        $model = $this->findModel($id);
        $model2 = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        return $this->renderAjax('v_qrcode_luar', [
                    'model' => $model,
                    'model2' => $model2,
        ]);
    }

    public function actionQrcode() {
        //$model = $this->findModel($id); //untuk membaca id daftar kegiatan
        //  $model2 = SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        $vcard = "                                              Pemberitahuan  \r\n" .
                " Menyatakan Surat Perjalanan Dinas (SPD) sebagai berikut:\r\n" .
                "                   \n" .
                " Nama           : " . $nama . "\r\n" .
                " Kota Asal     : Jakarta\r\n" .
                " Kota Tujuan  : Steven Valley\r\n" .
                " Selama        : 3 Hari\r\n" .
                " Tanggal       : 10-12 juni 2015\r\n" .
                "                    \n" .
                "Dengan ini dinyatakan ASLI, Sesuai dari subbag. Perjalanan Dinas - Biro Umum";
        $uri = Yii::$app->urlManagerr->createUrl(['simpel-keg/url', 'id' => $id]);
        return QRcode::png('ilham');
    }

    protected function findUnit($mak) {
        if (($model = \common\models\ DaftarUnit::findOne($mak)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //$unit['nas_prog_id'] . '.' . $unit['nas_keg_id'] . '.' . $unit['kdoutput'] . '.' . $unit['kdsoutput'] . '.' . $unit['kdkmpnen'] . '.' . $unit['kdskmpnen'].'.' . $unit['kode_mak'];
}

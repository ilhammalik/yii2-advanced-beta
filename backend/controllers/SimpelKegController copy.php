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
            'query' => \backend\models\SimpelLog::find()->where('user_id='.Yii::$app->user->id)->orderBy('id_log desc'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
                    //'dataSerasi' => $dataSerasi,
                    'dataLog' => $dataLog,
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

     public function actionUnit($mak) {
        $count = Yii::$app->db->createCommand("SELECT  count(a.detail_id), a.nama_detail, a.jenis_detail_id, c.*, d.suboutput_id, e.unit_id, e.unit_parent_id FROM serasi2015_sql.news_detail_keg as a
         INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id
         LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id
         LEFT JOIN serasi2015_sql.news_nas_suboutput as d ON c.suboutput_id=d.suboutput_id
         LEFT JOIN pegawai.daf_unit as e ON d.unit_id=e.unit_parent_id
         where a.jenis_detail_id in (3,4,5) and e.unit_parent_id='".$mak."'")->queryScalar();
        $cari = isset($_GET['limit']) ? $_GET['limit'] : 10;

        $dataSerasi = new SqlDataProvider([
            'sql' => "SELECT  a.*, c.*, d.suboutput_id, d.unit_id, e.unit_parent_id FROM serasi2015_sql.news_detail_keg as a
         INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id
         LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id
         LEFT JOIN serasi2015_sql.news_nas_suboutput as d ON c.suboutput_id=d.suboutput_id
         LEFT JOIN pegawai.daf_unit as e ON d.unit_id=e.unit_parent_id
         where a.jenis_detail_id in (3,4,5) and e.unit_parent_id='".$mak."' group by detail_id",
            'totalCount' => intval($count),
            'pagination' => [
                'pageSize' => $cari,
            ],
        ]);
        return $this->render('akun_mak', [
                    'dataSerasi' => $dataSerasi,
        ]);
    }

    //   public function actionMak($prog,$keg,$put,$sput,$kdponen,$kdskmpnen,$mak,$unit) {
    //     $model = Yii::$app->db->createCommand("SELECT  a.detail_id, a.nama_detail, a.jenis_detail_id, c.*, d.suboutput_id, e.unit_id, e.unit_parent_id FROM serasi2015_sql.news_detail_keg as a
    //     INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id
    //     LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id
    //     LEFT JOIN serasi2015_sql.news_nas_suboutput as d ON c.suboutput_id=d.suboutput_id
    //     LEFT JOIN pegawai.daf_unit as e ON d.unit_id=e.unit_parent_id
    //     where a.jenis_detail_id in (3,4,5) and c.nas_prog_id='".$prog."' and  c.nas_keg_id='".$keg."' and c.kdoutput='".$put."' and c.kdsoutput='".$sput."' and c.kdkmpnen='".$kdponen."' and c.kdskmpnen='".$kdskmpnen."' and c.kode_mak='".$mak."' group by a.detail_id" )->queryAll();
    //     return $this->render('akun', [
    //                 'model' => $model,
    //     ]);
    // }
    public function actionMak($unit){
    $count = Yii::$app->db->createCommand("SELECT  a.detail_id, a.nama_detail, a.jenis_detail_id, c.*, d.suboutput_id, d.unit_id FROM serasi2015_sql.news_detail_keg as a
       INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id
        LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id
        LEFT JOIN serasi2015_sql.news_nas_suboutput as d ON c.suboutput_id=d.suboutput_id
        LEFT JOIN pegawai.daf_unit as e ON d.unit_id=e.unit_parent_id
          where d.unit_id='".$unit."'")->queryScalar();
        

        $dataSerasi = new SqlDataProvider([
            'sql' => "SELECT  a.*, c.*, d.suboutput_id, d.unit_id FROM serasi2015_sql.news_detail_keg as a
         INNER JOIN serasi2015_sql.news_detail_keg_mak as b ON a.detail_id=b.detail_id
         LEFT JOIN serasi2015_sql.news_sub_mak_tahun as c ON b.sub_mak_id=c.sub_mak_id
         LEFT JOIN serasi2015_sql.news_nas_suboutput as d ON c.suboutput_id=d.suboutput_id
         LEFT JOIN pegawai.daf_unit as e ON d.unit_id=e.unit_parent_id
         where  e.unit_parent_id='".$unit."'",
            'totalCount' => 100,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('akun', [
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

    //ilham menambahkan
    public function actionTabdinas() {
        //data gridview Arsip
        $cari = isset($_GET['limit']) ? $_GET['limit'] : date('Y');
        $dataDinas = new ActiveDataProvider([
            'query' => SimpelKeg::find()->where('status=1 ')->orderBy('id_kegiatan desc')->limit(1),
            'pagination' => [
                'pageSize' => $cari,
            ],
        ]);
        return $this->render('dinas', [
                    'dataDinas' => $dataDinas,
        ]);
    }

    public function actionTabcetak() {
        //data gridview Arsip
        $dataCetak = new ActiveDataProvider([
            'query' => SimpelKeg::find()->where('status=2 ')->orderBy('tgl_mulai desc'),
        ]);
        return $this->render('cetak', [
                    'dataCetak' => $dataCetak,
        ]);
    }

    public function actionTabuang() {
        //data gridview Arsip
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
        }
        $dataUang = new ActiveDataProvider([
            'query' => SimpelKeg::find()->where('status=3 ')->orderBy('tgl_mulai desc'),
        ]);
        return $this->render('bendahara', [
                    'dataUang' => $dataUang,
        ]);
    }

    public function actionTabarsip() {
        //data gridview Arsip
        $dataArsip = new ActiveDataProvider([
            'query' => SimpelKeg::find()->where('status=4 ')->orderBy('tgl_mulai desc'),
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
                    $model3->bukti_kwitansi = $_POST['bukti_kwitansi' . $i];
                    $model3->volume = $_POST['volume' . $i];
                    $model3->jml = $_POST['jml' . $i];
                    $model3->uraian_rincian = $_POST['uraian' . $i];
                    $model3->save();
                }
            }
            return $this->redirect(['create', 'id' => $model2->id_kegiatan]);
        } else {
               switch ($model2->negara) {
                    case "1": 
                    return $this->renderAjax('input_personil', [
                                'model' => $model,
                                'model2' => $model2,
                    ]);
                    case "2":
                     return $this->renderAjax('input_luar_negri', [
                                    'model' => $model,
                                    'model2' => $model2,
                        ]);
                        break;
                    
                }
          
           
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
        Yii::$app->db->createCommand()->insert('simpel_log', ['user_id' => Yii::$app->user->id, 'nama_proses' => 'Proses <strong>Cetak</strong> ' . $model->nama_keg])->execute();
        Yii::$app->db->createCommand()->update('simpel_keg', ['status' => '2', 'status_edit' => '0'], ['id_kegiatan' => $id])->execute();
        return $this->redirect(['simpel-keg/tabcetak']);
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

            return $this->redirect(['tabuang']);
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
                    $mpdf->writeHTML($stylesheet, 1);
                    $mpdf->WriteHTML($content_english);
                
                } else {

                    $mpdf->SetDisplayMode('fullpage');

                    $mpdf->AddPage('P', '', '', '', '', 5, 5, 5, 1, 5, 5);
                    $mpdf->writeHTML($stylesheet, 1);
                    $mpdf->WriteHTML($content_english);
                }
                $mpdf->Output();
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
                $mpdf->Output();
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
            'count'=>$count,

        ]);
        $mpdf = new mPDF('utf-8', 'A4-L');
        $mpdf->AddPage('P', '', '', '', '', 15, 15, 5, 1, 5, 5);
        $mpdf->WriteHTML($content);
        $mpdf->Output();
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
        $model2 = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        $content = $this->render('/cetak/nominatif', [
            'model' => $model,
            'model2' => $model2,
            'count'=>$count,

        ]);
         $content_luar = $this->render('/cetak/nominatif_luar', [
            'model' => $model,
            'model2' => $model2,
            'count'=>$count,

        ]);
        $mpdf = new mPDF('utf-8', 'A4-L');
        if ($model->negara = '2'){
            $mpdf->AddPage('L', '', '', '', '', 15, 15, 5, 1, 5, 5);
            $mpdf->WriteHTML($content_luar);
        }else{
            $mpdf->AddPage('L', '', '', '', '', 15, 15, 5, 1, 5, 5);
            $mpdf->WriteHTML($content);
        }
       
        $mpdf->Output();
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
            'count'=>$count,

        ]);

        $mpdf = new mPDF('utf-8', 'A4-L');
        $mpdf->AddPage('P', '', '', '', '', 15, 15, 5, 1, 5, 5);
        $mpdf->WriteHTML($content);
        $mpdf->Output();
    }

    //ilham menambahkan fungsi untuk kwitansi
    public function actionKwitansi($id) {

        $this->layout = 'pdf';
        $model = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $model2 = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->all();
        $count = \backend\models\SimpelPersonil::find()->where('id_kegiatan=' . $id)->count();
        
        $html = $this->render('/cetak/kwitansi', [
            'model' => $model,
            'model2' => $model2,
            'count'=>$count,
        ]);

     
        $mpdf = new mPDF('utf-8', 'A4-L');
        $mpdf->AddPage('P', '', '', '', '', 15, 15, 5, 1, 5, 5);

        $mpdf->WriteHTML($html);
        $mpdf->Output();

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

    public function actionArsip($id) {
        $model = $this->findModel($id);
        Yii::$app->db->createCommand()->insert('simpel_log', ['user_id' => Yii::$app->user->id, 'nama_proses' => 'Proses <strong>Arsip</strong> ' . $model->nama_keg])->execute();
        Yii::$app->db->createCommand()->update('simpel_keg', ['status' => 4, 'status_edit' => 0], ['id_kegiatan' => $id])->execute();

        return $this->redirect(['/simpel-keg/tabarsip']);
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

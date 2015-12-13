<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_detail_keg".
 *
 * @property integer $detail_id
 * @property integer $suboutput_id
 * @property string $nama_detail
 * @property integer $jenis_detail_id
 * @property string $renc_tgl_mulai
 * @property string $renc_tgl_selesai
 * @property integer $status_detail_id
 * @property string $real_tgl_mulai
 * @property string $real_tgl_selesai
 * @property string $ket
 * @property integer $status_lapor_id
 * @property string $lokasi
 * @property string $nip_lapor
 * @property string $tgl_lapor
 * @property string $time_input
 * @property string $user_input
 * @property integer $status_real_up
 * @property integer $status_real_ls
 */
class MasterSerasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $nama_detail;
    public $kota_tujuan;
    public $kota_keberangkatan;
    public $dn_ln;
    public $draf_simpel;
    public $mak;
    public $tgl_penugasan;
    public $renc_tgl_mulai;
    public $renc_tgl_selesai;
    public $no_sp;
    public $no_spd;
    public $detail_id;
    public $negara_tujuan;
    public $nip_bpp;
    public $nip_ppk;
    public $unit_id;
    public $kode_mak;
    public $no_reg;
    public $propinsi_id;
    public $negara;
    public $kota_negara;
    public $res;
    public $kota_asal;
    public static function tableName()
    {
        return 'news_detail_keg';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['suboutput_id', 'jenis_detail_id', 'status_detail_id', 'status_lapor_id', 'status_real_up', 'status_real_ls'], 'integer'],
            [['nama_detail', 'jenis_detail_id', 'status_lapor_id', 'lokasi', 'nip_lapor', 'tgl_lapor', 'time_input', 'user_input'], 'required'],
            [['renc_tgl_mulai', 'renc_tgl_selesai', 'real_tgl_mulai', 'real_tgl_selesai', 'tgl_lapor', 'time_input'], 'safe'],
            [['nama_detail', 'lokasi'], 'string', 'max' => 200],
            [['ket'], 'string', 'max' => 100],
            [['nip_lapor'], 'string', 'max' => 25],
            [['user_input'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'detail_id' => Yii::t('app', 'Detail ID'),
            'suboutput_id' => Yii::t('app', 'Suboutput ID'),
            'nama_detail' => Yii::t('app', 'Nama Detail'),
            'jenis_detail_id' => Yii::t('app', 'jenis detail kegiatan'),
            'renc_tgl_mulai' => Yii::t('app', 'Renc Tgl Mulai'),
            'renc_tgl_selesai' => Yii::t('app', 'Renc Tgl Selesai'),
            'status_detail_id' => Yii::t('app', 'Status Detail ID'),
            'real_tgl_mulai' => Yii::t('app', 'Real Tgl Mulai'),
            'real_tgl_selesai' => Yii::t('app', 'Real Tgl Selesai'),
            'ket' => Yii::t('app', 'Ket'),
            'status_lapor_id' => Yii::t('app', '0=belum;1=sudah;2=batal'),
            'lokasi' => Yii::t('app', 'Lokasi'),
            'nip_lapor' => Yii::t('app', 'Nip Lapor'),
            'tgl_lapor' => Yii::t('app', 'Tgl Lapor'),
            'time_input' => Yii::t('app', 'Time Input'),
            'user_input' => Yii::t('app', 'User Input'),
            'status_real_up' => Yii::t('app', 'Status Real Up'),
            'status_real_ls' => Yii::t('app', 'Status Real Ls'),
        ];
    }

     public function getSub()
    {
        return $this->hasOne(\common\models\DetailKegMak::className(), ['detail_id' => 'detail_id']);
    }
}

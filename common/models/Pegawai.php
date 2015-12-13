<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_pegawai".
 *
 * @property string $nip
 * @property string $nama
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property integer $struk_id
 * @property integer $fung_id
 * @property integer $gol_id
 * @property string $unit_id
 * @property integer $jeniskel_id
 * @property string $photo
 * @property integer $statpeg_id
 * @property string $no_karpeg
 * @property string $tmt_struk
 * @property string $tmt_gol
 * @property integer $jenjang_id
 * @property integer $tahun_pend
 * @property integer $aktif_id
 * @property string $tmt_fung
 * @property integer $jenis_peg_id
 * @property integer $jenis_jab_id
 * @property integer $vol_bk_id
 * @property integer $alasan_vol_bk_id
 * @property string $tmt_pns
 * @property string $tmt_cpns
 * @property string $nama_cetak
 * @property string $unit_staf_id
 * @property integer $latjab_id
 * @property string $tmt_eselon
 * @property string $nip_lama
 * @property string $absensi_id
 * @property string $no_ext
 * @property integer $mk_th_gol
 * @property integer $mk_bl_gol
 * @property string $tgl_status
 * @property string $kdjabatan
 * @property string $keterangan
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_pegawai';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db3');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nama_cetak', 'nip_lama', 'absensi_id', 'no_ext', 'mk_th_gol', 'mk_bl_gol', 'tgl_status', 'kdjabatan', 'keterangan'], 'required'],
            [['tgl_lahir', 'tmt_struk', 'tmt_gol', 'tmt_fung', 'tmt_pns', 'tmt_cpns', 'tmt_eselon', 'tgl_status'], 'safe'],
            [['struk_id', 'fung_id', 'gol_id', 'jeniskel_id', 'statpeg_id', 'jenjang_id', 'tahun_pend', 'aktif_id', 'jenis_peg_id', 'jenis_jab_id', 'vol_bk_id', 'alasan_vol_bk_id', 'latjab_id', 'mk_th_gol', 'mk_bl_gol'], 'integer'],
            [['nip', 'nip_lama'], 'string', 'max' => 18],
            [['nama'], 'string', 'max' => 100],
            [['tmp_lahir', 'keterangan'], 'string', 'max' => 50],
            [['unit_id'], 'string', 'max' => 6],
            [['photo'], 'string', 'max' => 30],
            [['no_karpeg'], 'string', 'max' => 9],
            [['nama_cetak'], 'string', 'max' => 255],
            [['unit_staf_id', 'kdjabatan'], 'string', 'max' => 7],
            [['absensi_id'], 'string', 'max' => 3],
            [['no_ext'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip' => Yii::t('app', 'Nip'),
            'nama' => Yii::t('app', 'Nama'),
            'tmp_lahir' => Yii::t('app', 'Tmp Lahir'),
            'tgl_lahir' => Yii::t('app', 'Tgl Lahir'),
            'struk_id' => Yii::t('app', 'Struk ID'),
            'fung_id' => Yii::t('app', 'Fung ID'),
            'gol_id' => Yii::t('app', 'Gol ID'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'jeniskel_id' => Yii::t('app', 'Jeniskel ID'),
            'photo' => Yii::t('app', 'Photo'),
            'statpeg_id' => Yii::t('app', 'Statpeg ID'),
            'no_karpeg' => Yii::t('app', 'No Karpeg'),
            'tmt_struk' => Yii::t('app', 'Tmt Struk'),
            'tmt_gol' => Yii::t('app', 'Tmt Gol'),
            'jenjang_id' => Yii::t('app', 'Jenjang ID'),
            'tahun_pend' => Yii::t('app', 'Tahun Pend'),
            'aktif_id' => Yii::t('app', 'Aktif ID'),
            'tmt_fung' => Yii::t('app', 'Tmt Fung'),
            'jenis_peg_id' => Yii::t('app', 'Jenis Peg ID'),
            'jenis_jab_id' => Yii::t('app', 'Jenis Jab ID'),
            'vol_bk_id' => Yii::t('app', 'Vol Bk ID'),
            'alasan_vol_bk_id' => Yii::t('app', 'Alasan Vol Bk ID'),
            'tmt_pns' => Yii::t('app', 'Tmt Pns'),
            'tmt_cpns' => Yii::t('app', 'Tmt Cpns'),
            'nama_cetak' => Yii::t('app', 'Nama Cetak'),
            'unit_staf_id' => Yii::t('app', 'Unit Staf ID'),
            'latjab_id' => Yii::t('app', 'Latjab ID'),
            'tmt_eselon' => Yii::t('app', 'Tmt Eselon'),
            'nip_lama' => Yii::t('app', 'Nip Lama'),
            'absensi_id' => Yii::t('app', 'Absensi ID'),
            'no_ext' => Yii::t('app', 'No Ext'),
            'mk_th_gol' => Yii::t('app', 'Mk Th Gol'),
            'mk_bl_gol' => Yii::t('app', 'Mk Bl Gol'),
            'tgl_status' => Yii::t('app', 'Tgl Status'),
            'kdjabatan' => Yii::t('app', 'Kdjabatan'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }
}

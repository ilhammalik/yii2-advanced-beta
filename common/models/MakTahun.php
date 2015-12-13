<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_sub_mak_tahun".
 *
 * @property integer $sub_mak_id
 * @property string $nama_sub_mak
 * @property integer $alokasi_sub_mak
 * @property integer $suboutput_id
 * @property integer $nas_mak_id
 * @property integer $no_item
 * @property double $volume
 * @property string $satuan
 * @property integer $har_sat
 * @property integer $alokasi_pra_revisi
 * @property string $ket_revisi
 * @property integer $mak_header_id
 * @property integer $subkomponen_id
 * @property string $tahun
 * @property string $kd_satker
 * @property string $nas_prog_id
 * @property string $nas_keg_id
 * @property string $kdoutput
 * @property string $kdsoutput
 * @property string $kdkmpnen
 * @property string $kdskmpnen
 * @property string $kode_mak
 * @property string $kode_header
 * @property integer $blokir
 * @property string $kdib
 * @property string $header1
 * @property string $header2
 */
class MakTahun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_sub_mak_tahun';
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
    public $kota_asal;
    public function rules()
    {
        return [
            [['nama_sub_mak', 'alokasi_sub_mak', 'suboutput_id', 'no_item', 'volume', 'satuan', 'har_sat', 'alokasi_pra_revisi', 'ket_revisi', 'mak_header_id', 'subkomponen_id', 'kd_satker', 'nas_prog_id', 'nas_keg_id', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kode_mak', 'kode_header', 'blokir', 'kdib', 'header1', 'header2'], 'required'],
            [['alokasi_sub_mak', 'suboutput_id', 'nas_mak_id', 'no_item', 'har_sat', 'alokasi_pra_revisi', 'mak_header_id', 'subkomponen_id', 'blokir'], 'integer'],
            [['volume'], 'number'],
            [['tahun','nama_detail','renc_tgl_mulai','no_sp','no_spd', 'renc_tgl_selesai','kode_mak', 'tgl_penugasan','kota_tujuan','kota_keberangkatan','dn_ln','draf_simpel'], 'safe'],
            [['nama_sub_mak', 'ket_revisi'], 'string', 'max' => 255],
            [['satuan'], 'string', 'max' => 5],
            [['kd_satker', 'kode_mak'], 'string', 'max' => 6],
            [['nas_prog_id'], 'string', 'max' => 9],
            [['nas_keg_id', 'header1', 'header2'], 'string', 'max' => 4],
            [['kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen'], 'string', 'max' => 3],
            [['kode_header'], 'string', 'max' => 1],
            [['kdib'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sub_mak_id' => Yii::t('app', 'Sub Mak ID'),
            'nama_sub_mak' => Yii::t('app', 'Nama Sub Mak'),
            'alokasi_sub_mak' => Yii::t('app', 'Alokasi Sub Mak'),
            'suboutput_id' => Yii::t('app', 'Suboutput ID'),
            'nas_mak_id' => Yii::t('app', 'Nas Mak ID'),
            'no_item' => Yii::t('app', 'No Item'),
            'volume' => Yii::t('app', 'Volume'),
            'satuan' => Yii::t('app', 'Satuan'),
            'har_sat' => Yii::t('app', 'Har Sat'),
            'alokasi_pra_revisi' => Yii::t('app', 'Alokasi Pra Revisi'),
            'ket_revisi' => Yii::t('app', 'Ket Revisi'),
            'mak_header_id' => Yii::t('app', 'Mak Header ID'),
            'subkomponen_id' => Yii::t('app', 'Subkomponen ID'),
            'tahun' => Yii::t('app', 'Tahun'),
            'kd_satker' => Yii::t('app', 'Kd Satker'),
            'nas_prog_id' => Yii::t('app', 'Nas Prog ID'),
            'nas_keg_id' => Yii::t('app', 'Nas Keg ID'),
            'kdoutput' => Yii::t('app', 'Kdoutput'),
            'kdsoutput' => Yii::t('app', 'Kdsoutput'),
            'kdkmpnen' => Yii::t('app', 'Kdkmpnen'),
            'kdskmpnen' => Yii::t('app', 'Kdskmpnen'),
            'kode_mak' => Yii::t('app', 'Kode Mak'),
            'kode_header' => Yii::t('app', 'Kode Header'),
            'blokir' => Yii::t('app', 'Blokir'),
            'kdib' => Yii::t('app', 'Kdib'),
            'header1' => Yii::t('app', 'Header1'),
            'header2' => Yii::t('app', 'Header2'),
        ];
    }

     public function getSub()
    {
        return $this->hasOne(\common\models\DetailKegMak::className(), ['sub_mak_id' => 'sub_mak_id']);
    }
}

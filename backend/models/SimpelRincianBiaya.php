<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simpel_rincian_biaya".
 *
 * @property integer $id_rincian_biaya
 * @property integer $kat_biaya_id
 * @property integer $harga_satuan
 * @property integer $volume
 * @property string $uraian_rincian
 * @property integer $personil_id
 * @property integer $daf_kat_biaya_id_kat_biaya
 * @property integer $daf_kegiatan_id_kegiatan
 * @property integer $daf_personil_id_personil
 * @property integer $jml
 */
class SimpelRincianBiaya extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simpel_rincian_biaya';
    }

    /**
     * @inheritdoc
     */
    public $jm;
    public $pagu;
    public $persen;
    public $satuan;
   // public $bukti_kwitansi;
    public function rules()
    {
        return [
            //[['bukti_kwitansi'], 'required'],
            [['id_rincian_biaya', 'bukti_kwitansi','kat_biaya_id', 'harga_satuan', 'volume', 'personil_id','jml'], 'integer'],
            [['label'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rincian_biaya' => Yii::t('app', 'Id Rincian Biaya'),
            'kat_biaya_id' => Yii::t('app', 'Kat Biaya ID'),
            'harga_satuan' => Yii::t('app', 'Harga Satuan'),
            'volume' => Yii::t('app', 'Volume'),
            'uraian_rincian' => Yii::t('app', 'Uraian Rincian'),
            'personil_id' => Yii::t('app', 'Personil ID'),
            'daf_kat_biaya_id_kat_biaya' => Yii::t('app', 'Daf Kat Biaya Id Kat Biaya'),
            'daf_kegiatan_id_kegiatan' => Yii::t('app', 'Daf Kegiatan Id Kegiatan'),
            'daf_personil_id_personil' => Yii::t('app', 'Daf Personil Id Personil'),
            'jml' => Yii::t('app', 'Jml'),
        ];
    }
      public function getBiaya()
    {
        return $this->hasOne(\backend\models\SimpelDafKatBiaya::className(), ['kat_biaya_id' => 'kat_biaya_id']);
    }
}

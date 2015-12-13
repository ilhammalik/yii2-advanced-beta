<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simpel_daf_kat_biaya".
 *
 * @property integer $kat_biaya_id
 * @property string $nama
 * @property string $keterangan
 */
class SimpelDafKatBiaya extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simpel_daf_kat_biaya';
    }

    /**
     * @inheritdoc
     */
    public $volume;
    public $satuan;
    public $jml;
    public $uraian;
    public $bukti_kwitansi;
    public $label;
    public function rules()
    {
        return [
            [['nama', 'keterangan'], 'required'],
             [['bukti_kwitansi'], 'safe'],
            [['nama', 'keterangan','bukti_kwitansi'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kat_biaya_id' => Yii::t('app', 'Kat Biaya ID'),
            'nama' => Yii::t('app', 'Nama'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }
}

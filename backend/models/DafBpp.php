<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_daf_satker_tahun".
 *
 * @property integer $satker_tahun_id
 * @property string $kd_satker
 * @property string $tahun
 * @property string $nip_kpa
 * @property string $nip_bendahara
 * @property string $nip_spm
 * @property string $nomor_dipa
 * @property string $tgl_dipa
 */
class DafBpp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_daf_satker_tahun';
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
            [['kd_satker', 'tahun', 'nip_kpa', 'nip_bendahara', 'nip_spm', 'nomor_dipa', 'tgl_dipa'], 'required'],
            [['tgl_dipa'], 'safe'],
            [['kd_satker'], 'string', 'max' => 6],
            [['tahun'], 'string', 'max' => 4],
            [['nip_kpa', 'nip_bendahara', 'nip_spm'], 'string', 'max' => 18],
            [['nomor_dipa'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'satker_tahun_id' => Yii::t('app', 'Satker Tahun ID'),
            'kd_satker' => Yii::t('app', 'Kd Satker'),
            'tahun' => Yii::t('app', 'Tahun'),
            'nip_kpa' => Yii::t('app', 'Nip Kpa'),
            'nip_bendahara' => Yii::t('app', 'Nip Bendahara'),
            'nip_spm' => Yii::t('app', 'Nip Spm'),
            'nomor_dipa' => Yii::t('app', 'Nomor Dipa'),
            'tgl_dipa' => Yii::t('app', 'Tgl Dipa'),
        ];
    }
}

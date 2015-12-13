<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_daf_unit_satker_tahun".
 *
 * @property integer $unit_satker_tahun_id
 * @property string $tahun
 * @property string $nip_ppk
 * @property string $unit_id
 * @property string $no_sk
 * @property string $tgl_sk
 */
class DafPpk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_daf_unit_satker_tahun';
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
            [['tahun', 'nip_ppk', 'unit_id', 'no_sk', 'tgl_sk'], 'required'],
            [['tgl_sk'], 'safe'],
            [['tahun'], 'string', 'max' => 4],
            [['nip_ppk'], 'string', 'max' => 18],
            [['unit_id'], 'string', 'max' => 6],
            [['no_sk'], 'string', 'max' => 50],
            [['tahun', 'unit_id'], 'unique', 'targetAttribute' => ['tahun', 'unit_id'], 'message' => 'The combination of Tahun and Unit ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'unit_satker_tahun_id' => Yii::t('app', 'Unit Satker Tahun ID'),
            'tahun' => Yii::t('app', 'Tahun'),
            'nip_ppk' => Yii::t('app', 'Nip Ppk'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'no_sk' => Yii::t('app', 'No Sk'),
            'tgl_sk' => Yii::t('app', 'Tgl Sk'),
        ];
    }
}

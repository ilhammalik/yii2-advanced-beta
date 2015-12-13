<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tabel_sbu".
 *
 * @property string $KDSBU12
 * @property string $KDSBU
 * @property string $NMSBU
 * @property string $SATUAN
 * @property string $BIAYA12
 * @property string $BIAYA
 * @property string $KETERANGAN
 * @property string $NMITEM
 * @property string $SATKEG
 * @property integer $_NullFlags
 * @property string $TAHUN
 * @property integer $id
 */
class TabelSbu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_sbu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDSBU12', 'id'], 'required'],
            [['BIAYA12', 'BIAYA'], 'number'],
            [['_NullFlags', 'id'], 'integer'],
            [['TAHUN'], 'safe'],
            [['KDSBU12', 'KDSBU'], 'string', 'max' => 8],
            [['NMSBU'], 'string', 'max' => 250],
            [['SATUAN'], 'string', 'max' => 18],
            [['KETERANGAN', 'SATKEG'], 'string', 'max' => 5],
            [['NMITEM'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KDSBU12' => Yii::t('app', 'Kdsbu12'),
            'KDSBU' => Yii::t('app', 'Kdsbu'),
            'NMSBU' => Yii::t('app', 'Nmsbu'),
            'SATUAN' => Yii::t('app', 'Satuan'),
            'BIAYA12' => Yii::t('app', 'Biaya12'),
            'BIAYA' => Yii::t('app', 'Biaya'),
            'KETERANGAN' => Yii::t('app', 'Keterangan'),
            'NMITEM' => Yii::t('app', 'Nmitem'),
            'SATKEG' => Yii::t('app', 'Satkeg'),
            '_NullFlags' => Yii::t('app', 'Null Flags'),
            'TAHUN' => Yii::t('app', 'Tahun'),
            'id' => Yii::t('app', 'ID'),
        ];
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_daf_unit_satker".
 *
 * @property integer $unit_satker_id
 * @property string $unit_id
 * @property string $kd_satker
 */
class DafUnitSatker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_daf_unit_satker';
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
            [['kd_satker'], 'required'],
            [['unit_id', 'kd_satker'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'unit_satker_id' => Yii::t('app', 'Unit Satker ID'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'kd_satker' => Yii::t('app', 'Kd Satker'),
        ];
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "daf_gol".
 *
 * @property integer $gol_id
 * @property string $pangkat
 * @property string $golongan
 * @property string $ket
 */
class Gol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daf_gol';
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
            [['pangkat'], 'string', 'max' => 60],
            [['golongan'], 'string', 'max' => 6],
            [['ket'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gol_id' => Yii::t('app', 'Gol ID'),
            'pangkat' => Yii::t('app', 'Pangkat'),
            'golongan' => Yii::t('app', 'Golongan'),
            'ket' => Yii::t('app', 'Ket'),
        ];
    }
}

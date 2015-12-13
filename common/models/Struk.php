<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "daf_jab_struk".
 *
 * @property integer $struk_id
 * @property string $nama
 * @property integer $eselon_id
 * @property integer $gol_id_max
 * @property integer $gol_id_min
 */
class Struk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daf_jab_struk';
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
            [['struk_id', 'gol_id_max', 'gol_id_min'], 'required'],
            [['struk_id', 'eselon_id', 'gol_id_max', 'gol_id_min'], 'integer'],
            [['nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'struk_id' => Yii::t('app', 'Struk ID'),
            'nama' => Yii::t('app', 'Nama'),
            'eselon_id' => Yii::t('app', 'Eselon ID'),
            'gol_id_max' => Yii::t('app', 'Gol Id Max'),
            'gol_id_min' => Yii::t('app', 'Gol Id Min'),
        ];
    }
}

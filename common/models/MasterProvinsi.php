<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_provinsi".
 *
 * @property integer $provinsi_id
 * @property string $provinsi_nama
 */
class MasterProvinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinsi_nama'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'provinsi_id' => Yii::t('app', 'Provinsi ID'),
            'provinsi_nama' => Yii::t('app', 'Provinsi Nama'),
        ];
    }
}

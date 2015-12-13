<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_kokab".
 *
 * @property integer $kota_id
 * @property string $kokab_nama
 * @property integer $provinsi_id
 */
class MasterKokab extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_kokab';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinsi_id'], 'integer'],
            [['kokab_nama'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kota_id' => Yii::t('app', 'Kota ID'),
            'kokab_nama' => Yii::t('app', 'Kokab Nama'),
            'provinsi_id' => Yii::t('app', 'Provinsi ID'),
        ];
    }
}

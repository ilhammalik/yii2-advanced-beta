<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bol_daf_negara".
 *
 * @property string $kode_negara
 * @property string $nama
 */
class DafNegara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bol_daf_negara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_negara'], 'required'],
            [['kode_negara'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_negara' => Yii::t('app', 'Kode Negara'),
            'nama' => Yii::t('app', 'Nama'),
        ];
    }
}

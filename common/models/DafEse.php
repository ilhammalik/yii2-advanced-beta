<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "daf_eselon".
 *
 * @property integer $eselon_id
 * @property string $eselon
 * @property string $nama_eselon
 * @property integer $usia_pensiun
 * @property string $kode_eselon
 */
class DafEse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daf_eselon';
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
            [['eselon_id', 'usia_pensiun', 'kode_eselon'], 'required'],
            [['eselon_id', 'usia_pensiun'], 'integer'],
            [['eselon'], 'string', 'max' => 5],
            [['nama_eselon'], 'string', 'max' => 100],
            [['kode_eselon'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eselon_id' => Yii::t('app', 'Eselon ID'),
            'eselon' => Yii::t('app', 'Eselon'),
            'nama_eselon' => Yii::t('app', 'Nama Eselon'),
            'usia_pensiun' => Yii::t('app', 'Usia Pensiun'),
            'kode_eselon' => Yii::t('app', 'Kode Eselon'),
        ];
    }
}

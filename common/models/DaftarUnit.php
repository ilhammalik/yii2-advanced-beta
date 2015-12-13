<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "daf_unit".
 *
 * @property string $unit_id
 * @property string $nama
 * @property integer $eselon
 * @property string $unit_parent_id
 * @property string $ket
 * @property string $tupoksi
 * @property string $ket2
 * @property string $sebutan
 * @property string $anjab_file
 * @property string $aktif_id
 * @property string $satker_id
 */
class DaftarUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai.daf_unit';
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
            [['unit_id', 'ket2', 'anjab_file', 'satker_id'], 'required'],
            [['eselon'], 'integer'],
            [['tupoksi'], 'string'],
            [['unit_id', 'satker_id'], 'string', 'max' => 6],
            [['nama'], 'string', 'max' => 200],
            [['unit_parent_id'], 'string', 'max' => 60],
            [['ket'], 'string', 'max' => 15],
            [['ket2'], 'string', 'max' => 5],
            [['sebutan'], 'string', 'max' => 225],
            [['anjab_file'], 'string', 'max' => 125],
            [['aktif_id'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'unit_id' => Yii::t('app', 'Unit ID'),
            'nama' => Yii::t('app', 'Nama'),
            'eselon' => Yii::t('app', 'Eselon'),
            'unit_parent_id' => Yii::t('app', 'Unit Parent ID'),
            'ket' => Yii::t('app', 'Ket'),
            'tupoksi' => Yii::t('app', 'Tupoksi'),
            'ket2' => Yii::t('app', 'Ket2'),
            'sebutan' => Yii::t('app', 'Sebutan'),
            'anjab_file' => Yii::t('app', 'Anjab File'),
            'aktif_id' => Yii::t('app', 'Aktif ID'),
            'satker_id' => Yii::t('app', 'Satker ID'),
        ];
    }

     public function getKeg()
    {
        return $this->hasOne(\common\models\DaftarUnit::className(), ['unit_id' => 'unit_id']);
    }
}

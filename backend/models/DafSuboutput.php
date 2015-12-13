<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_nas_suboutput".
 *
 * @property integer $suboutput_id
 * @property string $nama_suboutput
 * @property integer $tahun
 * @property string $kd_satker
 * @property string $nas_prog_id
 * @property string $nas_keg_id
 * @property string $kode_output
 * @property string $kdsoutput
 * @property integer $output_id
 * @property string $unit_id
 * @property string $unit_id3
 * @property string $kode_suboutput
 * @property integer $hide_id
 * @property string $kdib
 */
class DafSuboutput extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_nas_suboutput';
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
            [['tahun', 'kd_satker', 'nas_prog_id', 'nas_keg_id', 'kdsoutput', 'output_id', 'unit_id', 'unit_id3', 'kode_suboutput', 'kdib'], 'required'],
            [['tahun', 'output_id', 'hide_id'], 'integer'],
            [['nama_suboutput'], 'string', 'max' => 255],
            [['kd_satker', 'unit_id', 'unit_id3'], 'string', 'max' => 6],
            [['nas_prog_id'], 'string', 'max' => 9],
            [['nas_keg_id'], 'string', 'max' => 4],
            [['kode_output', 'kdsoutput'], 'string', 'max' => 3],
            [['kode_suboutput'], 'string', 'max' => 15],
            [['kdib'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'suboutput_id' => Yii::t('app', 'Suboutput ID'),
            'nama_suboutput' => Yii::t('app', 'Nama Suboutput'),
            'tahun' => Yii::t('app', 'Tahun'),
            'kd_satker' => Yii::t('app', 'Kd Satker'),
            'nas_prog_id' => Yii::t('app', 'Nas Prog ID'),
            'nas_keg_id' => Yii::t('app', 'Nas Keg ID'),
            'kode_output' => Yii::t('app', 'Kode Output'),
            'kdsoutput' => Yii::t('app', 'Kdsoutput'),
            'output_id' => Yii::t('app', 'Output ID'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'unit_id3' => Yii::t('app', 'Unit Id3'),
            'kode_suboutput' => Yii::t('app', 'Kode Suboutput'),
            'hide_id' => Yii::t('app', '1=hide;0=muncul'),
            'kdib' => Yii::t('app', 'Kdib'),
        ];
    }

    public function getUnit()
    {
        return $this->hasOne(\common\models\DaftarUnit::className(), ['unit_id' => 'unit_id']);
    }
}

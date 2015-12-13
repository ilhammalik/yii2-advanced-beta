<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pagu_mak".
 *
 * @property integer $id_pagu
 * @property integer $tahun
 * @property integer $alokasi_sub_mak
 * @property integer $alokasi_pra_revisi
 * @property integer $kd_satker
 * @property integer $nas_prog_id
 * @property integer $nas_keg_id
 * @property integer $kdoutput
 * @property integer $kdsoutput
 * @property integer $kdkmpnen
 * @property string $kdskmpnen
 * @property integer $kode_mak
 */
class SimpelPagu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pagu_mak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun', 'alokasi_sub_mak', 'alokasi_pra_revisi', 'kd_satker', 'nas_prog_id', 'nas_keg_id', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kode_mak'], 'required'],
            [['tahun', 'alokasi_sub_mak', 'alokasi_pra_revisi', 'kd_satker', 'nas_prog_id', 'nas_keg_id', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kode_mak'], 'integer'],
            [['kdskmpnen'], 'string', 'max' => 22]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pagu' => Yii::t('app', 'Id Pagu'),
            'tahun' => Yii::t('app', 'Tahun'),
            'alokasi_sub_mak' => Yii::t('app', 'Alokasi'),
            'alokasi_pra_revisi' => Yii::t('app', 'Alokasi'),
            'kd_satker' => Yii::t('app', 'Kode Satker'),
            'nas_prog_id' => Yii::t('app', 'Program '),
            'nas_keg_id' => Yii::t('app', 'Kegiatan'),
            'kdoutput' => Yii::t('app', 'Output'),
            'kdsoutput' => Yii::t('app', 'Sub Output'),
            'kdkmpnen' => Yii::t('app', 'Kompnen'),
            'kdskmpnen' => Yii::t('app', 'Sub Kompnen'),
            'kode_mak' => Yii::t('app', 'Kode Mak'),
            'unit_id' => Yii::t('app', 'Unit Kerja'),
        ];
    }
      public function getSatker()
    {
        return $this->hasOne(\backend\models\DafUnitSatker::className(), ['kd_satker' => 'kd_satker']);
    }

      public function getPut()
    {
        return $this->hasOne(\backend\models\DafSuboutput::className(), ['suboutput_id' => 'suboutput_id']);
    }
}

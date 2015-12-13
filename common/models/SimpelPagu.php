<?php

namespace common\models;

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
            'alokasi_sub_mak' => Yii::t('app', 'Alokasi Sub Mak'),
            'alokasi_pra_revisi' => Yii::t('app', 'Alokasi Pra Revisi'),
            'kd_satker' => Yii::t('app', 'Kd Satker'),
            'nas_prog_id' => Yii::t('app', 'Nas Prog ID'),
            'nas_keg_id' => Yii::t('app', 'Nas Keg ID'),
            'kdoutput' => Yii::t('app', 'Kdoutput'),
            'kdsoutput' => Yii::t('app', 'Kdsoutput'),
            'kdkmpnen' => Yii::t('app', 'Kdkmpnen'),
            'kdskmpnen' => Yii::t('app', 'Kdskmpnen'),
            'kode_mak' => Yii::t('app', 'Kode Mak'),
        ];
    }
}

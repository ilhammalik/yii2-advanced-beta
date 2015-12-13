<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simpel_riw_keg_perjadin".
 *
 * @property integer $id_riw_keg_perjadin
 * @property integer $id_rincian_biaya
 * @property integer $id_kegiatan
 * @property integer $id_personil
 */
class SimpelRiwKegPerjadin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simpel_riw_keg_perjadin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_riw_keg_perjadin'], 'required'],
            [['id_riw_keg_perjadin', 'id_rincian_biaya', 'id_kegiatan', 'id_personil'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_riw_keg_perjadin' => Yii::t('app', 'Id Riw Keg Perjadin'),
            'id_rincian_biaya' => Yii::t('app', 'Id Rincian Biaya'),
            'id_kegiatan' => Yii::t('app', 'Id Kegiatan'),
            'id_personil' => Yii::t('app', 'Id Personil'),
        ];
    }
}

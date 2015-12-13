<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tgl_terima".
 *
 * @property integer $terima_id
 * @property integer $id_kegiatan
 * @property string $tgl_terima
 */
class TglTerima extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simpel_tgl_terima';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kegiatan', 'tgl_terima'], 'required'],
            [['id_kegiatan'], 'integer'],
            [['tgl_terima'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'terima_id' => Yii::t('app', 'Terima ID'),
            'id_kegiatan' => Yii::t('app', 'Kegiatan ID'),
            'tgl_terima' => Yii::t('app', 'Tgl Terima'),
        ];
    }


     public function getPegawai()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'personil_id']);
    }
}

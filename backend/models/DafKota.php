<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "daf_kabupaten_kota".
 *
 * @property integer $kab_id
 * @property string $nama
 * @property integer $propinsi_id
 */
class DafKota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daf_kabupaten_kota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'propinsi_id'], 'required'],
            [['propinsi_id'], 'integer'],
            [['nama'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kab_id' => Yii::t('app', 'Kab ID'),
            'nama' => Yii::t('app', 'Nama'),
            'propinsi_id' => Yii::t('app', 'Propinsi ID'),
        ];
    }
       public function getProvinsi()
    {
        return $this->hasOne(\backend\models\DafPropinsi::className(), ['propinsi_id' => 'propinsi_id']);
    }

}

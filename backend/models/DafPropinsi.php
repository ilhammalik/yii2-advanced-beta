<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "daf_propinsi".
 *
 * @property integer $propinsi_id
 * @property string $nama
 * @property integer $dalam_negeri
 */
class DafPropinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daf_propinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['dalam_negeri'], 'integer'],
            [['nama'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'propinsi_id' => Yii::t('app', 'Propinsi ID'),
            'nama' => Yii::t('app', 'Nama'),
            'dalam_negeri' => Yii::t('app', 'Dalam Negeri'),
        ];
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "angkutan".
 *
 * @property integer $angkutan_id
 * @property string $nama
 * @property integer $is_trash
 */
class Angkutan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'angkutan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['angkutan_id', 'nama', 'is_trash'], 'required'],
            [['angkutan_id', 'is_trash'], 'integer'],
            [['nama'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'angkutan_id' => Yii::t('app', 'Angkutan ID'),
            'nama' => Yii::t('app', 'Nama'),
            'is_trash' => Yii::t('app', 'Is Trash'),
        ];
    }
}

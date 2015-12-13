<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simpel_log".
 *
 * @property integer $id_log
 * @property integer $user_id
 * @property string $nama_proses
 * @property string $waktu
 * @property integer $simpel_user_user_id
 */
class SimpelLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simpel_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_log'], 'required'],
            [['id_log', 'user_id'], 'integer'],
            [['waktu'], 'safe'],
            [['nama_proses'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_log' => Yii::t('app', 'Id Log'),
            'user_id' => Yii::t('app', 'User ID'),
            'nama_proses' => Yii::t('app', 'Nama Proses'),
            'waktu' => Yii::t('app', 'Waktu'),
            'simpel_user_user_id' => Yii::t('app', 'Simpel User User ID'),
        ];
    }
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
}

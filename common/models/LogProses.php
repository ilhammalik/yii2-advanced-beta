<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "log_proses".
 *
 * @property integer $id
 * @property integer $lp_id
 * @property string $username
 * @property string $proses
 * @property string $waktu
 */
class LogProses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_proses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'proses'], 'required'],
            [['username', 'proses'], 'string'],
            [['waktu'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'proses' => Yii::t('app', 'Proses'),
            'waktu' => Yii::t('app', 'Waktu'),
        ];
    }

    //membuat relasi antar table log dengan user

     public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
}

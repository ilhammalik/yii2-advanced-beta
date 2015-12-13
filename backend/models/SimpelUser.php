<?php

namespace backend\models;

use Yii;
use yii\helpers\Html;
/**
 * This is the model class for table "simpel_user".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $unit_id
 */
class SimpelUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['user_id', 'unit_id'], 'integer'],
            [['username', 'password_reset_token'], 'string', 'max' => 45],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
      public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'unit_id' => Yii::t('app', 'Unit ID'),
        ];
    }

       public function getUserRole()
        {
            $roles = \Yii::$app->authManager->getRolesByUser($this->user_id);

            $role = '         -';

            foreach($roles as $key => $value)
            {
                $role = $key;
            }

            return  Html::decode($role);
        }
}

<?php
namespace common\models;

use Yii;
use yii\helpers\Html;

use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%simpel_user}}';
    }

    /**
     * @inheritdoc
     */
  

    /**
     * @inheritdoc
     */
    public $password;
    public $password_new;
    public $password_compare;
    
    public function rules()
    {
        return [
            //[['username', 'email','status'], 'required'],
         
            [['role','unit_id'], 'safe'],
            [['username','role','unit_id'], 'string'],
            [['email'], 'email'],
            ['password', 'validateOldPassword', 'on' => 'ubahpassword'],
            ['password', 'required', 'on' => 'ubahpassword'],
            ['password_new', 'required', 'on' => 'ubahpassword'],
            ['password_compare', 'required', 'on' => 'ubahpassword'],
            ['password_new', 'compare', 'compareAttribute' => 'password_compare', 'on' => 'ubahpassword'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['user_id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    

     public static function findByRole($role)
    {
        return static::findOne(['role_id' => $role]);
    }

   public static function findByUnit($unit)
    {
        return static::findOne(['unit_id' => $unit]);
    }

   

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }
    public function NamaStatus($id){
        switch ($id) {
            case 10: {
                $id = 'Aktif';
            }
                break;
            default:{
                $id = 'Tidak Aktif';
            }
                break;
        }
        return $id;
    }
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
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


    public function validateOldPassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = User::findIdentity(\Yii::$app->user->user_id);
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Password lama tidak cocok.');
            }
        }
    }
         public function getUnit()
    {
        return $this->hasOne(\common\models\DaftarUnit::className(), ['unit_id' => 'unit_id']);
    }
}

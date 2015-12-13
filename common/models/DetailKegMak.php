<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_detail_keg_mak".
 *
 * @property integer $detail_mak_id
 * @property integer $detail_id
 * @property integer $sub_mak_id
 * @property integer $renc_up
 * @property integer $renc_ls
 * @property integer $real_up
 * @property integer $real_ls
 */
class DetailKegMak extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_detail_keg_mak';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detail_id', 'sub_mak_id', 'renc_up', 'renc_ls', 'real_up', 'real_ls'], 'integer'],
            [['sub_mak_id', 'real_up', 'real_ls'], 'required'],
            [['detail_id', 'sub_mak_id'], 'unique', 'targetAttribute' => ['detail_id', 'sub_mak_id'], 'message' => 'The combination of Detail ID and Sub Mak ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'detail_mak_id' => Yii::t('app', 'Detail Mak ID'),
            'detail_id' => Yii::t('app', 'Detail ID'),
            'sub_mak_id' => Yii::t('app', 'Sub Mak ID'),
            'renc_up' => Yii::t('app', 'Renc Up'),
            'renc_ls' => Yii::t('app', 'Renc Ls'),
            'real_up' => Yii::t('app', 'Real Up'),
            'real_ls' => Yii::t('app', 'Real Ls'),
        ];
    }
    public function getDetail()
    {
        return $this->hasOne(\common\models\DaftarKeg::className(), ['detail_id' => 'detail_id']);
    }

    public function getTahun()
    {
        return $this->hasOne(\common\models\DaftarKeg::className(), ['sub_mak_id' => 'sub_mak_id']);
    }
}

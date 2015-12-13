<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simpel_penugasan".
 *
 * @property integer $id_penugasan
 * @property integer $personil_id
 * @property string $no_sp
 * @property string $no_spd
 * @property string $tgl_penugasan
 * @property integer $pejabat_ttd
 * @property string $tgl_berangkat
 * @property string $tgl_kembali
 * @property integer $berangkat_asal
 * @property integer $tujuan
 * @property integer $uang_makan
 */
class SimpelPenugasan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simpel_penugasan';
    }

    /**
     * @inheritdoc
     */
    public $pejabat;
    public function rules()
    {
        return [
            [['personil_id', 'no_sp', 'no_spd', 'tgl_penugasan', 'pejabat_ttd', 'tgl_berangkat', 'tgl_kembali', 'berangkat_asal', 'tujuan', 'uang_makan'], 'required'],
            [['personil_id', 'pejabat_ttd', 'berangkat_asal', 'tujuan','angkutan', 'uang_makan'], 'integer'],
            [['no_sp', 'no_spd'], 'string'],
            [['tgl_penugasan', 'tgl_berangkat', 'tgl_kembali'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_penugasan' => Yii::t('app', 'Id Penugasan'),
            'personil_id' => Yii::t('app', 'Personil ID'),
            'no_sp' => Yii::t('app', 'No Sp'),
            'no_spd' => Yii::t('app', 'No Spd'),
            'tgl_penugasan' => Yii::t('app', 'Tgl Penugasan'),
            'pejabat_ttd' => Yii::t('app', 'Pejabat Ttd'),
            'tgl_berangkat' => Yii::t('app', 'Tgl Berangkat'),
            'tgl_kembali' => Yii::t('app', 'Tgl Kembali'),
            'berangkat_asal' => Yii::t('app', 'Berangkat Asal'),
            'tujuan' => Yii::t('app', 'Tujuan'),
            'uang_makan' => Yii::t('app', 'Uang Makan'),
        ];
    }
       public function getPersonil()
    {
        return $this->hasOne(\backend\models\SimpelPersonil::className(), ['id_personil' => 'personil_id']);
    }

      public function getPegawai()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'pejabat_ttd']);
    }

}

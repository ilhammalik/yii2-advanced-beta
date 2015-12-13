<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simpel_personil".
 *
 * @property integer $id_personil
 * @property string $pegawai_id
 * @property integer $id_kegiatan
 * @property string $tgl_penugasan
 * @property string $tgl_berangkat
 * @property string $tgl_kembali
 * @property string $pejabat
 * @property string $no_sp
 * @property integer $berangkat_asal
 * @property integer $tujuan_keberangkatan
 * @property integer $uang_makan
 * @property integer $angkutan
 * @property integer $status_
 */
class SimpelPersonil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simpel_personil';
    }

    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            [[ 'tgl_penugasan','pegawai_id', 'tingkat_id','tgl_berangkat', 'tgl_kembali', 'pejabat', 'no_sp','uang_makan', 'angkutan'], 'required'],
            [['id_kegiatan', 'tingkat_id', 'uang_makan', 'angkutan', 'status'], 'integer'],
            [['tgl_penugasan', 'tgl_berangkat', 'tgl_kembali'], 'safe'],
            [['no_sp','perintah_dari'], 'string'],
            [['pegawai_id', 'pejabat'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_personil' => Yii::t('app', 'Id Personil'),
            'pegawai_id' => Yii::t('app', 'Pegawai ID'),
            'id_kegiatan' => Yii::t('app', 'Id Kegiatan'),
            'tgl_penugasan' => Yii::t('app', 'Tgl Penugasan'),
            'tgl_berangkat' => Yii::t('app', 'Tgl Berangkat'),
            'tgl_kembali' => Yii::t('app', 'Tgl Kembali'),
            'pejabat' => Yii::t('app', 'Pejabat'),
            'no_sp' => Yii::t('app', 'No Sp'),
            'berangkat_asal' => Yii::t('app', 'Berangkat Asal'),
            'tujuan_keberangkatan' => Yii::t('app', 'Tujuan Keberangkatan'),
            'uang_makan' => Yii::t('app', 'Uang Makan'),
            'angkutan' => Yii::t('app', 'Angkutan'),
            'status_' => Yii::t('app', 'Status'),
        ];
    }

     public function getPegawai()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'pegawai_id']);
    }


     public function getKeg()
    {
        return $this->hasOne(\backend\models\SimpelKeg::className(), ['id_kegiatan' => 'id_kegiatan']);
    }

     public function getPej()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'pejabat']);
    }
       public function getId()
    {
        return $this->getPrimaryKey();
    }


  

     public function getKend()
    {
        return $this->hasOne(\common\models\Angkutan::className(), ['angkutan_id' => 'angkutan']);
    }
     public function getPpk()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'nip_ppk']);
    }
      public function getPejab()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'pejabat']);
    }
      public function getBpp()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'nip_bpp']);
    }
}


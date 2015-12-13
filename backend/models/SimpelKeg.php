<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simpel_keg".
 *
 * @property integer $id_kegiatan
 * @property integer $mak
 * @property string $nama_keg
 * @property string $tujuan
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property integer $unit_id
 * @property integer $user_id
 * @property string $time_input
 * @property string $nip_ppk
 * @property string $no_sp
 * @property string $no_spd
 * @property string $angkutan
 * @property string $berangkat_asal
 * @property string $penandatangan
 * @property string $nip_ttd
 * @property string $jabatan_ttd
 * @property integer $jml_dl
 * @property integer $serasi2015.news_detail_keg_detail_id
 * @property string $nip_bpp
 * @property string $pegawai.master_pegawai_nip
 * @property integer $status_penyel
 */
class SimpelKeg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simpel_keg';
    }

    /**
     * @inheritdoc
     */
    public $satuankerja;
    public $bulan;
    public $bulan2;
    public $tahun;
    public $propinsi_id;
    public $tingkat;
    public function rules()
    {
        return [
            [['id_kegiatan', 'mak', 'nama_keg', 'tujuan', 'tgl_mulai', 'tgl_selesai', 'unit_id', 'user_id', 'time_input', 'nip_ppk', 'no_sp', 'no_spd', 'angkutan', 'berangkat_asal','suboutput_id', 'penandatangan', 'nip_ttd',  ], 'required'],
            [['id_kegiatan', 'negara','mak', 'unit_id','nip_kepala', 'user_id', 'jml_dl',  'status_penyel'], 'integer'],
            [['tgl_mulai', 'tgl_selesai','negara', 'time_input'], 'safe'],
            [['nama_keg', 'no_sp', 'no_reg', 'no_spd', 'tmpt_penyel', 'berangkat_asal', 'penandatangan', 'jabatan_ttd'], 'string', 'max' => 405],
            [['tujuan', 'nip_kepala','angkutan'], 'string', 'max' => 20],
            [['nip_ppk', 'nip_ttd', 'nip_bpp',], 'string', 'max' => 18]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kegiatan' => Yii::t('app', 'Id Kegiatan'),
            'mak' => Yii::t('app', 'Mak'),
            'nama_keg' => Yii::t('app', 'Nama Keg'),
            'tujuan' => Yii::t('app', 'Tujuan'),
            'tgl_mulai' => Yii::t('app', 'Tgl Mulai'),
            'tgl_selesai' => Yii::t('app', 'Tgl Selesai'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'time_input' => Yii::t('app', 'Time Input'),
            'nip_ppk' => Yii::t('app', 'Nip Ppk'),
            'no_sp' => Yii::t('app', 'No Sp'),
            'no_spd' => Yii::t('app', 'No Spd'),
            'angkutan' => Yii::t('app', 'Angkutan'),
            'berangkat_asal' => Yii::t('app', 'Berangkat Asal'),
            'penandatangan' => Yii::t('app', 'Penandatangan'),
            'nip_ttd' => Yii::t('app', 'Nip Ttd'),
            'jabatan_ttd' => Yii::t('app', 'Jabatan Ttd'),
            'jml_dl' => Yii::t('app', 'Jml Dl'),
            'nip_bpp' => Yii::t('app', 'Nip Bpp'),
            'status_penyel' => Yii::t('app', 'Status Penyel'),
        ];
    }
   
    //ilham Menmbahkan functin untuk menampilkan data tujuan yg tadinya id menjadi nama tujuan seperti luar negri dan dalam negri
      public function Tujuan($id){
        switch ($id) {
            case 1: {
                $id = 'Dalam Negri';
            }
                break;
            default:{
                $id = 'Luar Negri';
            }
                break;
        }
        return $id;
    }


     public function getPropinsi()
    {
        return $this->hasOne(\backend\models\DafKota::className(), ['propinsi_id' => 'propinsi_id']);
    }
    public function getKotaAsal()
    {
        return $this->hasOne(\backend\models\DafKota::className(), ['kab_id' => 'berangkat_asal']);
    }

        public function getKotaTujuan()
    {
        return $this->hasOne(\backend\models\DafKota::className(), ['kab_id' => 'tujuan']);
        
    }
       public function getPpk()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'nip_ppk']);
    }
      public function getBpp()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'nip_bpp']);
    }

      public function getPeg()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['nip' => 'pegawai_id']);
    }

        public function getUnit()
    {
        return $this->hasOne(\common\models\DaftarUnit::className(), ['unit_id' => 'unit_id']);
    }

       public function Jml($id){
        $personil = \backend\models\SimpelPersonil::find();
        $rincian = \backend\models\SimpelRincianBiaya::find();
        $daftar = \backend\models\SimpelDafKatBiaya::find();

        return $id;
       }

    public function getNegaratuj()
    {
        return $this->hasOne(\backend\models\DafNegara::className(), ['kode_negara' => 'negara_tujuan']);
    }

}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "daf_kegiatan".
 *
 * @property integer $id_kegiatan
 * @property integer $mak
 * @property string $nama_keg
 * @property string $anggaran
 * @property integer $jum_personil
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
 * @property string $tujuan
 * @property string $penandatangan
 * @property string $nip_ttd
 * @property string $jabatan_ttd
 * @property integer $jml_dl
 * @property integer $serasi2015.news_detail_keg_detail_id
 * @property string $nip_bpp
 * @property string $pegawai.master_pegawai_nip
 */
class DafKegiatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daf_kegiatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kegiatan', 'mak', 'nama_keg', 'anggaran', 'jum_personil', 'tgl_mulai', 'tgl_selesai', 'unit_id', 'user_id', 'time_input', 'nip_ppk', 'no_sp', 'no_spd', 'angkutan', 'berangkat_asal', 'tujuan', 'penandatangan', 'nip_ttd', 'serasi2015.news_detail_keg_detail_id', 'pegawai.master_pegawai_nip'], 'required'],
            [['id_kegiatan', 'mak', 'jum_personil', 'unit_id', 'user_id', 'jml_dl', 'serasi2015.news_detail_keg_detail_id'], 'integer'],
            [['tgl_mulai', 'tgl_selesai', 'time_input'], 'safe'],
            [['nama_keg', 'anggaran', 'no_sp', 'no_spd', 'berangkat_asal', 'tujuan', 'penandatangan', 'jabatan_ttd'], 'string', 'max' => 45],
            [['nip_ppk', 'nip_ttd', 'nip_bpp', 'pegawai.master_pegawai_nip'], 'string', 'max' => 18],
            [['angkutan'], 'string', 'max' => 20]
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
            'anggaran' => Yii::t('app', 'Anggaran'),
            'jum_personil' => Yii::t('app', 'Jum Personil'),
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
            'tujuan' => Yii::t('app', 'Tujuan'),
            'penandatangan' => Yii::t('app', 'Penandatangan'),
            'nip_ttd' => Yii::t('app', 'Nip Ttd'),
            'jabatan_ttd' => Yii::t('app', 'Jabatan Ttd'),
            'jml_dl' => Yii::t('app', 'Jml Dl'),
            'serasi2015.news_detail_keg_detail_id' => Yii::t('app', 'Serasi2015 News Detail Keg Detail ID'),
            'nip_bpp' => Yii::t('app', 'Nip Bpp'),
            'pegawai.master_pegawai_nip' => Yii::t('app', 'Pegawai Master Pegawai Nip'),
        ];
    }
}

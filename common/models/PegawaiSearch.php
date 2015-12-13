<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pegawai;

/**
 * PegawaiSearch represents the model behind the search form about `\common\models\Pegawai`.
 */
class PegawaiSearch extends Pegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'tmp_lahir', 'tgl_lahir', 'unit_id', 'photo', 'no_karpeg', 'tmt_struk', 'tmt_gol', 'tmt_fung', 'tmt_pns', 'tmt_cpns', 'nama_cetak', 'unit_staf_id', 'tmt_eselon', 'nip_lama', 'absensi_id', 'no_ext', 'tgl_status', 'kdjabatan', 'keterangan'], 'safe'],
            [['struk_id', 'fung_id', 'gol_id', 'jeniskel_id', 'statpeg_id', 'jenjang_id', 'tahun_pend', 'aktif_id', 'jenis_peg_id', 'jenis_jab_id', 'vol_bk_id', 'alasan_vol_bk_id', 'latjab_id', 'mk_th_gol', 'mk_bl_gol'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pegawai::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tgl_lahir' => $this->tgl_lahir,
            'struk_id' => $this->struk_id,
            'fung_id' => $this->fung_id,
            'gol_id' => $this->gol_id,
            'jeniskel_id' => $this->jeniskel_id,
            'statpeg_id' => $this->statpeg_id,
            'tmt_struk' => $this->tmt_struk,
            'tmt_gol' => $this->tmt_gol,
            'jenjang_id' => $this->jenjang_id,
            'tahun_pend' => $this->tahun_pend,
            'aktif_id' => $this->aktif_id,
            'tmt_fung' => $this->tmt_fung,
            'jenis_peg_id' => $this->jenis_peg_id,
            'jenis_jab_id' => $this->jenis_jab_id,
            'vol_bk_id' => $this->vol_bk_id,
            'alasan_vol_bk_id' => $this->alasan_vol_bk_id,
            'tmt_pns' => $this->tmt_pns,
            'tmt_cpns' => $this->tmt_cpns,
            'latjab_id' => $this->latjab_id,
            'tmt_eselon' => $this->tmt_eselon,
            'mk_th_gol' => $this->mk_th_gol,
            'mk_bl_gol' => $this->mk_bl_gol,
            'tgl_status' => $this->tgl_status,
        ]);

        $query->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tmp_lahir', $this->tmp_lahir])
            ->andFilterWhere(['like', 'unit_id', $this->unit_id])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'no_karpeg', $this->no_karpeg])
            ->andFilterWhere(['like', 'nama_cetak', $this->nama_cetak])
            ->andFilterWhere(['like', 'unit_staf_id', $this->unit_staf_id])
            ->andFilterWhere(['like', 'nip_lama', $this->nip_lama])
            ->andFilterWhere(['like', 'absensi_id', $this->absensi_id])
            ->andFilterWhere(['like', 'no_ext', $this->no_ext])
            ->andFilterWhere(['like', 'kdjabatan', $this->kdjabatan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}

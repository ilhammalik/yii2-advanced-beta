<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SimpelKeg;

/**
 * SimpelKegSearch represents the model behind the search form about `backend\models\SimpelKeg`.
 */
class SimpelKegSearch extends SimpelKeg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kegiatan', 'mak', 'unit_id', 'user_id', 'jml_dl', 'serasi2015.news_detail_keg_detail_id', 'status_penyel'], 'integer'],
            [['nama_keg', 'tujuan', 'tgl_mulai', 'tgl_selesai', 'time_input', 'nip_ppk', 'no_sp', 'no_spd', 'angkutan', 'berangkat_asal', 'penandatangan', 'nip_ttd', 'jabatan_ttd', 'nip_bpp', 'pegawai.master_pegawai_nip'], 'safe'],
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
        $query = SimpelKeg::find();

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
            'id_kegiatan' => $this->id_kegiatan,
            'mak' => $this->mak,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_selesai' => $this->tgl_selesai,
            'unit_id' => $this->unit_id,
            'user_id' => $this->user_id,
            'time_input' => $this->time_input,
            'jml_dl' => $this->jml_dl,
           // 'serasi2015.news_detail_keg_detail_id' => $this->serasi2015.news_detail_keg_detail_id,
            'status_penyel' => $this->status_penyel,
        ]);

        $query->andFilterWhere(['like', 'nama_keg', $this->nama_keg])
            ->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'nip_ppk', $this->nip_ppk])
            ->andFilterWhere(['like', 'no_sp', $this->no_sp])
            ->andFilterWhere(['like', 'no_spd', $this->no_spd])
            ->andFilterWhere(['like', 'angkutan', $this->angkutan])
            ->andFilterWhere(['like', 'berangkat_asal', $this->berangkat_asal])
            ->andFilterWhere(['like', 'penandatangan', $this->penandatangan])
            ->andFilterWhere(['like', 'nip_ttd', $this->nip_ttd])
            ->andFilterWhere(['like', 'jabatan_ttd', $this->jabatan_ttd])
            ->andFilterWhere(['like', 'nip_bpp', $this->nip_bpp]);
            //->andFilterWhere(['like', 'pegawai.master_pegawai_nip', $this->pegawai.master_pegawai_nip]);

        return $dataProvider;
    }
}

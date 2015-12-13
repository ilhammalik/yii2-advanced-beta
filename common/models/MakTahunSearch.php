<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MakTahun;

/**
 * MakTahunSearch represents the model behind the search form about `\common\models\MakTahun`.
 */
class MakTahunSearch extends MakTahun
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_mak_id', 'alokasi_sub_mak', 'suboutput_id', 'nas_mak_id', 'no_item', 'har_sat', 'alokasi_pra_revisi', 'mak_header_id', 'subkomponen_id', 'blokir'], 'integer'],
            [['nama_sub_mak', 'satuan', 'ket_revisi', 'tahun', 'kd_satker', 'nas_prog_id', 'nas_keg_id', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kode_mak', 'kode_header', 'kdib', 'header1', 'header2'], 'safe'],
            [['volume'], 'number'],
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
        $query = MakTahun::find();

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
            'sub_mak_id' => $this->sub_mak_id,
            'alokasi_sub_mak' => $this->alokasi_sub_mak,
            'suboutput_id' => $this->suboutput_id,
            'nas_mak_id' => $this->nas_mak_id,
            'no_item' => $this->no_item,
            'volume' => $this->volume,
            'har_sat' => $this->har_sat,
            'alokasi_pra_revisi' => $this->alokasi_pra_revisi,
            'mak_header_id' => $this->mak_header_id,
            'subkomponen_id' => $this->subkomponen_id,
            'tahun' => $this->tahun,
            'blokir' => $this->blokir,
        ]);

        $query->andFilterWhere(['like', 'nama_sub_mak', $this->nama_sub_mak])
            ->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'ket_revisi', $this->ket_revisi])
            ->andFilterWhere(['like', 'kd_satker', $this->kd_satker])
            ->andFilterWhere(['like', 'nas_prog_id', $this->nas_prog_id])
            ->andFilterWhere(['like', 'nas_keg_id', $this->nas_keg_id])
            ->andFilterWhere(['like', 'kdoutput', $this->kdoutput])
            ->andFilterWhere(['like', 'kdsoutput', $this->kdsoutput])
            ->andFilterWhere(['like', 'kdkmpnen', $this->kdkmpnen])
            ->andFilterWhere(['like', 'kdskmpnen', $this->kdskmpnen])
            ->andFilterWhere(['like', 'kode_mak', $this->kode_mak])
            ->andFilterWhere(['like', 'kode_header', $this->kode_header])
            ->andFilterWhere(['like', 'kdib', $this->kdib])
            ->andFilterWhere(['like', 'header1', $this->header1])
            ->andFilterWhere(['like', 'header2', $this->header2]);

        return $dataProvider;
    }
}

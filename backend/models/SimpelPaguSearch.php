<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SimpelPagu;

/**
 * SimpelPaguSearch represents the model behind the search form about `\backend\models\SimpelPagu`.
 */
class SimpelPaguSearch extends SimpelPagu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pagu', 'tahun', 'alokasi_sub_mak', 'alokasi_pra_revisi', 'kd_satker', 'nas_prog_id', 'nas_keg_id', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kode_mak'], 'integer'],
            [['kdskmpnen'], 'safe'],
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
        $query = SimpelPagu::find();

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
            'id_pagu' => $this->id_pagu,
            'tahun' => $this->tahun,
            'alokasi_sub_mak' => $this->alokasi_sub_mak,
            'alokasi_pra_revisi' => $this->alokasi_pra_revisi,
            'kd_satker' => $this->kd_satker,
            'nas_prog_id' => $this->nas_prog_id,
            'nas_keg_id' => $this->nas_keg_id,
            'kdoutput' => $this->kdoutput,
            'kdsoutput' => $this->kdsoutput,
            'kdkmpnen' => $this->kdkmpnen,
            'kode_mak' => $this->kode_mak,
        ]);

        $query->andFilterWhere(['like', 'kdskmpnen', $this->kdskmpnen]);

        return $dataProvider;
    }
}

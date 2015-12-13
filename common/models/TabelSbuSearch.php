<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TabelSbu;

/**
 * TabelSbuSearch represents the model behind the search form about `\common\models\TabelSbu`.
 */
class TabelSbuSearch extends TabelSbu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDSBU12', 'KDSBU', 'NMSBU', 'SATUAN', 'KETERANGAN', 'NMITEM', 'SATKEG', 'TAHUN'], 'safe'],
            [['BIAYA12', 'BIAYA'], 'number'],
            [['_NullFlags', 'id'], 'integer'],
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
        $query = TabelSbu::find();

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
            'BIAYA12' => $this->BIAYA12,
            'BIAYA' => $this->BIAYA,
            '_NullFlags' => $this->_NullFlags,
            'TAHUN' => $this->TAHUN,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'KDSBU12', $this->KDSBU12])
            ->andFilterWhere(['like', 'KDSBU', $this->KDSBU])
            ->andFilterWhere(['like', 'NMSBU', $this->NMSBU])
            ->andFilterWhere(['like', 'SATUAN', $this->SATUAN])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN])
            ->andFilterWhere(['like', 'NMITEM', $this->NMITEM])
            ->andFilterWhere(['like', 'SATKEG', $this->SATKEG]);

        return $dataProvider;
    }

      public function searchh($params)
    {
        $query = TabelSbu::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
        'pageSize' => 5,
    ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'BIAYA12' => $this->BIAYA12,
            'BIAYA' => $this->BIAYA,
            '_NullFlags' => $this->_NullFlags,
            'TAHUN' => $this->TAHUN,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'KDSBU12', $this->KDSBU12])
            ->andFilterWhere(['like', 'KDSBU', $this->KDSBU])
            ->andFilterWhere(['like', 'NMSBU', $this->NMSBU])
            ->andFilterWhere(['like', 'SATUAN', $this->SATUAN])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN])
            ->andFilterWhere(['like', 'NMITEM', $this->NMITEM])
            ->andFilterWhere(['like', 'SATKEG', $this->SATKEG]);

        return $dataProvider;
    }
}

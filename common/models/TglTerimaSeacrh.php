<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TglTerima;

/**
 * TglTerimaSeacrh represents the model behind the search form about `common\models\TglTerima`.
 */
class TglTerimaSeacrh extends TglTerima
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['terima_id', 'kegiatan_id'], 'integer'],
            [['tgl_terima'], 'safe'],
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
        $query = TglTerima::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'pegawai.master_pegawai.nama', $this->personil_id]);


        return $dataProvider;
    }
}

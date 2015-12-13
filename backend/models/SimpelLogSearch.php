<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SimpelLog;

/**
 * SimpelLogSearch represents the model behind the search form about `backend\models\SimpelLog`.
 */
class SimpelLogSearch extends SimpelLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_log', 'user_id', 'simpel_user_user_id'], 'integer'],
            [['nama_proses', 'waktu'], 'safe'],
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
        $query = SimpelLog::find();

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
            'id_log' => $this->id_log,
            'user_id' => $this->user_id,
            'waktu' => $this->waktu,
            'simpel_user_user_id' => $this->simpel_user_user_id,
        ]);

        $query->andFilterWhere(['like', 'nama_proses', $this->nama_proses]);

        return $dataProvider;
    }
}

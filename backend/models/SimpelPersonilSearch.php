<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SimpelPersonil;

/**
 * SimpelPersonilSearch represents the model behind the search form about `backend\models\SimpelPersonil`.
 */
class SimpelPersonilSearch extends SimpelPersonil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_personil'], 'integer'],
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
        $query = SimpelPersonil::find();

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
            'id_personil' => $this->id_personil,
            
        ]);

     
        return $dataProvider;
    }
}

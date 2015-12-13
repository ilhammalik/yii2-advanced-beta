<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MasterSerasi;

/**
 * MasterSerasiSearch represents the model behind the search form about `\common\models\MasterSerasi`.
 */
class MasterSerasiSearch extends MasterSerasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detail_id', 'suboutput_id', 'jenis_detail_id', 'status_detail_id', 'status_lapor_id', 'status_real_up', 'status_real_ls'], 'integer'],
            [['nama_detail', 'renc_tgl_mulai', 'renc_tgl_selesai', 'real_tgl_mulai', 'real_tgl_selesai', 'ket', 'lokasi', 'nip_lapor', 'tgl_lapor', 'time_input', 'user_input'], 'safe'],
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
        $query = MasterSerasi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        //$query->with('with')
        $query->andFilterWhere([
            'detail_id' => $this->detail_id,
            'suboutput_id' => $this->suboutput_id,
            'jenis_detail_id' => $this->jenis_detail_id,
            'renc_tgl_mulai' => $this->renc_tgl_mulai,
            'renc_tgl_selesai' => $this->renc_tgl_selesai,
            'status_detail_id' => $this->status_detail_id,
            'real_tgl_mulai' => $this->real_tgl_mulai,
            'real_tgl_selesai' => $this->real_tgl_selesai,
            'status_lapor_id' => $this->status_lapor_id,
            'tgl_lapor' => $this->tgl_lapor,
            'time_input' => $this->time_input,
            'status_real_up' => $this->status_real_up,
            'status_real_ls' => $this->status_real_ls,
        ]);

        $query->andFilterWhere(['like', 'nama_detail', $this->nama_detail])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'nip_lapor', $this->nip_lapor])
            ->andFilterWhere(['like', 'user_input', $this->user_input]);

        return $dataProvider;
    }
}

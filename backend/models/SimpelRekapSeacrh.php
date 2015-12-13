<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SimpelKeg;

/**
 * SimpelRekapSeacrh represents the model behind the search form about `backend\models\SimpelKeg`.
 */
class SimpelRekapSeacrh extends SimpelKeg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kegiatan', 'unit_id', 'user_id', 'penandatangan', 'jml_dl',  'status', 'status_edit', 'negara', 'detail_id', 'random'], 'integer'],
            [['mak', 'nama_keg', 'tujuan', 'tgl_mulai', 'tgl_selesai',  'nip_ppk', 'no_sp', 'no_spd', 'angkutan', 'berangkat_asal', 'nip_bpp', 'tgl_penugasan'], 'safe'],
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
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_selesai' => $this->tgl_selesai,
            'unit_id' => $this->unit_id,
            'user_id' => $this->user_id,
            'penandatangan' => $this->penandatangan,
            'jml_dl' => $this->jml_dl,
            'status' => $this->status,
            'status_edit' => $this->status_edit,
            'negara' => $this->negara,
            'detail_id' => $this->detail_id,
            'tgl_penugasan' => $this->tgl_penugasan,
            'random' => $this->random,
        ]);

        $query->andFilterWhere(['like', 'mak', $this->mak])
            ->andFilterWhere(['like', 'nama_keg', $this->nama_keg])
            ->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'nip_ppk', $this->nip_ppk])
            ->andFilterWhere(['like', 'no_sp', $this->no_sp])
            ->andFilterWhere(['like', 'no_spd', $this->no_spd])
            ->andFilterWhere(['like', 'angkutan', $this->angkutan])
            ->andFilterWhere(['like', 'berangkat_asal', $this->berangkat_asal])
            ->andFilterWhere(['like', 'nip_bpp', $this->nip_bpp]);

        return $dataProvider;
    }
}

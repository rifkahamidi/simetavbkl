<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\Mbs;

/**
 * MbsSearch represents the model behind the search form of `app\Models\Mbs`.
 */
class MbsSearch extends Mbs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbs', 'tipe', 'kdbs', 'bskeko', 'dominan', 'tingkat', 'nm_gedung'], 'safe'],
            [['kdprov', 'kdkab', 'kdkec', 'kddes', 'j_keluarga', 'bstt', 'bsbtt', 'bstt_k', 'j_ruta_biasa', 'j_ruta_khusus', 'j_art_l', 'j_art_p'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Mbs::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'kdprov' => $this->kdprov,
            'kdkab' => $this->kdkab,
            'kdkec' => $this->kdkec,
            'kddes' => $this->kddes,
            'j_keluarga' => $this->j_keluarga,
            'bstt' => $this->bstt,
            'bsbtt' => $this->bsbtt,
            'bstt_k' => $this->bstt_k,
            'j_ruta_biasa' => $this->j_ruta_biasa,
            'j_ruta_khusus' => $this->j_ruta_khusus,
            'j_art_l' => $this->j_art_l,
            'j_art_p' => $this->j_art_p,
        ]);

        $query->andFilterWhere(['like', 'idbs', $this->idbs])
            ->andFilterWhere(['like', 'tipe', $this->tipe])
            ->andFilterWhere(['like', 'kdbs', $this->kdbs])
            ->andFilterWhere(['like', 'bskeko', $this->bskeko])
            ->andFilterWhere(['like', 'dominan', $this->dominan])
            ->andFilterWhere(['like', 'tingkat', $this->tingkat])
            ->andFilterWhere(['like', 'nm_gedung', $this->nm_gedung]);

        return $dataProvider;
    }
}

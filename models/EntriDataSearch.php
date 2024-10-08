<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\EntriData;

/**
 * EntriDataSearch represents the model behind the search form of `app\Models\EntriData`.
 */
class EntriDataSearch extends EntriData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['kabkot', 'kec', 'kel', 'labelbs', 'idbs', 'jenis_bs', 'body'], 'safe'],
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
        $query = EntriData::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'kabkot', $this->kabkot])
            ->andFilterWhere(['like', 'kec', $this->kec])
            ->andFilterWhere(['like', 'kel', $this->kel])
            ->andFilterWhere(['like', 'labelbs', $this->labelbs])
            ->andFilterWhere(['like', 'idbs', $this->idbs])
            ->andFilterWhere(['like', 'jenis_bs', $this->jenis_bs])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
}

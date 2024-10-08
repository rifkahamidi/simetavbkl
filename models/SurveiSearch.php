<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\Survei;

/**
 * SurveiSearch represents the model behind the search form of `app\Models\Survei`.
 */
class SurveiSearch extends Survei
{
    public $globalSearch; // Tambahkan properti ini

    public function rules()
    {
        return [
            // Aturan untuk atribut lain
            [['nmsurvei', 'deskripsi', 'status', 'globalSearch'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Survei::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Pencarian global di beberapa atribut
        $query->andFilterWhere(['or', 
            ['like', 'nmsurvei', $this->globalSearch],
            ['like', 'deskripsi', $this->globalSearch],
            ['like', 'status', $this->globalSearch],
        ]);

        return $dataProvider;
    }
}

<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InningDetail;

/**
 * InningDetailSearch represents the model behind the search form of `common\models\InningDetail`.
 */
class InningDetailSearch extends InningDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'match_id', 'team_id', 'batsman_id', 'bowler_id', 'runs_scored', 'extra_runs', 'is_wicket', 'is_wide_ball', 'is_no_ball', 'is_leg_bye', 'is_six', 'is_four', 'are_four_runs', 'are_triples', 'are_doubles', 'are_singles', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
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
        $query = InningDetail::find();

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
            'match_id' => $this->match_id,
            'team_id' => $this->team_id,
            'batsman_id' => $this->batsman_id,
            'bowler_id' => $this->bowler_id,
            'runs_scored' => $this->runs_scored,
            'extra_runs' => $this->extra_runs,
            'is_wicket' => $this->is_wicket,
            'is_wide_ball' => $this->is_wide_ball,
            'is_no_ball' => $this->is_no_ball,
            'is_leg_bye' => $this->is_leg_bye,
            'is_six' => $this->is_six,
            'is_four' => $this->is_four,
            'are_four_runs' => $this->are_four_runs,
            'are_triples' => $this->are_triples,
            'are_doubles' => $this->are_doubles,
            'are_singles' => $this->are_singles,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}

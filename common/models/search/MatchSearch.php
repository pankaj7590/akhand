<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Match;

/**
 * MatchSearch represents the model behind the search form of `common\models\Match`.
 */
class MatchSearch extends Match
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tournament_id', 'first_team_id', 'second_team_id', 'winner_team_id', 'first_team_score', 'first_team_wickets', 'second_team_score', 'second_team_wickets', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'type'], 'integer'],
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
        $query = Match::find();

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
            'tournament_id' => $this->tournament_id,
            'first_team_id' => $this->first_team_id,
            'second_team_id' => $this->second_team_id,
            'winner_team_id' => $this->winner_team_id,
            'first_team_score' => $this->first_team_score,
            'first_team_wickets' => $this->first_team_wickets,
            'second_team_score' => $this->second_team_score,
            'second_team_wickets' => $this->second_team_wickets,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'type' => $this->type,
        ]);

        return $dataProvider;
    }
}
